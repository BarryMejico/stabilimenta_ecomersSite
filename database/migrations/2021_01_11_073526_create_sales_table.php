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
            $table->string('invoice'); 
            $table->primary('invoice'); 
            $table->string('Total_Amount'); 
            $table->string('Created_by'); 
            $table->string('Status'); 
            $table->string('Reviewed_by'); 
            $table->string('Ccode');
            //$table->increments('id')->nullable();
            $table->foreign('Ccode')->references('Ccode')->on('customers')->onDelete('cascade');
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
