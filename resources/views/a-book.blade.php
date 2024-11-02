@extends('layouts.sidebar')

@section('container')
<div class="mb-5">
    <a href="{{ route('cv-book') }}">
        <button class="bg-red-700 p-3 text-white">
            Create Book <i class="fa-solid fa-plus fa-fw"></i>
        </button>
    </a>
</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (session()->has('error'))
        <div id="alert-2"
            class="mt-5 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                <p>{{ session('error') }}</p>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pengarang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penerbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $book->kategori->f_kategori }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $book->f_judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $book->f_pengarang }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $book->f_penerbit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $book->f_deskripsi }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $book->detailbuku->f_stok }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ route('e-book', ['id' => $book->f_id]) }}">
                                <button type="submit">
                                    <p class="bg-blue-600 text-white py-1 px-3 font-semibold mr-2">EDIT</p>
                                </button>
                            </a>
                            <form action="{{ route('d-book', ['id' => $book->f_id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                    <p class="bg-red-600 text-white py-1 px-3 font-semibold">DELETE</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection