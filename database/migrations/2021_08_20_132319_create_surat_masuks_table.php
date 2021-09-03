<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')
                  ->references('id')
                  ->on('users');
            $table->string('no_surat');
            $table->string('perihal_surat');
            $table->string('tanggal_surat');
            $table->string('tujuan_surat')->nullable();
            $table->string('pengirim');
            $table->string('file_surat');
            $table->text('keterangan_surat')->nullable();
            $table->tinyInteger('status_surat');
            $table->tinyInteger('tujuan_pimpinan')->nullable();
            $table->string('disposisi')->nullable();
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
        Schema::dropIfExists('surat_masuk');
    }
}
