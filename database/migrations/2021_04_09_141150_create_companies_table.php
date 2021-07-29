<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->timestamps();
            $table->string('CoCode');
            $table->primary('CoCode');
            $table->string('CompanyName');
            $table->string('CompanyAddress');
            $table->unsignedBigInteger('CompanyOwner')->nullable();
            $table->foreign('CompanyOwner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
