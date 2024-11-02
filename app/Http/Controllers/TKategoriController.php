<?php

namespace App\Http\Controllers;

use App\Models\T_buku;
use App\Models\T_kategori;
use App\Models\T_detailbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreT_kategoriRequest;
use App\Http\Requests\UpdateT_kategoriRequest;

class TKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = T_kategori::all();

        return view('a-categories', [
            'categories' => $categories,
            'title' => 'Dashboard | Categories'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('c-category', [
            'title' => 'Dashboard | Categories'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'f_kategori' => 'required'
        ]);

        $check = T_kategori::where('f_kategori', $validated['f_kategori'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Kategori sudah ada.');
        }

        T_kategori::create($validated);

        return redirect('a-categories');
    }



    /**
     * Display the specified resource.
     */
    public function show(T_kategori $t_kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = T_kategori::findOrFail($id);

        return view('e-category', [
            'category' => $category,
            'title' => 'Dashboard | Categories'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $category = T_kategori::findOrFail($id);

        $check = T_kategori::where('f_kategori', $category['f_kategori'])->exists();
        if ($check) {
            return redirect()->back()->with('error', 'Kategori sudah ada.');
        }

        $category->update($request->all());

        return redirect('a-categories');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = T_kategori::find($id);

            if ($category->buku()->exists()) {
                return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh buku.');
            }

            $category->delete();

            return redirect('a-categories')->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
