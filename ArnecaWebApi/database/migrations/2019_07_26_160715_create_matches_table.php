<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('coach_info_ligs_id');  
            $table->string('title');
            $table->string('lig');
            $table->string('date');
            $table->string('time');
            $table->string('dateRaw');
            $table->decimal('order',13,0);
            $table->string('yer');
            $table->bigInteger('location_id');  
            $table->string('takimA');
            $table->string('takimB');
            $table->string('imgA');
            $table->string('imgB');
            $table->string('skor');
            $table->bigInteger('sets_id');  
            $table->timestamps=false;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
