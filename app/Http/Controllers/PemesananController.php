<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan', [
            'pemesanan' => $pemesanan,
            'kendaraan' => Kendaraan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemesanan.create', [
            'kendaraans' => Kendaraan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required',
            'kendaraan_id' => 'required',
            'status' => 'required',
        ]);

        $data = Pemesanan::create([
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'kendaraan_id' => $request->kendaraan_id,
            'status' => $request->status,
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Add Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.edit', [
            'pemesanan' => $pemesanan,
            'kendaraans' => Kendaraan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required',
            'kendaraan_id' => 'required',
            'status' => 'required',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
        $pemesanan->kendaraan_id = $request->kendaraan_id;
        $pemesanan->status = $request->status;
        $pemesanan->save();

        return redirect()->route('pemesanan.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Data berhasil dihapus!');
    }

    public function approve(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = $request->status;
        $pemesanan->save();

        return redirect()->route('pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui');
    }
}
