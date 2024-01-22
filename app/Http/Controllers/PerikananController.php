<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Perikanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerikananController extends Controller
{
    public function index()
    {
        $perikanans = Perikanan::latest()->get();
        return view('admin.perikanan.index', compact('perikanans'));
    }

    public function create()
    {
        return view('admin.perikanan.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'jenis_ikan' => 'required',
                'pakan' => 'required',
                'jumlah_ikan' => 'required|integer',
                'berat_ikan' => 'required|numeric',
            ]);

            Perikanan::create([
                'jenis_ikan' => $request->jenis_ikan,
                'pakan' => $request->pakan,
                'jumlah_ikan' => $request->jumlah_ikan,
                'berat_ikan' => $request->berat_ikan,
            ]);

            return redirect()->route('perikanan.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('perikanan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $perikanan = Perikanan::find($id);
        return view('admin.perikanan.edit', compact('perikanan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'jenis_ikan' => 'required',
                'pakan' => 'required',
                'jumlah_ikan' => 'required|integer',
                'berat_ikan' => 'required|numeric',
            ]);

            $perikanan = Perikanan::find($id);

            if (!$perikanan) {
                return redirect()->route('perikanan.index')->with('fail', 'Data Perikanan Tidak Ditemukan');
            }

            $perikanan->update([
                'jenis_ikan' => $request->jenis_ikan,
                'pakan' => $request->pakan,
                'jumlah_ikan' => $request->jumlah_ikan,
                'berat_ikan' => $request->berat_ikan,
            ]);

            return redirect()->route('perikanan.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('perikanan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $perikanan = Perikanan::find($id);

        if (!$perikanan) {
            return redirect()->route('perikanan.index')->with('fail', 'Data Perikanan Tidak Ditemukan');
        }

        $perikanan->delete();

        return redirect()->route('perikanan.index')->with('success', 'Data berhasil dihapus.');
    }


    public function printReport()
    {
        $perikanans = Perikanan::all();

        // select jenis ikan yang tidak double
        $jenis_ikan = Perikanan::select('jenis_ikan')->distinct()->get();

        $jenis_ikan_count = $jenis_ikan->count();

        $pdf = app('dompdf.wrapper')->loadView('admin.perikanan.report', compact('perikanans', 'jenis_ikan_count'));

        return $pdf->stream('laporan_perikanan.pdf');
    }
}
