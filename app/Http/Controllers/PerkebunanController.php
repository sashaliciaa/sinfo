<?php

namespace App\Http\Controllers;

use App\Models\Perkebunan;
use Illuminate\Http\Request;

class PerkebunanController extends Controller
{
    public function index()
    {
        $perkebunans = Perkebunan::latest()->get();
        return view('admin.perkebunan.index', compact('perkebunans'));
    }

    public function create()
    {
        return view('admin.perkebunan.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'jenis_tanaman' => 'required',
                'waktu_tanam' => 'required|date',
                'waktu_panen' => 'required|date',
                'luas_wilayah_tanam' => 'required',
            ]);

            Perkebunan::create([
                'jenis_tanaman' => $request->jenis_tanaman,
                'waktu_tanam' => $request->waktu_tanam,
                'waktu_panen' => $request->waktu_panen,
                'luas_wilayah_tanam' => $request->luas_wilayah_tanam,
            ]);

            return redirect()->route('perkebunan.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('perkebunan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit(Perkebunan $perkebunan)
    {
        return view('admin.perkebunan.edit', compact('perkebunan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'jenis_tanaman' => 'required',
                'waktu_tanam' => 'required|date',
                'waktu_panen' => 'required|date',
                'luas_wilayah_tanam' => 'required',
            ]);

            $perkebunan = Perkebunan::find($id);

            if (!$perkebunan) {
                return redirect()->route('perkebunan.index')->with('fail', 'Data Perkebunan Tidak Ditemukan');
            }

            $perkebunan->update([
                'jenis_tanaman' => $validatedData['jenis_tanaman'],
                'waktu_tanam' => $validatedData['waktu_tanam'],
                'waktu_panen' => $validatedData['waktu_panen'],
                'luas_wilayah_tanam' => $validatedData['luas_wilayah_tanam'],
            ]);

            return redirect()->route('perkebunan.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('perkebunan.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $perkebunan = Perkebunan::find($id);

        if (!$perkebunan) {
            return redirect()->route('perkebunan.index')->with('fail', 'Data Perkebunan Tidak Ditemukan');
        }

        $perkebunan->delete();

        return redirect()->route('perkebunan.index')->with('success', 'Data berhasil dihapus.');
    }

    public function printReport()
    {
        $perkebunans = Perkebunan::all();

        // select jenis tanaman yang tidak double
        $jenis_tanaman = Perkebunan::select('jenis_tanaman')->distinct()->get();

        // Hitung total luas wilayah tanam
        $luas_tanam_count = $perkebunans->sum('luas_wilayah_tanam');

        $jenis_tanaman_count = $jenis_tanaman->count();

        $pdf = app('dompdf.wrapper')->loadView('admin.perkebunan.report', compact('perkebunans', 'jenis_tanaman_count', 'luas_tanam_count'));

        return $pdf->stream('laporan_perkebunan.pdf');
    }
}
