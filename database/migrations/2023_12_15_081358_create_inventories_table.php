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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('branch_id');
            $table->integer('tenant_denomination_id');
            $table->date('date');
            $table->integer('opening_stock');
            $table->integer('buy');
            $table->integer('sell');
            $table->integer('closing_stock');
            $table->integer('closing_market');
            $table->integer('closing_buy');
            $table->integer('closing_sell');
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
        Schema::dropIfExists('inventories');
    }
};
