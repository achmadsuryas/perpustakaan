@extends('layouts.sidebar')

@section('container')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Petugas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($returns as $return)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $return->peminjaman->anggota->f_nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $return->detailbuku->buku->f_judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $return->peminjaman->admin->f_nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $return->peminjaman->f_tanggalpeminjaman }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <form action="{{ route('r-return', ['id' => $return->f_id ]) }}" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah user sudah mengembalikan buku?')">
                                    <p class="bg-blue-600 text-white py-1 px-3 font-semibold mr-2">DI KEMBALIKAN</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
