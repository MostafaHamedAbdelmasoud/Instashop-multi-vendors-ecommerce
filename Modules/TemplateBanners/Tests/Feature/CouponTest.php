<?php

namespace Modules\TemplateBanners\Tests\Feature;

use Tests\TestCase;
use Modules\TemplateBanners\Entities\TemplateBanner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_template_banners()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(TemplateBanner::class)->create([
            'code' => '443',
            'percentage_discount' => 3.4,
        ]);

        $response = $this->get(route('dashboard.template_banners.index'));

        $response->assertSuccessful();

        $response->assertSee('443');
    }

    /** @test */
    public function it_can_display_coupon_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $templateBanner = factory(TemplateBanner::class)->create();

        $response = $this->get(route('dashboard.template_banners.show', $templateBanner));

        $response->assertSuccessful();

        $response->assertSee(e($templateBanner->code));
    }

    /** @test */
    public function it_can_create_a_new_coupon()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, TemplateBanner::count());

        $response = $this->post(
            route('dashboard.template_banners.store'),
            RuleFactory::make(
                [
                    'code' => 'h112',
                    'percentage_discount' => 12.21,
                    'fixed_discount' => 2.21,
                    'max_usage_per_order' => 2,
                    'max_usage_per_user' => 2,
                    'min_total' => 20.2,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, TemplateBanner::count());
    }

    /** @test */
    public function it_can_display_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.template_banners.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('template_banners::template_banners.actions.create'));
    }

    /** @test */
    public function it_can_display_product_edit_form()
    {
        $this->actingAsAdmin();

        $templateBanner = factory(TemplateBanner::class)->create();

        $response = $this->get(route('dashboard.template_banners.edit', $templateBanner));

        $response->assertSuccessful();

        $response->assertSee(trans('template_banners::template_banners.actions.edit'));
    }

    /** @test */
    public function it_can_update_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, TemplateBanner::count());

        $templateBanner = factory(TemplateBanner::class)->create();

        $response = $this->put(
            route('dashboard.template_banners.update', $templateBanner),
            RuleFactory::make(
                [
                    'code' => 'h112',
                    'percentage_discount' => 12.21,
                    'fixed_discount' => 2.21,
                    'max_usage_per_order' => 2,
                    'max_usage_per_user' => 2,
                    'min_total' => 20.2,

                ]
            )
        );

        $templateBanner->refresh();

        $response->assertRedirect();

        $this->assertEquals($templateBanner->code, 'h112');
    }

    /** @test */
    public function it_can_delete_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $templateBanner = factory(TemplateBanner::class)->create();

        $this->assertEquals(TemplateBanner::count(), 1);

        $response = $this->delete(route('dashboard.template_banners.destroy', $templateBanner));

        $response->assertRedirect();

        $this->assertEquals(TemplateBanner::count(), 0);
    }
}
