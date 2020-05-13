<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendingMachineCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vending_machine_coins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins');
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
        Schema::dropIfExists('vending_machine_coins');
    }
}
