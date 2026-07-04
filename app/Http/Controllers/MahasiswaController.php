<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $mahasiswa = Mahasiswa::when($keyword, function ($query) use ($keyword) {
            $query->where('npm', 'like', "%{$keyword}%")
                  ->orWhere('nama', 'like', "%{$keyword}%")
                  ->orWhere('jurusan', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|max:15',
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'email' => 'required|email|unique:mahasiswa_unbin,email',
        ]);

        Mahasiswa::create($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'npm' => 'required|max:15',
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'email' => 'required|email|unique:mahasiswa_unbin,email,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}