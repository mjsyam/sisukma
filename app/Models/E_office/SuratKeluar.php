<?php

namespace App\Models\E_office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\E_office\BukuAgenda;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = ['id_users','no_surat', 'jenis_tata_naskah', 'keperluan_surat', 'pejabat_penandatangan', 'tanggal_ttd', 'status_surat', 'keterangan_surat', 'file_surat'];

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

    public function pejabat() {
        return $this->belongsTo(User::class, 'pejabat_penandatangan');
    }

    public function agenda(){
        return $this->hasOne(BukuAgenda::class, 'id_surat');
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
