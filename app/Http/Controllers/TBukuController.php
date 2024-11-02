<?php

namespace App\Http\Controllers;

use App\Models\T_buku;

use App\Models\T_detailbuku;
use App\Models\T_detailpeminjaman;
use App\Models\T_kategori;
use Illuminate\Http\Request;

class TBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = T_buku::all();

        return view('a-book', [
            'books' => $books,
            'title' => 'Dashboard | Book'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = T_kategori::all();

        return view('c-book', [
            'book' => $book,
            'title' => 'Dashboard | Book'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'f_judul' => 'required|unique:t_bukus,f_judul',
            'f_pengarang' => 'required',
            'f_penerbit' => 'required',
            'f_deskripsi' => 'required',
            'f_idkategori' => 'required',
            'f_stok' => 'required|integer|min:0',
            'f_status' => 'required'
        ]);

        // If stok is 0, set f_status to 'Tidak Tersedia'
        if ($validatedData['f_stok'] == 0) {
            $validatedData['f_status'] = 'Tidak Tersedia';
        }

        // Create T_buku entry
        $buku = T_buku::create($validatedData);

        // Create T_detailbuku entry
        $status = new T_detailbuku();
        $status->f_idbuku = $buku->f_id;
        $status->f_status = $validatedData['f_status'];
        $status->f_stok = $validatedData['f_stok'];
        $status->save();

        return redirect()->back()->with('Success', 'Berhasil Menambahkan buku');
    }
    /**
     * Display the specified resource.
     */
    public function show(T_buku $t_buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = T_buku::findOrFail($id);

        $categories = T_kategori::all();

        return view('e-book', [
            'book' => $book,
            'categories' => $categories,
            'title' => 'Dashboard | Book'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $f_id)
    {
        $buku = T_buku::findOrFail($f_id);

        $request->validate([
            'f_judul' => 'required|unique:t_bukus,f_judul,' . $f_id . ',f_id',
            'f_idkategori' => 'required',
            'f_pengarang' => 'required',
            'f_penerbit' => 'required',
            'f_deskripsi' => 'required',
            'f_status' => 'required|in:Tersedia,Tidak Tersedia',
            'f_stok' => 'required|integer|min:0',
        ]);

        $buku->update([
            'f_judul' => $request->f_judul,
            'f_idkategori' => $request->f_idkategori,
            'f_pengarang' => $request->f_pengarang,
            'f_penerbit' => $request->f_penerbit,
            'f_deskripsi' => $request->f_deskripsi,
        ]);

        $detailBuku = T_detailbuku::where('f_idbuku', $f_id)->first();

        if (!$detailBuku) {
            $detailBuku = new T_detailbuku();
            $detailBuku->f_idbuku = $f_id;
        }

        $detailBuku->f_status = $request->f_status;
        $detailBuku->f_stok = $request->f_stok;
        $detailBuku->save();

        return redirect('a-book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($f_id)
    {

        $buku = T_buku::where('f_id', $f_id)->first();
        $detailBuku = T_detailBuku::where('f_idbuku', $buku->f_id)->first();

        $peminjaman = T_detailpeminjaman::where('f_iddetailbuku', $detailBuku->f_id)->whereNull('f_tanggalkembali')->first();
        if ($peminjaman) {
            return redirect()->back()->with('error', 'Buku sedang dipinjam');
        }

        $buku->delete();
        return redirect()->back()->with('delete', 'Buku Berhasil Dihapus');
    }
}
