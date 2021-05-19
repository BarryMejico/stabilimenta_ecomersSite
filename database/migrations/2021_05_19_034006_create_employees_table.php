<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->timestamps();
            $table->string('Employee');
            $table->string('Ecode')->primary();
            $table->string('CoCode')->index('employees_cocode_foreign');
            $table->unsignedBigInteger('id')->nullable()->index('employees_id_foreign');
            $table->string('Position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
