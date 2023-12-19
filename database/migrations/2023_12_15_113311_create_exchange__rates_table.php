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
        Schema::create('exchange__rates', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('branch_id');
            $table->integer('tenant_denomination_id');
            $table->date('date');
            $table->decimal('market_rate',8,2);
            $table->decimal('buy_rate',8,2);
            $table->decimal('sell_rate',8,2);           
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
        Schema::dropIfExists('exchange__rates');
    }
};
