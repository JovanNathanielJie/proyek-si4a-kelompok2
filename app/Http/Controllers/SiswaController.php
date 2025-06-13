<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all students using Eloquent
        $siswa = Siswa::all(); // SQL: SELECT * FROM siswa
        // dd($siswa); // Uncomment this line to debug and see the data structure
        // Return the view with the list of students
        return view('siswa.index')->with('siswa', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all schools to populate the dropdown in the form
        $sekolah = Sekolah::all(); // SQL: SELECT * FROM sekolah
        // Return the view to create a new student with the list of schools
        return view('siswa.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek izin create
        if ($request->user()->cannot('create', Siswa::class)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_siswa' => 'required|string|max:100',
            'no_telepon_siswa' => 'required|string|max:15',
            'no_telepon_orang_tua' => 'nullable|string|max:15',
            'bulan_tahun_ajaran' => 'required|string|max:7',
            'sekolah_id' => 'required|exists:sekolah,id',
        ]);

        // Create a new student record
        Siswa::create($input);

        // Redirect to the index page with a success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        // Return the view to show the student details
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        // Retrieve all schools to populate the dropdown in the edit form
        $sekolah = Sekolah::all(); // SQL: SELECT * FROM sekolah
        // Return the view to edit the student details with the list of schools
        return view('siswa.edit', compact('siswa', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa = Siswa::FindOrFail($siswa);
        // Cek izin update
        if ($request->user()->cannot('update', $siswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the request data
        $input = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_siswa' => 'required|string|max:100',
            'no_telepon_siswa' => 'required|string|max:15',
            'no_telepon_orang_tua' => 'nullable|string|max:15',
            'bulan_tahun_ajaran' => 'required|string|max:7',
            'sekolah_id' => 'required|exists:sekolah,id',
        ]);

        // Update the student record
        $siswa->update($input);

        // Redirect to the index page with a success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Siswa $siswa)
    {
        $siswa = Siswa::findOrFail($siswa->id); // Find the student by ID or fail
        // Cek izin delete
        if ($request->user()->cannot('delete', $siswa)) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the student record
        $siswa->delete();

        // Redirect to the index page with a success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
