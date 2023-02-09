<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutabaahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutabaah', function (Blueprint $table) {
            $table->id();
            $table->string('santri_id');
            $table->string('guru_id');
            $table->string('mapel_id');
            $table->string('catatan');
            $table->string('status');
            $table->string('nama_surat');
            $table->string('ayat_mulai');
            $table->string('ayat_akhir');
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
        Schema::dropIfExists('mutabaah');
    }
}

