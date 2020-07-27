<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreOwnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_store_owners()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $storeOwner = factory(StoreOwner::class)->create();

        $response = $this->get(route('dashboard.store_owners.index'));

        $response->assertSuccessful();

        $response->assertSee(e($storeOwner->name));
    }

    /** @test */
    public function it_can_display_store_owner_details()
    {
        $this->actingAsAdmin();

        $storeOwner = factory(StoreOwner::class)->create();

        $response = $this->get(route('dashboard.store_owners.show', $storeOwner));

        $response->assertSuccessful();

        $response->assertSee(e($storeOwner->name));
    }

    /** @test */
    public function it_can_display_store_owner_create_form()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.store_owners.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::store_owners.actions.create'));
    }

    /** @test */
    public function it_can_create_store_owners()
    {
        $this->actingAsAdmin();

        $storeOwnerCount = StoreOwner::count();

        $response = $this->postJson(
            route('dashboard.store_owners.store'),
            [
                'name' => 'storeOwner',
                'email' => 'storeOwner@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(StoreOwner::count(), $storeOwnerCount + 1);
    }

    /** @test */
    public function it_can_display_store_owner_edit_form()
    {
        $this->actingAsAdmin();

        $storeOwner = factory(StoreOwner::class)->create();

        $response = $this->get(route('dashboard.store_owners.edit', $storeOwner));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::store_owners.actions.edit'));
    }

    /** @test */
    public function it_can_update_store_owners()
    {
        $this->actingAsAdmin();

        $storeOwner = factory(StoreOwner::class)->create();

        $response = $this->put(
            route('dashboard.store_owners.update', $storeOwner),
            [
                'name' => 'StoreOwner',
                'email' => 'StoreOwner@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $storeOwner->refresh();

        $this->assertEquals($storeOwner->name, 'StoreOwner');
    }

    /** @test */
    public function it_can_delete_StoreOwner()
    {
        $this->actingAsAdmin();

        $storeOwner = factory(StoreOwner::class)->create();

        $storeOwnerCount = StoreOwner::count();

        $response = $this->delete(route('dashboard.store_owners.destroy', $storeOwner));
        $response->assertRedirect();

        $this->assertEquals(StoreOwner::count(), $storeOwnerCount - 1);
    }
}
