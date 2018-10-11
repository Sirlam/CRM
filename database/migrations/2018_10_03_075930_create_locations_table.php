<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_pickup', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pickup_id');
            $table->unsignedInteger('zone_id')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->unsignedInteger('status')->nullable();
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
        Schema::dropIfExists('oc_agent_locations');
    }
}
