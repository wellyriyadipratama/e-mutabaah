<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMasterNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_nilai', function (Blueprint $table) {
            $table->string('nilai_iman',2)->nullable()->change();
            $table->string('nilai_doa',2)->nullable()->change();
            $table->string('nilai_hadist',2)->nullable()->change();
            $table->string('nilai_sirah',2)->nullable()->change();
            $table->text('keterangan1')->nullable()->change();

            $table->string('surat_tahsin')->nullable()->change();
            $table->float('nilai_tahsin')->nullable()->change();
            $table->string('surat_tahfizh')->nullable()->change();
            $table->float('nilai_tahfizh')->nullable()->change();
            $table->text('keterangan2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
