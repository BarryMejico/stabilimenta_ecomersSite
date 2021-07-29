<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->timestamps();
            $table->string('ProductCode'); 
            $table->primary('ProductCode');
            $table->string('Name'); 
            $table->string('Description'); 
            $table->string('Img'); 
            $table->string('Unit'); 
            $table->string('Price');
            $table->string('qty');  
            $table->string('SRP'); 
            $table->string('status'); 
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
