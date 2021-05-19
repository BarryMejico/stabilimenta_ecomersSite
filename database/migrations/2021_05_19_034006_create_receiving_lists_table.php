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
            $table->timestamps();
            $table->string('PO');
            $table->string('Total_Amount');
            $table->unsignedBigInteger('Created_by')->index('receiving_lists_created_by_foreign');
            $table->string('Status');
            $table->unsignedBigInteger('Reviewed_by')->nullable()->index('receiving_lists_reviewed_by_foreign');
            $table->string('ReceivingCode')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index('receiving_lists_user_id_foreign');
            $table->string('CoCode')->nullable()->index('receiving_lists_cocode_foreign');
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
