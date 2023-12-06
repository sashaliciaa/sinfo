<?php

namespace App\Http\Controllers;

use App\Models\Peternakan;
use Illuminate\Http\Request;

class PeternakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peternakan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peternakan.create');
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
    public function show(Peternakan $peternakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peternakan $peternakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peternakan $peternakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peternakan $peternakan)
    {
        //
    }
}
