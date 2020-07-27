<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Tests\TestCase;
use Modules\Accounts\Entities\ShippingCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Entities\ShippingCompanyPrice;

class ShippingCompanyPriceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_list_of_shipping_companies_prices()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();

        $shippingCompany = factory(ShippingCompany::class)->create();

        $shippingCompanyPrice = factory(ShippingCompany::class)->create();

        $response = $this->get(route('dashboard.shipping_company_owners.show', $shippingCompanyOwner));

        $response->assertSuccessful();

        $response->assertSee(e($shippingCompanyPrice->first()->price));
    }

//    /** @test */
//    public function it_can_create_shipping_companies()
//    {
//        $this->withoutExceptionHandling();
//
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
//
//        $shippingCompaniesCount = $shippingCompanyOwner->ShippingCompanies()->count();
//
//        $response = $this->post(
//            route('dashboard.shipping_company_owners.shipping_companies.store', $shippingCompanyOwner),
//            [
//                'name' => 'Test',
//            ]
//        );
//
//        $response->assertRedirect();
//
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies()->count(), $shippingCompaniesCount + 1);
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies->last()->name, 'Test');
//    }
//
////
//
//    /** @test */
//    public function it_can_display_shipping_company_owner_edit_form()
//    {
//        $this->actingAsAdmin();
//
//        $shippingCompanyOwner = factory(ShippingCompanyOwner::class)->create();
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
//        $shippingCompany = $shippingCompanyOwner->ShippingCompanies()->first();
//
//        $response = $this->put(
//            route('dashboard.shipping_company_owners.shipping_companies.update', [$shippingCompanyOwner, $shippingCompany]),
//            [
//                'name' => 'Test',
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
//        $response->assertRedirect();
//
//        $this->assertEquals($shippingCompanyOwner->ShippingCompanies()->count(), $shippingCompanyesCount - 1);
//    }
}
