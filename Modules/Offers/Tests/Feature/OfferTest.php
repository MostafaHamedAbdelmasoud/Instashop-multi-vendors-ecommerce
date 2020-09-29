<?php

namespace Modules\Coupons\Tests\Feature;

use Tests\TestCase;
use Modules\Offers\Entities\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class OfferTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_Offers()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(Offer::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        $response = $this->get(route('dashboard.Offers.index'));

        $response->assertSuccessful();

        $response->assertSee('443');
    }

    /** @test */
    public function it_can_display_coupon_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $response = $this->get(route('dashboard.Offers.show', $offer));

        $response->assertSuccessful();

        $response->assertSee(e($offer->code));
    }

    /** @test */
    public function it_can_create_a_new_coupon()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Offer::count());

        $response = $this->post(
            route('dashboard.Offers.store'),
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

        $this->assertEquals(1, Offer::count());
    }

    /** @test */
    public function it_can_display_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.Offers.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('offers::offers.actions.create'));
    }

    /** @test */
    public function it_can_display_product_edit_form()
    {
        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $response = $this->get(route('dashboard.Offers.edit', $offer));

        $response->assertSuccessful();

        $response->assertSee(trans('offers::offers.actions.edit'));
    }

    /** @test */
    public function it_can_update_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Offer::count());

        $offer = factory(Offer::class)->create();

        $response = $this->put(
            route('dashboard.Offers.update', $offer),
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

        $offer->refresh();

        $response->assertRedirect();

        $this->assertEquals($offer->code, 'h112');
    }

    /** @test */
    public function it_can_delete_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $this->assertEquals(Offer::count(), 1);

        $response = $this->delete(route('dashboard.Offers.destroy', $offer));

        $response->assertRedirect();

        $this->assertEquals(Offer::count(), 0);
    }
}
