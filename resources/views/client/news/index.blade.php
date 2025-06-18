@extends('client.layouts.layout')

@section('title', 'News - Tasty Food')

@section('pageTitle', 'BERITA KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/css/news.css') }}">
@endpush

@section('content')
    <main class="">

        @if ($newlyNews)
            <section style="background-color: #f1f1f1; padding-top: 120px; padding-bottom: 10px;">
                <div class="container">

                    <div class="featured-news" >
                        <img src="{{ isset($newlyNews->banner) ? asset('storage/' . $newlyNews->banner) : 'https://i.pinimg.com/736x/e7/f6/e8/e7f6e8474d5c9329f95967f3bf610d85.jpg' }}"
                            alt="{{ $newlyNews->title ?? 'Food Article' }}"
                            data-aos="fade-up" data-aos-duration="1400"
                            >

                        <div class="featured-description">
                            <h2 class="section-title" data-aos="fade-up" data-aos-duration="1600">{{ $newlyNews->title ?? 'Food Article' }}</h2>
                            <div data-aos="fade-up" data-aos-duration="1600">
                                {!! $newlyNews->summary !!}
                            </div>
                            <a href="{{ route('client.news.show', $newlyNews->slug) }}" data-aos="fade-up" data-aos-duration="1800">
                                <button class="btn-primary">BACA SELENGKAPNYA</button>
                            </a>
                        </div>
                    </div>


                    {{-- <div class="featured-news">
                    <img src="{{ asset('client/assets/img/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}"
                    alt="Apa saja makanan Khas NUSANTARA?">

                    <div class="featured-description">
                        <h2 class="section-title">APA SAJA MAKANAN KHAS NUSANTARA?</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis aspernatur quas rerum illum,
                            sunt soluta cumque ducimus alias? Corrupti temporibus ducimus sed veritatis atque eveniet quo,
                            placeat sequi labore alias!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi repudiandae explicabo culpa.
                            A atque, rerum doloremque eaque temporibus maxime tenetur mollitia eum molestiae nulla, facere
                            alias laborum perferendis, nisi repellat adipisci neque optio. Delectus, dicta?</p>
                            <a href="">
                                <button class="btn-primary">BACA SELENGKAPNYA</button>
                            </a>
                        </div>
                    </div> --}}



                </div>
            </section>
        @endif

        <section style="background-color: #ffffff; padding-top: 120px; padding-bottom: 120px;">
            <div class="container">

                <div class="all-news">
                    <h2 class="section-title">BERITA LAINNYA</h2>


                    <div class="news-grid">
                        <div class="small-articles">
                            @php
                                $duration = 1000;
                            @endphp
                            @forelse($news as $item)
                                <article class="small-article" data-aos="fade-up" data-aos-duration="{{ $duration }}">
                                    <img src="{{ $item->banner ? asset('storage/' . $item->banner) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                                        alt="{{ $item->title ?? 'Food Article' }}" class="small-image">
                                    <div class="small-content">
                                        <h3 class="small-title">{{ $item->title }}</h3>
                                        <div class="small-description">{!! $item->summary !!}</div>
                                        <div class="small-footer">
                                            <a href="{{ route('client.news.show', $item->slug) }}"
                                                class="small-read-more">Baca
                                                selengkapnya</a>
                                            <span class="more-options">•••</span>
                                        </div>
                                    </div>
                                </article>

                                @php
                                    $duration += 500; 
                                @endphp
                            @empty
                                <p>Tidak ada berita tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>



            </div>
        </section>



    </main>

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

@endsection
