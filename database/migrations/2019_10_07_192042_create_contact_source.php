<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_source', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('source_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('source_id')->references('id')->on('sources');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_source');
    }
}
