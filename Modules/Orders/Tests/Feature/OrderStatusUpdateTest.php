<?php

namespace Modules\Orders\Tests\Feature;

use Tests\TestCase;
use Modules\Orders\Entities\Order;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Orders\Entities\OrderStatusUpdate;
use Modules\OrderStatuses\Entities\OrderStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class OrderStatusUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_orders_status_updates()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $orderStatus = factory(OrderStatus::class)->create();


        factory(OrderStatusUpdate::class)->create([
            'order_id' => $order->id,
            'order_status_id' => $orderStatus->id,
            'notes' => 'lorem',
        ]);
        $response = $this->get(route('dashboard.orders.show', $order));

        $response->assertSuccessful();

        $response->assertSee('lorem');
    }

    /** @test */
    public function it_can_display_order_status_updates_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $orderStatusUpdate = factory(OrderStatusUpdate::class)->create([
            'order_id' => $order->id,
        ]);

        $response = $this->get(route('dashboard.orders.show', $order));

        $response->assertSuccessful();

        $response->assertSee(e($order->orderStatusUpdates()->first()->id));
    }

    /** @test */
    public function it_can_create_a_new_order_status_update()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, OrderStatusUpdate::count());

        $order = factory(Order::class)->create();

        $orderStatus = factory(OrderStatus::class)->create();

        $response = $this->post(
            route('dashboard.orders.order_status_updates.store', $order),
            RuleFactory::make(
                [
                    'order_id' => $order->id,
                    'order_status_id' => $orderStatus->id,
                    'notes' => 'lorem',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, OrderStatusUpdate::count());
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
    public function it_can_display_order_status_update_edit_form()
    {
        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $orderStatus = factory(OrderStatus::class)->create();

        $orderStatusUpdate = factory(OrderStatusUpdate::class)->create([
            'order_id' => $order->id,
            'order_status_id' => $orderStatus->id,
        ]);
        $response = $this->get(route('dashboard.orders.order_status_updates.edit', [$order, $orderStatusUpdate]));

        $response->assertSuccessful();

        $response->assertSee(trans('orders::order_status_updates.actions.edit'));
    }

    /** @test */
    public function it_can_update_order_status_update()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, OrderStatus::count());

        $order = factory(Order::class)->create();

        $orderStatus = factory(OrderStatus::class)->create();

        $orderStatusUpdate = factory(OrderStatusUpdate::class)->create([
            'order_id' => $order->id,
            'order_status_id' => $orderStatus->id,
            'notes' => 'lorem',
        ]);

        $response = $this->put(
            route('dashboard.orders.order_status_updates.update', [$order, $orderStatusUpdate]),
            RuleFactory::make(
                [
                    'order_id' => $order->id,
                    'order_status_id' => $orderStatus->id,
                    'notes' => 'lorem edited',
                ]
            )
        );

        $orderStatusUpdate->refresh();

        $response->assertRedirect();

        $this->assertEquals($orderStatusUpdate->notes, 'lorem edited');
    }

    /** @test */
    public function it_can_delete_order_status_update()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $order = factory(Order::class)->create();

        $orderStatus = factory(OrderStatus::class)->create();

        $orderStatusUpdate = factory(OrderStatusUpdate::class)->create([
            'order_id' => $order->id,
            'order_status_id' => $orderStatus->id,
            'notes' => 'lorem',
        ]);

        $this->assertEquals(OrderStatusUpdate::count(), 1);

        $response = $this->delete(route('dashboard.orders.order_status_updates.destroy', [$order, $orderStatusUpdate]));

        $response->assertRedirect();

        $this->assertEquals(OrderStatusUpdate::count(), 0);
    }
}
