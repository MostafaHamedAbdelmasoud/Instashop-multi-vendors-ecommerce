<?php

namespace Modules\Stores\Tests\Feature;

use Tests\TestCase;
use Modules\Stores\Entities\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

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

    /** @test */
    public function it_can_display_store_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.stores.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('stores::stores.actions.create'));
    }

    /** @test */
    public function it_can_display_store_edit_form()
    {
        $this->actingAsAdmin();

        $store = factory(Store::class)->create();

        $response = $this->get(route('dashboard.stores.edit', $store));

        $response->assertSuccessful();

        $response->assertSee(trans('stores::stores.actions.edit'));
    }

//

    /** @test */
    public function it_can_update_store()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Store::count());

        $store = factory(Store::class)->create();

        $response = $this->put(
            route('dashboard.stores.update', $store),
            RuleFactory::make(
                [
                    '%name%' => 'Egypt',
                    'plan' => 'basic',
                    'domain' => 'souq.com',
                    '%description%' => 'it is description',
                    '%meta_description%' => 'it is meta description',
                    '%keywords%' => 'souq e-commerce',
                ]
            )
        );

        $store->refresh();

        $response->assertRedirect();

        $this->assertEquals($store->name, 'Egypt');
    }

    /** @test */
    public function it_can_delete_store()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $store = factory(Store::class)->create();
//        dd(Store::first());
        $this->assertEquals(Store::count(), 1);

        $response = $this->delete(route('dashboard.stores.destroy', $store));

        $response->assertRedirect();

        $this->assertEquals(Store::count(), 0);
    }
}
