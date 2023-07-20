<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            // 1
            [
                'role' => "rektor",
            ],
            // 2
            [
                'role' => "wakil rektor",
            ],

            // 3
            [
                'superior' => 1,
                'role' => "kepala upt perpustakaan",
            ],
            // 4
            [
                'superior' => 1,
                'role' => "kepala upt teknologi informasi",
            ],
            // 5
            [
                'superior' => 1,
                'role' => "kepala upt bahasa",
            ],
            // 6
            [
                'superior' => 1,
                'role' => "ketua jmti",
            ],
            // 7
            [
                'superior' => 1,
                'role' => "ketua jstpm",
            ],
            // 8
            [
                'superior' => 1,
                'role' => "ketua jtip",
            ],
            // 9
            [
                'superior' => 1,
                'role' => "ketua jtsp",
            ],
            // 10
            [
                'superior' => 1,
                'role' => "ketua jikl",
            ],

            // 11
            [
                'superior' => 1,
                'role' => "kepala biro umum dan akademik",
            ],
            // 12
            [
                'superior' => 11,
                'role' => "kepala bagian akademik dan perencanaan",
            ],
            // 13
            [
                'superior' => 11,
                'role' => "kepala bagian umum dan keuangan",
            ],

            // 14
            [
                'superior' => 12,
                'role' => "kepala subbagian akademik dan kemahasiswaan",
            ],
            // 15
            [
                'superior' => 12,
                'role' => "kepala subbagian perencanaan",
            ],

            // 16
            [
                'superior' => 13,
                'role' => "kepala subbagian umum dan kepegawaian",
            ],
            // 17
            [
                'superior' => 13,
                'role' => "kepala subbagian keuangan dan barang milik negara",
            ],

             // 18
             [
                'superior' => 1,
                'role' => "lppm",
            ],
             // 18
             [
                'superior' => 1,
                'role' => "dosen dan jft lainnya",
            ],
        ])->each(function($role){
            DB::table("roles")->insert($role);
        });
    }
}
