<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMasterNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_nilai', function (Blueprint $table) {
            $table->integer('kelas_id');
            $table->integer('semester_id');
            $table->string('nilai_iman',2);
            $table->string('nilai_doa',2);
            $table->string('nilai_hadist',2);
            $table->string('nilai_sirah',2);
            $table->text('keterangan1');

            $table->string('surat_tahsin');
            $table->integer('nilai_tahsin');
            $table->string('surat_tahfizh');
            $table->integer('nilai_tahfizh');
            $table->text('keterangan2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_nilai', function (Blueprint $table) {
            $table->dropColumn('kelas_id');
            $table->dropColumn('semester_id');
            $table->dropColumn('nilai_iman',2);
            $table->dropColumn('nilai_doa',2);
            $table->dropColumn('nilai_iman',2);
            $table->dropColumn('nilai_hadist',2);
            $table->dropColumn('nilai_sirah',2);
            $table->dropColumn('keterangan1');

            $table->dropColumn('surat_tahsin');
            $table->dropColumn('nilai_tahsin');
            $table->dropColumn('surat_tahfizh');
            $table->dropColumn('nilai_tahfizh');
            $table->dropColumn('keterangan1');
        });
    }
}
