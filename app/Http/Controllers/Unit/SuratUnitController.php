<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratUnit;
use Auth;
use Storage;
use Str;

class SuratUnitController extends Controller
{
    public function index()
    {
        $user = Auth::user()->unit_kerja->unit;
        $items = SuratUnit::whereHas('user.unit_kerja', function($q) use($user){
               $q->where('unit', $user);
             })->get();
        return view('unit.internal.index', compact('items'));
    }

    public function create()
    {
        return view('unit.internal.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $pengirim = Auth::user()->unit_kerja->unit;

        $this->validate($request,[
            'file_surat' => 'max:2000|mimes:pdf',
        ]);

        $name = 'Surat Internal '.$pengirim.' '.Str::random(5).' '.$request->file('file_surat')->getClientOriginalName();
        $file = $request->file('file_surat')->storeAs('surat_internal', $name, 'public');
        $data['file_surat'] = $name;

        $surat = SuratUnit::create($data);

        return back()->withSuccess('Surat internal berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = SuratUnit::findOrFail($id);
        if (Storage::exists('surat_internal/'.$item->file_surat)) {
            Storage::delete('surat_internal/'.$item->file_surat);
        }
        SuratUnit::destroy($id);
        return back()->withSuccess('Surat berhasil dihapus');
    }
}
