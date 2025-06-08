<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all teachers using Eloquent
        $pengajar = Pengajar::all(); // SQL: SELECT * FROM pengajar
        // dd($pengajar); // Uncomment this line to debug and see the data structure
        // Return the view with the list of teachers
        return view('pengajar.index')->with('pengajar', $pengajar);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new teacher
        return view('pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $input = $request->validate([
            'nama_pengajar' => 'required|string|max:100',
            'tanggal_masuk_pengajar' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_pengajar' => 'required|string|max:100',
            'no_telepon_pengajar' => 'required|string|max:15',
            'identitas_pc' => 'required|string|max:50'
        ]);

        // Create a new teacher record
        Pengajar::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajar $pengajar)
    {
        // Return the view to show the teacher details
        return view('pengajar.show', compact('pengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajar $pengajar)
    {
        // Return the view to edit the teacher details
        return view('pengajar.edit', compact('pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        // Validate the request data
        $input = $request->validate([
            'nama_pengajar' => 'required|string|max:100',
            'tanggal_masuk_pengajar' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_pengajar' => 'required|string|max:100',
            'no_telepon_pengajar' => 'required|string|max:15',
            'identitas_pc' => 'required|string|max:50'
        ]);

        // Update the teacher record
        $pengajar->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajar $pengajar)
    {
        $pengajar = Pengajar::findOrFail($pengajar->id); // Find the teacher by ID or fail
        // Delete the teacher record
        $pengajar->delete();

        // Redirect to the index page with a success message
        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil dihapus.');
    }
}
