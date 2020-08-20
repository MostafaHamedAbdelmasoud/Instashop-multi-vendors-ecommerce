<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Countries\Entities\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class ShippingCompanyTest extends TestCase
{
    use RefreshDatabase;

//    /** @test */
//    public function it_can_display_list_of_company_owner_shipping_companies()
//    {
//        $this->withoutExceptionHandling();
//
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        $response = $this->get(route('dashboard.shipping_company_owners.show', $shippingCompanyOwner));
//
//        $response->assertSuccessful();
//
//        $response->assertSee(e($shippingCompanyOwner->ShippingCompanies()->first()->name));
//    }
//
//    /** @test */
//    public function it_can_create_shipping_companies()
//    {
//        $this->withoutExceptionHandling();
//
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        $shippingCompaniesCount = $shippingCompanyOwner->ShippingCompanies->count();
//
//        $city = factory(City::class)->create();
//
//        $response = $this->post(
//            route('dashboard.shipping_company_owners.shipping_companies.store', $shippingCompanyOwner),
//            [
//                'name:ar' => 'Test',
//                'name:en' => 'Test',
//                'city_id'=>$city->id,
//                'price'=>12.2,
//            ]
//        );
//
//        $response->assertRedirect();
//
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies()->count(), $shippingCompaniesCount + 1);
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies->last()->name, 'Test');
//    }

//
//    /** @test */
//    public function it_can_display_shipping_company_owner_edit_form()
//    {
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        factory(ShippingCompany::class)->create([
//            'owner_id' => $shippingCompanyOwner->id,
//        ]);
//
//        $shippingCompany = $shippingCompanyOwner->ShippingCompanies()->first();
//
//        $response = $this->get(route('dashboard.shipping_company_owners.shipping_companies.edit', [$shippingCompanyOwner, $shippingCompany]));
//
//        $response->assertSuccessful();
//
//        $response->assertSee(trans('accounts::shipping_companies.actions.edit'));
//    }
//
//    /** @test */
//    public function it_can_update_shipping_company_owners()
//    {
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        factory(ShippingCompany::class)->create([
//            'owner_id' => $shippingCompanyOwner->id,
//        ]);
//
//        $shippingCompany = $shippingCompanyOwner->ShippingCompanies()->first();
//
//        $city = factory(City::class)->create();
//
//        $response = $this->put(
//            route('dashboard.shipping_company_owners.shipping_companies.update', [$shippingCompanyOwner, $shippingCompany]),
//            [
//                'name' => 'Test',
//                'price' => 12.25,
//                'city_id' => $city->id,
//            ]
//        );
//
//        $response->assertRedirect();
//
//        $shippingCompany->refresh();
//
//        $this->assertEquals($shippingCompany->name, 'Test');
//    }
//
//    /** @test */
//    public function it_can_delete_customer()
//    {
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        $shippingCompany = $shippingCompanyOwner->ShippingCompanies()->first();
//
//        $shippingCompanyesCount = $shippingCompanyOwner->ShippingCompanies()->count();
//
//        $response = $this->delete(route('dashboard.shipping_company_owners.shipping_companies.destroy', [$shippingCompanyOwner, $shippingCompany]));
//
//        $response->assertRedirect();
//
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies()->count(), $shippingCompanyesCount - 1);
//    }
}
