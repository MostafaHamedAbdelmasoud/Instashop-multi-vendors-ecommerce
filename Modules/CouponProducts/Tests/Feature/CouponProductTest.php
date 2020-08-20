<?php

namespace Modules\CouponProducts\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CouponProducts\Entities\CouponProduct;
use Astrotomic\Translatable\Validation\RuleFactory;

class CouponProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_coupons()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(CouponProduct::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        $response = $this->get(route('dashboard.coupons.index'));

        $response->assertSuccessful();

        $response->assertSee('443');
    }

    /** @test */
    public function it_can_display_coupon_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $coupon = factory(CouponProduct::class)->create();

        $response = $this->get(route('dashboard.coupons.show', $coupon));

        $response->assertSuccessful();

        $response->assertSee(e($coupon->code));
    }

    /** @test */
    public function it_can_create_a_new_coupon()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, CouponProduct::count());

        $response = $this->post(
            route('dashboard.coupons.store'),
            RuleFactory::make(
                [
                    'code' => 'h112',
                    'percentage_discount' => 12.21,
                    'fixed_discount' => 2.21,
                    'max_usage_per_order' => 2,
                    'max_usage_per_user' => 2,
                    'min_total' => 20.2,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, CouponProduct::count());
    }

    /** @test */
    public function it_can_display_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.coupons.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('coupons::coupons.actions.create'));
    }

    /** @test */
    public function it_can_display_product_edit_form()
    {
        $this->actingAsAdmin();

        $coupon = factory(CouponProduct::class)->create();

        $response = $this->get(route('dashboard.coupons.edit', $coupon));

        $response->assertSuccessful();

        $response->assertSee(trans('coupons::coupons.actions.edit'));
    }

    /** @test */
    public function it_can_update_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, CouponProduct::count());

        $coupon = factory(CouponProduct::class)->create();

        $response = $this->put(
            route('dashboard.coupons.update', $coupon),
            RuleFactory::make(
                [
                    'code' => 'h112',
                    'percentage_discount' => 12.21,
                    'fixed_discount' => 2.21,
                    'max_usage_per_order' => 2,
                    'max_usage_per_user' => 2,
                    'min_total' => 20.2,

                ]
            )
        );

        $coupon->refresh();

        $response->assertRedirect();

        $this->assertEquals($coupon->code, 'h112');
    }

    /** @test */
    public function it_can_delete_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $coupon = factory(CouponProduct::class)->create();

        $this->assertEquals(CouponProduct::count(), 1);

        $response = $this->delete(route('dashboard.coupons.destroy', $coupon));

        $response->assertRedirect();

        $this->assertEquals(CouponProduct::count(), 0);
    }
}
