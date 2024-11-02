@extends('layouts.sidebar')

@section('container')
<div class="mb-5">
    <a href="{{ route('pdf') }}">
        <button class="bg-red-700 p-3 text-white">
            Download
        </button>
    </a>
</div>
{{-- <div class="mb-5">
    <form action="{{ route('d-report') }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete All</button>
    </form>
</div> --}}
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
                        Tanggal Pengembalian
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
                        <td class="px-6 py-4">
                            {{ $return->f_tanggalkembali }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
