<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->timestamps();
            $table->string('Customer');
            $table->string('Number');
            $table->string('Address');
            $table->string('Ccode')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index('customers_user_id_foreign');
            $table->string('CoCode')->nullable()->index('customers_cocode_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
