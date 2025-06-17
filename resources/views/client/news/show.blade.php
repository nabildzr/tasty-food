@extends('client.layouts.layout')

@section('title', 'News - Tasty Food')

@section('pageTitle', "$news->title")

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/css/news-show.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <style>
        .back-btn {
            display: flex;
            align-items: center;
            color: black;
            text-decoration: none;
            font-size: 16px;
            transition: 300ms;
        }

        .back-btn:hover, iconify-icon:hover {
            text-decoration: underline;
            color: #FF9500;
        }
    </style>
@endpush

{{-- banner --}}
@section('banner', asset('storage/' . $news->banner))


@section('content')
    <main class="">
        {{-- <div class="container">

        </div> --}}

        <section style="background-color: #f1f1f1; padding-top: 120px; padding-bottom: 120px;">
            <div class="container">

                <a href="{{ route('client.news') }}" class="back-btn" style="display: flex; align-items: center; margin-bottom: 20px;" >
                    <iconify-icon icon="fluent:ios-arrow-24-filled" width="20" height="20" style="vertical-align: middle; margin-right: 6px; color:black;"></iconify-icon>
                    Kembali ke Daftar Berita
                </a>

                <h2 class="section-title">{{ $news->title }}</h2>
                    <div class="news-meta">
                        <span class="news-date" data-aos="fade-down" data-aos-duration="2200">{{ $news->created_at->format('d M Y') }}</span>
                        <span class="news-author" data-aos="fade-down" data-aos-duration="1000">Oleh: {{ $news->user->name }}</span>
                    </div>

                    <div class="news-content">
                        {!! $news->content !!}
                    </div>


            </div>
        </section>





    </main>

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

@endsection
