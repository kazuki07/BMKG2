<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    {{-- Navigation --}}
    <nav class="border-b border-gray-500 bg-blue-800 rounded-lg m-1">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between py-2.5">
        <a href="#" class="flex items-center"> 
            <svg class="h-48 w-48" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1024 1024">
                <image xlink:href="{{ asset('images/logo.png') }}" x="0" y="0" height="1024" width="1024"/>
            </svg>
            <ul class="p-1 ml-2"> 
                <li class="font-bold text-white">KEMENTERIAN PERHUBUNGAN REPUBLIK INDONESIA</li>
                <li class="font-bold text-white">DIREKTORAT JENDRAL PERHUBUNGAN LAUT</li>
                <li class="font-bold mt-1 text-white">KANTOR KESYAHBANDRAN DAN</li>
                <li class="font-bold text text-white">OTORITAS PELABUHAN KELAS III SATU I</li>
            </ul>
        </a>
        <div class="flex md:order-2">
            <h1 class="font-semibold text-white">Cuaca</h1> 
        </div>
    </div>
</nav>

    <div class="min-h-screen flex h-[1000px] flex-col overflow-hidden bg-white">
        <div class="max-h-screen flex-grow">
            <div class="grid grid-cols-6">

                {{-- Section Kiri --}}
                <div class="col-span-1 ml-2">
                    <div class="">
                        {{-- Berita --}}
                        <div class="flex h-[100px] items-center justify-center bg-orange-500 rounded-lg mt-2 shadow-md">
                            <h1 class="text-center font-semibold text-white">Berita</h1>
                        </div>
                        {{-- Jam --}}
                        <div class="flex h-24 items-center justify-center bg-white shadow-lg">
                            <h1 class="text-center font-semibold text-white rounded-lg">
                            <div class="clock flex items-center space-x-2 font-semibold">
                                <div class="flex h-16 w-16 items-center justify-center rounded-lg text-black shadow-md font-semibold text-3xl">
                                <span id="hour">00</span>
                                </div>
                                <span class="text-black text-3xl">:</span>
                                <div class="flex h-16 w-16 items-center justify-center rounded-lg  text-3xl text-black shadow-md">
                                 <span id="minute">00</span>
                                </div>
                                  <span class="text-black text-3xl">:</span>
                                <div class="flex h-16 w-16 items-center justify-center rounded-lg  text-3xl text-black shadow-md">
                                <span id="seconds">00</span>
                                </div>
                            </div>
                            </h1>
                     </div>
                    </div>
                </div>

                {{-- Section Tengah --}}
                <div class="col-span-4 h-[800px] mx-2">
                    <div class="grid grid-rows-1">
                        <div class="flex h-[450x] items-center justify-center mt-2">
                            <video class="w-[1850px] h-[720px] rounded-lg" controls>
                                <source src="{{ asset('videos/your-video.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="text-center mt-1 bg-orange-500 h-16 rounded-lg shadow-md">
                            <h1 id="tanggal" class=" h-16 m-5 text-lg text-3x1 font-semibold text-white text-center"></h1>
                        </div>
                    </div>
                </div>

                {{-- Section Kanan --}}
                <div class="">
                    <div class="grid grid-rows-2 mt-2">
                        {{-- Pimpinan --}}
                        <div class="slider-2">
                            <div class="slides-2">
                                <!--slide images start-->
                                <div class="slide-2 rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                <img src="images/4.jpeg" alt="slide 4">
                                </div>
                                <div class="slide-2 rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                <img src="images/5.jpeg" alt="slide 5">
                                </div>
                                <div class="slide-2 rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                <img src="images/6.jpeg" alt="slide 6">
                                </div>
                                <!--slide images end-->
                            </div>
                            @forelse ($pimpinanData as $pimpinan)
                            @empty
                                <div></div>
                            @endforelse
                        </div>

                        {{-- Kegiatan --}}
                        <div class="flex h-72 items-center justify-center">
                            @forelse ($kegiatanData as $kegiatan)   
                            <div class="slider">
                                <div class="slides">
                                    <!--slide images start-->
                                    <div class="slide first rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                    <img src="images/1.jpeg" alt="slide 1">
                                    </div>
                                    <div class="slide rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                    <img src="images/2.jpeg" alt="slide 2">
                                    </div>
                                    <div class="slide rounded-lg mb-2 h-48 w-48" fill="none" viewBox="0 0 1024 1024">
                                    <img src="images/3.jpeg" alt="slide 3">
                                    </div>
                                    <!--slide images end-->
                                 </div>
                            </div>
                            @empty
                                <div></div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Running Text --}}
        <div class="col-span-6 flex h-24 items-center justify-center bg-black mt-1 mx-2 mb-96 rounded-lg shadow-md">
        <div class="bg-light overflow-hidden px-2">
                @forelse ($runningData as $running)
                <p class="animate-runningText whitespace-nowrap font-semibold text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                @empty
                    <p class="animate-runningText whitespace-nowrap font-semibold text-white">Tidak ada text khusus</p>
                @endforelse
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
