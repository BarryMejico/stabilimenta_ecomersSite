<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_details', function (Blueprint $table) {
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
        Schema::table('po_details', function (Blueprint $table) {
            $table->dropForeign('po_details_icode_foreign');
            $table->dropForeign('po_details_po_foreign');
        });
    }
}
