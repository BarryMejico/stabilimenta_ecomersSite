<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_lists', function (Blueprint $table) {
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Reviewed_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Ship_to')->references('Ccode')->on('customers')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Vendor')->references('Vcode')->on('vendor_models')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('po_lists', function (Blueprint $table) {
            $table->dropForeign('po_lists_cocode_foreign');
            $table->dropForeign('po_lists_created_by_foreign');
            $table->dropForeign('po_lists_reviewed_by_foreign');
            $table->dropForeign('po_lists_ship_to_foreign');
            $table->dropForeign('po_lists_user_id_foreign');
            $table->dropForeign('po_lists_vendor_foreign');
        });
    }
}
