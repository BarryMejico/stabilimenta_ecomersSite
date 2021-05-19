<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCusstomerDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cusstomer__devices', function (Blueprint $table) {
            $table->foreign('Ccode')->references('Ccode')->on('customers')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cusstomer__devices', function (Blueprint $table) {
            $table->dropForeign('cusstomer__devices_ccode_foreign');
        });
    }
}
