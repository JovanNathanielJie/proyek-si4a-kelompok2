<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all attendance records using Eloquent
        $kehadiran = Kehadiran::all(); // SQL: SELECT * FROM kehadiran

        // Return the view with the list of attendance records
        return view('kehadiran.index')->with('kehadiran', $kehadiran);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new attendance record
        return view('kehadiran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek izin create
        if ($request->user()->cannot('create', Kehadiran::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'departemen' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'jam_hadir' => 'required|date_format:H:i',
        ]);

        // Create a new attendance record
        Kehadiran::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehadiran $kehadiran)
    {
        // Return the view to show the attendance details
        return view('kehadiran.show', compact('kehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehadiran $kehadiran)
    {
        // Return the view to edit the attendance record
        return view('kehadiran.edit', compact('kehadiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kehadiran $kehadiran)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiran);
        // Cek izin update
        if ($request->user()->cannot('update', $kehadiran)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'departemen' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'jam_hadir' => 'required|date_format:H:i',
        ]);

        // Update the attendance record
        $kehadiran->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Kehadiran $kehadiran)
    {
        $kehadiran = Kehadiran::findOrFail($kehadiran->id);
        // Cek izin delete
        if ($request->user()->cannot('delete', $kehadiran)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the attendance record
        $kehadiran->delete();

        // Redirect to the index page with a success message
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil dihapus.');
    }
}
