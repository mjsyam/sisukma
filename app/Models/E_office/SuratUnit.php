<?php

namespace App\Models\E_office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SuratUnit extends Model
{
    use HasFactory;

    protected $table = 'surat_unit';
    protected $fillable = ['id_users','no_surat', 'tanggal_surat', 'jenis_tata_naskah', 'keperluan_surat', 'tujuan_surat', 'keterangan_surat', 'file_surat'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        return [
            'name' => 'required',
        ];
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function user() {
        return $this->belongsTo(User::class, 'id_users');
    }
    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
}
