<?php

namespace Tests\Unit;


use App\Models\User;
use Tests\TestCase;
use App\Models\E_office\BukuAgenda;
use App\Models\E_office\SuratKeluar;
use App\Models\E_office\SuratMasuk;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class Iterasi6Test extends TestCase
{
    /** @test */
    public function test_dashboard_pimpinan()
    {
        $user = User::where('role', 8)->first();
        $res = $this->actingAs($user)->get('rektor');
        $res->assertSee('Grafik Surat Masuk')->assertSee('Grafik Surat Keluar');
    }

    public function test_disposisi_surat(){
        $user = User::where('role', 7)->first();
        $rektor = User::where('role', 8)->first();
        $surat = SuratMasuk::where('status_surat', '2')->where('tujuan_pimpinan', $user->id)->first();
        $response = $this->be($user)->put(route('warektor.masuk.update', $surat->id), [
            'disposisi' => $rektor->id,
            'status_surat' => 3,
            'keterangan_surat' => 'Surat Ini Percobaan',
        ]);
        
        $this->be($user)->get('warektor/masuk')->assertSuccessful();
        
    }

    public function test_menerima_surat_masuk(){
        $user = User::where('role', 7)->first();
        $res = $this->be($user)->get('warektor/masuk/inbox')->assertSuccessful();

    }

    public function test_persetujuan_surat_keluar(){
        Storage::fake('documents');
        $user = User::where('role', 7)->first();
        
        $file2 = UploadedFile::fake()->create('document.pdf', 100);
        $unit = User::where('role',4)->first();
        $surat_keluar = SuratKeluar::create([
           'id_users' => $unit->id,
           'no_surat' => Str::random(10),
           'jenis_tata_naskah' => 2,
           'keperluan_surat' => 'Testing',
           'pejabat_penandatangan' => $user->id,
           'tujuan_surat' => 'Testing Aja',
           'file_surat' => $file2,
           'status_surat' => 0,
           'keterangan_surat' => 'Penting'
       ]);

       BukuAgenda::create([
           'id_surat' => $surat_keluar->id,
           'no_agenda' => BukuAgenda::max('no_agenda') + 1,
           'jenis_surat' => 'Surat Keluar',
           'ringkasan_isi' => 'Contoh Agenda Surat Keluar'
       ]);

       $this->actingAs($user)->put(route('warektor.keluar.setujui', $surat_keluar->id),[
           'file_surat' => $file2,
           'status_surat' => 8,
       ]);

       $this->actingAs($user)->get('warektor/keluar')->assertSuccessful();

    }
}
