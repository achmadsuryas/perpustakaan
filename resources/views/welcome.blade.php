@extends('layouts.main')
@section('container')
    <section class="bg-red-700">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex h-auto lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-2xl text-white sm:text-xl">
                   WEBSITE PERPUSTAKAAN
                    <strong class="text-white text-3xl sm:block">UJIAN SERTIFIKASI KOMPETENSI</strong>
                </h1>
                <a href="https://achmadsurya.my.id/" target="_blank">
                    <h1 class="text-2xl text-white hover:text-blue-700 sm:text-xl">
                        &copy; achmadsurya.my.id
                    </h1>
                </a>
                <br>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-white px-12 py-3 text-lg font-medium text-red-700 sm:w-auto"
                        href="{{ route('listbook') }}">
                        Buku
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
