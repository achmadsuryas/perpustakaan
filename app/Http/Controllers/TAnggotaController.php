<?php

namespace App\Http\Controllers;

use App\Models\T_anggota;
use App\Models\T_detailpeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = T_anggota::all();

        return view('a-user', [
            'users' => $users,
            'title' => 'Dashboard | User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('c-user', [
            'title' => 'Dashboard | User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'f_nama' => 'required',
            'f_username' => 'required',
            'f_password' => 'required',
            'f_tempatlahir' => 'required',
            'f_tanggallahir' => 'required',
        ]);

        $validated['f_password'] = Hash::make($validated['f_password']);

        $check = T_anggota::where('f_nama', $validated['f_nama'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Nama sudah ada.');
        }

        T_anggota::create($validated);

        return redirect('a-user');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = T_anggota::findOrFail($id);

        return view('e-user', [
            'user' => $user,
            'title' => 'Dashboard | User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = T_anggota::findOrFail($id);

        $check = T_anggota::where('f_nama', $user['f_nama'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Nama sudah ada.');
        }

        $user->update($request->all());

        return redirect('a-user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = T_anggota::find($id);

        $peminjaman = T_detailpeminjaman::where('f_id', $user->f_id)->whereNull('f_tanggalkembali')->first(); 
                
        // dd($peminjaman);

        if ($peminjaman) {
            return redirect()->back()->with('error', 'Anggota sedang melakukan peminjaman dan tidak dapat dihapus.');
        }
        
        $user->delete();
        
        return redirect('a-user');
        
    }

    public function editpassword($id)
    {
        $user = T_anggota::findOrFail($id);

        return view('e-user-password', [
            'user' => $user,
            'title' => 'Dashboard | User',
        ]);
    }

    public function updatepassword(Request $request, string $id)
    {
        $user = T_anggota::findOrFail($id);

        $validated = $request->validate([
            'f_password' => 'required'
        ]);

        $validated['f_password'] = Hash::make($validated['f_password']);

        $user->update($validated);

        return redirect('a-user');
    }
}
