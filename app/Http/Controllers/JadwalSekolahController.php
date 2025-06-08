<?php

namespace App\Http\Controllers;

use App\Models\JadwalSekolah;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class JadwalSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all school schedules using Eloquent
        $jadwalSekolah = JadwalSekolah::all(); // SQL: SELECT * FROM jadwal_sekolah
        // dd($jadwalSekolah); // Uncomment this line to debug and see the data structure
        // Return the view with the list of school schedules
        return view('jadwal_sekolah.index')->with('jadwalSekolah', $jadwalSekolah);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all schools to populate the dropdown in the form
        $sekolah = Sekolah::all(); // SQL: SELECT * FROM sekolah
        // Return the view to create a new school schedule with the list of schools
        return view('jadwal_sekolah.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $input = $request->validate([
            'hari_sekolah' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'sekolah_id' => 'required|exists:sekolah,id',
        ]);

        // Create a new school schedule record
        JadwalSekolah::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_sekolah.index')->with('success', 'Jadwal sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalSekolah $jadwalSekolah)
    {
        // Return the view to show the school schedule details
        return view('jadwal_sekolah.show', compact('jadwalSekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalSekolah $jadwalSekolah)
    {
        // Retrieve all schools to populate the dropdown in the edit form
        $sekolah = Sekolah::all(); // SQL: SELECT * FROM sekolah
        // Return the view to edit the school schedule with the list of schools
        return view('jadwal_sekolah.edit', compact('jadwalSekolah', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalSekolah $jadwalSekolah)
    {
        // Validate the request data
        $input = $request->validate([
            'hari_sekolah' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'sekolah_id' => 'required|exists:sekolah,id',
        ]);

        // Update the school schedule record
        $jadwalSekolah->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_sekolah.index')->with('success', 'Jadwal sekolah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalSekolah $jadwalSekolah)
    {
        // Check if the school schedule exists
        $jadwalSekolah = JadwalSekolah::findOrFail($jadwalSekolah->id); // Find the schedule by ID or fail
        // Delete the school schedule record
        $jadwalSekolah->delete();

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_sekolah.index')->with('success', 'Jadwal sekolah berhasil dihapus.');
    }
}
