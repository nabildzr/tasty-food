 <div id="layoutSidenav_nav">
     <nav class="sidenav shadow-right sidenav-light">
         <div class="sidenav-menu">
             <div class="nav accordion" id="accordionSidenav">
                 <div class="sidenav-menu-heading">CORE</div>
                 <a class="nav-link {{ request()->is('/admin') ? 'active' : '' }}" href="{{ url('admin/') }}">
                     <div class="nav-link-icon"><i data-feather="home"></i></div>

                     Dashboard
                 </a>

                 {{-- roles --}}
                 @if (Auth::user()->role->name === 'Super Admin')
                     <div class="sidenav-menu-heading">Roles</div>
                     <a class="nav-link collapsed {{ request()->is('admin/roles*') ? '' : 'collapsed' }}"
                         href="javascript:void(0);" data-toggle="collapse" data-target="#collapseRoles"
                         aria-expanded="{{ request()->is('admin/roles*') ? 'true' : 'false' }}"
                         aria-controls="collapseRoles">
                         <div class="nav-link-icon"><i data-feather="shield"></i></div>
                         Roles
                         <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse {{ request()->is('admin/roles*') ? 'show' : '' }}" id="collapseRoles"
                         data-parent="#accordionSidenav">
                         <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavRoles">
                             <a class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}"
                                 href="{{ route('roles.index') }}">Data Roles</a>
                             <a class="nav-link {{ request()->is('admin/roles/create') ? 'active' : '' }}"
                                 href="{{ route('roles.create') }}">Create Role</a>
                         </nav>
                     </div>
                 @endif
                 {{-- end roles --}}


                 {{-- users --}}
                 @if (user_can('users_access'))
                     <div class="sidenav-menu-heading">Users</div>
                     <a class="nav-link collapsed {{ request()->is('admin/users*') ? '' : 'collapsed' }}"
                         href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUsers"
                         aria-expanded="{{ request()->is('admin/users*') ? 'true' : 'false' }}"
                         aria-controls="collapseUsers">
                         <div class="nav-link-icon"><i data-feather="users"></i></div>
                         Users
                         <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse {{ request()->is('admin/users*') ? 'show' : '' }}" id="collapseUsers"
                         data-parent="#accordionSidenav">
                         <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                             <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}"
                                 href="{{ route('users.index') }}">Data Users</a>
                             <a class="nav-link {{ request()->is('admin/users/create ') ? 'active' : '' }}"
                                 href="{{ route('users.create') }}">Create User</a>
                         </nav>
                     </div>
                 @endif
                 {{-- end users --}}

                 {{-- menu --}}
                 {{-- <div class="sidenav-menu-heading">Menus</div>
                 <a class="nav-link collapsed {{ request()->is('menu*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#collapseMenus"
                     aria-expanded="{{ request()->is('menu*') ? 'true' : 'false' }}" aria-controls="collapseMenus">
                     <div class="nav-link-icon"><i data-feather="coffee"></i></div>
                     Menu
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('menu*') ? 'show' : '' }}" id="collapseMenus"
                     data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                         <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}"
                             href="{{ route('menus.index') }}">Data Menus</a>
                         <a class="nav-link {{ request()->is('menu/create ') ? 'active' : '' }}"
                             href="{{ route('menus.create') }}">Create Menu</a>
                     </nav>
                 </div> --}}
                 {{-- end menu --}}


                 {{-- news --}}
                 @if (user_can('news_access'))
                     <div class="sidenav-menu-heading">News</div>
                     <a class="nav-link collapsed {{ request()->is('admin/news*') ? '' : 'collapsed' }}"
                         href="javascript:void(0);" data-toggle="collapse" data-target="#CollapseNews"
                         aria-expanded="{{ request()->is('admin/news*') ? 'true' : 'false' }}"
                         aria-controls="CollapseNews">
                         <div class="nav-link-icon"><i data-feather="image"></i></div>
                         News
                         <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse {{ request()->is('admin/news*') ? 'show' : '' }}" id="CollapseNews"
                         data-parent="#accordionSidenav">
                         <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                             <a class="nav-link {{ request()->is('news/create ') ? 'active' : '' }}"
                                 href="{{ route('news.create') }}">Create News</a>
                             <a class="nav-link {{ request()->is('news') ? 'active' : '' }}"
                                 href="{{ route('news.index') }}">Data News</a>
                             <a class="nav-link {{ request()->is('news/me ') ? 'active' : '' }}"
                                 href="{{ route('news.myNews') }}">My News Data</a>
                         </nav>
                     </div>
                 @endif
                 {{-- end news --}}


                 {{-- galleries --}}
                 @if (user_can('galleries_access') || user_can('galleries_slider_access'))
                     <div class="sidenav-menu-heading">Galleries</div>
                     <a class="nav-link collapsed {{ request()->is('admin/galleries*') ? '' : 'collapsed' }}"
                         href="javascript:void(0);" data-toggle="collapse" data-target="#collapseGalleries"
                         aria-expanded="{{ request()->is('admin/galleries*') ? 'true' : 'false' }}"
                         aria-controls="collapseGalleries">
                         <div class="nav-link-icon"><i data-feather="image"></i></div>
                         Galleries
                         <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse {{ request()->is('admin/galleries*') ? 'show' : '' }}" id="collapseGalleries"
                         data-parent="#accordionSidenav">
                         <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                             @if (user_can('galleries_access'))
                                 <a class="nav-link {{ request()->is('admin/galleries/create') ? 'active' : '' }}"
                                     href="{{ route('galleries.create') }}">Create Gallery</a>
                                 <a class="nav-link {{ request()->is('admin/galleries') ? 'active' : '' }}"
                                     href="{{ route('galleries.index') }}">Galleries Data</a>
                             @endif
                             @if (user_can('galleries_slider_access'))
                                 <a class="nav-link {{ request()->is('admin/galleries/slider/create') ? 'active' : '' }}"
                                     href="{{ route('galleries.slider.create') }}">Create Slider Gallery</a>
                                 <a class="nav-link {{ request()->is('admin/galleries/slider') ? 'active' : '' }}"
                                     href="{{ route('galleries.slider.index') }}">Slider Galleries Data</a>
                             @endif
                         </nav>
                     </div>
                 @endif

                 {{-- end galleries --}}
                 {{-- <div class="sidenav-menu-heading">Galleries</div>
                 <a class="nav-link collapsed {{ request()->is('galleries*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#collapseGalleries"
                     aria-expanded="{{ request()->is('galleries*') ? 'true' : 'false' }}"
                     aria-controls="collapseGalleries">
                     <div class="nav-link-icon"><i data-feather="image"></i></div>
                     Galleries
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('galleries*') ? 'show' : '' }}" id="collapseGalleries"
                     data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                         <a class="nav-link {{ request()->is('galleries/create ') ? 'active' : '' }}"
                             href="{{ route('galleries.create') }}">Create Gallery</a>
                         <a class="nav-link {{ request()->is('galleries.index') }}"
                             href="{{ route('galleries.index') }}">Galleries Data</a>
                         <a class="nav-link {{ request()->is('galleries/slider/create ') ? 'active' : '' }}"
                             href="{{ route('galleries.slider.create') }}">Create Slider Gallery</a>
                         <a class="nav-link {{ request()->is('galleries/slider/create') }}"
                             href="{{ route('galleries.slider.index') }}">Slider Galleries Data</a>
                     </nav>
                 </div> --}}
                 {{-- end galleries --}}


                 {{-- contact --}}
                 {{-- @if (user_can('contact_access'))
                     <div class="sidenav-menu-heading">Contacts</div>
                     <a class="nav-link collapsed {{ request()->is('admin/contacts*') ? '' : 'collapsed' }}"
                         href="javascript:void(0);" data-toggle="collapse" data-target="#collapseContacts"
                         aria-expanded="{{ request()->is('admin/contacts*') ? 'true' : 'false' }}"
                         aria-controls="collapseContacts">
                         <div class="nav-link-icon"><i data-feather="image"></i></div>
                         Contacts
                         <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse {{ request()->is('admin/contacts*') ? 'show' : '' }}" id="collapseContacts"
                         data-parent="#accordionSidenav">
                         <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                             <a class="nav-link {{ request()->is('admin/contacts') ? 'active' : '' }}"
                                 href="{{ route('contacts.index') }}">Contacts Data</a>
                         </nav>
                     </div>
                 {{-- @endif --}}
                 {{-- end contact --}}


                 {{-- contact --}}
                 @if (user_can('contact_access'))
                     <div class="sidenav-menu-heading">Contact</div>
                     <a class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}"
                         href="{{ url('admin/contacts') }}">
                         <div class="nav-link-icon"><i data-feather="info"></i></div>

                         Contact
                     </a>
                 @endif
                 {{-- end contact --}}

                 {{-- business information --}}
                 @if (user_can('business_information_access'))
                     <div class="sidenav-menu-heading">Business Information</div>
                     <a class="nav-link {{ request()->is('admin/business-information') ? 'active' : '' }}"
                         href="{{ url('admin/business-information') }}">
                         <div class="nav-link-icon"><i data-feather="info"></i></div>

                         Business Information
                     </a>
                 @endif
                 {{-- end business information --}}


                 {{-- about us --}}
                 @if (user_can('about_us_access'))
                     <div class="sidenav-menu-heading">About Us</div>
                     <a class="nav-link {{ request()->is('admin/about-us*') ? 'active' : '' }}"
                         href="{{ url('admin/about-us') }}">
                         <div class="nav-link-icon"><i data-feather="info"></i></div>

                         About Us
                     </a>
                 @endif
                 {{-- end about us --}}



             </div>
         </div>
         <div class="sidenav-footer">
             <div class="sidenav-footer-content">
                 <div class="sidenav-footer-subtitle">Logged in as:</div>
                 <div class="sidenav-footer-title">{{ Auth::user()->name ?? 'Unknown' }}</div>
             </div>
         </div>
     </nav>
 </div>
