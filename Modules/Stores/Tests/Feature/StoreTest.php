<?php

namespace Modules\Stores\Tests\Feature;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Stores\Entities\Store;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_stores()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(\Modules\Stores\Entities\Store::class)->create(['name' => 'StoreTestName']);

        $response = $this->get(route('dashboard.stores.index'));

        $response->assertSuccessful();

        $response->assertSee('StoreTestName');
    }

    /** @test */
    public function it_can_display_store_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $store = factory(Store::class)->create();

        $response = $this->get(route('dashboard.stores.show', $store));

        $response->assertSuccessful();

        $response->assertSee(e($store->name));
    }

    /** @test */
    public function it_can_create_a_new_store()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Store::count());

        $response = $this->post(
            route('dashboard.stores.store'),
            RuleFactory::make(
                [
                    '%name%' => 'storeNamehe',
                    'plan' => 'plan1',
                    'domain' => 'helloDomaind.com',
                    '%description%' => 'it is desc helloDomaind.com',
                    '%meta_description%' => 'it is meta_desc helloDomaind.com',
                    '%keywords%' => 'it is keywords helloDomaind.com',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Store::count());
    }

//    /** @test */
//    public function it_can_display_country_create_form()
//    {
//        $this->actingAsAdmin();
//
//        $response = $this->get(route('dashboard.countries.create'));
//
//        $response->assertSuccessful();
//
//        $response->assertSee(trans('countries::countries.actions.create'));
//    }
//
//    /** @test */
//    public function it_can_display_country_edit_form()
//    {
//        $this->actingAsAdmin();
//
//        $country = factory(Country::class)->create();
//
//        $response = $this->get(route('dashboard.countries.edit', $country));
//
//        $response->assertSuccessful();
//
//        $response->assertSee(trans('countries::countries.actions.edit'));
//    }
//
//    /** @test */
//    public function it_can_update_country()
//    {
//        $this->actingAsAdmin();
//
//        $this->assertEquals(0, Country::count());
//
//        $country = factory(Country::class)->create();
//
//        $response = $this->put(
//            route('dashboard.countries.update', $country),
//            RuleFactory::make(
//                [
//                    '%name%' => 'Egypt',
//                    'code' => 'eg',
//                    'key' => '+2',
//                ]
//            )
//        );
//
//        $country->refresh();
//
//        $response->assertRedirect();
//
//        $this->assertEquals($country->name, 'Egypt');
//    }
//
//    /** @test */
//    public function it_can_delete_country()
//    {
//        $this->actingAsAdmin();
//
//        $country = factory(Country::class)->create();
//
//        $this->assertEquals(Country::count(), 1);
//
//        $response = $this->delete(route('dashboard.countries.destroy', $country));
//
//        $response->assertRedirect();
//
//        $this->assertEquals(Country::count(), 0);
//    }
}
