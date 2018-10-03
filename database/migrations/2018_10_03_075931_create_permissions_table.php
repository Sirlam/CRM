<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_agent_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permission_description')->nullable();
            $table->string('route_url')->nullable();
            $table->unsignedInteger('is_active')->nullable();
            $table->string('id_tag')->nullable();
            $table->string('icon_class')->nullable();
            $table->string('is_open_class')->nullable();
            $table->string('toggle_icon')->nullable();
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
        Schema::dropIfExists('oc_agent_permissions');
    }
}
