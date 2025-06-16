@extends('client.layouts.layout')

@section('title', 'About Us - Tasty Food')

@section('pageTitle', 'TENTANG KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/css/about.css') }}">
    <style>
        .content-grid-left {
            display: flex;
            justify-content: center;
            flex-direction: row;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .content-grid-right {
            display: flex;
            justify-content: center;
            flex-direction: row;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .text-content {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .photo-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .photo-grid img {
            border-radius: 20px;
            background-color: rgb(216, 216, 216);
            object-fit: cover;
        }

        @media (max-width: 865px) {
            .text-content {
                text-align: center;
            }

            .content-grid-left,
            .content-grid-right {
                gap: 50px;
            }
        }

        .photo-grid>*:nth-child(n+3) {
            display: none;
        }
    </style>
@endpush

@section('content')
    <main class="">

        <section style="background-color: #f1f1f1; padding-top: 120px; padding-bottom: 120px;">
            <div class="container">

                <div class="content-grid-left">
                    <div class="text-content">
                        <h3 class="section-title">{{ $top->title }}</h3>
                        <div>{!! $top->content !!}</div>
                    </div>

                    <div class="photo-grid">
                        @if (!empty($top->photo_left) && !empty($top->photo_right))
                            <img src="{{ asset('storage/' . $top->photo_left) }}" alt="{{ $top->title }}"
                                style="width: 200px; height: 350px;">
                            <img src="{{ asset('storage/' . $top->photo_right) }}" alt="{{ $top->title }}"
                                style="width: 200px; height: 350px;">
                        @elseif (!empty($top->photo_left))
                            <img src="{{ asset('storage/' . $top->photo_left) }}" alt="{{ $top->title }}"
                                style="width: 500px; height: 300px">
                        @elseif (!empty($top->photo_right))
                            <img src="{{ asset('storage/' . $top->photo_right) }}" alt="{{ $top->title }}"
                                style="width: 500px; height: 300px">
                        @endif

                    </div>
                </div>


            </div>
        </section>

        <section style="background-color: #ffffff; padding-top: 120px; padding-bottom: 120px;">
            <div class="container">

                <div class="content-grid-right">
                    <div class="photo-grid">
                        @if (!empty($middle->photo_left) && !empty($middle->photo_right))
                            <img src="{{ asset('storage/' . $middle->photo_left) }}" alt="{{ $middle->title }}"
                                style="width: 250px; height: 250px;">
                            <img src="{{ asset('storage/' . $middle->photo_right) }}" alt="{{ $middle->title }}"
                                style="width: 250px; height: 250px;">
                        @elseif (!empty($middle->photo_left))
                            <img src="{{ asset('storage/' . $middle->photo_left) }}" alt="{{ $middle->title }}"
                                style="width: 500px; height: 300px">
                        @elseif (!empty($middle->photo_right))
                            <img src="{{ asset('storage/' . $middle->photo_right) }}" alt="{{ $middle->title }}"
                                style="width: 500px; height: 300px">
                        @endif

                    </div>

                    <div class="text-content">
                        <h3 class="section-title">{{ $middle->title }}</h3>
                        <div>{!! $middle->content !!}</div>
                    </div>

                </div>

            </div>
        </section>

        <section style="background-color: #f1f1f1; padding-top: 120px; padding-bottom: 120px;">
            <div class="container">

                <div class="content-grid-left">
                    <div class="text-content">
                        <h3 class="section-title">{{ $bottom->title }}</h3>
                        <div>{!! $bottom->content !!}</div>
                    </div>

                    <div class="photo-grid">
                        @if (!empty($bottom->photo_left) && !empty($bottom->photo_right))
                            <img src="{{ asset('storage/' . $bottom->photo_left) }}" alt="{{ $bottom->title }}"
                                style="width: 300px;">
                            <img src="{{ asset('storage/' . $bottom->photo_right) }}" alt="{{ $bottom->title }}"
                                style="width: 300px;">
                        @elseif (!empty($bottom->photo_left))
                            <img src="{{ asset('storage/' . $bottom->photo_left) }}" alt="{{ $bottom->title }}"
                                style="width:  500px; height: 300px">
                        @elseif (!empty($bottom->photo_right))
                            <img src="{{ asset('storage/' . $bottom->photo_right) }}" alt="{{ $bottom->title }}"
                                style="width: 500px; height: 300px">
                        @endif

                    </div>
                </div>

            </div>
        </section>



    </main>

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

@endsection
