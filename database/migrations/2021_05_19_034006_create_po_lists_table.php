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
            $table->string('PO')->primary();
            $table->string('Total_Amount');
            $table->unsignedBigInteger('Created_by')->index('po_lists_created_by_foreign');
            $table->string('Status');
            $table->unsignedBigInteger('Reviewed_by')->nullable()->index('po_lists_reviewed_by_foreign');
            $table->string('Vendor')->nullable()->index('po_lists_vendor_foreign');
            $table->string('Ship_to')->nullable()->index('po_lists_ship_to_foreign');
            $table->unsignedBigInteger('user_id')->nullable()->index('po_lists_user_id_foreign');
            $table->string('CoCode')->nullable()->index('po_lists_cocode_foreign');
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
