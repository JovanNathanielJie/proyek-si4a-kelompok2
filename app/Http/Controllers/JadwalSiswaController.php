<?php

namespace App\Http\Controllers;

use App\Models\JadwalSiswa;
use App\Models\Siswa;
use App\Models\JadwalLes;
use Illuminate\Http\Request;

class JadwalSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all student schedules using Eloquent
        $jadwalSiswa = JadwalSiswa::with(['siswa', 'jadwalLes'])->get(); // SQL: SELECT * FROM jadwal_siswa JOIN siswa ON jadwal_siswa.siswa_id = siswa.id JOIN jadwal_les ON jadwal_siswa.jadwal_les_id = jadwal_les.id

        // Return the view with the list of student schedules
        return view('jadwal_siswa.index')->with('jadwalSiswa', $jadwalSiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all students and lesson schedules to populate the dropdowns in the form
        $siswa = Siswa::all(); // SQL: SELECT * FROM siswa
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to create a new student schedule with the lists of students and lesson schedules
        return view('jadwal_siswa.create', compact('siswa', 'jadwalLes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek izin create
        if ($request->user()->cannot('create', JadwalSiswa::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Create a new student schedule record
        JadwalSiswa::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_siswa.index')->with('success', 'Jadwal siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalSiswa $jadwalSiswa)
    {
        // Return the view to show the student schedule details
        return view('jadwal_siswa.show', compact('jadwalSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalSiswa $jadwalSiswa)
    {
        // Retrieve all students and lesson schedules to populate the dropdowns in the form
        $siswa = Siswa::all(); // SQL: SELECT * FROM siswa
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to edit the student schedule with the lists of students and lesson schedules
        return view('jadwal_siswa.edit', compact('jadwalSiswa', 'siswa', 'jadwalLes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalSiswa $jadwalSiswa)
    {
         $jadwalSiswa = JadwalSiswa::findOrFail($jadwalSiswa);
        // Cek izin update
        if ($request->user()->cannot('update', $jadwalSiswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Update the student schedule record
        $jadwalSiswa->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_siswa.index')->with('success', 'Jadwal siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JadwalSiswa $jadwalSiswa)
    {
        // Check if the student schedule exists
        $jadwalSiswa = JadwalSiswa::findOrFail($jadwalSiswa->id); // Find the student schedule by ID or fail
        // Cek izin delete
        if ($request->user()->cannot('delete', $jadwalSiswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the student schedule record
        $jadwalSiswa->delete();

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_siswa.index')->with('success', 'Jadwal siswa berhasil dihapus.');
    }
}
