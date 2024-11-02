<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="font-cool ">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h6>LAPORAN PERPUSTAKAAN</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Peminjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Kembali
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengembalian as $pengembalian)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pengembalian->peminjaman->anggota->f_nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengembalian->detailbuku->buku->f_judul }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengembalian->peminjaman->admin->f_nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengembalian->peminjaman->f_tanggalpeminjaman }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengembalian->f_tanggalkembali }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>