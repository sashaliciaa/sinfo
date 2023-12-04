<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\User;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $users = User::latest()->where('jabatan', '!=', 'administrator')->get();
        return view('admin.perangkatdesa.index', compact('users'));
    }

    public function create()
    {
        return view('admin.perangkatdesa.create');
    }

    public function store(Request $request)
    {
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
            'jabatan' => $request->jabatan,
            'tgl_mulai_jabat' => $request->tgl_mulai_jabat,
            'foto' => $nama_file,
        ]);

        return redirect()->route('perangkatdesa.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(User $user)
    {
        return view('admin.perangkatdesa.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required',
            'nama_awal' => 'required',
            'nama_akhir' => 'required',
            'password' => 'nullable|min:6', // You may want to change this to nullable if password is not required for update
            'alamat' => 'required',
            'telp' => 'required',
            'jabatan' => 'required',
            'tgl_mulai_jabat' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make it nullable if you don't want to update the photo every time
        ]);

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
            'email' => $request->email,
            'username' => $request->username,
            'nama_awal' => $request->nama_awal,
            'nama_akhir' => $request->nama_akhir,
            'password' => $request->has('password') ? bcrypt($request->password) : $user->password,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'jabatan' => $request->jabatan,
            'tgl_mulai_jabat' => $request->tgl_mulai_jabat,
        ]);

        return redirect()->route('perangkatdesa.index')->with('success', 'Data berhasil diperbarui.');
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
