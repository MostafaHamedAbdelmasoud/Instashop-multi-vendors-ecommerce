<?php

namespace Modules\Subscriptions\Tests\Feature;

use Tests\TestCase;
use Modules\Stores\Entities\Store;
use Modules\Subscriptions\Entities\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_categories()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $store = factory(Store::class)->create(['owner_id' => 1, 'domain' => 'facebook', ]);

        factory(Subscription::class)->create(['name' => 'CategoryTestName', 'store_id' => $store->id, ]);

        $response = $this->get(route('dashboard.categories.index'));

        $response->assertSuccessful();

        $response->assertSee('CategoryTestName');
    }

    /** @test */
    public function it_can_display_category_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $category = factory(Subscription::class)->create();

        $response = $this->get(route('dashboard.categories.show', $category));

        $response->assertSuccessful();

        $response->assertSee(e($category->name));
    }

    /** @test */
    public function it_can_create_a_new_category()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Subscription::count());

        $store = factory(Store::class)->create([
            'owner_id' => 1,
            'domain' => 'facebook',
        ]);


        $response = $this->post(
            route('dashboard.categories.store'),
            RuleFactory::make(
                [
                    '%name%' => 'categoryName',
                    'store_id' =>$store->id,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Subscription::count());
    }

    /** @test */
    public function it_can_display_category_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.categories.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('categories::categories.actions.create'));
    }

    /** @test */
    public function it_can_display_category_edit_form()
    {
        $this->actingAsAdmin();

        $store = factory(Store::class)->create([
            'owner_id' => 1,
            'domain' => 'facebook',
        ]);

        $category = factory(Subscription::class)->create([
            'name' => 'CategoryTestName',
            'store_id' => $store->id,
        ]);

        $response = $this->get(route('dashboard.categories.edit', $category));

        $response->assertSuccessful();

        $response->assertSee(trans('categories::categories.actions.edit'));
    }

//

    /** @test */
    public function it_can_update_category()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Subscription::count());

        $store = factory(Store::class)->create([
            'owner_id' => 1,
            'domain' => 'facebook',
        ]);

        $category = factory(Subscription::class)->create([
            'name' => 'CategoryTestName',
            'store_id' => $store->id,
        ]);

        $response = $this->put(
            route('dashboard.categories.update', $category),
            RuleFactory::make(
                [
                    '%name%' => 'CategoryName2',
                ]
            )
        );

        $category->refresh();

        $response->assertRedirect();

        $this->assertEquals($category->name, 'CategoryName2');
    }

    /** @test */
    public function it_can_delete_category()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $store = factory(Store::class)->create([
            'owner_id' => 1,
            'domain' => 'facebook',
        ]);

        $category = factory(Subscription::class)->create([
            'name' => 'CategoryTestName',
            'store_id' => $store->id,
        ]);

        $this->assertEquals(Subscription::count(), 1);

        $response = $this->delete(route('dashboard.categories.destroy', $category));

        $response->assertRedirect();

        $this->assertEquals(Subscription::count(), 0);
    }
}
