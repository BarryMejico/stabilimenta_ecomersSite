<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_details', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->string('permCode');
            $table->foreign('permCode')->references('permCode')->on('permissions')->onDelete('cascade');
            
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('menus')->onDelete('cascade');

            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_details');
    }
}
