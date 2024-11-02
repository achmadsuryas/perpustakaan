<?php

namespace App\Http\Controllers;

use App\Models\T_buku;
use App\Models\T_anggota;
use App\Models\T_detailbuku;
use App\Models\T_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\T_detailpeminjaman;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateT_peminjamanRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class TPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = T_anggota::all();
        $books = T_buku::all();

        return view('a-rent', [
            'users' => $users,
            'books' => $books,
            'title' => 'Dashboard | Rent'
        ]);
    }

    public function index2()
    {
        $returns = T_detailpeminjaman::with('peminjaman', 'detailbuku')->where('f_tanggalkembali', null)->get();

        $users = T_anggota::all();

        $books = T_buku::all();

        return view('a-return', [
            'returns' => $returns,
            'users' => $users,
            'books' => $books,
            'title' => 'Dashboard | Return'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $jumlahPeminjaman = T_peminjaman::where('f_idanggota', $request->anggota)->count();

        if ($jumlahPeminjaman > 0) {
            return redirect()->back()->with('error', 'Anggota telah meminjam buku sebelumnya.');
        }


        $buku = T_detailbuku::find($request->buku);

        if ($buku->f_status == "Tidak Tersedia") {
            return redirect()->back()->with('error', 'Buku tidak tersedia!');
        }

        $buku->f_stok -= 1;

        if ($buku->f_stok == 0) {
            $buku->f_status = 'Tidak Tersedia';
        }

        $buku->save();

        $peminjaman = new T_peminjaman();
        $peminjaman->f_idadmin = Auth::guard('admin')->user()->f_id;
        $peminjaman->f_idanggota = $request->anggota;
        $peminjaman->f_tanggalpeminjaman = $request->f_tanggalpeminjaman;
        $peminjaman->save();

        $detailPeminjaman = new T_detailpeminjaman();
        $detailPeminjaman->f_idpeminjaman = $peminjaman->f_id;
        $detailPeminjaman->f_iddetailbuku = $request->buku;
        $detailPeminjaman->f_tanggalkembali = null;
        $detailPeminjaman->save();

        return redirect('a-return');
    }



    /**
     * Display the specified resource.
     */
    public function show(T_peminjaman $t_peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(T_peminjaman $t_peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateT_peminjamanRequest $request, T_peminjaman $t_peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy()
    // {
    //     T_detailpeminjaman::whereNotNull('f_tanggalkembali')->delete();

    //     return redirect()->back()->with('success', 'semua data sudah di hapus');
    // }

    public function report()
    {
        //jika ingin menampilkan yang hanya sudah mengembalikan buku
        // where('f_tanggalkembali', '!=', null)
        $returns = T_detailpeminjaman::with('peminjaman', 'detailbuku')->get();

        return view('a-report', [
            'returns' => $returns,
            'title' => 'Dashboard | Report'
        ]);
    }

    public function pdf()
    {
        //jika ingin menampilkan yang hanya sudah mengembalikan buku  
        // where('f_tanggalkembali', '!=', null)

        $pengembalian = T_detailpeminjaman::with('peminjaman', 'detailbuku')->get();

        $pdf = Pdf::loadview('pdf', ['pengembalian' => $pengembalian]);

        return $pdf->download('laporan-peminjaman.pdf');
    }

    public function return($id)
    {
        $detailPeminjaman = T_detailpeminjaman::findOrFail($id);

        if ($detailPeminjaman) {
            $detailPeminjaman->f_tanggalkembali = Carbon::now()->toDateString();
            $detailPeminjaman->save();

            $detailBuku = $detailPeminjaman->detailbuku;

            $detailBuku->f_stok += 1;

            if ($detailBuku->f_stok > 0) {
                $detailBuku->f_status = 'Tersedia';
            }

            $detailBuku->save();

            return redirect()->back()->with('success', 'PEMINJAMAN TELAH SELESAI!');
        } else {
            return redirect()->back()->with('error', 'PEMINJAMAN TIDAK VALID!');
        }
    }

    public function riwayat($id)
    {
        $user = T_anggota::findOrFail($id);

        $riwayats = T_detailpeminjaman::with('peminjaman', 'detailbuku')->get();

        return view('riwayat', [
            'user' => $user,
            'riwayats' => $riwayats,
            'title' => 'Home | Riwayat'
        ]);
    }
}
