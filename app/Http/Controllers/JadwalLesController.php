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
        // Validate the request data
        $input = $request->validate([
            'hari_les' => 'required|string|max:20',
            'tanggal_les' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:100',
            'mata_pelajaran' => 'required|string|max:50',
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
    public function update(Request $request, JadwalLes $jadwalLes)
    {
        // Validate the request data
        $input = $request->validate([
            'hari_les' => 'required|string|max:20',
            'tanggal_les' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:100',
            'mata_pelajaran' => 'required|string|max:50',
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
    public function destroy(JadwalLes $jadwalLes)
    {
        // Find the lesson schedule by ID or fail
        $jadwalLes = JadwalLes::findOrFail($jadwalLes->id);

        // Delete the lesson schedule record
        $jadwalLes->delete();

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_les.index')->with('success', 'Jadwal les berhasil dihapus.');
    }
}
