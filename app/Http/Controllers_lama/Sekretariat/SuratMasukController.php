<?php

namespace App\Http\Controllers\Sekretariat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        $items = SuratMasuk::where('status_surat', '1')->get();
        return view('sekretariat.masuk.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = SuratMasuk::findOrFail($id);
        $user = User::where('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        return view('sekretariat.masuk.show', compact('item','user'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratMasuk::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        
        return redirect()->route(SEKRETARIAT. '.masuk.index')->withSuccess('Surat masuk berhasil diteruskan');
    }
}
