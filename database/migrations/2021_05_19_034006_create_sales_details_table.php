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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('invoice')->index('sales_details_invoice_foreign');
            $table->string('Icode');
            $table->string('Qty');
            $table->string('UnitCost');
            $table->string('description')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('DeviceStatus')->nullable();
            $table->string('RepairedbyCode')->nullable()->index('sales_details_repairedbycode_foreign');
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
