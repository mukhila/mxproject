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
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('address');
            $table->string('branchname',250);
            $table->string('contactno',20);
            $table->string('emailid',150);
            $table->string('mobileno',20);
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->tinyInteger('delete_status')->default('0'); 
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
        Schema::dropIfExists('branch');
    }
};
