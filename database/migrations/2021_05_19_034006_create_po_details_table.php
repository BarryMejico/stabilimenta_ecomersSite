<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Icode')->index('po_details_icode_foreign');
            $table->string('Qty');
            $table->string('UnitCost');
            $table->string('PO')->index('po_details_po_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_details');
    }
}
