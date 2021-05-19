<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            $table->foreign('invoice')->references('invoice')->on('sales')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('RepairedbyCode')->references('Ecode')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            $table->dropForeign('sales_details_invoice_foreign');
            $table->dropForeign('sales_details_repairedbycode_foreign');
        });
    }
}
