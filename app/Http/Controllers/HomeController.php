<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Riwayat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = Riwayat::where('tipe', 'Masuk')->sum('jumlah');
        $barang_keluar = Riwayat::where('tipe', 'Keluar')->sum('jumlah');
        return view('home', compact('barang_masuk','barang_keluar'));
    }
}
