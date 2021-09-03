<?php

namespace App\Http\Controllers\Arsiparis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\E_office\BukuAgenda;

class BukuAgendaController extends Controller
{
    public function masuk()
    {
        $items = BukuAgenda::where('jenis_surat', 'Surat Masuk')->orderBy('no_agenda')->get();
        return view('arsiparis.agenda.index', compact('items'));
    }

    public function keluar()
    {
        $items = BukuAgenda::where('jenis_surat', 'Surat Keluar')->orderBy('no_agenda')->get();
        return view('arsiparis.agenda.index', compact('items'));
    }
}
