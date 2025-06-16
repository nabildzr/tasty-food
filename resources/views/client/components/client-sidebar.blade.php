<!-- Sidebar -->
 <div id="sidebar" class="sidebar">
     <div class="sidebar-header">
         <a href="{{ route('home') }}" >
            <span class="sidebar-title">TASTY FOOD</span>
         </a>
         <button id="closeSidebar" class="close-btn" aria-label="Close Sidebar">
             <iconify-icon icon="mdi:close" width="28" height="28"></iconify-icon>
         </button>
     </div>
     <nav class="sidebar-nav">
        <li>
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->is('/') ? 'active' : '' }}">
                <iconify-icon icon="mdi:home" width="22"></iconify-icon> HOME
            </a>
        </li>
        <li>
            <a href="{{ route('client.about-us') }}" class="sidebar-link {{ request()->is('about-us') ? 'active' : '' }}">
                <iconify-icon icon="mdi:information" width="22"></iconify-icon> TENTANG
            </a>
        </li>
        <li>
            <a href="{{ route('client.news') }}" class="sidebar-link {{ request()->is('news*') ? 'active' : '' }}">
                <iconify-icon icon="mdi:newspaper" width="22"></iconify-icon> BERITA
            </a>
        </li>
        <li>
            <a href="{{ route('client.galleries') }}" class="sidebar-link {{ request()->is('galleries') ? 'active' : '' }}">
                <iconify-icon icon="mdi:image-multiple" width="22"></iconify-icon> GALERI
            </a>
        </li>
        <li>
            <a href="{{ route('client.contact') }}" class="sidebar-link {{ request()->is('contact') ? 'active' : '' }}">
                <iconify-icon icon="mdi:contact-mail" width="22"></iconify-icon> KONTAK
            </a>
        </li>
         </ul>
     </nav>
 </div>
 <!-- Overlay -->
 <div id="sidebarOverlay" class="sidebar-overlay"></div>