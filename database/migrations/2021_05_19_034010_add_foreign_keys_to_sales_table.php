<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('Ccode')->references('Ccode')->on('customers')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('sales_ccode_foreign');
            $table->dropForeign('sales_cocode_foreign');
            $table->dropForeign('sales_user_id_foreign');
        });
    }
}
