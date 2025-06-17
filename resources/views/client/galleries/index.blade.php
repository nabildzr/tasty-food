@extends('client.layouts.layout')

@section('title', 'Gallery - Tasty Food')

@section('pageTitle', 'GALERI KAMI')

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('client/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/css/galleries.css') }}" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endpush

@section('content')
    <main class="">
        @if ($sliderGalleries && $sliderGalleries->count())
            <div class="container" style="" data-aos="fade-up" data-aos-duration="1600">
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        @foreach ($sliderGalleries as $gallery)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Gallery Image">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons (optional) -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- Pagination (optional) -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new Swiper('.mySwiper', {
                        loop: true,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                });
            </script>
        @endif

        <section style="background-color: #ffffff; padding: 120px 0;">
            <div class="container">

                <div class="gallery-grid">
                    @php
                        $duration = 1200;
                    @endphp
                    @forelse ($galleries as $gallery)
                        <div class="gallery-item" data-aos="fade-up" data-aos-duration="{{ $duration }}">
                            <img src="{{ asset('storage/' . $gallery->photo) }}"
                                alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                onload="this.parentElement.classList.add('loaded')">
                        </div>

                        @php
                            $duration += 500;
                            @endphp
                    @empty
                        <div style="">
                            <p>Belum ada galeri yang tersedia.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>



    </main>

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

@endsection
