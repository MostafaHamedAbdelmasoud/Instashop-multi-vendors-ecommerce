<?php

namespace Modules\OrderProducts\Tests\Feature;

use Tests\TestCase;
use Modules\Orders\Entities\Order;
use Modules\Coupons\Entities\Coupon;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\CustomFields\Entities\CustomField;
use Modules\OrderProducts\Entities\OrderProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\OrderProducts\Entities\OrderProductFieldValue;

class OrderProductFieldValueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_order_order_product_field_values()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        factory(OrderProductFieldValue::class)->create([
            'order_product_id' => $orderProduct->id,
            'value' => 'val',
        ]);

        $response = $this->get(route('dashboard.order_products.show', $orderProduct));

        $response->assertSuccessful();

        $response->assertSee('val');
    }

    /** @test */
    public function it_can_display_order_product_field_value_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $orderProductFieldValue = factory(OrderProductFieldValue::class)->create([
            'order_product_id' => $orderProduct->id,
            'value' => 'val',
        ]);

        $response = $this->get(route('dashboard.order_products.show', $orderProduct));

        $response->assertSuccessful();

        $response->assertSee(e($orderProductFieldValue->value));
    }

    /** @test */
    public function it_can_create_a_new_order_product_field_value()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, OrderProductFieldValue::count());

        $customField = factory(CustomField::class)->create();

        $customFieldOption = factory(CustomFieldOption::class)->create();

        $orderProduct = factory(OrderProduct::class)->create();

        $response = $this->post(
            route('dashboard.order_products.order_product_field_values.store', $orderProduct),
            RuleFactory::make(
                [
                    'order_product_id' => $orderProduct->id,
                    'custom_field_id' => $customField->id,
                    'option_id' => $customFieldOption->id,
                    'value' => 'val',
                    'additional_price' => 11.2,
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, OrderProductFieldValue::count());
    }

    /** @test */
    public function it_can_display_order_product_field_value_edit_form()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $orderProductFieldValue = factory(OrderProductFieldValue::class)->create([
            'order_product_id' => $orderProduct->id,
            'value' => 'val',
        ]);

        $response = $this->get(route('dashboard.order_products.order_product_field_values.edit', [$orderProduct, $orderProductFieldValue]));

        $response->assertSuccessful();

        $response->assertSee(trans('order_products::order_product_field_values.actions.edit'));
    }

    /** @test */
    public function it_can_update_Order_product_field_value()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, OrderProductFieldValue::count());

        $customField = factory(CustomField::class)->create();

        $customFieldOption = factory(CustomFieldOption::class)->create();

        $orderProduct = factory(OrderProduct::class)->create();

        $orderProductFieldValue = factory(OrderProductFieldValue::class)->create([
            'order_product_id' => $orderProduct->id,
            'value' => 'val',
            'additional_price' => 10.2,
        ]);

        $response = $this->put(
            route('dashboard.order_products.order_product_field_values.update', [$orderProduct, $orderProductFieldValue]),
            [
                    'order_product_id' => $orderProduct->id,
                    'custom_field_id' => $customField->id,
                    'option_id' => $customFieldOption->id,
                    'value' => 'val',
                    'additional_price' => 11.2,
            ]
        );

        $orderProductFieldValue->refresh();

        $response->assertRedirect();

        $this->assertEquals($orderProductFieldValue->additional_price, '11.2');
    }

    /** @test */
    public function it_can_delete_order_product_field_value()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $orderProduct = factory(OrderProduct::class)->create();

        $orderProductFieldValue = factory(OrderProductFieldValue::class)->create([
            'order_product_id' => $orderProduct->id,
            'value' => 'val',
            'additional_price' => 10.2,
        ]);

        $this->assertEquals(OrderProductFieldValue::count(), 1);

        $response = $this->delete(route('dashboard.order_products.order_product_field_values.destroy', [$orderProduct, $orderProductFieldValue]));

        $response->assertRedirect();

        $this->assertEquals(OrderProductFieldValue::count(), 0);
    }
}
