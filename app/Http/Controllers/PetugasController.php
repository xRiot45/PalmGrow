<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman petugas
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('pages.admin.petugas.index');
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
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas)
    {
        //
    }
}
