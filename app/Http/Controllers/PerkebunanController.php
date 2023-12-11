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

    public function destroy(Perkebunan $perkebunan, $id)
    {
        $perkebunan = Perkebunan::where("id", $id)->first();
        $perkebunan->delete();

        return redirect()->route('perkebunan.index')->with('success', 'Data berhasil dihapus.');
    }
}
