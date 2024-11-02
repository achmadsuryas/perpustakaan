@extends('layouts.main')

@section('container')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayats as $riwayat)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $riwayat->detailbuku->buku->f_judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $riwayat->peminjaman->f_tanggalpeminjaman }}
                        <td class="px-6 py-4">
                            {{ $riwayat->f_tanggalkembali }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
