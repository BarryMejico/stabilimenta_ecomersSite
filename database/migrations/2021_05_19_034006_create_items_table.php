<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->timestamps();
            $table->string('Code')->primary();
            $table->string('Name');
            $table->string('Unit');
            $table->string('status');
            $table->unsignedBigInteger('user_id')->nullable()->index('items_user_id_foreign');
            $table->string('CoCode')->nullable()->index('items_cocode_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
