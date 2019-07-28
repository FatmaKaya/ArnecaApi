<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('coache_info_ligs_id');
            $table->string('bildirim1');
            $table->string('bildirim2');
            $table->string('bildirim3');
            $table->string('bildirim4');
            $table->string('bildirim5');
            $table->string('bildirim6');
            $table->string('bildirim7');
            $table->string('bildirim8');
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
        Schema::dropIfExists('notifications');
    }
}
