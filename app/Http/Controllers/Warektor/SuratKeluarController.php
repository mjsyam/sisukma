<?php

namespace App\Http\Controllers\Warektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratKeluar;
use Auth;
use Storage;
use Str;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $items = SuratKeluar::where('pejabat_penandatangan', $user)->get();
        return view('warektor.keluar.index', compact('items'));
    }

    public function show($id)
    {
        $item = SuratKeluar::findOrFail($id);
        return view('warektor.keluar.show', compact('item'));
    }

    public function tolak(Request $request, $id)
    {
        $items = SuratKeluar::findOrFail($id);
        $items->keterangan_surat = $request->keterangan_surat;
        $items->status_surat = 7;
        $items->save();
        return redirect()->route(WAREKTOR. '.keluar.index')->withSuccess('Surat keluar berhasil ditolak');
    }

    public function setujui(Request $request, $id)
    {
        $item = SuratKeluar::findOrFail($id);
        $data = $request->all();
        $data['status_surat'] = 8;

        $pengirim = Auth::user()->wakil_rektor->jabatan;

        $this->validate($request,[
            'file_surat' => 'max:2000|mimes:pdf',
        ]);

        if (Storage::exists('surat_keluar/'.$item->file_surat)) {
            Storage::delete('surat_keluar/'.$item->file_surat);
        }

        $name = 'Surat Keluar '.$pengirim.' '.Str::random(5).' '.$request->file('file_surat')->getClientOriginalName();
        $file = $request->file('file_surat')->storeAs('surat_keluar', $name, 'public');
        $data['file_surat'] = $name;

        $item->update($data);
        return redirect()->route(WAREKTOR. '.keluar.index')->withSuccess('Surat keluar berhasil disetujui');
    }
}
