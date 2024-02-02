<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Landingpage;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Models\AgendaKegiatan;
use App\Models\Galeri;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['perangkat'] = User::where('jabatan_id', '!=', '1')->get();
        $data['agenda'] = AgendaKegiatan::paginate(3);
        $data['galeri'] = Galeri::paginate(10);
        return view('landingpage.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Landingpage $landingpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Landingpage $landingpage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Landingpage $landingpage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Landingpage $landingpage)
    {
        //
    }
}
