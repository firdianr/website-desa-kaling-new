<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>
    
    <section class="bg-gray-100 min-h-screen rounded-xl dark:bg-gray-900 transition-colors duration-300">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-12 lg:px-6">
            
            <div class="mb-6">
                <a href="/lembagas" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-800 transition-colors group">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Lembaga
                </a>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col md:flex-row">
                    
                    <div class="w-full md:w-1/3 lg:w-1/4 bg-gray-50 flex items-center justify-center p-8 border-b md:border-b-0 md:border-r border-gray-100 dark:bg-gray-700 dark:border-gray-600">
                        <img class="w-48 md:w-full h-auto object-contain rounded-lg drop-shadow-md"
                        @if ($lembaga->image)
                            src="{{ asset($lembaga->image) }}"
                        @else
                            src="{{ asset('img/logo/karanganyar.png') }}"
                        @endif
                            alt="{{ $lembaga->name }}">
                    </div>

                    <div class="p-8 md:p-12 w-full md:w-2/3 lg:w-3/4">
                        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-6 border-b pb-4 border-gray-100 dark:border-gray-700">
                            {{ $lembaga->name }}
                        </h1>
                
                        <div class="prose prose-lg max-w-none text-gray-700 dark:text-gray-300 leading-relaxed" 
                             style="text-align: justify; text-justify: inter-word;">
                            {!! $lembaga->description !!}
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-50 dark:border-gray-700 flex items-center text-sm text-gray-500 italic">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Informasi ini merupakan data resmi Lembaga Kemasyarakatan Desa.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layout>