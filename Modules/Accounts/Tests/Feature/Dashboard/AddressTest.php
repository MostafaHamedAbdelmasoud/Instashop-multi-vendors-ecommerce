<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Countries\Entities\City;
use Modules\Accounts\Entities\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_customer_addresses()
    {
//        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $response = $this->get(route('dashboard.customers.show', $customer));

        $response->assertSuccessful();

        $response->assertSee(e($customer->addresses()->first()->name));
    }

    /** @test */
    public function it_can_create_addresses()
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $city = factory(City::class)->create();

        $addressesCount = $customer->addresses()->count();

        $response = $this->post(
            route('dashboard.customers.addresses.store', $customer),
            [
                'address' => 'Test',
                'city_id' => $city->id,
            ]
        );

        $response->assertRedirect();

        $this->assertEquals($customer->addresses()->count(), $addressesCount + 1);
        $this->assertEquals($customer->addresses->last()->address, 'Test');
    }

    /** @test */
    public function it_can_display_address_edit_form()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $address = $customer->addresses()->first();

        $response = $this->get(route('dashboard.customers.addresses.edit', [$customer, $address]));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::addresses.actions.edit'));
    }

    /** @test */
    public function it_can_update_addresses()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $address = $customer->addresses()->first();

        $city = factory(City::class)->create();

        $response = $this->put(
            route('dashboard.customers.addresses.update', [$customer, $address]),
            [
                'address' => 'Test',
                'city_id' => $city->id,
            ]
        );

        $response->assertRedirect();

        $address->refresh();

        $this->assertEquals($address->address, 'Test');
        $this->assertEquals($address->city_id, $city->id);
    }

    /** @test */
    public function it_can_delete_address()
    {
        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();

        $address = $customer->addresses()->first();

        $addressesCount = $customer->addresses()->count();

        $response = $this->delete(route('dashboard.customers.addresses.destroy', [$customer, $address]));
        $response->assertRedirect();

        $this->assertEquals($customer->addresses()->count(), $addressesCount - 1);
    }
}
