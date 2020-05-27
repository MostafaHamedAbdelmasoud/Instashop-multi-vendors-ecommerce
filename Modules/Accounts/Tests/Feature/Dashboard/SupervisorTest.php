<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\Supervisor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupervisorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_supervisors()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $supervisor = factory(Supervisor::class)->create();

        $response = $this->get(route('dashboard.supervisors.index'));

        $response->assertSuccessful();

        $response->assertSee(e($supervisor->name));
    }

    /** @test */
    public function it_can_display_supervisor_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $supervisor = factory(Supervisor::class)->create();

        $response = $this->get(route('dashboard.supervisors.show', $supervisor));

        $response->assertSuccessful();

        $response->assertSee(e($supervisor->name));
    }

    // /** @test */
    public function it_can_display_supervisor_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.supervisors.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::supervisors.actions.create'));
    }

    // /** @test */
    public function it_can_create_supervisors()
    {
        $this->actingAsAdmin();

        $supervisorCount = Supervisor::count();

        $response = $this->postJson(
            route('dashboard.supervisors.store'),
            [
                'name' => 'supervisor',
                'email' => 'supervisor@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Supervisor::count(), $supervisorCount + 1);
    }

    // /** @test */
    public function it_can_display_supervisor_edit_form()
    {
        $this->actingAsAdmin();

        $supervisor = factory(Supervisor::class)->create();

        $response = $this->get(route('dashboard.supervisors.edit', $supervisor));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::supervisors.actions.edit'));
    }

    // /** @test */
    public function it_can_update_supervisors()
    {
        $this->actingAsAdmin();

        $supervisor = factory(Supervisor::class)->create();

        $response = $this->put(
            route('dashboard.supervisors.update', $supervisor),
            [
                'name' => 'Supervisor',
                'email' => 'Supervisor@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $supervisor->refresh();

        $this->assertEquals($supervisor->name, 'Supervisor');
    }

    // /** @test */
    public function it_can_delete_Supervisor()
    {
        $this->actingAsAdmin();

        $supervisor = factory(Supervisor::class)->create();

        $supervisorCount = Supervisor::count();

        $response = $this->delete(route('dashboard.supervisors.destroy', $supervisor));
        $response->assertRedirect();

        $this->assertEquals(Supervisor::count(), $supervisorCount - 1);
    }
}
