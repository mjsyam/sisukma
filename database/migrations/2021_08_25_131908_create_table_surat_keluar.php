<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSuratKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')
                  ->references('id')
                  ->on('users');
            $table->string('no_surat', 191)->nullable();
            $table->string('jenis_tata_naskah', 191);
            $table->string('keperluan_surat', 191);
            $table->string('pejabat_penandatangan', 191);
            $table->string('tanggal_ttd', 191);
            $table->string('file_surat', 191);
            $table->tinyInteger('status_surat');
            $table->string('keterangan_surat', 191)->nullable();
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
        Schema::dropIfExists('surat_keluar');
    }
}
