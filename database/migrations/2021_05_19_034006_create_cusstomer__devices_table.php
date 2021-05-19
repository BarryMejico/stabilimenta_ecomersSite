<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCusstomerDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusstomer__devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('Code');
            $table->string('DeciveName');
            $table->string('Model');
            $table->string('Ccode')->index('cusstomer__devices_ccode_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusstomer__devices');
    }
}
