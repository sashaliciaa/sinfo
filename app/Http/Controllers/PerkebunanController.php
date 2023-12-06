<?php

namespace App\Http\Controllers;

use App\Models\Perkebunan;
use Illuminate\Http\Request;

class PerkebunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('perkebunan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perkebunan.create');
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
    public function show(Perkebunan $perkebunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perkebunan $perkebunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perkebunan $perkebunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perkebunan $perkebunan)
    {
        //
    }
}
