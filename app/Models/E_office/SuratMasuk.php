<?php

namespace App\Models\E_office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\E_office\BukuAgenda;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = ['id_users','no_surat', 'perihal_surat', 'tanggal_surat', 'tanggal_surat_masuk', 'tujuan_surat', 'pengirim', 'status_surat', 'keterangan_surat', 'file_surat', 'tujuan_pimpinan', 'disposisi'];

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
        return $this->belongsTo(User::class, 'tujuan_surat');
    }

    public function pimpinan() {
        return $this->belongsTo(User::class, 'tujuan_pimpinan');
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
