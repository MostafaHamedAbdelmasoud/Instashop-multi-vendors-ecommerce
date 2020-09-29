<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale');
            $table->string('name');
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')
                ->on('order_statuses')
                ->references('id')
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
        Schema::dropIfExists('order_status_translations');
    }
}
