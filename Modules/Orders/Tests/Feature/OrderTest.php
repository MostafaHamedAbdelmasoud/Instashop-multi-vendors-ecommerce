<?php

namespace Modules\Orders\Tests\Feature;

use Tests\TestCase;
use Modules\Orders\Entities\Order;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_orders()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();
        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);
        $shipping_company_owner = factory(ShippingCompanyOwner::class)->create();
        $shipping_company = factory(ShippingCompany::class)->create([
            'owner_id' => $shipping_company_owner->id,
        ]);

        factory(Order::class)->create([
            'user_id' => $customer->id,
            'shipping_company_id' => $shipping_company->id,
            'address_id' => $customer->addresses()->first()->id,
            'coupon_id' => $coupon->id,
            'discount' => 12.0,
        ]);

        $response = $this->get(route('dashboard.orders.index'));

        $response->assertSuccessful();

        $response->assertSee(12.0);
    }

    /** @test */
    public function it_can_display_order_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $customer = factory(Customer::class)->create();
        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);
        $shipping_company_owner = factory(ShippingCompanyOwner::class)->create();
        $shipping_company = factory(ShippingCompany::class)->create([
            'owner_id' => $shipping_company_owner->id,
        ]);

        $order = factory(Order::class)->create([
            'user_id' => $customer->id,
            'shipping_company_id' => $shipping_company->id,
            'address_id' => $customer->addresses()->first()->id,
            'coupon_id' => $coupon->id,
            'discount' => 12.0,
        ]);

        $response = $this->get(route('dashboard.orders.show', $order));

        $response->assertSuccessful();

        $response->assertSee(e($order->id));
    }

    /** @test */
    public function it_can_create_a_new_order()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Order::count());

        $customer = factory(Customer::class)->create();

        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);
        $shipping_company_owner = factory(ShippingCompanyOwner::class)->create();
        $shipping_company = factory(ShippingCompany::class)->create([
            'owner_id' => $shipping_company_owner->id,
        ]);


        $response = $this->post(
            route('dashboard.orders.store'),
            RuleFactory::make(
                [
                    'user_id' => $customer->id,
                    'shipping_company_id' => $shipping_company->id,
                    'address_id' => $customer->addresses()->first()->id,
                    'coupon_id' => $coupon->id,
                    'discount' => 12.0,
                    'subtotal' => 110.2,
                    'total' => 11.2,
                    'shipping_company_notes' => 'it is notes for shipping company test',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Order::count());
    }

    /** @test */
    public function it_can_display_order_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.orders.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('orders::orders.actions.create'));
    }

    /** @test */
    public function it_can_display_order_edit_form()
    {
        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $response = $this->get(route('dashboard.orders.edit', $order));

        $response->assertSuccessful();

        $response->assertSee(trans('orders::orders.actions.edit'));
    }

    /** @test */
    public function it_can_update_order()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Order::count());

        $customer = factory(Customer::class)->create();
        $coupon = factory(Coupon::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);
        $shipping_company_owner = factory(ShippingCompanyOwner::class)->create();
        $shipping_company = factory(ShippingCompany::class)->create([
            'owner_id' => $shipping_company_owner->id,
        ]);


        $order = factory(Order::class)->create([
            'user_id' => $customer->id,
            'shipping_company_id' => $shipping_company->id,
            'address_id' => $customer->addresses()->first()->id,
            'coupon_id' => $coupon->id,
            'discount' => 12.0,
        ]);

        $response = $this->put(
            route('dashboard.orders.update', $order),
            RuleFactory::make(
                [
                    'shipping_company_id' => $shipping_company->id,
                    'address_id' => $customer->addresses()->first()->id,
                    'coupon_id' => $coupon->id,
                    'discount' => 12.0,
                    'subtotal' => 110.2,
                    'total' => 11.2,
                    'shipping_company_notes' => 'it is notes for shipping company test',
                ]
            )
        );

        $order->refresh();

        $response->assertRedirect();

        $this->assertEquals($order->discount, 12.0);
    }

    /** @test */
    public function it_can_delete_order()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $this->assertEquals(Order::count(), 1);

        $response = $this->delete(route('dashboard.orders.destroy', $order));

        $response->assertRedirect();

        $this->assertEquals(Order::count(), 0);
    }
}
