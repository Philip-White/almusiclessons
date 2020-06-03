<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoEntryToIntermediateLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intermediate_lessons', function (Blueprint $table) {
            //
            $table->string('video1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intermediate_lessons', function (Blueprint $table) {
            //
            $table->dropColumn('video1');
        });
    }
}
