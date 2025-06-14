<?php

namespace App\Http\Controllers;

use App\Models\JadwalLes;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class JadwalLesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all lesson schedules using Eloquent
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les
        // dd($jadwalLes); // Uncomment this line to debug and see the data structure
        // Return the view with the list of lesson schedules
        return view('jadwal_les.index')->with('jadwalLes', $jadwalLes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all rooms to populate the dropdown in the form
        $ruangan = Ruangan::all(); // SQL: SELECT * FROM ruangan
        // Return the view to create a new lesson schedule
        return view('jadwal_les.create', compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create',JadwalLes::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'tanggal_les' => 'required|date',
            'keterangan' => 'nullable|string|max:100',
            'ruangan_id' => 'required|exists:ruangan,id'
        ]);

        // Create a new lesson schedule record
        JadwalLes::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_les.index')->with('success', 'Jadwal les berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalLes $jadwalLes)
    {
        // Return the view to show the lesson schedule details
        return view('jadwal_les.show', compact('jadwalLes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalLes $jadwalLes)
    {
        // Retrieve all rooms to populate the dropdown in the edit form
        $ruangan = Ruangan::all(); // SQL: SELECT * FROM ruangan
        // Return the view to edit the lesson schedule details
        return view('jadwal_les.edit', compact('jadwalLes', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jadwalLes)
    {
        $jadwalLes = JadwalLes::findOrFail($jadwalLes);
        // Cek izin update
        if ($request->user()->cannot('update', $jadwalLes)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'tanggal_les' => 'required|date',
            'keterangan' => 'nullable|string|max:100',
            'ruangan_id' => 'required|exists:ruangan,id'
        ]);

        // Update the lesson schedule record
        $jadwalLes->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_les.index')->with('success', 'Jadwal les berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JadwalLes $jadwalLes)
    {
        // Find the lesson schedule by ID or fail
        $jadwalLes = JadwalLes::findOrFail($jadwalLes->id);
        // Cek izin delete
        if ($request->user()->cannot('delete', $jadwalLes)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the lesson schedule record
        $jadwalLes->delete();
        // Redirect to the index page with a success message
        return redirect()->route('jadwal_les.index')->with('success', 'Jadwal les berhasil dihapus.');
    }
}
