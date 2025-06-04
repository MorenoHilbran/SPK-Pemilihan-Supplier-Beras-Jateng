<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('alternatif.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
        ]);

        Alternatif::create($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // If you need to implement this, fetch the Alternatif instance
        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.show', compact('alternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alternatif = Alternatif::findOrFail($id); // Fetch the Alternatif instance
        return view('alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
        ]);

        $alternatif = Alternatif::findOrFail($id); // Fetch the Alternatif instance
        $alternatif->update($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alternatif = Alternatif::findOrFail($id); // Fetch the Alternatif instance
        $alternatif->delete();
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}