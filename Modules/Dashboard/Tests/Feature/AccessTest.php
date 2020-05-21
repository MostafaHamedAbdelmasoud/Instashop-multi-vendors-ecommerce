<?php

namespace Modules\Dashboard\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_authorization()
    {
        $this->actingAsCustomer();

        $response = $this->get(route('dashboard.home'));

        $response->assertForbidden();

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();
    }
}
