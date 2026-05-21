<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:dusuns>{{ $dusuns }}</x-slot:dusuns>

  <div class="swiper-container shadow-lg">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="relative w-full h-[500px] overflow-hidden">
                <img src="{{ asset('img/lokasi/slide-1.jpg') }}" alt="Desa Kaling" class="absolute inset-0 w-full h-full object-cover scale-105 hover:scale-100 transition-transform duration-700">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-5xl md:text-6xl font-bold mb-2 drop-shadow-lg">Desa Kaling</h1>
                        <p class="text-xl md:text-2xl font-light tracking-widest uppercase">Kecamatan Tasikmadu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  @foreach ($desas as $desa)
    
  <div class="container mx-auto px-4 lg:px-8 -mt-10 relative z-20 pb-12">
    
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10 mb-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-4">
          <div class="rounded-xl overflow-hidden shadow-md">
            <img class="w-full h-auto object-cover" 
            src="{{ $desa->image ? asset($desa->image) : asset('img/lokasi/kaling.jpg') }}" 
            alt="Kantor Desa Kaling">
          </div>
          <p class="text-center italic text-gray-500 text-sm">
            &mdash; {{ $desa->description ?? 'Kantor Kepala Desa Kaling' }}
          </p>
        </div>

        <div>
          <h2 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-primary-600 pl-4">Profil Wilayah</h2>
          <div class="overflow-hidden border border-gray-100 rounded-xl">
            <table class="w-full text-left">
              <tbody class="divide-y divide-gray-100">
                @php
                  $info = [
                    'Provinsi' => $desa->provinsi,
                    'Kabupaten' => $desa->kabupaten,
                    'Kecamatan' => $desa->kecamatan,
                    'Kode Pos' => $desa->kode_pos,
                  ];
                @endphp
                @foreach($info as $label => $val)
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="py-3 px-4 font-semibold text-gray-600 bg-gray-50 w-1/3">{{ $label }}</td>
                  <td class="py-3 px-4 text-gray-800">{{ $val }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="mt-12 prose prose-lg max-w-none text-justify text-gray-700 leading-relaxed border-t pt-10">
        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Sejarah & Latar Belakang</h3>
        {!! $desa->latar_belakang !!}
      </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-blue-500 text-center">
            <p class="text-gray-500 text-sm uppercase font-bold tracking-wider">Penduduk</p>
            <h4 class="text-3xl font-black text-gray-800 mt-1">{{ number_format($desa->jumlah_penduduk) }}</h4>
            <p class="text-xs text-gray-400 mt-1 uppercase">Jiwa</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-green-500 text-center">
            <p class="text-gray-500 text-sm uppercase font-bold tracking-wider">Luas Wilayah</p>
            <h4 class="text-3xl font-black text-gray-800 mt-1">{{ $desa->luas_wilayah }}</h4>
            <p class="text-xs text-gray-400 mt-1 uppercase">Hektar</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-purple-500 text-center">
            <p class="text-gray-500 text-sm uppercase font-bold tracking-wider">Kepala Keluarga</p>
            <h4 class="text-3xl font-black text-gray-800 mt-1">{{ $desa->jumlah_kk }}</h4>
            <p class="text-xs text-gray-400 mt-1 uppercase">KK</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-yellow-500 text-center">
            <p class="text-gray-500 text-sm uppercase font-bold tracking-wider">Wilayah</p>
            <h4 class="text-3xl font-black text-gray-800 mt-1">{{ $desa->jumlah_rw }} / {{ $desa->jumlah_rt }}</h4>
            <p class="text-xs text-gray-400 mt-1 uppercase">RW / RT</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
        <div class="bg-white p-8 rounded-2xl shadow-lg lg:col-span-1">
            <h3 class="text-xl font-bold mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Batas Wilayah
            </h3>
            <ul class="space-y-4">
                @foreach(['Utara' => $desa->batas_utara, 'Selatan' => $desa->batas_selatan, 'Timur' => $desa->batas_timur, 'Barat' => $desa->batas_barat] as $arah => $batas)
                <li class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase">{{ $arah }}</span>
                    <span class="text-gray-800 font-medium">{{ $batas }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-4 rounded-2xl shadow-lg lg:col-span-2 flex flex-col items-center">
            <img class="w-full h-[350px] object-contain" 
            src="{{ $desa->map ? asset($desa->map) : asset('img/map/peta-kaling-mini.jpg') }}" alt="Peta Desa">
            <span class="mt-4 text-sm font-bold text-primary-600 uppercase tracking-widest">Peta Administrasi Desa Kaling</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h3 class="text-xl font-bold mb-6 border-b pb-4">Distribusi Agama</h3>
            <div class="grid grid-cols-2 gap-4">
                @php
                    $agamas = [
                        'Islam' => $desa->islam,
                        'Katholik' => $desa->katholik,
                        'Protestan' => $desa->protestan,
                        'Hindu' => $desa->hindu,
                        'Budha' => $desa->budha,
                        'Kepercayaan' => $desa->lain_lain,
                    ];
                @endphp
                @foreach($agamas as $nama => $jumlah)
                <div class="flex justify-between items-center p-2 bg-gray-50 rounded-lg">
                    <span class="text-sm text-gray-600">{{ $nama }}</span>
                    <span class="font-bold text-gray-800">{{ $jumlah }}</span>
                </div>
                @endforeach
            </div>

            <h3 class="text-xl font-bold mb-6 mt-10 border-b pb-4">Dusun di Kaling</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($dusuns as $dusun)
                    <span class="bg-primary-100 text-primary-700 px-4 py-2 rounded-full text-sm font-semibold italic">
                        # Dusun {{ $dusun->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl shadow-lg overflow-hidden flex flex-col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15820.854355410722!2d110.91347379061597!3d-7.551673557667785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a19c6369c16d9%3A0x5027a76e356bce0!2sKaling%2C%20Kec.%20Tasikmadu%2C%20Kabupaten%20Karanganyar%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1777101152318!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            class="w-full h-full min-h-[400px] rounded-xl" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <p class="text-center mt-4 font-bold text-gray-400 text-xs uppercase tracking-tighter">Lokasi Desa via Google Maps</p>
        </div>
    </div>

  </div>
  @endforeach

</x-layout>