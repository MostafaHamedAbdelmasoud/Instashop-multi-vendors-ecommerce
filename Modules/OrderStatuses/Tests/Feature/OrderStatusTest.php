<?php

namespace Modules\OrderStatuses\Tests\Feature;

use Tests\TestCase;
use Modules\OrderStatuses\Entities\OrderStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class OrderStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_order_statuses()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(OrderStatus::class)->create([
            'name' => 'done',
            'type' => 'done',
        ]);

        $response = $this->get(route('dashboard.order_statuses.index'));

        $response->assertSuccessful();

        $response->assertSee('done');
    }

    /** @test */
    public function it_can_display_order_status_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderStatus = factory(OrderStatus::class)->create([
            'name' => 'done',
            'type' => 'done',
        ]);

        $response = $this->get(route('dashboard.order_statuses.show', $orderStatus));

        $response->assertSuccessful();

        $response->assertSee(e($orderStatus->name));
    }

    /** @test */
    public function it_can_create_a_new_order_status()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, OrderStatus::count());

        $response = $this->post(
            route('dashboard.order_statuses.store'),
            RuleFactory::make(
                [
                    '%name%' => 'done',
                    'type' => 'done',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, OrderStatus::count());
    }

    /** @test */
    public function it_can_display_order_status_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.order_statuses.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('order_statuses::order_statuses.actions.create'));
    }

    /** @test */
    public function it_can_display_order_status_edit_form()
    {
        $this->actingAsAdmin();

        $orderStatus = factory(OrderStatus::class)->create();

        $response = $this->get(route('dashboard.order_statuses.edit', $orderStatus));

        $response->assertSuccessful();

        $response->assertSee(trans('order_statuses::order_statuses.actions.edit'));
    }

    /** @test */
    public function it_can_update_order_status()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, OrderStatus::count());

        $orderStatus = factory(OrderStatus::class)->create([
            'name' => 'done',
            'type' => 'done',
        ]);

        $response = $this->put(
            route('dashboard.order_statuses.update', $orderStatus),
            RuleFactory::make(
                [
                    '%name%' => 'done_edited',
                    'type' => 'done',
                ]
            )
        );

        $orderStatus->refresh();

        $response->assertRedirect();

        $this->assertEquals($orderStatus->name, 'done_edited');
    }

    /** @test */
    public function it_can_delete_order_status()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderStatus = factory(OrderStatus::class)->create();

        $this->assertEquals(OrderStatus::count(), 1);

        $response = $this->delete(route('dashboard.order_statuses.destroy', $orderStatus));

        $response->assertRedirect();

        $this->assertEquals(OrderStatus::count(), 0);
    }
}
