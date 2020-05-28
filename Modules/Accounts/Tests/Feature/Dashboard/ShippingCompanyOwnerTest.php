<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class ShippingCompanyOwnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_shipping_company_owners()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $response = $this->get(route('dashboard.shipping_company_owners.index'));

        $response->assertSuccessful();

        $response->assertSee(e($shippingCompanyOwner->name));
    }

    /** @test */
    public function it_can_display_shipping_company_owner_details()
    {
        $this->withoutExceptionHandling();


        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $response = $this->get(route('dashboard.shipping_company_owners.show', $shippingCompanyOwner));

        $response->assertSuccessful();

        $response->assertSee(e($shippingCompanyOwner->name));
    }

    /** @test */
    public function it_can_display_shipping_company_owner_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.shipping_company_owners.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::shipping_company_owners.actions.create'));
    }

    /** @test */
    public function it_can_create_shipping_company_owners()
    {
        $this->actingAsAdmin();

        $shippingCompanyOwnerCount = ShippingCompanyOwner::count();

        $response = $this->postJson(
            route('dashboard.shipping_company_owners.store'),
            [
                'name' => 'ShippingCompanyOwner',
                'email' => 'ShippingCompanyOwner@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(ShippingCompanyOwner::count(), $shippingCompanyOwnerCount + 1);
    }

    /** @test */
    public function it_can_display_shipping_company_owner_edit_form()
    {
        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $response = $this->get(route('dashboard.shipping_company_owners.edit', $shippingCompanyOwner));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::shipping_company_owners.actions.edit'));
    }

    /** @test */
    public function it_can_update_shipping_company_owners()
    {
        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $response = $this->put(
            route('dashboard.shipping_company_owners.update', $shippingCompanyOwner),
            [
                'name' => 'ShippingCompanyOwner',
                'email' => 'ShippingCompanyOwner@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $shippingCompanyOwner->refresh();

        $this->assertEquals($shippingCompanyOwner->name, 'ShippingCompanyOwner');
    }

    /** @test */
    public function it_can_delete_ShippingCompanyOwner()
    {
        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $shippingCompanyOwnerCount = ShippingCompanyOwner::count();

        $response = $this->delete(route('dashboard.shipping_company_owners.destroy', $shippingCompanyOwner));
        $response->assertRedirect();

        $this->assertEquals(ShippingCompanyOwner::count(), $shippingCompanyOwnerCount - 1);
    }
}
