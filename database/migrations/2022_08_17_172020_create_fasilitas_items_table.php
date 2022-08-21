<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fasilitas_id')->nullable()->on('fasilitas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jumlah')->nullable();
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
        Schema::dropIfExists('fasilitas_items');
    }
}
