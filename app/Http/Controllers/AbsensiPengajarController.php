<?php

namespace App\Http\Controllers;

use App\Models\AbsensiPengajar;
use App\Models\Pengajar;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class AbsensiPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all teacher attendance records using Eloquent
        $absensiPengajar = AbsensiPengajar::with(['pengajar', 'kehadiran'])->get(); // SQL: SELECT * FROM absensi_pengajar JOIN pengajar ON absensi_pengajar.pengajar_id = pengajar.id JOIN kehadiran ON absensi_pengajar.kehadiran_id = kehadiran.id

        // Return the view with the list of teacher attendance records
        return view('absensi_pengajar.index')->with('absensiPengajar', $absensiPengajar);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all teachers and attendance records to populate the dropdowns in the form
        $pengajar = Pengajar::all(); // SQL: SELECT * FROM pengajar
        $kehadiran = Kehadiran::all(); // SQL: SELECT * FROM kehadiran

        // Return the view to create a new teacher attendance record with the lists of teachers and attendance records
        return view('absensi_pengajar.create', compact('pengajar', 'kehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $input = $request->validate([
            'pengajar_id' => 'required|exists:pengajar,id',
            'kehadiran_id' => 'required|exists:kehadiran,id',
        ]);
        // Create a new teacher attendance record
        AbsensiPengajar::create($input);
        // Redirect to the index page with a success message
        return redirect()->route('absensi_pengajar.index')->with('success', 'Absensi pengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiPengajar $absensiPengajar)
    {
        // Return the view to show the teacher attendance details
        return view('absensi_pengajar.show', compact('absensiPengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiPengajar $absensiPengajar)
    {
        // Return the view to edit the teacher attendance record
        return view('absensi_pengajar.edit', compact('absensiPengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbsensiPengajar $absensiPengajar)
    {
        // Validate the request data
        $input = $request->validate([
            'pengajar_id' => 'required|exists:pengajar,id',
            'kehadiran_id' => 'required|exists:kehadiran,id',
        ]);
        // Update the teacher attendance record
        $absensiPengajar->update($input);
        // Redirect to the index page with a success message
        return redirect()->route('absensi_pengajar.index')->with('success', 'Absensi pengajar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiPengajar $absensiPengajar)
    {
        $absensiPengajar = AbsensiPengajar::findOrFail($absensiPengajar->id); // Find the teacher attendance record by ID or fail
        // Delete the teacher attendance record
        $absensiPengajar->delete();
        // Redirect to the index page with a success message
        return redirect()->route('absensi_pengajar.index')->with('success', 'Absensi pengajar berhasil dihapus.');
    }
}
