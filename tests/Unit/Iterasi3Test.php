<?php

namespace Tests\Unit;

use App\Models\E_surat\Surat;
use App\Models\User;
use Tests\TestCase;

class Iterasi3Test extends TestCase
{
    /** @test */
    public function test_dashboard_pengajuan_surat_mhs()
    {
        $user = User::where('role',10)->first();

        $response  = $this->be($user)->get(route('akademik.dash'));

        $response->assertSee('Grafik Surat');
    }

    public function test_list_persetujuan_surat(){
        $user = User::where('role',10)->first();

        $response  = $this->be($user)->get('akademik/surat/disetujui');

        $response->assertSee('Status');
    }

    public function test_download_detail_surat(){
        
        $surat = Surat::where('status_surat', 11)->first();
        
        $uploaded = 'storage/surat/'.$surat->file_surat;
        
        $this->assertFileExists(public_path($uploaded));
    }
}
