<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Peternakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PeternakanController extends Controller
{
    public function index()
    {
        $peternakans = Peternakan::latest()->get();
        return view('admin.peternakan.index', compact('peternakans'));
    }

    public function create()
    {
        return view('admin.peternakan.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'jenis_ternak' => 'required',
                'hewan_ternak' => 'required',
                'pakan' => 'required',
                'umur_ternak' => 'required|integer',
                'berat_ternak' => 'required|numeric',
                'jumlah_ternak' => 'required|integer',
            ]);

            Peternakan::create([
                'jenis_ternak' => $request->jenis_ternak,
                'hewan_ternak' => $request->hewan_ternak,
                'pakan' => $request->pakan,
                'umur_ternak' => $request->umur_ternak,
                'berat_ternak' => $request->berat_ternak,
                'jumlah_ternak' => $request->jumlah_ternak,
            ]);

            return redirect()->route('peternakan.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('peternakan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $peternakan = Peternakan::find($id);
        return view('admin.peternakan.edit', compact('peternakan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'jenis_ternak' => 'required',
                'hewan_ternak' => 'required',
                'pakan' => 'required',
                'umur_ternak' => 'required|integer',
                'berat_ternak' => 'required|numeric',
                'jumlah_ternak' => 'required|integer',
            ]);

            $peternakan = Peternakan::find($id);

            if (!$peternakan) {
                return redirect()->route('peternakan.index')->with('fail', 'Data Peternakan Tidak Ditemukan');
            }

            $peternakan->update([
                'jenis_ternak' => $request->jenis_ternak,
                'hewan_ternak' => $request->hewan_ternak,
                'pakan' => $request->pakan,
                'umur_ternak' => $request->umur_ternak,
                'berat_ternak' => $request->berat_ternak,
                'jumlah_ternak' => $request->jumlah_ternak,
            ]);

            return redirect()->route('peternakan.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('peternakan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $peternakan = Peternakan::find($id);

        if (!$peternakan) {
            return redirect()->route('peternakan.index')->with('fail', 'Data Peternakan Tidak Ditemukan');
        }

        $peternakan->delete();

        return redirect()->route('peternakan.index')->with('success', 'Data berhasil dihapus.');
    }

    public function printReport()
    {
        $peternakans = Peternakan::all();

        // select jenis ternak yang tidak double
        $jenis_ternak = Peternakan::select('jenis_ternak')->distinct()->get();
        $hewan_ternak = Peternakan::select('hewan_ternak')->distinct()->get();

        $jenis_ternak_count = $jenis_ternak->count();
        $hewan_ternak_count = $hewan_ternak->count();

        $pdf = app('dompdf.wrapper')->loadView('admin.peternakan.report', compact('peternakans', 'jenis_ternak_count', 'hewan_ternak_count'));

        return $pdf->stream('laporan_peternakan.pdf');
    }
}
