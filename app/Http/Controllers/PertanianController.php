<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use Illuminate\Http\Request;

class PertanianController extends Controller
{
    public function index()
    {
        $pertanians = Pertanian::latest()->get();
        return view('admin.pertanian.index', compact('pertanians'));
    }

    public function create()
    {
        return view('admin.pertanian.create');
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

            Pertanian::create([
                'jenis_tanaman' => $request->jenis_tanaman,
                'waktu_tanam' => $request->waktu_tanam,
                'waktu_panen' => $request->waktu_panen,
                'luas_wilayah_tanam' => $request->luas_wilayah_tanam,
            ]);

            return redirect()->route('pertanian.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('pertanian.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit(Pertanian $pertanian)
    {
        return view('admin.pertanian.edit', compact('pertanian'));
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

            $pertanian = Pertanian::find($id);

            if (!$pertanian) {
                return redirect()->route('pertanian.index')->with('fail', 'Data Pertanian Tidak Ditemukan');
            }

            $pertanian->update([
                'jenis_tanaman' => $validatedData['jenis_tanaman'],
                'waktu_tanam' => $validatedData['waktu_tanam'],
                'waktu_panen' => $validatedData['waktu_panen'],
                'luas_wilayah_tanam' => $validatedData['luas_wilayah_tanam'],
            ]);

            return redirect()->route('pertanian.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('pertanian.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function destroy(Pertanian $pertanian, $id)
    {
        $pertanian = Pertanian::where("id", $id)->first();
        $pertanian->delete();

        return redirect()->route('pertanian.index')->with('success', 'Data berhasil dihapus.');
    }
}
