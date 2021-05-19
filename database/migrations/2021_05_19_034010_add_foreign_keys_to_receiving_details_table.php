<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReceivingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receiving_details', function (Blueprint $table) {
            $table->foreign('Icode')->references('Code')->on('items')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('PO')->references('PO')->on('po_lists')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receiving_details', function (Blueprint $table) {
            $table->dropForeign('receiving_details_icode_foreign');
            $table->dropForeign('receiving_details_po_foreign');
        });
    }
}
