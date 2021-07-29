<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Icode');
            $table->foreign('Icode')->references('Code')->on('items')->onDelete('cascade');
            $table->string('R_Qty');
            $table->string('UnitCost');
            $table->string('PO');
            $table->foreign('PO')->references('PO')->on('po_lists')->onDelete('cascade');
            $table->string('ReceivingCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiving_details');
    }
}
 