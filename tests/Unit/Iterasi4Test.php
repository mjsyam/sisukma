<?php

namespace Tests\Unit;
use Carbon\Carbon;
use Tests\TestCase;

use App\Models\User;
use App\Models\E_office\BukuAgenda;
use App\Models\E_office\SuratKeluar;
use App\Models\E_office\SuratMasuk;
use Illuminate\Support\Str;

class Iterasi4Test extends TestCase
{
    /** @test */
    public function test_pengajuan_surat_keluar()
    {
        $user = User::where('role',4)->first();
        $rektor = User::where('role',8)->first();
        $this->actingAs($user)->get('unit/keluar/create')->assertSuccessful();
        $file = 'testing_surat.pdf';
       
        $surat_keluar = SuratKeluar::create([
            'id_users' => $user->id,
            'no_surat' => Str::random(10),
            'jenis_tata_naskah' => 2,
            'keperluan_surat' => 'Testing',
            'pejabat_penandatangan' => $rektor->id,
            'tujuan_surat' => 'Testing Aja',
            'file_surat' => $file,
            'status_surat' => 0,
            'keterangan_surat' => 'Penting'
        ]);

        BukuAgenda::create([
            'id_surat' => $surat_keluar->id,
            'no_agenda' => BukuAgenda::max('no_agenda') + 1,
            'jenis_surat' => 'Surat Keluar',
            'ringkasan_isi' => 'Contoh Agenda Surat Keluar'
        ]);

        $res = $this->assertDatabaseHas('surat_keluar', [
           
            'id_users' => $surat_keluar->id_users,
            'no_surat' => $surat_keluar->no_surat,
            'jenis_tata_naskah' => $surat_keluar->jenis_tata_naskah,
            'keperluan_surat' => $surat_keluar->keperluan_surat,
            'pejabat_penandatangan' => $surat_keluar->pejabat_penandatangan,
            'tujuan_surat' => $surat_keluar->tujuan_surat,
            'tanggal_ttd' => $surat_keluar->tanggal_ttd,
            'file_surat' => $surat_keluar->file_surat,
            'status_surat' => $surat_keluar->status_surat,
            'keterangan_surat' => $surat_keluar->keterangan_surat
        ]);

        

    }

    public function test_tambah_surat_masuk()
    {
        $user = User::where('role',4)->first();
        $file = 'testing_surat.pdf';
        $tanggal = Carbon::now();
        $rektor = User::where('role',8)->first();
        $surat = SuratMasuk::create([
            'id_users' => $user->id,
            'no_surat' => Str::random(10),
            'perihal_surat' => 'testing',
            'tanggal_surat' => $tanggal->format('m/d/Y'),
            'tanggal_surat_masuk' => $tanggal->format('m/d/Y'),
            'tujuan_surat' => 6,
            'pengirim' => 'Dari Testing',
            'file_surat' => $file,
            'keterangan_surat' => 'Testing Aja',
            'status_surat' => 0,
            'tujuan_pimpinan' => $rektor->id,
            
        ]);
        BukuAgenda::create([
            'id_surat' => $surat->id,
            'no_agenda' => BukuAgenda::max('no_agenda') + 1,
            'jenis_surat' => 'Surat Masuk',
            'ringkasan_isi' => 'Contoh Agenda Suarat Masuk'
        ]);
        $res = $this->assertDatabaseHas('surat_masuk', [
           
            'id_users' => $surat->id_users,
            'no_surat' => $surat->no_surat,
            'perihal_surat' => $surat->perihal_surat,
            'tanggal_surat' => $surat->tanggal_surat,
            'pengirim' => $surat->pengirim,
            'tujuan_pimpinan' => $surat->tujuan_pimpinan,
            'tujuan_surat' => $surat->tujuan_surat,
            'file_surat' => $surat->file_surat,
            'status_surat' => $surat->status_surat,
            'keterangan_surat' => $surat->keterangan_surat
        ]);

    }

     public function test_detail_surat()
    {
        $user = User::where('role',4)->first();
        $surat = SuratMasuk::where('status_surat', '3')->where('tujuan_surat', $user->id)->first();
        
        $res = $this->actingAs($user)->get('unit/masuk/'. $surat->id);

        $res->assertSee('No Surat')->assertSee('Perihal Surat')->assertSee('Tanggal Surat');

    }
}
