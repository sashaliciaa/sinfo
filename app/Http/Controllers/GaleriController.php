<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'nama_foto' => 'required',
                'foto_galeri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('foto_galeri');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = "Foto_galeri";
            $file->move($tujuan_upload, $nama_file);

            Galeri::create([
                'nama_foto' => $nama_file,
                'foto_galeri' => $nama_file,
            ]);

            return redirect()->route('galeri.index')->with('success', 'Foto berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('galeri.index')->with('fail', 'Foto gagal disimpan' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'nama_foto' => 'required',
                'foto_galeri' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $galeri = Galeri::findOrFail($id);

            if ($request->hasFile('foto_galeri')) {
                $file = $request->file('foto_galeri');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = "Foto_galeri";
                $file->move($tujuan_upload, $nama_file);

                // Delete the previous photo
                $photo_path = public_path('Foto_galeri/' . $galeri->foto_galeri);
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }

                // Update the photo record
                $galeri->update([
                    'nama_foto' => $nama_file,
                    'foto_galeri' => $nama_file,
                ]);
            }

            return redirect()->route('galeri.index')->with('success', 'Foto berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('galeri.index')->with('fail', 'Foto gagal diperbarui' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $foto = Galeri::where("id", $id)->first();
        // Delete the gallery photo
        $photo_path = public_path('Foto_galeri/' . $foto->foto_galeri);
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }

        // Delete the gallery photo record
        $foto->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
