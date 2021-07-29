<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device__histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Code'); 
            $table->string('Service_provided'); 
            $table->string('date'); 
            $table->string('invoce'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device__histories');
    }
}
