<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->integer('santri_id');
            $table->integer('surat_id');
            $table->integer('kelas_id');
            $table->integer('semester_id');
            $table->integer('master_nilai_id')->nullable();
            $table->string('nilai_type');
            $table->integer('makhraj')->default(0);//total kesalahan
            $table->integer('mad')->default(0);//total kesalahan
            $table->integer('ghunnah')->default(0);//total kesalahan
            $table->integer('kelancaran')->default(0);//total kesalahan
            $table->integer('nilai_akhir')->default(0);//total kesalahan
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
        Schema::dropIfExists('nilai');
    }
}
