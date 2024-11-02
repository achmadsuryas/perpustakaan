@extends('layouts.main')

@section('container')
    <div class="flex flex-wrap justify-center ">
        @foreach ($books as $book)
            <div class="p-4 max-w-sm">
                <div class="flex rounded-lg h-full bg-red-700 p-8 flex-col">
                    <div class="flex items-center mb-3">
                        {{-- <div
                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-white text-red-700 flex-shrink-0">
                            <i class="fa-solid fa-book fa-fw"></i>
                        </div> --}}
                        <h2 class="text-white dark:text-white text-lg font-medium">{{ $book->f_judul }}</h2>
                    </div>
                    <p class="text-white dark:text-white font-medium">Pengarang: {{ $book->f_pengarang }}</p>
                    <p class="text-white dark:text-white font-medium">Penerbit: {{ $book->f_penerbit }}</p>
                    <br>
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="leading-relaxed text-base text-white dark:text-gray-300">
                          {{ $book->f_deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
