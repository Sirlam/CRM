<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_agent_profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_question')->nullable();
            $table->string('password_answer')->nullable();
            $table->string('token')->nullable();
            $table->timestamp('token_sent')->nullable();
            $table->timestamp('token_expire')->nullable();
            $table->unsignedInteger('is_approved');
            $table->unsignedInteger('is_locked');
            $table->unsignedInteger('created_by');
            $table->timestamp('last_login_date')->nullable();
            $table->timestamp('last_password_changed')->nullable();
            $table->unsignedInteger('role_id');
            //$table->foreign('role_id')->references('id')->on('oc_agent_roles')
            //      ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('location_id');
            //$table->foreign('location_id')->references('pickup_id')->on('oc_pickup')
            //      ->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('oc_agent_profiles');
    }
}
