<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermxrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_agent_role_perm', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('role_id');
            //$table->foreign('role_id')->references('id')->on('oc_agent_roles')
            //      ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('permission_id');
            //$table->foreign('permission_id')->references('id')->on('oc_agent_permissions')
            //      ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('permxref');
    }
}
