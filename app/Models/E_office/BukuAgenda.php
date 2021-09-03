<?php

namespace App\Models\E_office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\E_office\SuratMasuk;
use App\Models\E_office\SuratKeluar;

class BukuAgenda extends Model
{
    use HasFactory;

    protected $table = 'buku_agenda';
    protected $fillable = ['id_surat','no_agenda','jenis_surat', 'ringkasan_isi'];

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
    public function masuk() {
        return $this->belongsTo(SuratMasuk::class, 'id_surat');
    }

    public function keluar() {
        return $this->belongsTo(SuratKeluar::class, 'id_surat');
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
