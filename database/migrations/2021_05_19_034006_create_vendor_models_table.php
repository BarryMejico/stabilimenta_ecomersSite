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
            $table->timestamps();
            $table->string('Vendor');
            $table->string('Number');
            $table->string('Address');
            $table->string('Vcode')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index('vendor_models_user_id_foreign');
            $table->string('CoCode')->nullable()->index('vendor_models_cocode_foreign');
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
