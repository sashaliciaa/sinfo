<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\perangkatDesa;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('jabatan', '!=', 'administrator')->get();

        return view('admin.perangkatdesa.index', compact('user'));
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
    public function show(perangkatDesa $perangkatDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perangkatDesa $perangkatDesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perangkatDesa $perangkatDesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perangkatDesa $perangkatDesa)
    {
        //
    }
}
