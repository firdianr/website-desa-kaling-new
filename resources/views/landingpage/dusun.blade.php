<x-layout>
  <x-slot:title>{{ $title . " " . $dusun->name }}</x-slot:title>
  <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>

  <div class="container mx-auto px-4 py-8 bg-gray-50 rounded-xl shadow-sm border border-gray-100">

    <div class="w-full text-center mb-10">
      <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-2">Dusun {{ $dusun->name }}</h1>
      <div class="h-1 w-24 bg-primary-600 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start mb-16">
      
      <div class="flex flex-col group">
        <div class="overflow-hidden rounded-2xl shadow-lg transition-all duration-300 group-hover:shadow-xl">
          <img class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-105" 
          @if ($dusun->image)
            src="{{ asset($dusun->image ) }}"
          @else
            src="{{ asset('img/lokasi/kaling.jpg') }}" 
          @endif
          alt="Foto Dusun {{ $dusun->name }}">
        </div>
        <p class="mt-4 text-center italic text-gray-500 text-sm font-serif">
          &mdash; {{ $dusun->description ?? 'Gapura Dusun ' . $dusun->name }}
        </p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Informasi Kewilayahan
        </h3>
        <div class="space-y-4">
          <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors border-b border-gray-50">
            <span class="text-gray-600 font-medium">Kepala Dusun</span>
            <span class="text-gray-900 font-bold bg-primary-50 text-primary-700 px-3 py-1 rounded-full text-sm">{{ $dusun->kadus }}</span>
          </div>
          <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors border-b border-gray-50">
            <span class="text-gray-600 font-medium">Jumlah RW</span>
            <span class="text-gray-900 font-bold">{{ $dusun->rw }} Wilayah</span>
          </div>
          <div class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg transition-colors">
            <span class="text-gray-600 font-medium">Jumlah RT</span>
            <span class="text-gray-900 font-bold">{{ $dusun->rt }} Wilayah</span>
          </div>
        </div>
        
        <div class="mt-8 p-4 bg-blue-50 rounded-xl text-sm text-blue-800 leading-relaxed">
            Dusun {{ $dusun->name }} dikelola secara aktif untuk meningkatkan kesejahteraan masyarakat melalui koordinasi {{ $dusun->rt }} RT dan {{ $dusun->rw }} RW.
        </div>
      </div>
    </div>

    <div class="prose prose-lg max-w-none bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center lg:text-left">Sejarah & Latar Belakang</h2>
      <div class="text-gray-700 leading-relaxed text-justify">
        {!! $dusun->latar_belakang !!}
      </div>
    </div>

    <div class="mt-12 border-t pt-12">
      <div class="flex flex-col md:flex-row justify-between items-end mb-8">
          <div>
              <h2 class="text-3xl font-extrabold text-gray-900">Update Terkini</h2>
              <p class="text-gray-500">Berita dan kegiatan terbaru di {{ $dusun->name }}</p>
          </div>
          <a href="/posts" class="text-primary-600 font-semibold hover:underline mt-4 md:mt-0">Lihat semua berita &rarr;</a>
      </div>

      <div id="post-container" class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
          @forelse ($posts->take(3) as $post)
              <article class="flex flex-col h-full bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden post-item">
                  @if ($post->image)
                      <img class="w-full h-52 object-cover" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                  @endif
                  
                  <div class="p-6 flex flex-col flex-grow">
                      <div class="mb-3">
                        <span class="{{ $post->category->color }} text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase">
                            {{ $post->category->name }}
                        </span>
                      </div>
                      
                      <a href="/posts/{{ $post->slug }}" class="hover:text-primary-600">
                          <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">{{ $post->title }}</h2>
                      </a>
                      
                      <p class="text-sm text-gray-400 mb-4">{{ $post->updated_at->format('d M Y') }}</p>
                      
                      <div class="text-gray-600 text-sm line-clamp-3 mb-6">
                        {{ strip_tags(Str::limit($post->body, 150)) }}
                      </div>

                      <div class="mt-auto flex justify-end">
                          <a href="/posts/{{ $post->slug }}" class="text-primary-600 font-bold text-sm inline-flex items-center hover:translate-x-1 transition-transform">
                              Read more
                              <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                          </a>
                      </div>
                  </div>
              </article>
          @empty
              <div class="col-span-full text-center py-12 bg-white rounded-xl border-2 border-dashed">
                <p class="text-gray-400 italic">Belum ada berita terbaru untuk dusun ini.</p>
              </div>
          @endforelse
      </div>

      @if ($posts->count() > 3)
          <div class="text-center mt-12">
              <button id="load-more" class="inline-flex items-center bg-white border-2 border-primary-600 text-primary-600 font-bold py-3 px-8 rounded-full hover:bg-primary-600 hover:text-white transition-all shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7"></path></svg>
                Tampilkan Lebih Banyak
              </button>
          </div>
      @endif
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        let posts = @json($posts->skip(3)->values());
        let postContainer = document.getElementById('post-container');
        let loadMoreButton = document.getElementById('load-more');
        let currentIndex = 0;
        const postsPerLoad = 3;

        if (loadMoreButton) {
            loadMoreButton.addEventListener('click', function () {
                let nextPosts = posts.slice(currentIndex, currentIndex + postsPerLoad);
                nextPosts.forEach(post => {
                    let article = document.createElement('article');
                    article.className = 'flex flex-col h-full bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden';
                    
                    const postImage = post.image ? `<img class="w-full h-52 object-cover" src="{{ asset('') }}${post.image}">` : '';
                    const postDate = new Date(post.updated_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                    const postBody = post.body.replace(/<[^>]*>?/gm, '').substring(0, 150) + '...';

                    article.innerHTML = `
                        ${postImage}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-3">
                                <span class="${post.category.color} text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase">
                                    ${post.category.name}
                                </span>
                            </div>
                            <a href="/posts/${post.slug}" class="hover:text-primary-600">
                                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">${post.title}</h2>
                            </a>
                            <p class="text-sm text-gray-400 mb-4">${postDate}</p>
                            <div class="text-gray-600 text-sm line-clamp-3 mb-6">${postBody}</div>
                            <div class="mt-auto flex justify-end">
                                <a href="/posts/${post.slug}" class="text-primary-600 font-bold text-sm inline-flex items-center hover:translate-x-1 transition-transform">
                                    Read more
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                </a>
                            </div>
                        </div>
                    `;
                    postContainer.appendChild(article);
                });

                currentIndex += postsPerLoad;
                if (currentIndex >= posts.length) loadMoreButton.remove();
            });
        }
    });
  </script>
</x-layout>