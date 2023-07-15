<?php

namespace App\Http\Controllers\Unit;

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
        $items = SuratMasuk::where('status_surat', '3')->where('tujuan_surat', $user)->get();
        return view('unit.masuk.index', compact('items'));
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
        return view('unit.masuk.show', compact('item','user'));
    }
}
