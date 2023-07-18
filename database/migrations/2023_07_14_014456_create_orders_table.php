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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_subdivision_from');
            $table->foreignId('id_subdivision_to');
            $table->foreignId('id_customer');
            $table->foreignId('id_package_price');
            $table->foreignId('id_transportation');
            $table->string('date');
            $table->string('wight_item');
            $table->string('date_estimate');
            $table->string('resi');
            $table->string('price');
            $table->text('description');
            $table->boolean('is_send_bill');
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
};
