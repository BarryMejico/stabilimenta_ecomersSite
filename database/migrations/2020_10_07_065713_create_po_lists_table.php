<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_lists', function (Blueprint $table) {
            $table->string('id')->nullable();
            $table->timestamps();
            $table->string('PO');
            $table->string('Total_Amount');
            $table->unsignedBigInteger('Created_by');
            $table->foreign('Created_by')->references('id')->on('users')->onDelete('cascade');

            $table->string('Status');
            
            $table->unsignedBigInteger('Reviewed_by')->nullable();
            $table->foreign('Reviewed_by')->references('id')->on('users')->onDelete('cascade');

            $table->string('Vendor')->nullable();
            $table->foreign('Vendor')->references('Vcode')->on('vendor_models')->onDelete('cascade');

            $table->string('Ship_to')->nullable();
            $table->foreign('Ship_to')->references('Ccode')->on('customers')->onDelete('cascade');

            $table->primary('PO');
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_lists');
    }
}
