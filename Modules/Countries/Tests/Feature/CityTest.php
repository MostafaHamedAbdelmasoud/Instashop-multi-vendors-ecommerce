<?php

namespace Modules\Countries\Tests\Feature;

use Tests\TestCase;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_city()
    {
        $this->actingAsAdmin();
        $country = factory(Country::class)->create();
        $this->assertEquals(0, City::count());
        $response = $this->post(
            route('dashboard.countries.cities.store', $country),
            RuleFactory::make([
                '%name%' => 'Cairo',
            ])
        );
        $response->assertRedirect();
        $this->assertEquals(1, City::count());
    }

    /** @test */
    public function it_can_display_country_edit_form()
    {
        $this->actingAsAdmin();
        $city = factory(City::class)->create();
        $response = $this->get(route('dashboard.countries.cities.edit', [$city->country, $city]));
        $response->assertSuccessful();
        $response->assertSee(trans('countries::cities.actions.edit'));
    }

    /** @test */
    public function it_can_update_country()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, City::count());

        $city = factory(City::class)->create();

        $response = $this->put(
            route('dashboard.countries.cities.update', [$city->country, $city]),
            RuleFactory::make([
                '%name%' => 'Cairo',
            ])
        );

        $city->refresh();

        $response->assertRedirect();

        $this->assertEquals($city->name, 'Cairo');
    }

    /** @test */
    public function it_can_delete_country()
    {
        $this->actingAsAdmin();
        $city = factory(City::class)->create();
        $this->assertEquals(Country::count(), 1);
        $response = $this->delete(route('dashboard.countries.cities.destroy', [$city->country, $city]));
        $response->assertRedirect();
        $this->assertEquals(City::count(), 0);
    }
}
