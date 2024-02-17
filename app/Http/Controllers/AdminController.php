<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function kendaraan()
    {
        $kendaraan = Kendaraan::all();
        return view('admin.kendaraan', [
            'kendaraan' => $kendaraan,
        ]);
    }

    public function pemesanan()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan', [
            'pemesanan' => $pemesanan,
            'kendaraan' => Kendaraan::all(),
        ]);
    }
}
