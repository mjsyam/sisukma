<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $user;

    public function __construct()
    {
        $this->user = User::select('id', 'name', 'email')->get();
    }

    public function model(array $row)
    {
        $users = $this->user->where('name', $row['name'])->where('email', $row['email'])->first();
        return new Mahasiswa([
            'id_users' => $users->id,
            'nim' => $row['nim'],
            'prodi' => $row['prodi'],
            'jurusan' => $row['jurusan'],
        ]);
    }
}
