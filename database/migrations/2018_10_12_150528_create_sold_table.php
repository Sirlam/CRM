<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_sold_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('order_id')->unique();
            $table->unsignedInteger('customer_id');
            $table->string('imei_number')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('telephone');
            $table->string('email');
            $table->unsignedInteger('currency_id');
            $table->string('currency_code');
            $table->decimal('total');
            $table->string('name');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('pickup_id');
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
        Schema::dropIfExists('oc_sold_products');
    }
}
