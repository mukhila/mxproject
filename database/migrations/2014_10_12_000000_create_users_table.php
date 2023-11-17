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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('provider_id')->nullable();
            $table->enum('provider_name',['Not Set', 'Google', 'Facebook', 'Apple'])->default('Not Set');
            $table->enum('role',['Super Admin', 'Admin', 'Executive', 'Tenant'])->default('Tenant');
            $table->enum('login_type',['Web', 'Social'])->default('Web');
            $table->enum('gender', [ 'Not Set', 'Male', 'Female', 'Transgender' ])->default('Not Set');
            $table->enum('status',['Active', 'Inactive'])->default('Active'); 
            $table->tinyInteger('delete_status')->default('0');   
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
        Schema::dropIfExists('users');
    }
};
