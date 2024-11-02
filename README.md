
# PERPUSTAKAAN
Ini adalah repositori untuk proyek Perpustakaan [Achmad Surya](https://achmadsurya.my.id). Website ini dibuat sebagai bagian dari ujian sertifikasi kompetensi dengan fokus pada fitur-fitur yang memudahkan admin dalam mengelola peminjaman buku oleh siswa.

# Get Started

**1.Unduh & Ekstrak File:** 

Unduh file ZIP dari repositori ini, lalu ekstrak di direktori yang diinginkan.

**2.Install Dependencies:**

Buka terminal di direktori proyek dan jalankan perintah berikut:

```bash
    composer install
```

**3.Migrasi & Seeder:**

Jalankan migrasi dan seeder untuk membuat dan mengisi tabel database dengan data awal:

```bash
    php artisan migrate --seed
```

**4.Kompilasi Tailwind:**

Untuk menyiapkan styling dengan Tailwind CSS, jalankan (Satu per satu):

```bash
    npm install
    npm run dev
```

**5.Jalankan Server Lokal:**

Setelah semua langkah di atas selesai, mulai server lokal dengan:

```bash
    php artisan serve
```

**6.Buka aplikasi di browser dengan mengunjungi**

http://localhost:8000.

# Fitur Utama
**Manajemen Peminjaman:** Admin dapat menginput data peminjaman yang dilakukan oleh siswa, termasuk detail buku, tanggal peminjaman, dan tanggal pengembalian.

**Dashboard Admin:** Admin dapat mengakses informasi terkait daftar buku, peminjaman aktif, dan riwayat peminjaman.

**Pencarian Buku:** Memudahkan admin dalam mencari informasi buku berdasarkan judul, pengarang, atau kategori.

# Teknologi
Website ini dibangun menggunakan:

- **PHP 8.1**

- **Laravel**

- **Tailwind**

- **MySQL**

## [achmadsurya.my.id](https://achmadsurya.my.id)






