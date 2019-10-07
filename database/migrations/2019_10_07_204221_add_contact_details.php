<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('mobile_phone')->default('');
            $table->string('work_phone')->default('');
            $table->string('street')->default('');
            $table->string('postal_code')->default('');
            $table->string('city')->default('');
            $table->string('other_info')->default('');
            $table->text('notes')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // $table->dropColumn([
            //     'mobile_phone',
            //     'work_phone',
            //     'street',
            //     'postal_code',
            //     'city',
            //     'other_info',
            //     'notes'
            // ]);
        });
    }
}
