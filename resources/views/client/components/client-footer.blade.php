<footer class="footer">
    <div class="footer-container">
        <div class="footer-content"  data-aos="fade-up" data-aos-duration="1300">
            <!-- Tasty Food Section -->
            <div class="footer-section">
                <h3>
                    <a href="/">Tasty Food</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="social-links">
                    <a href="#" class="social-link facebook">
                        <iconify-icon icon="mdi:facebook" width="30"></iconify-icon>
                    </a>
                    <a href="#" class="social-link twitter">
                        <iconify-icon icon="mdi:twitter" width="30"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Useful Links Section -->
            <div class="footer-section">
                <h3>Useful links</h3>
                <ul>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#hewan">Hewan</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#testimonial">Testimonial</a></li>
                </ul>
            </div>

            <!-- Privacy Section -->
            <div class="footer-section">
                <h3>Privacy</h3>
                <ul>
                    <li><a href="#karir">Karir</a></li>
                    <li><a href="{{ route('client.about-us') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('client.contact') }}">Kontak Kami</a></li>
                    <li><a href="#servis">Servis</a></li>
                </ul>
            </div>

            <!-- Contact Info Section -->
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li>
                        <a href="mailto:{{ $businessInformation->email ?? ''}}">
                            <iconify-icon icon="mdi:email"></iconify-icon>
                            {{ $businessInformation->email ?? ''}}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $businessInformation->phone ?? '' }}">
                            <iconify-icon icon="mdi:phone"></iconify-icon>
                            {{ $businessInformation->phone ?? ''}}
                        </a>
                    </li>
                    <li>
                        <a href="https://maps.google.com/?q={{ $businessInformation->location ?? '' }}" target="_blank" rel="noopener">
                            <iconify-icon icon="mdi:location"></iconify-icon>
                            {{ $businessInformation->location ?? '' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright ©2023 All rights reserved</p>
        </div>
    </div>
</footer>
