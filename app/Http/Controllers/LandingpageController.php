<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Galeri;
use App\Models\Meubel;
use App\Models\Perikanan;
use App\Models\Pertanian;
use App\Models\Perkebunan;
use App\Models\Peternakan;
use App\Models\Landingpage;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Models\AgendaKegiatan;
use App\Http\Controllers\Controller;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

    public function galeriShow()
    {
        $data['galeri'] = Galeri::all();
        return view('landingpage.galeri_show.index', $data);
    }
    public function agendaShow()
    {
        $data['agenda'] = AgendaKegiatan::all();
        return view('landingpage.agenda_show.index', $data);
    }
    public function pertanianShow()
    {
        $data['pertanian'] = Pertanian::all();
        return view('landingpage.pertanian_show.index', $data);
    }
    public function perkebunanShow()
    {
        $data['perkebunan'] = Perkebunan::all();
        return view('landingpage.perkebunan_show.index', $data);
    }
    public function peternakanShow()
    {
        $data['peternakan'] = Peternakan::all();
        return view('landingpage.peternakan_show.index', $data);
    }
    public function perikananShow()
    {
        $data['perikanan'] = Perikanan::all();
        return view('landingpage.perikanan_show.index', $data);
    }
    public function meubelShow()
    {
        $data['meubel'] = Meubel::all();
        return view('landingpage.meubel_show.index', $data);
    }
}
