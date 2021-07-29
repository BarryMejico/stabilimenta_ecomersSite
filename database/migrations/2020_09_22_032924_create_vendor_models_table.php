<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_models', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->string('Vendor');
            $table->string('Number');
            $table->string('Address');
            $table->string('Vcode');
            $table->primary('Vcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_models');
    }
}
