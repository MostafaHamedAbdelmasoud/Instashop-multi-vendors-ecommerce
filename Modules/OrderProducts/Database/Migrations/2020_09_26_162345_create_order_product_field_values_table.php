<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_field_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('custom_field_id');
            $table->string('value');
            $table->decimal('additional_price');
            $table->unsignedBigInteger('option_id');
            $table->foreign('order_product_id')
                ->on('order_products')->references('id')
                ->cascadeOnDelete();
            $table->foreign('custom_field_id')
                ->on('custom_fields')->references('id')
                ->cascadeOnDelete();
            $table->foreign('option_id')
                ->on('custom_field_options')->references('id')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product_field_values');
    }
}
