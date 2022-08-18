<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTugasItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_tugas_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->nullable()->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('schedule_id')->nullable()->on('shedules')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('area_tugas_item');
    }
}
