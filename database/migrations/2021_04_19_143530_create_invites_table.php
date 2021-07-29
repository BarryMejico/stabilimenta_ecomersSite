<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('invite_from');
            $table->foreign('invite_from')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('invite_to');
            $table->foreign('invite_to')->references('id')->on('users')->onDelete('cascade');
            $table->string('CoCode');
            $table->foreign('CoCode')->references('CoCode')->on('companies')->onDelete('cascade');
            $table->string('invite_Status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invites');
    }
}
