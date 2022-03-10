<?php

namespace Tests\Unit;
namespace Tests;

use App\Imports\UserImport;
use App\Models\E_surat\Sk_aktif_studi;
use App\Models\E_surat\Surat;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Iterasi1Test extends TestCase
{
    
    /** @test */
    public function test_login()
    {
        $user = User::create([
            'name' => Str::random(12),
            'email'    =>Str::random(5) .'@example.net',
            'password' => bcrypt('secret'),
            'role' => 100,
        ]);

       
        $this->get('/login');
        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        if($user->role == 100){
            $response = $this->actingAs($user)->get('/admin');
        }


    }

    public function test_logout(){
       $user = User::where('role', 100)->first();

      $response = $this->actingAs($user)->get('logout');
      
      $response->assertSee('/');
    }

    public function test_pengajuan_surat(){
        $user = User::where('role', 1)->first();

        $response = $this->actingAs($user)->get('/mahasiswa/skAktifStudi');

        $response->assertSee('Surat Keterangan Aktif Studi');

        $surat = Surat::create([
            'no_surat' => '123412A',
            'nama_surat' => 'Sk_Aktif_studi',
            'id_users' => $user->id,
            'status_surat' => 3
        ]);

        $sk_aktif = Sk_aktif_studi::create([
            'id_surat' => $surat->id,
            'akreditasi_prodi' => 'A',
            'keperluan' => 'Beasiswa Kaltim Tuntas',
            'semester' => 'Ganjil',
            'tahun_akademik' => '2020/2021'
        
        ]);

        $this->get('/mahasiswa/surat');



    }

    public function test_import_user(){
       
        $user = User::where('role', 100)->first();
        
        $file = new UploadedFile(
            base_path('tests/data/test_file.xlsx'),
            'test_file.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        $response = $this->actingAs($user)->post('admin/users/import', [
            'file_data' => $file
        ]);
       
            
        $response->assertSee('Data mahasiswa sukses disimpan');
        
    }
}
