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
        Schema::create('denomination', function (Blueprint $table) {
            $table->id();
            $table->integer('currency_id');
            $table->string('denomination_code',20);
            $table->string('value',100);
            $table->mediumText('description');
            $table->enum('currency_type',['Coin', 'Note'])->default('Note'); 
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
        Schema::dropIfExists('denomination');
    }
};
