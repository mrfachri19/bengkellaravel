<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->unsignedBigInteger('idmekanik')->nullable();
            $table->unsignedBigInteger('idsparepart')->nullable();
            $table->unsignedBigInteger('idkategori');
            $table->string('nomorpolisi');
            $table->date('tanggal');
            $table->time('jam');
            $table->text('keluhan');
            $table->integer('jumlah')->nullable();
            $table->string('status')->default('New');
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
        Schema::dropIfExists('services');
    }
};
