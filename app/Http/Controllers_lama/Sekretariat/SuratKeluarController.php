<?php

namespace App\Http\Controllers\Sekretariat;

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
        $items = SuratKeluar::where('status_surat', 1)->orWhere('status_surat', 5)->orWhere('status_surat', 8)->get();
        return view('sekretariat.keluar.index', compact('items'));
    }

    public function show($id)
    {
        $item = SuratKeluar::findOrFail($id);
        return view('sekretariat.keluar.show', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratKeluar::findOrFail($id);
        $data = $request->all();
        $data['status_surat'] = 9;

        $pengirim = "Sekretariat";

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
        return redirect()->route(SEKRETARIAT. '.keluar.index')->withSuccess('Surat keluar berhasil diproses');
    }

    public function tolak(Request $request, $id)
    {
        $items = SuratKeluar::findOrFail($id);
        $items->keterangan_surat = $request->keterangan_surat;
        $items->status_surat = 2;
        $items->save();
        return redirect()->route(SEKRETARIAT. '.keluar.index')->withSuccess('Surat keluar berhasil ditolak untuk direvisi');
    }

    public function setujui($id)
    {
        $items = SuratKeluar::findOrFail($id);
        $items->status_surat = 6;
        $items->save();
        return redirect()->route(SEKRETARIAT. '.keluar.index')->withSuccess('Surat keluar berhasil disetujui dan diteruskan');
    }
}
