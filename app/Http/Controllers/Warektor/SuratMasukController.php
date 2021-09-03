<?php

namespace App\Http\Controllers\Warektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\E_office\SuratMasuk;
use Auth;

class SuratMasukController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $items = SuratMasuk::where('status_surat', '2')->where('tujuan_pimpinan', $user)->get();
        return view('warektor.masuk.index', compact('items'));
    }

    public function inbox()
    {
        $user = Auth::user()->id;
        $items = SuratMasuk::where('status_surat', '3')->where('tujuan_surat', $user)->get();
        return view('warektor.masuk.inbox', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $item = SuratMasuk::findOrFail($id);
        $user = User::where('role', 4)->orWhere('role', 7)->orWhere('role', 8)->orderBy('name')->get();
        return view('warektor.masuk.show', compact('item','user'));
    }

    public function update(Request $request, $id)
    {
        $item = SuratMasuk::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        
        return redirect()->route(WAREKTOR. '.masuk.index')->withSuccess('Surat masuk berhasil diteruskan');
    }

}
