<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->timestamps();
            $table->string('invoice')->primary();
            $table->string('Total_Amount');
            $table->string('Created_by');
            $table->string('Status');
            $table->string('Reviewed_by');
            $table->string('Ccode')->index('sales_ccode_foreign');
            $table->unsignedBigInteger('user_id')->nullable()->index('sales_user_id_foreign');
            $table->string('CoCode')->nullable()->index('sales_cocode_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
