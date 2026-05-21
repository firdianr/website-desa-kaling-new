<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>

  <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased rounded-lg shadow-sm border border-gray-100">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          
          <header class="mb-6 lg:mb-8 not-format">
            <a href="{{ url()->previous() }}" class="inline-flex items-center font-medium text-blue-600 hover:underline mb-6">
              <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
              Kembali
            </a>

            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:text-5xl dark:text-white">
              {{ $post->title }}
            </h1>

            <div class="flex flex-wrap items-center justify-between gap-4 py-4 border-y border-gray-100 dark:border-gray-800 my-8">
              <div class="flex items-center space-x-3">
                <div class="flex flex-col">
                  <span class="text-gray-900 dark:text-white font-bold text-lg">Penulis: {{ $post->writer }}</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $post->updated_at->format('d M Y') }} • {{ $post->updated_at->diffForHumans() }}
                  </span>
                </div>
              </div>
              
              <a href="/posts?category={{ $post->category->slug }}">
                <span class="{{ $post->category->color }} text-primary-800 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full hover:opacity-80 transition-opacity">
                  {{ $post->category->name }}
                </span>
              </a>
            </div>
          </header>

          @if ($post->image)
          <figure class="mb-10">
            <div class="flex flex-col items-center">
              <img class="w-full md:w-3/4 rounded-xl shadow-lg block object-cover" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
              <figcaption class="mt-3 text-center italic font-serif text-sm text-gray-500 leading-none">
                Gambar : {{ $post->image_description }}
              </figcaption>
            </div>
          </figure>
          @endif

          <div class="content-body text-gray-800 dark:text-gray-300 leading-relaxed text-lg" style="text-align: justify; text-justify: inter-word;">
            {!! $post->body !!}
          </div>

          <div class="mt-12 pt-6 border-t border-gray-100 dark:border-gray-800">
            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 italic uppercase tracking-widest">
              Editor: {{ $post->editor }}
            </p>
          </div>

      </article>
    </div>
  </main>
</x-layout>