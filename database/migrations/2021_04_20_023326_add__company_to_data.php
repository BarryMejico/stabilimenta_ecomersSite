<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyToData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('vendor_models', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('po_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('receiving_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode')->nullable();
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
        });

        Schema::table('stocks_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('data', function (Blueprint $table) {
            //
        });
    }
}
