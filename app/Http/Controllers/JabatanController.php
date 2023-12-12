<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::latest()
            ->where('jabatan', '!=', 'Admin')
            ->get();
        return view('admin.jabatan.index', compact('jabatan'));
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
        $dataJabatan = $request->validate(
            ['jabatan' => 'required',]
        );

        Jabatan::create($dataJabatan);

        return redirect()->back()->with('message', 'Sukses Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->back()->with('message', 'Sukses Menghapus Data');
    }
}
