<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengajar;
use App\Models\Pengajar;
use App\Models\JadwalLes;
use Illuminate\Http\Request;

class JadwalPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all teaching schedules using Eloquent
        $jadwalPengajar = JadwalPengajar::with(['pengajar', 'jadwalLes'])->get(); // SQL: SELECT * FROM jadwal_pengajar JOIN pengajar ON jadwal_pengajar.pengajar_id = pengajar.id JOIN jadwal_les ON jadwal_pengajar.jadwal_les_id = jadwal_les.id

        // Return the view with the list of teaching schedules
        return view('jadwal_pengajar.index')->with('jadwalPengajar', $jadwalPengajar);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all teachers and lesson schedules to populate the dropdowns in the form
        $pengajar = Pengajar::all(); // SQL: SELECT * FROM pengajar
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to create a new teaching schedule with the lists of teachers and lesson schedules
        return view('jadwal_pengajar.create', compact('pengajar', 'jadwalLes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', JadwalPengajar::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'pengajar_id' => 'required|exists:pengajar,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Create a new teaching schedule record
        JadwalPengajar::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_pengajar.index')->with('success', 'Jadwal pengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalPengajar $jadwalPengajar)
    {
        // Return the view to show the teaching schedule details
        return view('jadwal_pengajar.show', compact('jadwalPengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPengajar $jadwalPengajar)
    {
        // Retrieve all teachers and lesson schedules to populate the dropdowns in the form
        $pengajar = Pengajar::all(); // SQL: SELECT * FROM pengajar
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to edit the teaching schedule with the lists of teachers and lesson schedules
        return view('jadwal_pengajar.edit', compact('jadwalPengajar', 'pengajar', 'jadwalLes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jadwalPengajar)
    {
        $jadwalPengajar = JadwalPengajar::findOrFail($jadwalPengajar);
        if ($request->user()->cannot('update', $jadwalPengajar)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'pengajar_id' => 'required|exists:pengajar,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Update the teaching schedule record
        $jadwalPengajar->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_pengajar.index')->with('success', 'Jadwal pengajar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JadwalPengajar $jadwalPengajar)
    {
        $jadwalPengajar = JadwalPengajar::findOrFail($jadwalPengajar->id); // SQL: SELECT * FROM jadwal_pengajar WHERE id = ?
        if ($request->user()->cannot('delete', $jadwalPengajar)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the teaching schedule record
        $jadwalPengajar->delete();

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_pengajar.index')->with('success', 'Jadwal pengajar berhasil dihapus.');
    }
}
