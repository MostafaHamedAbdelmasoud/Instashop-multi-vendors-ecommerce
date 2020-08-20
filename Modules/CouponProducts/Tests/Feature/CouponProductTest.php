<?php

namespace Modules\CouponProducts\Tests\Feature;

use Tests\TestCase;
use Modules\Coupons\Entities\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CouponProducts\Entities\CouponProduct;
use Astrotomic\Translatable\Validation\RuleFactory;

class CouponProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_coupon_products()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        factory(CouponProduct::class)->create([
            'coupon_id' => $coupon->id,
            'type' => 'included',
        ]);

        $response = $this->get(route('dashboard.coupon_products.index'));

        $response->assertSuccessful();

        $response->assertSee('included');
    }

    /** @test */
    public function it_can_display_coupon_product_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $couponProduct = factory(CouponProduct::class)->create();

        $response = $this->get(route('dashboard.coupon_products.show', $couponProduct));

        $response->assertSuccessful();

        $response->assertSee(e($couponProduct->id));
    }

    /** @test */
    public function it_can_create_a_new_coupon_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, CouponProduct::count());

        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        $response = $this->post(
            route('dashboard.coupon_products.store'),
            RuleFactory::make(
                [
                    'coupon_id' => $coupon->id,
                    'type' => 'included',
                    'model_id' => 1,
                    'model_type' => 'included',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, CouponProduct::count());
    }

    /** @test */
    public function it_can_display_coupon_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.coupon_products.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('coupon_products::coupon_products.actions.create'));
    }

    /** @test */
    public function it_can_display_coupon_product_edit_form()
    {
        $this->actingAsAdmin();

        $couponProduct = factory(CouponProduct::class)->create();

        $response = $this->get(route('dashboard.coupon_products.edit', $couponProduct));

        $response->assertSuccessful();

        $response->assertSee(trans('coupon_products::coupon_products.actions.edit'));
    }

    /** @test */
    public function it_can_update_coupon_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, CouponProduct::count());

        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        $couponProduct = factory(CouponProduct::class)->create();

        $response = $this->put(
            route('dashboard.coupon_products.update', $couponProduct),
            RuleFactory::make(
                [
                    'coupon_id' => $coupon->id,
                    'type' => 'included',
                    'model_id' => 1,
                    'model_type' => 'included',
                ]
            )
        );

        $coupon->refresh();

        $response->assertRedirect();

        $this->assertEquals($couponProduct->type, 'included');
    }

    /** @test */
    public function it_can_delete_coupon_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $couponProduct = factory(CouponProduct::class)->create();

        $this->assertEquals(CouponProduct::count(), 1);

        $response = $this->delete(route('dashboard.coupon_products.destroy', $couponProduct));

        $response->assertRedirect();

        $this->assertEquals(CouponProduct::count(), 0);
    }
}
