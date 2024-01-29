<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Meubel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeubelController extends Controller
{
    public function index()
    {
        $meubels = Meubel::latest()->get();
        return view('admin.meubel.index', compact('meubels'));
    }

    public function create()
    {
        return view('admin.meubel.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'jumlah_meubeler' => 'required|integer',
                'jenis_meubel' => 'required',
                // Add other validation rules as needed
            ]);

            Meubel::create([
                'jumlah_meubeler' => $request->jumlah_meubeler,
                'jenis_meubel' => $request->jenis_meubel,
                // Add other fields as needed
            ]);

            return redirect()->route('meubel.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('meubel.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $meubel = Meubel::find($id);
        return view('admin.meubel.edit', compact('meubel'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'jumlah_meubeler' => 'required|integer',
                'jenis_meubel' => 'required',
                // Add other validation rules as needed
            ]);

            $meubel = Meubel::find($id);

            if (!$meubel) {
                return redirect()->route('meubel.index')->with('fail', 'Data Meubel Tidak Ditemukan');
            }

            $meubel->update([
                'jumlah_meubeler' => $request->jumlah_meubeler,
                'jenis_meubel' => $request->jenis_meubel,
                // Add other fields as needed
            ]);

            return redirect()->route('meubel.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('meubel.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $meubel = Meubel::find($id);

        if (!$meubel) {
            return redirect()->route('meubel.index')->with('fail', 'Data Meubel Tidak Ditemukan');
        }

        $meubel->delete();

        return redirect()->route('meubel.index')->with('success', 'Data berhasil dihapus.');
    }

    public function printReport()
    {
        $meubels = Meubel::all();
        $jenis_meubel = Meubel::select('jenis_meubel')->distinct()->get();

        $jumlah_meubeler_count = Meubel::sum('jumlah_meubeler');

        $pdf = app('dompdf.wrapper')->loadView('admin.meubel.report', compact('meubels', 'jumlah_meubeler_count'));

        return $pdf->stream('laporan_meubel.pdf');
    }
}
