

<x-client-sidebar />


 <header
     style=" background-color: #f3f4f6; background-image: url('{{ $banner }}'); background-size: cover;
    @if($banner)
        position: relative;
        /* Overlay to darken the banner */
        box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.3);
    @endif
    background-position: center;
    background-repeat: no-repeat;">
     <div class="container">
         <nav class=" nav  ">
             <a href="/" class="inline-block title">
                 TASTY FOOD
             </a>
             <ul class="">
                 <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">HOME</a></li>
                 <li><a href="{{ route('client.about-us') }}"
                         class="{{ request()->is('about-us') ? 'active' : '' }}">TENTANG</a></li>
                 <li><a href="{{ route('client.news') }}"
                         class="{{ request()->is('news*') ? 'active' : '' }}">BERITA</a></li>
                 <li><a href="{{ route('client.galleries') }}"
                         class="{{ request()->is('galleries') ? 'active' : '' }}">GALERI</a></li>
                 <li><a href="{{ route('client.contact') }}"
                         class="{{ request()->is('contact') ? 'active' : '' }}">KONTAK</a></li>

             </ul>
             <button id="hamburgerBtn" class="ml-auto p-2 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none"
                 aria-label="Open Sidebar">
                 <iconify-icon icon="mdi:menu" width="30" height="30" style="color:white;"></iconify-icon>
             </button>
         </nav>
         <div class="hero" style="">
             <h1 style="" data-aos="fade-up" data-aos-duration="1000">
                 {{ $pageTitle ?? 'HEALTHY TASTY FOOD' }}
             </h1>
         </div>
     </div>
 </header>
