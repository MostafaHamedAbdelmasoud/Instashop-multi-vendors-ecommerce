<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCompanyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_company_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_company_id');
            $table->unsignedBigInteger('city_id');
            $table->decimal('price');
            $table->timestamps();
            $table->foreign('shipping_company_id')
                ->references('id')->on('shipping_companies')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_company_prices');
    }
}
