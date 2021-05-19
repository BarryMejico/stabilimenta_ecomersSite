<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReceivingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receiving_lists', function (Blueprint $table) {
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('Reviewed_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
        Schema::table('receiving_lists', function (Blueprint $table) {
            $table->dropForeign('receiving_lists_cocode_foreign');
            $table->dropForeign('receiving_lists_created_by_foreign');
            $table->dropForeign('receiving_lists_reviewed_by_foreign');
            $table->dropForeign('receiving_lists_user_id_foreign');
        });
    }
}
