<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all subjects using Eloquent
        $mataPelajaran = MataPelajaran::all(); // SQL: SELECT * FROM mata_pelajaran
        // dd($mataPelajaran); // Uncomment this line to debug and see the data structure
        // Return the view with the list of subjects
        return view('mata_pelajaran.index')->with('mataPelajaran', $mataPelajaran);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new subject
        return view('mata_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek izin create
        if ($request->user()->cannot('create', MataPelajaran::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'kode_mapel' => 'required|string|max:10|unique:mata_pelajaran,kode_mapel',
            'nama_mapel' => 'required|string|max:100',
            'hari_les' => 'required|string|max:20',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Create a new subject record
        MataPelajaran::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        // Return the view to show the subject details
        return view('mata_pelajaran.show', compact('mataPelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        // Return the view to edit the subject
        return view('mata_pelajaran.edit', compact('mataPelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $mataPelajaran = MataPelajaran::FindOrFail($mataPelajaran);
        // Cek izin update
        if ($request->user()->cannot('update', $mataPelajaran)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'kode_mapel' => 'required|string|max:10|unique:mata_pelajaran,kode_mapel,' . $mataPelajaran->id,
            'nama_mapel' => 'required|string|max:100',
            'hari_les' => 'required|string|max:20',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Update the subject record
        $mataPelajaran->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, MataPelajaran $mataPelajaran)
    {
        // Validate that the subject exists
        $mataPelajaran = MataPelajaran::findOrFail($mataPelajaran->id);
        // Cek izin delete
        if ($request->user()->cannot('delete', $mataPelajaran)) {
            abort(403, 'Unauthorized action.');
        }
        // Find the subject by ID and delete it
        $mataPelajaran->delete();

        // Redirect to the index page with a success message
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
