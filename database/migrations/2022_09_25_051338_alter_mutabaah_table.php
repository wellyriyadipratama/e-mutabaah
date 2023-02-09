<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMutabaahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mutabaah', function (Blueprint $table) {
            $table->dropColumn('mapel_id');
            $table->dropColumn('catatan');
            $table->dropColumn('nama_surat');
            $table->dropColumn('ayat_mulai');
            $table->dropColumn('ayat_akhir');
            $table->integer('kelas_id');
            $table->integer('semester_id');
            $table->text('catatan_guru')->nullable();
            $table->text('catatan_ortu')->nullable();

            $table->integer('tahsin_hal')->nullable();
            $table->integer('tahsin_baris')->nullable();
            $table->string('tahsin_surat')->nullable();
            $table->string('tahsin_ayat')->nullable();
            $table->string('tahsin_nilai')->nullable();

            $table->integer('tahfizh_hal')->nullable();
            $table->integer('tahfizh_baris')->nullable();
            $table->string('tahfizh_surat')->nullable();
            $table->string('tahfizh_ayat')->nullable();
            $table->string('tahfizh_nilai')->nullable();

            $table->integer('talaqi_tahsin_hal')->nullable();
            $table->integer('talaqi_tahsin_baris')->nullable();
            $table->string('talaqi_tahsin_surat')->nullable();
            $table->string('talaqi_tahsin_ayat')->nullable();
            $table->string('talaqi_tahsin_nilai')->nullable();

            $table->integer('talaqi_tahfizh_hal')->nullable();
            $table->integer('talaqi_tahfizh_baris')->nullable();
            $table->string('talaqi_tahfizh_surat')->nullable();
            $table->string('talaqi_tahfizh_ayat')->nullable();
            $table->string('talaqi_tahfizh_nilai')->nullable();

            $table->integer('tilawah_harian_hal')->nullable();
            $table->integer('tilawah_harian_baris')->nullable();
            $table->string('tilawah_harian_surat')->nullable();
            $table->string('tilawah_harian_ayat')->nullable();
            $table->string('tilawah_harian_nilai')->nullable();

            $table->integer('murajaah_hal')->nullable();
            $table->integer('murajaah_baris')->nullable();
            $table->string('murajaah_surat')->nullable();
            $table->string('murajaah_ayat')->nullable();
            $table->string('murajaah_nilai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutabaah', function (Blueprint $table) {
            // $table->string('mapel_id');
            // $table->string('nama_surat');
            // $table->string('ayat_mulai');
            // $table->string('ayat_akhir');
            // $table->string('catatan');

            $table->dropColumn('kelas_id');
            $table->dropColumn('semester_id');

            $table->dropColumn('catatan_guru');
            $table->dropColumn('catatan_ortu');

            $table->dropColumn('tahsin_hal');
            $table->dropColumn('tahsin_baris');
            $table->dropColumn('tahsin_surat');
            $table->dropColumn('tahsin_ayat');
            $table->dropColumn('tahsin_nilai');

            $table->dropColumn('talaqi_tahsin_hal');
            $table->dropColumn('talaqi_tahsin_baris');
            $table->dropColumn('talaqi_tahsin_surat');
            $table->dropColumn('talaqi_tahsin_ayat');
            $table->dropColumn('talaqi_tahsin_nilai');

            $table->dropColumn('talaqi_tahfizh_hal');
            $table->dropColumn('talaqi_tahfizh_baris');
            $table->dropColumn('talaqi_tahfizh_surat');
            $table->dropColumn('talaqi_tahfizh_ayat');
            $table->dropColumn('talaqi_tahfizh_nilai');

            $table->dropColumn('tilawah_harian_hal');
            $table->dropColumn('tilawah_harian_baris');
            $table->dropColumn('tilawah_harian_surat');
            $table->dropColumn('tilawah_harian_ayat');
            $table->dropColumn('tilawah_harian_nilai');

            $table->dropColumn('murajaah_hal');
            $table->dropColumn('murajaah_baris');
            $table->dropColumn('murajaah_surat');
            $table->dropColumn('murajaah_ayat');
            $table->dropColumn('murajaah_nilai');
        });
    }
}
