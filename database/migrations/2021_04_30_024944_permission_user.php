<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('permCode')->nullable();
            $table->foreign('permCode')->references('permCode')->on('permissions')->onDelete('cascade');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->string('permCode')->nullable();
            $table->foreign('permCode')->references('permCode')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
