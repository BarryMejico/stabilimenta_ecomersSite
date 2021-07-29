<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_lists', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->string('PO');
            $table->string('Total_Amount');
            $table->unsignedBigInteger('Created_by');
            $table->foreign('Created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('Status');
            $table->unsignedBigInteger('Reviewed_by')->nullable();
            $table->foreign('Reviewed_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('ReceivingCode');
            $table->primary('ReceivingCode');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiving_lists');
    }
}
