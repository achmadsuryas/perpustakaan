<?php

namespace App\Http\Controllers;

use App\Models\T_admin;
use App\Models\T_detailpeminjaman;
use App\Models\T_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pustakawans = T_admin::all();

        return view('a-pustakawan', [
            'pustakawans' => $pustakawans,
            'title' => 'Dashboard | Admin - Pustakawan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('c-pustakawan', [
            'title' => 'Dashboard | Admin - Pustakawan'
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
            'f_level' => 'required',
            'f_status' => 'required',
        ]);

        $validated['f_password'] = Hash::make($validated['f_password']);

        $check = T_admin::where('f_nama', $validated['f_nama'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Nama sudah ada.');
        }

        T_admin::create($validated);

        return redirect('a-pustakawan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = T_admin::findOrFail($id);

        return view('e-pustakawan', [
            'petugas' => $petugas,
            'title' => 'Dashboard | Admin - Pustakawan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = T_admin::findOrFail($id);

        $check = T_admin::where('f_nama', $petugas['f_nama'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Nama sudah ada.');
        }

        $petugas->update($request->all());

        return redirect('a-pustakawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adminpustakawan = T_admin::find($id);

        $peminjaman = T_detailpeminjaman::where('f_id', $adminpustakawan->f_id)->whereNull('f_tanggalkembali')->first();

        if ($peminjaman) {
            return redirect()->back()->with('error', 'Admin/Pustakawan sedang bertugas peminjaman.');
        }

        $adminpustakawan->delete();
        
        return redirect()->back();        
    }

    public function editpassword($id){
        $petugas = T_admin::findOrFail($id);

        return view('e-pustakawan-password', [
            'petugas' => $petugas,
            'title' => 'Dashboard | User',
        ]);
    }

    public function updatepassword(Request $request,string $id){
        $user = T_admin::findOrFail($id);

        $validated = $request->validate([
            'f_password' => 'required'
        ]);

        $validated['f_password'] = Hash::make($validated['f_password']);

        $user->update($validated);

        return redirect('a-pustakawan');
    }
}
