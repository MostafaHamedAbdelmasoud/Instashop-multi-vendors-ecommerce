<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_admins()
    {
        $this->actingAsAdmin();

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.index'));

        $response->assertSuccessful();

        $response->assertSee(e($admin->name));
    }

    /** @test */
    public function it_can_display_admin_details()
    {
        $this->actingAsAdmin();

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.show', $admin));

        $response->assertSuccessful();

        $response->assertSee(e($admin->name));
    }

    /** @test */
    public function it_can_display_admin_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.admins.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::admins.actions.create'));
    }

    /** @test */
    public function it_can_create_admins()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $adminsCount = Admin::count();

        $response = $this->post(
            route('dashboard.admins.store'),
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Admin::count(), $adminsCount + 1);
    }

    /** @test */
    public function it_can_display_admin_edit_form()
    {
        $this->actingAsAdmin();

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.edit', $admin));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::admins.actions.edit'));
    }

    /** @test */
    public function it_can_update_admins()
    {
        $this->actingAsAdmin();

        $admin = factory(Admin::class)->create();

        $response = $this->put(
            route('dashboard.admins.update', $admin),
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $admin->refresh();

        $this->assertEquals($admin->name, 'Admin');
    }

    /** @test */
    public function it_can_delete_admin()
    {
        $this->withOutExceptionHandling();

        $this->actingAsAdmin();

        $admin = factory(Admin::class)->create();

        $adminsCount = Admin::count();

        $response = $this->delete(route('dashboard.admins.destroy', $admin));

        $response->assertRedirect();

        $this->assertEquals(Admin::count(), $adminsCount - 1);
    }
}
