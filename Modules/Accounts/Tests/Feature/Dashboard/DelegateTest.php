<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\Delegate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DelegateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_delegates()
    {
        $this->actingAsAdmin();

        $delegate = factory(Delegate::class)->create();

        $response = $this->get(route('dashboard.delegates.index'));

        $response->assertSuccessful();

        $response->assertSee(e($delegate->name));
    }

    /** @test */
    public function it_can_display_Delegate_details()
    {
        $this->actingAsAdmin();

        $delegate = factory(Delegate::class)->create();

        $response = $this->get(route('dashboard.delegates.show', $delegate));

        $response->assertSuccessful();

        $response->assertSee(e($delegate->name));
    }

    /** @test */
    public function it_can_display_Delegate_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.delegates.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::delegates.actions.create'));
    }

    /** @test */
    public function it_can_create_delegates()
    {
        $this->actingAsAdmin();

        $delegatesCount = Delegate::count();

        $response = $this->postJson(
            route('dashboard.delegates.store'),
            [
                'name' => 'Delegate',
                'email' => 'Delegate@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Delegate::count(), $delegatesCount + 1);
    }

    /** @test */
    public function it_can_display_Delegate_edit_form()
    {
        $this->actingAsAdmin();

        $delegate = factory(Delegate::class)->create();

        $response = $this->get(route('dashboard.delegates.edit', $delegate));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::delegates.actions.edit'));
    }

    /** @test */
    public function it_can_update_delegates()
    {
        $this->actingAsAdmin();

        $delegate = factory(Delegate::class)->create();

        $response = $this->put(
            route('dashboard.delegates.update', $delegate),
            [
                'name' => 'Delegate',
                'email' => 'Delegate@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $delegate->refresh();

        $this->assertEquals($delegate->name, 'Delegate');
    }

    /** @test */
    public function it_can_delete_Delegate()
    {
        $this->actingAsAdmin();

        $delegate = factory(Delegate::class)->create();

        $delegatesCount = Delegate::count();

        $response = $this->delete(route('dashboard.delegates.destroy', $delegate));
        $response->assertRedirect();

        $this->assertEquals(Delegate::count(), $delegatesCount - 1);
    }
}
