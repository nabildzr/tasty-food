@extends('client.layouts.layout')

@section('title', 'Contact - Tasty Food')

@section('pageTitle', 'KONTAK KAMI')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/css/contact.css') }}">
@endpush

@section('content')
    <main class="">
        {{-- <div class="container">

        </div> --}}

        <section style="background-color: #ffffff; padding-top: 120px; padding-bottom: 10px;">
            <div class="container">
                <a href="#" class="contact-title" style="" data-aos="fade-up" data-aos-duration="2000">
                    KONTAK KAMI
                </a>

                @if(session('success'))
                    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 15px; margin-bottom: 20px;">
                    {{ session('success') }}
                    </div>
                @endif

                <form id="contactForm" action="{{ route('client.contact.store') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="left-column" style="">
                            <div class="form-group" style="" data-aos="fade-up" data-aos-duration="1000">
                                <input type="text" id="subject" name="subject" placeholder="Subject" required
                                    style="height: 100%;">
                            </div>

                            <div class="form-group" style="" data-aos="fade-up" data-aos-duration="1200">
                                <input type="text" id="name" name="name" placeholder="Name" required
                                    style="height: 100%;">
                            </div>

                            <div class="form-group" style="" data-aos="fade-up" data-aos-duration="1400">
                                <input type="email" id="email" name="email" placeholder="Email" required
                                    style="height: 100%;">
                            </div>
                        </div>

                        <div class="message-column" style="" data-aos="fade-up" data-aos-duration="1600"> 
                            <div class="form-group" style="">
                                <textarea name="message" placeholder="Message" required style=""></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" data-aos="fade-up" data-aos-duration="1800">Kirim</button>
                </form>

            </div>


        </section>

        <section style="background-color: #ffffff">
            <div class="container">
                <div class="contact-info">
                    <div class="info-item" data-aos="fade-up" data-aos-duration="1000">
                        <iconify-icon class="icon" icon="mdi:email" width="40" height="40"></iconify-icon>
                        <span class="item-label">EMAIL</span>
                        <span>{{ $businessInformation->email }}</span>
                    </div>
                    <div class="info-item" data-aos="fade-up" data-aos-duration="1200">
                        <iconify-icon class="icon" icon="mdi:phone" width="40" height="40"></iconify-icon>
                        <span class="item-label">PHONE</span>
                        <span>{{ $businessInformation->phone }}</span>
                    </div>
                    <div class="info-item" data-aos="fade-up" data-aos-duration="1400">
                        <iconify-icon class="icon" icon="mdi:map-marker" width="40" height="40"></iconify-icon>
                        <span class="item-label">LOCATION</span>
                        <span>{{ $businessInformation->location }}</span>
                    </div>
                </div>

        </section>

        <section>
            <div class="container">
                <div class="map-container" data-aos="fade-up" data-aos-duration="2000">
                    <iframe
                        src="https://www.google.com/maps?q={{ $businessInformation->latitude }},{{ $businessInformation->longitude }}&hl=es;z=14&output=embed"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>



    </main>

    <script src="{{ asset('client/js/sidebar.js') }}"></script>

@endsection
