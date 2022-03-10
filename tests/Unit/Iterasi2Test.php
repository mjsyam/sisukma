<?php

namespace Tests\Unit;
namespace Tests;

use App\Models\E_surat\Sk_pengganti_ktm;
use App\Models\E_surat\Surat;
use App\Models\User;

use Illuminate\Support\Str;

class Iterasi2Test extends TestCase
{
    /** @test */
    public function test_status_surat_mahasiswa()
    {
        $user = User::where('role', 1)->first();

        $response  = $this->actingAs($user)->get('mahasiswa/status');

        $response->assertSee('Status Surat');
    }
    
    public function test_validasi_data()
    {
        $user = User::where('role', 10)->first();
        $mhs = User::where('role', 1)->first();
        
        $surat = Surat::create([
            'no_surat' => Str::random(5),
            'nama_surat' => 'SK Pengganti KTM',
            'id_users' => $mhs->id,
            'keterangan_surat' => 'Testing',
            'status_surat' => 0,
        ]);

         $sk_ktm = Sk_pengganti_ktm::create([
            'id_surat' => $surat->id,
            'keperluan' => 'Beassiswa',
        ]);
        $response  = $this->actingAs($user)->get('akademik/surat/'.$surat->id);
        
        $response->assertSee('Data Pemohon');
    }

    public function test_otomatisasi_pembuatan_surat()
    {
        $user = User::where('role', 10)->first();
        $mhs = User::where('role', 1)->first();
        $surat =Surat::create([
            'no_surat' => Str::random(5),
            'nama_surat' => 'SK Pengganti KTM',
            'id_users' => $mhs->id,
            'keterangan_surat' => 'Testing',
            'status_surat' => 2,
        ]);

        $sk_ktm = Sk_pengganti_ktm::create([
            'id_surat' => $surat->id,
            'keperluan' => 'Beassiswa',
        ]);
        $response  = $this->actingAs($user)->get('akademik/surat/'.$surat->id);
        $response->assertSee('Data Pemohon');
       
        $res = $this->actingAs($user)
            ->put('akademik/surat/cetak/'.$surat->id);
        $res->assertStatus(200);
    }
}
