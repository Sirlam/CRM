<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_agent_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->unsignedInteger('user_level')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->string('last_modified_by')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
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
        Schema::dropIfExists('oc_agent_roles');
    }
}
