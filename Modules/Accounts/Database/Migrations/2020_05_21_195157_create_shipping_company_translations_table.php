<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCompanyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_company_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_company_id');
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['shipping_company_id', 'locale']);
            $table->foreign('shipping_company_id')
                ->references('id')->on('shipping_companies')
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
        Schema::dropIfExists('shipping_company_translations');
    }
}
