<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Tastyfood</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('client/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/footer.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
</head>

<body class="font-sans antialiased ">

    <x-client-sidebar />




    <header class=" bg-gray-100">
        <img src="{{ asset('client\assets\img\img-4.png') }}" class="" alt="">
        <nav class="flex nav w-full items-center
            mx-5 ">
            <a href="/" class="inline-block title">
                TASTY FOOD
            </a>
            <ul class="flex ">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">HOME</a></li>
                <li><a href="{{ route('client.about-us') }}" class="">TENTANG</a></li>
                <li><a href="{{ route('client.news') }}" class="">BERITA</a></li>
                <li><a href="{{ route('client.galleries') }}" class="">GALERI</a></li>
                <li><a href="{{ route('client.contact') }}" class="">KONTAK</a></li>
            </ul>
            <button id="hamburgerBtn" class="ml-auto p-2 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none"
                aria-label="Open Sidebar">
                <iconify-icon icon="mdi:menu" width="30" height="30" style="color:black;"></iconify-icon>
            </button>
        </nav>
        <div class="hero">
            <hr class="divider">

            <h1 class="">
                HEALTHY
                <span>
                    TASTY FOOD
                </span>
            </h1>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel aliquam animi tempora porro placeat.
                Molestias sint vitae obcaecati quidem, alias incidunt quis impedit adipisci, beatae assumenda ea
                inventore, illum accusamus aut! Eaque sapiente tempora est velit, sint sunt dolor similique vero
                doloremque pariatur sit dolore ipsa eius consequatur, harum esse.</p>

            <a href="{{ route('client.about-us') }}" style="cursor: pointer">
                <button class="btn-hero">TENTANG KAMI</button>
            </a>
        </div>
    </header>
    <main>
        <section class="about-section">
            <h3 class="section-title">TENTANG KAMI</h3>
            <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro assumenda
                tempora labore necessitatibus
                sequi et consequuntur ab debitis. Consectetur dolorem ducimus possimus sunt minima nemo omnis nesciunt
                iure. Debitis, aspernatur!</p>
            <hr class="divider">
        </section>
        <section class="menu-section section">
            <div class="container">
                <div class="menu-item">
                    <div class="menu-img-wrapper">
                        <img src="{{ asset('client/assets/img/img-1.png') }}" alt="Food 1">
                    </div>
                    <div class="menu-card">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                            commodo,</p>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-img-wrapper">
                        <img src="{{ asset('client/assets/img/img-2.png') }}" alt="Food 2">
                    </div>
                    <div class="menu-card">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                            commodo,</p>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-img-wrapper">
                        <img src="{{ asset('client/assets/img/img-3.png') }}" alt="Food 3">
                    </div>
                    <div class="menu-card">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                            commodo,</p>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-img-wrapper">
                        <img src="{{ asset('client/assets/img/img-4.png') }}" alt="Food 4">
                    </div>
                    <div class="menu-card">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                            commodo,</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-section section">
            <h3 class="section-title">BERITA KAMI</h3>

            <div class="news-grid container" style="{{ $news->count() > 0 ? 'display: grid;' : 'display: flex; justify-content: center; align-items: center;' }}">
                @if (isset($newlyNews) && $newlyNews)
                    <article class="featured-article">
                        <img style="border-top-left-radius: 10px; border-top-right-radius: 10px;"
                            src="{{ $newlyNews->banner ? asset('storage/' . $newlyNews->banner) : 'https://via.placeholder.com/800x600?text=No+Image' }}"
                            alt="{{ $newlyNews->title ?? 'Featured Food' }}" class="featured-image">
                        <div class="featured-content">
                            <h2 class="featured-title">{{ $newlyNews->title }}</h2>
                            <div class="featured-description">{!! Str::limit($newlyNews->content, 250) !!}</div>
                            <div class="article-footer">
                                <a href="" class="read-more">Baca
                                    selengkapnya</a>
                                <span class="more-options">•••</span>
                            </div>
                        </div>
                    </article>
                @endif


                @if ($news->count() > 0)
                    <div class="small-articles">
                        @forelse ($news as $item)
                            <article class="small-article">
                                <img src="{{ $item->banner ? asset('storage/' . $item->banner) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                                    alt="{{ $item->title ?? 'Food Article' }}" class="small-image">
                                <div class="small-content">
                                    <h3 class="small-title">{{ $item->title }}</h3>
                                    <div class="small-description">{!! Str::limit($item->content, 100) !!}</div>
                                    <div class="small-footer">
                                        <a href="" class="small-read-more">Baca
                                            selengkapnya</a>
                                        <span class="more-options">•••</span>
                                    </div>
                                </div>
                            </article>
                        @empty
                            @if (isset($newlyNews) && $newlyNews)
                                <p class="text-center text-gray-500"
                                    style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                    Belum
                                    ada berita lagi..</p>
                            @endif
                        @endforelse

                    </div>
                @endif
                <div
                    style="{{ $news->count() > 0 ? 'display: none;' : 'display: flex; justify-content: center; align-items: center;' }}">
                    <p class="text-center text-gray-500"
                        style="display: flex; justify-content: center; align-items: center; height: 100%;">
                        Belum
                        ada
                        berita.</p>
                </div>

            </div>

            <a href="{{ route('client.galleries') }}"
                style="margin-top: 40px; display: flex; justify-content: center;">
                <button class="btn-primary">LIHAT LEBIH BANYAK</button>
            </a>

        </section>


        <section>
            <h1 class="gallery-title">GALERI KAMI</h1>
            <div class="container">

                <div class="gallery-grid"
                    style="{{ $galleries->count() > 0 ? 'display: grid;' : 'display: flex; justify-content: center; align-items: center;' }}">
                    @forelse ($galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ asset('storage/' . $gallery->photo) }}"
                                alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                onload="this.parentElement.classList.add('loaded')">
                        </div>
                    @empty

                        <p class="text-center text-gray-500"
                            style="display: flex; justify-content: center; align-items: center; height: 100%;">
                            Belum
                            ada
                            Galeri.</p>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('client.galleries') }}">
                <button class="btn-primary">LIHAT LEBIH BANYAK</button>
            </a>

        </section>
    </main>

    <x-client-footer />

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

</body>

</html>
