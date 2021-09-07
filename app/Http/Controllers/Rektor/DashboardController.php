<?php

namespace App\Http\Controllers\Rektor;

use App\Http\Controllers\Controller;
use App\Models\E_office\SuratMasuk;
use App\Models\E_office\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $year = Carbon::now()->year;

        $id = Auth::user()->id;

        $keluar = SuratKeluar::where('pejabat_penandatangan', $id)->count();
        $masuk = SuratMasuk::where('tujuan_pimpinan', $id)->count();

        $bulan = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        foreach ($bulan as $b) {
            $area_keluar[]=SuratKeluar::where('created_at',  'like', '%' . $year . '-' . $b . '%')->where('pejabat_penandatangan', $id)->count();
        }

        foreach ($bulan as $b) {
            $area_masuk[]=SuratMasuk::where('created_at',  'like', '%' . $year . '-' . $b . '%')->where('tujuan_pimpinan', $id)->count();
        }

        $tahun = array();
            $tahun[0] = date('Y')-2;
            $tahun[1] = date('Y')-1;
            $tahun[2] = date('Y');
            $tahun[3] = date('Y')+1;
            $tahun[4] = date('Y')+2;

        foreach($tahun as $t) {
            $area2_keluar[]=SuratKeluar::where('created_at',  'like', '%' . $t . '-' . '%')->where('pejabat_penandatangan', $id)->count();
        }

        foreach($tahun as $t) {
            $area2_masuk[]=SuratMasuk::where('created_at',  'like', '%' . $t . '-' . '%')->where('tujuan_pimpinan', $id)->count();
        }
        return view('rektor.dashboard.index', compact('year', 'keluar', 'masuk', 'area_keluar', 'area_masuk', 'area2_masuk', 'area2_keluar', 'tahun'));
    }
}
