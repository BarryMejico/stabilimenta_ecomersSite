<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('invoice');
            $table->foreign('invoice')->references('invoice')->on('sales')->onDelete('cascade');
            
            $table->string('Icode');
            //$table->foreign('Icode')->references('Code')->on('items')->onDelete('cascade');

            $table->string('Qty');
            $table->string('UnitCost');
            
            $table->string('description')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('DeviceStatus')->nullable();

            $table->string('RepairedbyCode')->nullable();
            $table->foreign('RepairedbyCode')->references('Ecode')->on('employees')->onDelete('cascade');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_details');
    }
}
