<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use Illuminate\Http\Request;

class PertanianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pertanian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pertanian.create');
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
    public function show(Pertanian $pertanian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanian $pertanian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanian $pertanian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanian $pertanian)
    {
        //
    }
}
