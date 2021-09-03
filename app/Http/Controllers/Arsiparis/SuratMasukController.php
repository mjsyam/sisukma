<?php

namespace App\Http\Controllers\Arsiparis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratMasuk;
use App\Models\E_office\BukuAgenda;

class SuratMasukController extends Controller
{
    public function index()
    {
        $items = SuratMasuk::all();
        return view('arsiparis.masuk.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $user = User::where('role', 4)->orWhere('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        $no = BukuAgenda::where('jenis_surat', 'Surat Masuk')->orderByDesc('no_agenda')->first();
        if ($no) {
            return view('arsiparis.masuk.create', compact('user', 'no'));
        }
        $no = null;
        return view('arsiparis.masuk.create', compact('user', 'no'));
    }

    public function show($id)
    {
        $item = SuratMasuk::findOrFail($id);
        $user = User::where('role', 4)->orWhere('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        $no = BukuAgenda::where('jenis_surat', 'Surat Masuk')->orderByDesc('no_agenda')->first();
        return view('arsiparis.masuk.show', compact('item','user', 'no'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratMasuk::findOrFail($id);
        $data = $request->all();

        BukuAgenda::create($data);
        $item->update($data);

        return redirect()->route(ARSIPARIS. '.masuk.index')->withSuccess('Surat masuk berhasil diteruskan');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[
            'file_surat' => 'max:2000|mimes:pdf',
        ]);

        $name = 'Surat Masuk '.$request->pengirim.' '.$request->file('file_surat')->getClientOriginalName();
        $file = $request->file('file_surat')->storeAs('surat_masuk', $name, 'public');
        $data['file_surat'] = $name;

        $surat = SuratMasuk::create($data);
        $data['id_surat'] = $surat->id;
        $data['jenis_surat'] = 'Surat Masuk';
        BukuAgenda::create($data);

        return back()->withSuccess('Surat masuk berhasil disimpan');
    }
}
