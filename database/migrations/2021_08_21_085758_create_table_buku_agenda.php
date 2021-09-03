<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBukuAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_agenda', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_surat')->unsigned();
            $table->bigInteger('no_agenda');
            $table->string('jenis_surat');
            $table->text('ringkasan_isi');
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
        Schema::dropIfExists('buku_agenda');
    }
}
