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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('Icode');
            $table->string('Qty');
            $table->string('UnitCost');
            $table->string('Location');
            $table->unsignedBigInteger('user_id')->nullable()->index('stocks_lists_user_id_foreign');
            $table->string('CoCode')->nullable()->index('stocks_lists_cocode_foreign');
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
