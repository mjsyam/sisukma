<?php

namespace App\Http\Controllers\Arsiparis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratKeluar;
use App\Models\E_office\BukuAgenda;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $items = SuratKeluar::all();
        $nom = BukuAgenda::where('jenis_surat', 'Surat Keluar')->orderByDesc('no_agenda')->first();
        if ($nom) {
            return view('arsiparis.keluar.index', compact('items', 'nom'));
        }
        $nom = null;
        return view('arsiparis.keluar.index', compact('items', 'nom'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratKeluar::findOrFail($id);
        $data = $request->all();
        $data['status_surat'] = 10;

        $data['id_surat'] = $item->id;
        $data['jenis_surat'] = 'Surat Keluar';
        BukuAgenda::create($data);

        $item->update($data);
        return redirect()->route(ARSIPARIS. '.keluar.index')->withSuccess('Surat keluar berhasil diproses');
    }

    public function forwardall()
    {
        $items = SuratKeluar::where('status_surat', 0)->orWhere('status_surat', 2)->orWhere('status_surat', 4)->get();
        foreach ($items as $item) {
            $item->status_surat = $item->status_surat+1;
            $item->save();
        }
        return redirect()->route(ARSIPARIS. '.keluar.index')->withSuccess('Semua surat keluar berhasil diteruskan');
    }

    public function forward($id)
    {
        $items = SuratKeluar::findOrFail($id);
        $items->status_surat = $items->status_surat+1;
        $items->save();
        return redirect()->route(ARSIPARIS. '.keluar.index')->withSuccess('Surat keluar berhasil diteruskan');
    }
}
