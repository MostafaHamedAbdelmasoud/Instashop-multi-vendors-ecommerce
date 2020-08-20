<?php

namespace Modules\Subscriptions\Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Modules\Stores\Entities\Store;
use Modules\Subscriptions\Entities\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_subscriptions()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(Subscription::class)->create();

        $response = $this->get(route('dashboard.subscriptions.index'));

        $response->assertSuccessful();

        $response->assertSee('store');
    }

    /** @test */
    public function it_can_display_subscription_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $subscription = factory(Subscription::class)->create();

        $response = $this->get(route('dashboard.subscriptions.show', $subscription));

        $response->assertSuccessful();

        $response->assertSee(e($subscription->name));
    }

    /** @test */
    public function it_can_create_a_new_subscription()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Subscription::count());

        $response = $this->post(
            route('dashboard.subscriptions.store'),
            RuleFactory::make(
                [
                    'model_id' => 1,
                    'model_type' => 'store',
                    'start_at' => Carbon::now(),
                    'end_at' => Carbon::now()->addDays(5),
                    'paid_amount' => 4.2,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Subscription::count());
    }

    /** @test */
    public function it_can_display_subscription_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.subscriptions.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('subscriptions::subscriptions.actions.create'));
    }

    /** @test */
    public function it_can_display_subscription_edit_form()
    {
        $this->actingAsAdmin();

        $subscription = factory(Subscription::class)->create();

        $response = $this->get(route('dashboard.subscriptions.edit', $subscription));

        $response->assertSuccessful();

        $response->assertSee(trans('subscriptions::subscriptions.actions.edit'));
    }

//

    /** @test */
    public function it_can_update_subscription()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Subscription::count());

        $subscription = factory(Subscription::class)->create();

        $response = $this->put(
            route('dashboard.subscriptions.update', $subscription),
            RuleFactory::make(
                [
                    'model_id' => 1,
                    'model_type' => 'store',
                    'start_at' => Carbon::now(),
                    'end_at' => Carbon::now()->addDays(5),
                    'paid_amount' => 4.2,
                ]
            )
        );

        $subscription->refresh();

        $response->assertRedirect();

        $this->assertEquals($subscription->model_id, 1);
    }

    /** @test */
    public function it_can_delete_subscription()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();


        $subscription = factory(Subscription::class)->create();

        $this->assertEquals(Subscription::count(), 1);

        $response = $this->delete(route('dashboard.subscriptions.destroy', $subscription));

        $response->assertRedirect();

        $this->assertEquals(Subscription::count(), 0);
    }
}
