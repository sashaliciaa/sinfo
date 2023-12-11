<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $users = User::latest()
            ->where('jabatan_id', '!=', '1')
            ->get();
        $dataJabatan = Jabatan::all();
        return view('admin.perangkatdesa.index', compact('users', 'dataJabatan'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.perangkatdesa.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'username' => 'required',
                'nama_awal' => 'required',
                'nama_akhir' => 'required',
                'password' => 'required|min:6',
                'alamat' => 'required',
                'telp' => 'required',
                'jabatan' => 'required',
                'tgl_mulai_jabat' => 'required|date',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = "Foto_perangkat_desa";
            $file->move($tujuan_upload, $nama_file);

            User::create([
                'email' => $request->email,
                'username' => $request->username,
                'nama_awal' => $request->nama_awal,
                'nama_akhir' => $request->nama_akhir,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jabatan_id' => $request->jabatan,
                'tgl_mulai_jabat' => $request->tgl_mulai_jabat,
                'foto' => $nama_file,
            ]);

            return redirect()->route('perangkatdesa.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('perangkatdesa.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.perangkatdesa.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $validatedData = $request->validate([
                'email' => 'required',
                'username' => 'required',
                'nama_awal' => 'required',
                'nama_akhir' => 'required',
                'password' => 'nullable|min:6',
                'alamat' => 'required',
                'telp' => 'required',
                'jabatan' => 'required',
                'tgl_mulai_jabat' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = User::find($id);

            if (!$user) {
                return redirect()->route('perangkatdesa.index')->with('fail', 'Data Perangkat Desa Tidak Ditemukan');
            }

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = "Foto_perangkat_desa";
                $file->move($tujuan_upload, $nama_file);

                // Delete the old photo if it exists
                $old_photo = public_path('Foto_perangkat_desa/' . $user->foto);
                if (file_exists($old_photo)) {
                    unlink($old_photo);
                }

                $user->foto = $nama_file;
            }

            $user->update([
                'email' => $validatedData['email'],
                'username' => $validatedData['username'],
                'nama_awal' => $validatedData['nama_awal'],
                'nama_akhir' => $validatedData['nama_akhir'],
                'password' => $request->has('password') ? bcrypt($validatedData['password']) : $user->password,
                'alamat' => $validatedData['alamat'],
                'telp' => $validatedData['telp'],
                'jabatan_id' => $validatedData['jabatan'],
                'tgl_mulai_jabat' => $validatedData['tgl_mulai_jabat'],
            ]);

            return redirect()->route('perangkatdesa.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('perangkatdesa.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }


    public function destroy(User $user, $id)
    {
        $user = User::where("id", $id)->first();
        // Delete the user's photo
        $photo_path = public_path('Foto_perangkat_desa/' . $user->foto);
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }

        // Delete the user
        $user->delete();

        return redirect()->route('perangkatdesa.index')->with('success', 'Data berhasil dihapus.');
    }
}
