<?php

namespace Modules\Products\Tests\Feature;

use Tests\TestCase;
use Modules\Stores\Entities\Store;
use Modules\Products\Entities\Product;
use Modules\Categories\Entities\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_products()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        factory(Product::class)->create([
            'name' => 'ProductTestName',
        ]);

        $response = $this->get(route('dashboard.products.index'));

        $response->assertSuccessful();

        $response->assertSee('ProductTestName');
    }

    /** @test */
    public function it_can_display_product_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $product = factory(Product::class)->create();

        $response = $this->get(route('dashboard.products.show', $product));

        $response->assertSuccessful();

        $response->assertSee(e($product->name));
    }

    /** @test */
    public function it_can_create_a_new_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $this->assertEquals(0, Product::count());

        $store = factory(Store::class)->create([
            'owner_id' => 1,
            'domain' => 'facebook',
        ]);

        $category = factory(Category::class)->create(['store_id'=>1]);

        $response = $this->post(
            route('dashboard.products.store'),
            RuleFactory::make(
                [
                    '%name%' => 'productName',
                    'category_id' => $category->id,
                    'store_id' => $store->id,
                    'code' => 'cysnfnfyy',
                    'old_price' => 110.2,
                    'price' => 11.2,
                    'weight' => 1,
                    'stock' => 1,
                    '%description%' => 'it is desc helloDomaind.com',
                    '%meta_description%' => 'it is meta_desc helloDomaind.com',
                ]
            )
        );

        $response->assertRedirect();

        $this->assertEquals(1, Product::count());
    }

    /** @test */
    public function it_can_display_product_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.products.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('products::products.actions.create'));
    }

    /** @test */
    public function it_can_display_product_edit_form()
    {
        $this->actingAsAdmin();

        $product = factory(Product::class)->create();

        $response = $this->get(route('dashboard.products.edit', $product));

        $response->assertSuccessful();

        $response->assertSee(trans('products::products.actions.edit'));
    }

    /** @test */
    public function it_can_update_product()
    {
        $this->actingAsAdmin();

        $this->assertEquals(0, Product::count());

        $product = factory(Product::class)->create();

        $response = $this->put(
            route('dashboard.products.update', $product),
            RuleFactory::make(
                [
                    '%name%' => 'productName2',
                    'category_id' => 1,
                    'store_id' => 1,
                    'code' => 'cysyy',
                    'old_price' => '110.2',
                    'price' => '11.2',
                    'weight' => '1',
                    'stock' => '1',
                    '%description%' => 'it is desc helloDomaind.com',
                    '%meta_description%' => 'it is meta_desc helloDomaind.com',
                ]
            )
        );

        $product->refresh();

        $response->assertRedirect();

        $this->assertEquals($product->name, 'productName2');
    }

    /** @test */
    public function it_can_delete_product()
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $product = factory(Product::class)->create();

        $this->assertEquals(Product::count(), 1);

        $response = $this->delete(route('dashboard.products.destroy', $product));

        $response->assertRedirect();

        $this->assertEquals(Product::count(), 0);
    }
}
