<?php

namespace Tests\Unit;

use App\Models\E_office\BukuAgenda;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\E_office\SuratMasuk;
use App\Models\User;
use Carbon\Carbon;

class Iterasi5Test extends TestCase
{
    /** @test */
    public function test_dashboard_surat_masuk_keluar()
    {
        $user = User::where('role', 4)->first();
        $res = $this->actingAs($user)->get('/unit');
        $res->assertSee('Data Surat');

    }

    public function test_edit_surat_masuk(){
        $unit = User::where('role',4)->first();
        $file = 'testing_surat.pdf';
        $user = User::where('role', 6)->first();
        $tanggal = Carbon::now();
        $rektor = User::where('role',8)->first();
        $warektor = User::where('role',7)->first();
        $surat = SuratMasuk::create([
            'id_users' => $unit->id,
            'no_surat' => Str::random(10),
            'perihal_surat' => 'testing',
            'tanggal_surat' => $tanggal->format('m/d/Y'),
            'tanggal_surat_masuk' => $tanggal->format('m/d/Y'),
            'tujuan_surat' => 6,
            'pengirim' => 'Dari Testing',
            'file_surat' => $file,
            'keterangan_surat' => 'Testing Aja',
            'status_surat' => 1,
            'tujuan_pimpinan' => $rektor->id,
            
        ]);

        BukuAgenda::create([
            'id_surat' => $surat->id,
            'no_agenda' => BukuAgenda::max('no_agenda') + 1,
            'jenis_surat' => 'Surat Masuk',
            'ringkasan_isi' => 'Contoh Agenda Suarat Masuk'
        ]);
        $surat = SuratMasuk::findOrFail($surat->id);

        $res = $this->actingAs($user)->get('sekretariat/masuk/'. $surat->id);
        $res->assertSee('Data Surat Masuk');

        $surat->update([
            'status_surat' => 2,
            'tujuan_pimpinan' => $warektor->id,
            'keterangan_surat' => 'Keterangan Surat Ini Percobaan'
        ]);

         $this->assertDatabaseHas('surat_masuk', ['tujuan_pimpinan' => $surat->tujuan_pimpinan, 'keterangan_surat' => $surat->keterangan_surat]);
        
    }

    public function test_list_surat_masuk_keluar(){
        $user = User::where('role', 7)->first();

        $res_1 = $this->actingAs($user)->get('warektor/masuk');
        $res_1->assertSee('Surat Masuk');

        $res_2 = $this->actingAs($user)->get('warektor/masuk/inbox');
        $res_2->assertSee('Surat Masuk');


        $res_1 = $this->actingAs($user)->get('warektor/keluar');
        $res_1->assertSee('Surat Keluar');

    }


}
