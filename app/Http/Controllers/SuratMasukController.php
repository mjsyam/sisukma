<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\E_office\SuratMasuk;
use Str;
use Storage;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[
            'file_surat' => 'max:2000|mimes:pdf',
        ]);

        $name = 'Surat Masuk '.$request->pengirim.' '.$request->file('file_surat')->getClientOriginalName();
        $file = $request->file('file_surat')->storeAs('surat_masuk', $name, 'public');
        $data['file_surat'] = $name;

        $data = SuratMasuk::create($data);

        return back()->withSuccess('Surat anda berhasil disimpan');
    }
}
