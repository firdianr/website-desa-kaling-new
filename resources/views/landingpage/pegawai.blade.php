<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>

    <section class="bg-gray-100 rounded-xl dark:bg-gray-900 p-4 sm:p-8">
        <div class="mx-auto max-w-screen-xl">

            <div class="flex flex-col md:flex-row items-center bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 mb-8 border border-gray-200 dark:border-gray-700">
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-8">
                    <img class="w-24 h-auto drop-shadow-md" src="{{ asset('img/logo/karanganyar.png') }}" alt="Logo Karanganyar">
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white leading-tight">Pemerintah Desa Kaling</h2>
                    <p class="mt-2 text-lg font-light text-gray-500 dark:text-gray-400">Daftar informasi pegawai dan perangkat desa Kaling</p>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-2">
                @foreach ($pegawais as $pegawai)
                <div class="flex flex-col sm:flex-row items-center bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    
                    <div class="w-full sm:w-48 h-64 sm:h-auto bg-gray-50 dark:bg-gray-700 flex-shrink-0">
                        <img class="w-full h-full object-cover object-top"
                        @if ($pegawai->image)
                            src="{{ asset($pegawai->image) }}"
                        @else
                            src="{{ asset('img/logo/karanganyar.png') }}" 
                        @endif
                         alt="{{ $pegawai->nama }}">
                    </div>

                    <div class="p-6 md:p-8 flex flex-col justify-center text-center sm:text-left w-full">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-semibold tracking-wider text-primary-700 uppercase bg-primary-50 rounded-full dark:bg-primary-900 dark:text-primary-300 w-fit mx-auto sm:mx-0">
                            {{ $pegawai->jabatan }}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white leading-snug">
                            {{ $pegawai->nama }}
                        </h3>
                        <div class="mt-4 flex items-center justify-center sm:justify-start text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Perangkat Desa
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
</x-layout>