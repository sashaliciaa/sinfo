<?php

namespace App\Http\Controllers;

use App\Models\AgendaKegiatan;
use Illuminate\Http\Request;

class AgendaKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda = AgendaKegiatan::all();


        return view('admin.agendakegiatan.index', compact('agenda'));
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
    public function store(Request $request, AgendaKegiatan $agendaKegiatan)
    {
        $request->validate([
            "nama_agenda" => "required",
            "tgl_kegiatan" => "required",
            "jam_mulai" => "required",
            "tempat" => "required",
        ]);

        $data = $request->all();

        $agendaKegiatan->create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan agenda berdasarkan ID
        $agenda = AgendaKegiatan::findOrFail($id);

        // Hapus agenda
        $agenda->delete();

        // Redirect dengan pesan sukses atau lainnya jika diperlukan
        return redirect()->back()->with('success', 'Agenda berhasil dihapus');
    }
}
