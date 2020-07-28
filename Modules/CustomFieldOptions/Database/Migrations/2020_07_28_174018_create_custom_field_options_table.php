<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('custom_field_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('additional_price');
            $table->foreign('custom_field_id')
                ->references('id')
                ->on('custom_fields')
                ->cascadeOnDelete();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('custom_field_options');
    }
}
