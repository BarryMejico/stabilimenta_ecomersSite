<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_details', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('menus')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('permCode')->references('permCode')->on('permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_details', function (Blueprint $table) {
            $table->dropForeign('permission_details_id_foreign');
            $table->dropForeign('permission_details_permcode_foreign');
        });
    }
}
