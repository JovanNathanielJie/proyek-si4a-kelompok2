<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all rooms using Eloquent
        $ruangan = Ruangan::all(); // SQL: SELECT * FROM ruangan
        // dd($ruangan); // Uncomment this line to debug and see the data structure
        // Return the view with the list of rooms
        return view('ruangan.index')->with('ruangan', $ruangan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new room
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $input = $request->validate([
            'kode_ruangan' => 'required|string|max:3',
            'lantai_ruangan' => 'required|integer|min:1|max:10',
            'jumlah_kursi' => 'required|integer|min:1|max:100'
        ]);

        // Create a new room record
        Ruangan::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        // Return the view to show the room details
        return view('ruangan.show', compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        // Return the view to edit the room details
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        // Validate the request data
        $input = $request->validate([
            'kode_ruangan' => 'required|string|max:3',
            'lantai_ruangan' => 'required|integer|min:1|max:10',
            'jumlah_kursi' => 'required|integer|min:1|max:100'
        ]);

        // Update the room record
        $ruangan->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan = Ruangan::findOrFail($ruangan->id); // Find the room by ID or fail
        // Delete the room record
        $ruangan->delete();

        // Redirect to the index page with a success message
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus.');
    }
}
