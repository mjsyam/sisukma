<?php

namespace App\Http\Controllers\Unit;

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
        $items = SuratKeluar::where('id_users', $user)->get();
        return view('unit.keluar.index', compact('items'));
    }

    public function create()
    {
        $user = User::where('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        return view('unit.keluar.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $pengirim = Auth::user()->unit_kerja->unit;

        $this->validate($request,[
            'file_surat' => 'max:2000|mimes:pdf',
        ]);

        $name = 'Surat Keluar '.$pengirim.' '.Str::random(5).' '.$request->file('file_surat')->getClientOriginalName();
        $file = $request->file('file_surat')->storeAs('surat_keluar', $name, 'public');
        $data['file_surat'] = $name;

        $surat = SuratKeluar::create($data);

        return back()->withSuccess('Surat masuk berhasil disimpan');
    }

    public function show($id)
    {
        $item = SuratKeluar::findOrFail($id);
        $user = User::where('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        return view('unit.keluar.show', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratKeluar::findOrFail($id);
        $data = $request->all();
        $pengirim = Auth::user()->unit_kerja->unit;

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
        
        return redirect()->route(UNIT. '.keluar.index')->withSuccess('Surat keluar berhasil direvisi');
    }
}
