<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_customers()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $response = $this->get(route('dashboard.customers.index'));

        $response->assertSuccessful();

        $response->assertSee(e($customer->name));
    }

    /** @test */
    public function it_can_display_customer_details()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $response = $this->get(route('dashboard.customers.show', $customer));

        $response->assertSuccessful();

        $response->assertSee(e($customer->name));
    }

    /** @test */
    public function it_can_display_customer_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::customers.actions.create'));
    }

    /** @test */
    public function it_can_create_customers()
    {
        $this->actingAsAdmin();

        $customersCount = Customer::count();

        $response = $this->postJson(
            route('dashboard.customers.store'),
            [
                'name' => 'Customer',
                'email' => 'customer@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount + 1);
    }

    /** @test */
    public function it_can_display_customer_edit_form()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $response = $this->get(route('dashboard.customers.edit', $customer));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::customers.actions.edit'));
    }

    /** @test */
    public function it_can_update_customers()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $response = $this->put(
            route('dashboard.customers.update', $customer),
            [
                'name' => 'Customer',
                'email' => 'customer@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $customer->refresh();

        $this->assertEquals($customer->name, 'Customer');
    }

    /** @test */
    public function it_can_delete_customer()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $customersCount = Customer::count();

        $response = $this->delete(route('dashboard.customers.destroy', $customer));
        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount - 1);
    }
}
