<?php

namespace Modules\Countries\Tests\Feature;

use Tests\TestCase;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_countries()
    {
        $this->actingAsAdmin();

        factory(Country::class)->create(['name' => 'Egypt']);

        $response = $this->get(route('dashboard.countries.index'));

        $response->assertSuccessful();

        $response->assertSee('Egypt');
    }

    /** @test */
    public function it_can_display_country_details()
    {
        $this->actingAsAdmin();

        $country = factory(Country::class)->create();

        $city = factory(City::class)->create(['country_id' => $country->id]);

        $response = $this->get(route('dashboard.countries.show', $country));

        $response->assertSuccessful();

        $response->assertSee(e($country->name));
        $response->assertSee(e($city->name));
    }

    /** @test */
    public function it_can_create_a_new_country()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Country::count());

        $response = $this->post(
            route('dashboard.countries.store'),
            RuleFactory::make(
                [
                    '%name%' => 'Egypt',
                    'code' => 'eg',
                    'key' => '+2',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Country::count());
    }

    /** @test */
    public function it_can_display_country_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.countries.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('countries::countries.actions.create'));
    }

    /** @test */
    public function it_can_display_country_edit_form()
    {
        $this->actingAsAdmin();

        $country = factory(Country::class)->create();

        $response = $this->get(route('dashboard.countries.edit', $country));

        $response->assertSuccessful();

        $response->assertSee(trans('countries::countries.actions.edit'));
    }

    /** @test */
    public function it_can_update_country()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Country::count());

        $country = factory(Country::class)->create();

        $response = $this->put(
            route('dashboard.countries.update', $country),
            RuleFactory::make(
                [
                    '%name%' => 'Egypt',
                    'code' => 'eg',
                    'key' => '+2',
                ]
            )
        );

        $country->refresh();

        $response->assertRedirect();

        $this->assertEquals($country->name, 'Egypt');
    }

    /** @test */
    public function it_can_delete_country()
    {
        $this->actingAsAdmin();

        $country = factory(Country::class)->create();

        $this->assertEquals(Country::count(), 1);

        $response = $this->delete(route('dashboard.countries.destroy', $country));

        $response->assertRedirect();

        $this->assertEquals(Country::count(), 0);
    }
}
