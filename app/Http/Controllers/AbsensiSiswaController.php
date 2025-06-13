<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\Siswa;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class AbsensiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all student attendance records using Eloquent
        $absensiSiswa = AbsensiSiswa::with(['siswa', 'kehadiran'])->get(); // SQL: SELECT * FROM absensi_siswa JOIN siswa ON absensi_siswa.siswa_id = siswa.id JOIN kehadiran ON absensi_siswa.kehadiran_id = kehadiran.id

        // Return the view with the list of student attendance records
        return view('absensi_siswa.index')->with('absensiSiswa', $absensiSiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all students and attendance records to populate the dropdowns in the form
        $siswa = Siswa::all(); // SQL: SELECT * FROM siswa
        $kehadiran = Kehadiran::all(); // SQL: SELECT * FROM kehadiran

        // Return the view to create a new student attendance record with the lists of students and attendance records
        return view('absensi_siswa.create', compact('siswa', 'kehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', AbsensiSiswa::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kehadiran_id' => 'required|exists:kehadiran,id',
        ]);

        // Create a new student attendance record
        AbsensiSiswa::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('absensi_siswa.index')->with('success', 'Absensi siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiSiswa $absensiSiswa)
    {
        // Return the view to show the student attendance details
        return view('absensi_siswa.show', compact('absensiSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiSiswa $absensiSiswa)
    {
        $absensiSiswa = AbsensiSiswa::FindOrFail($absensiSiswa);
        // Return the view to edit the student attendance record
        return view('absensi_siswa.edit', compact('absensiSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $absensiSiswa)
    {
        $absensiSiswa = AbsensiSiswa::findOrFail($absensiSiswa);
        // Cek izin update
        if ($request->user()->cannot('update', $absensiSiswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kehadiran_id' => 'required|exists:kehadiran,id',
        ]);

        // Update the student attendance record
        $absensiSiswa->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('absensi_siswa.index')->with('success', 'Absensi siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, AbsensiSiswa $absensiSiswa)
    {
        $absensiSiswa = AbsensiSiswa::findOrFail($absensiSiswa->id); // Find the student attendance record by ID or fail
        if ($request->user()->cannot('delete', $absensiSiswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the student attendance record
        $absensiSiswa->delete();

        // Redirect to the index page with a success message
        return redirect()->route('absensi_siswa.index')->with('success', 'Absensi siswa berhasil dihapus.');
    }
}
