<?php

namespace Modules\OrderProducts\Tests\Feature;

use Tests\TestCase;
use Modules\Orders\Entities\Order;
use Modules\Coupons\Entities\Coupon;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\OrderProducts\Entities\OrderProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class OrderProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_order_order_products()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(OrderProduct::class)->create([
            'price' => '12.2',
        ]);

        $response = $this->get(route('dashboard.order_products.index'));

        $response->assertSuccessful();

        $response->assertSee('12.2');
    }

    /** @test */
    public function it_can_display_order_product_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $response = $this->get(route('dashboard.order_products.show', $orderProduct));

        $response->assertSuccessful();

        $response->assertSee(e($orderProduct->price));
    }

    /** @test */
    public function it_can_create_a_new_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, OrderProduct::count());

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

        $product = factory(Product::class)->create([
            'name' => 'ProductTestName',
        ]);

        $response = $this->post(
            route('dashboard.order_products.store'),
            RuleFactory::make(
                [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => 110,
                    'price' => 11.2,
                    'total' => 121.2,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, OrderProduct::count());
    }

    /** @test */
    public function it_can_display_order_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.order_products.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('order_products::order_products.actions.create'));
    }

    /** @test */
    public function it_can_display_product_edit_form()
    {
        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $response = $this->get(route('dashboard.order_products.edit', $orderProduct));

        $response->assertSuccessful();

        $response->assertSee(trans('order_products::order_products.actions.edit'));
    }

    /** @test */
    public function it_can_update_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, OrderProduct::count());

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

        $product = factory(Product::class)->create([
            'name' => 'ProductTestName',
        ]);
        $orderProduct = factory(OrderProduct::class)->create();


        $response = $this->put(
            route('dashboard.order_products.update', $orderProduct),
            RuleFactory::make(
                [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => 110,
                    'price' => 11.2,
                    'total' => 121.2,
                ]
            )
        );

        $orderProduct->refresh();

        $response->assertRedirect();

        $this->assertEquals($orderProduct->price, '11.2');
    }

    /** @test */
    public function it_can_delete_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $this->assertEquals(OrderProduct::count(), 1);

        $response = $this->delete(route('dashboard.order_products.destroy', $orderProduct));

        $response->assertRedirect();

        $this->assertEquals(OrderProduct::count(), 0);
    }
}
