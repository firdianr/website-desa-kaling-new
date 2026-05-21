<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>
  
  <div class="container mx-auto px-4 py-8 bg-gray-50 rounded-xl shadow-inner">
  
    <div class="mb-8">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <form action="/posts" method="GET">
              @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
              @endif
              @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
              @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0 shadow-sm">
                    <div class="relative w-full">
                        <label for="search" class="hidden">Search</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                          </svg>                        
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 transition-all" placeholder="Cari artikel menarik..." type="search" id="search" name="search" autocomplete="off" value="{{ request('search') }}">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-700 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 transition-colors">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="flex flex-wrap items-center gap-2 mb-8 p-4 bg-white rounded-lg shadow-sm">
      <span class="text-sm font-bold text-gray-600 uppercase tracking-wider mr-2">Kategori:</span>
      <a href="/posts" class="px-3 py-1 text-sm font-medium rounded-full {{ !request('category') ? 'bg-primary-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-all">
          Semua Artikel
      </a>
      @foreach ($categories as $category)
      <a href="/posts?category={{ $category->slug }}{{ request('search') ? '&search='.request('search') : '' }}" 
         class="px-3 py-1 text-sm font-medium rounded-full transition-all {{ request('category') == $category->slug ? 'bg-primary-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
          {{ $category->name }}
      </a>
      @endforeach
    </div>

    <div class="mb-6">
        {{ $posts->links() }}
    </div>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
          <article class="flex flex-col h-full bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group">
            
              <div class="relative overflow-hidden">
                  @if ($post->image)
                      <img class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                  @else
                      <div class="w-full h-52 bg-gray-200 flex items-center justify-center">
                          <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                      </div>
                  @endif
                  <div class="absolute top-4 left-4">
                      <span class="{{ $post->category->color }} text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                          {{ $post->category->name }}
                      </span>
                  </div>
              </div>

              <div class="p-6 flex flex-col flex-grow">
                  <div class="flex items-center text-xs text-gray-400 mb-3">
                      <span>{{ $post->updated_at->format('d M Y') }}</span>
                      <span class="mx-2">•</span>
                      <span>{{ $post->updated_at->diffForHumans() }}</span>
                  </div>

                  <a href="/posts/{{ $post->slug }}" class="group-hover:text-primary-700 transition-colors">
                    <h2 class="mb-3 text-xl font-bold leading-tight text-gray-900">{{ $post->title }}</h2>
                  </a>

                  <div class="text-gray-600 text-sm mb-6 line-clamp-3">
                    {{ Str::limit(strip_tags($post->body), 130) }}
                  </div>

                  <div class="mt-auto pt-4 border-t border-gray-50 flex justify-end">
                    <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-semibold text-primary-600 hover:text-primary-800 transition-colors text-sm">
                      Baca Selengkapnya
                      <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                  </div>
              </div>
          </article> 

        @empty
          <div class="col-span-full py-12 text-center bg-white rounded-xl border-2 border-dashed border-gray-200">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">Artikel tidak ditemukan</h3>
            <p class="mt-1 text-sm text-gray-500">Coba gunakan kata kunci lain atau reset filter.</p>
            <div class="mt-6">
              <a href="/posts" class="text-primary-600 font-bold hover:underline">« Kembali ke semua postingan</a>
            </div>
          </div>
        @endforelse
    </div> 
    
    <div class="mt-10">
        {{ $posts->links() }}
    </div>

  </div>
</x-layout>