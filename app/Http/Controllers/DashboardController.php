<?php

namespace App\Http\Controllers;

use App\Models\Meubel;
use App\Models\dashboard;
use App\Models\Perikanan;
use App\Models\Pertanian;
use App\Models\Perkebunan;
use App\Models\Peternakan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanians = Pertanian::all();
        $peternakans = Peternakan::all();
        $perkebunans = Perkebunan::all();
        $perikanans = Perikanan::all();
        $meubels = Meubel::all();
        return view('admin.dashboard.index', compact('pertanians', 'peternakans', 'perkebunans', 'perikanans', 'meubels'));
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
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
