<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Deskripsi extends Migration{
    
    public function up(){
        Schema::create('deskripsi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_dagangan');
            $table->string('jenis_dagangan');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('deskripsi');
    }
}