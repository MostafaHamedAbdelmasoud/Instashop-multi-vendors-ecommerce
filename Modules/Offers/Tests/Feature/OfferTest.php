<?php

namespace Modules\Coupons\Tests\Feature;

use Carbon\Carbon;
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
            'percentage_discount_price' => 19,
        ]);

        $response = $this->get(route('dashboard.offers.index'));

        $response->assertSuccessful();

        $response->assertSee('19');
    }

    /** @test */
    public function it_can_display_offer_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $response = $this->get(route('dashboard.offers.show', $offer));

        $response->assertSuccessful();

        $response->assertSee(e($offer->percentage_discount_price));
    }

    /** @test */
    public function it_can_create_a_new_offer_cateogry()
    {
//        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Offer::count());

        $response = $this->post(
            route('dashboard.store.create_category_offer', 'category'),
            RuleFactory::make(
                [
                    'fixed_discount_price' => 1,
                    'percentage_discount_price'=>21,
                    'name:ar'=>'قسم تجريبي',
                    'name:en'=>'category test',
                    'model_id'=>1,
                    'expire_at'=>Carbon::now()->addDay(3),
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Offer::count());
    }

    /** @test */
    public function it_can_display_offer_create_form()
    {
//        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.offers.create_category_offer', 'category'));

        $response->assertSuccessful();

        $response->assertSee(trans('offers::offers.actions.create'));
    }

    /** @test */
    public function it_can_display_category_offer_edit_form()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $response = $this->get(route('dashboard.offers.edit', $offer));

        $response->assertSuccessful();

        $response->assertSee(trans('offers::offers.actions.edit'));
    }

    /** @test */
    public function it_can_update_offer()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Offer::count());

        $offer = factory(Offer::class)->create();

        $response = $this->put(
            route('dashboard.offers.update', $offer),
            RuleFactory::make(
                [
                    'fixed_discount_price' => 1,
                    'percentage_discount_price'=>21,
                    'name:ar'=>'قسم تجريبي',
                    'name:en'=>'category test',
                    'model_id'=>1,
                    'expire_at'=>Carbon::now()->addDay(3),

                ]
            )
        );

        $offer->refresh();

        $response->assertRedirect();

        $this->assertEquals($offer->percentage_discount_price, '21');
    }

    /** @test */
    public function it_can_delete_offer()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $offer = factory(Offer::class)->create();

        $this->assertEquals(Offer::count(), 1);

        $response = $this->delete(route('dashboard.offers.destroy', $offer));

        $response->assertRedirect();

        $this->assertEquals(Offer::count(), 0);
    }
}
