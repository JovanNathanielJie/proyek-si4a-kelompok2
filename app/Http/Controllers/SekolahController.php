<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all schools using Eloquent
        $sekolah = Sekolah::all(); // SQL: SELECT * FROM sekolah
        // dd($sekolah); // Uncomment this line to debug and see the data structure
        // Return the view with the list of schools
        return view('sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new school
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek izin create
        if ($request->user()->cannot('create', Sekolah::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'nama_sekolah' => 'required|string|max:100|unique:sekolah,nama_sekolah',
            'alamat_sekolah' => 'required|string|max:100',
        ]);

        // Create a new school record
        Sekolah::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($sekolah)
    {
        $sekolah = Sekolah::findOrFail($sekolah); // Find the school by ID or fail
        // dd($sekolah); // Uncomment this line to debug and see the school data
        // Return the view to show the school details
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($sekolah)
    {
        $sekolah = Sekolah::findOrFail($sekolah); // Find the school by ID or fail
        // Return the view to edit the school details
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sekolah)
    {
        $sekolah = Sekolah::findOrFail($sekolah); // Find the school by ID or fail
        // Cek izin update
        if ($request->user()->cannot('update', $sekolah)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'nama_sekolah' => 'required|string|max:100|unique:sekolah,nama_sekolah,' . $sekolah->id,
            'alamat_sekolah' => 'required|string|max:100',
        ]);
        // Update the school record
        $sekolah->update($input);
        // Redirect to the index page with a success message
        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $sekolah)
    {
        $sekolah = Sekolah::findOrFail($sekolah); // Find the school by ID or fail
        // Cek izin delete
        if ($request->user()->cannot('delete', $sekolah)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the school record
        $sekolah->delete();
        // Redirect to the index page with a success message
        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil dihapus.');
    }
}
