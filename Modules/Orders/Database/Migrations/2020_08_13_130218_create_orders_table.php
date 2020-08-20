<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('shipping_company_id');
            $table->string('shipping_company_notes');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('total');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->cascadeOnDelete();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')->cascadeOnDelete();
            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')->cascadeOnDelete();
            $table->foreign('shipping_company_id')
                ->references('id')
                ->on('shipping_companies')->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
}
