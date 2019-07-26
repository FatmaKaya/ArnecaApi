<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachInfoLigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_info_ligs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('lig');
            $table->datetime('date');
            $table->datetime('time');
            $table->datetime('dateRaw');
            $table->string('order');
            $table->string('yer');
            $table->string('takimA');
            $table->string('takimB');
            $table->string('imgA');
            $table->string('imgB');
            $table->string('skor');
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
        Schema::dropIfExists('coach_info_ligs');
    }
}
