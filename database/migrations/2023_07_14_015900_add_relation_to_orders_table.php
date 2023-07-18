<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('id_subdivision_from')->references('id')->on('subdivisions');
            $table->foreign('id_subdivision_to')->references('id')->on('subdivisions');
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->foreign('id_package_price')->references('id')->on('package_prices');
            $table->foreign('id_transportation')->references('id')->on('transportations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
