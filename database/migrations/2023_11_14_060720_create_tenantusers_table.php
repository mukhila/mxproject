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
        Schema::create('tenantusers', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('branch_id');
            $table->integer('user_id');
            $table->enum('role',['Not Set','Tenant Admin', 'Branch Admin', 'Cashier'])->default('Not Set');
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
        Schema::dropIfExists('tenantusers');
    }
};
