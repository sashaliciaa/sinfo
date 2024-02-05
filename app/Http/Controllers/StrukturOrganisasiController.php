<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StrukturOrganisasi::all();
        return view('admin.strukturOrganisasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'struktur' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('struktur');
            // set nama file to year now - name
            $nama_file = date('Y') . "-" . $file->getClientOriginalName();
            $tujuan_upload = "Struktur_Organisasi";
            $file->move($tujuan_upload, $nama_file);

            StrukturOrganisasi::create([
                'struktur' => $nama_file,
                'status' => 0,
            ]);

            return redirect()->route('struktur.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('struktur.index')->with('fail', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = StrukturOrganisasi::find($id);

        if (!$data) {
            return redirect()->route('struktur.index')->with('fail', 'Data Tidak Ditemukan');
        }

        $data->delete();

        return redirect()->route('struktur.index')->with('success', 'Data berhasil dihapus.');
    }


    public function strukturStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = StrukturOrganisasi::find($request->id);
        if ($data->status == 1) {
            StrukturOrganisasi::where('id', $request->id)->update([
                'status' => 0,
            ]);
        } else {
            StrukturOrganisasi::where('id', $request->id)->update([
                'status' => 1,
            ]);

            StrukturOrganisasi::where('id', '!=', $request->id)->update([
                'status' => 0,
            ]);
        }
        return redirect()->back();
    }
}
