<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Icode');
            $table->string('Qty');
            $table->string('UnitCost');
            $table->string('Location'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks_lists');
    }
}
