<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Anggota;
use App\Models\T_admin;
use App\Models\T_anggota;
use App\Models\T_buku;
use App\Models\T_detailbuku;
use App\Models\T_detailpeminjaman;
use App\Models\T_kategori;
use App\Models\T_peminjaman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        T_admin::create([
            "f_id" => 1,
            "f_nama" => 'admin',
            "f_username" => 'admin',
            "f_password" => Hash::make('admin'),
            "f_level" => 'Admin',
            "f_status" => 'Aktif',
        ]);


        T_admin::create([
            "f_id" => 2,
            "f_nama" => 'pustakawan',
            "f_username" => 'pustakawan',
            "f_password" => Hash::make('pustakawan'),
            "f_level" => 'Pustakawan',
            "f_status" => 'Aktif',
        ]);
        
        T_anggota::create([
            "f_id" => 1,
            "f_nama" => 'Andi',
            "f_username" => 'Andi',
            "f_password" => Hash::make('rahasia'),
            "f_tempatlahir" => 'Cipinang, Jakarta',
            "f_tanggallahir" => Carbon::createFromFormat('Y-m-d', '2004-02-13'),
        ]);

        T_kategori::create([
            "f_id" => 1,
            "f_kategori" => 'Pendidikan',
        ]);

        T_kategori::create([
            "f_id" => 2,
            "f_kategori" => 'Novel',
        ]);

        T_kategori::create([
            "f_id" => 3,
            "f_kategori" => 'Fiksi',
        ]);

        T_buku::create([
            "f_id" => 1,
            "f_idkategori" => 1,
            "f_judul" => 'Matematika',
            "f_pengarang" => "Aviscenna Venra",
            "f_penerbit" => "Arga Tilanta",
            "f_deskripsi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit illum alias dignissimos cumque eaque tenetur possimus molestias cupiditate, aspernatur excepturi delectus illo obcaecati quibusdam odio quidem cum eveniet deserunt quos."
        ]);

        T_detailbuku::create([
            'f_idbuku' => 1,
            'f_stok' => 3,
            'f_status' => 'Tersedia'
        ]);
    
    }
}
