<?php

namespace App\Http\Controllers;

use App\Models\JadwalLes;
use App\Models\JadwalMapel;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all lesson schedules using Eloquent
        $jadwalMapel = JadwalMapel::with(['mataPelajaran', 'jadwalLes'])->get(); // SQL: SELECT * FROM jadwal_mapel JOIN mata_pelajaran ON jadwal_mapel.mata_pelajaran_id = mata_pelajaran.id JOIN jadwal_les ON jadwal_mapel.jadwal_les_id = jadwal_les.id
        // Return the view with the list of lesson schedules
        return view('jadwal_mapel.index')->with('jadwalMapel', $jadwalMapel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all subjects and lesson schedules to populate the dropdowns in the form
        $mataPelajaran = MataPelajaran::all(); // SQL: SELECT * FROM mata_pelajaran
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to create a new lesson schedule with the lists of subjects and lesson schedules
        return view('jadwal_mapel.create', compact('mataPelajaran', 'jadwalLes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', JadwalMapel::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Create a new lesson schedule record
        JadwalMapel::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_mapel.index')->with('success', 'Jadwal mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalMapel $jadwalMapel)
    {
        // Return the view to show the lesson schedule details
        return view('jadwal_mapel.show', compact('jadwalMapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalMapel $jadwalMapel)
    {
        // Retrieve all subjects and lesson schedules to populate the dropdowns in the form
        $mataPelajaran = MataPelajaran::all(); // SQL: SELECT * FROM mata_pelajaran
        $jadwalLes = JadwalLes::all(); // SQL: SELECT * FROM jadwal_les

        // Return the view to edit the lesson schedule with the lists of subjects and lesson schedules
        return view('jadwal_mapel.edit', compact('jadwalMapel', 'mataPelajaran', 'jadwalLes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalMapel $jadwalMapel)
    {
        $jadwalMapel = JadwalMapel::FindOrFail($jadwalMapel);
        // Cek izin update
        if ($request->user()->cannot('update', $jadwalMapel)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'jadwal_les_id' => 'required|exists:jadwal_les,id',
        ]);

        // Update the lesson schedule record
        $jadwalMapel->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_mapel.index')->with('success', 'Jadwal mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JadwalMapel $jadwalMapel)
    {
        $jadwalMapel = JadwalMapel::findOrFail($jadwalMapel->id); // SQL: SELECT * FROM jadwal_mapel WHERE id = ?
        if ($request->user()->cannot('delete', $jadwalMapel)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the lesson schedule record
        $jadwalMapel->delete();

        // Redirect to the index page with a success message
        return redirect()->route('jadwal_mapel.index')->with('success', 'Jadwal mata pelajaran berhasil dihapus.');
    }
}
