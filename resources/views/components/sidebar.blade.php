 <div id="layoutSidenav_nav">
     <nav class="sidenav shadow-right sidenav-light">
         <div class="sidenav-menu">
             <div class="nav accordion" id="accordionSidenav">
                 <div class="sidenav-menu-heading">Core</div>
                 <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                     data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                     <div class="nav-link-icon"><i data-feather="activity"></i></div>
                     Dashboards
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                         <a class="nav-link" href="index.html">Default</a><a class="nav-link"
                             href="dashboard-2.html">Multipurpose<span
                                 class="badge badge-primary ml-2">New!</span></a><a class="nav-link"
                             href="dashboard-3.html">Affiliate<span class="badge badge-primary ml-2">New!</span></a>
                     </nav>
                 </div>
                 {{-- roles --}}
                 <div class="sidenav-menu-heading">Roles</div>
                 <a class="nav-link collapsed {{ request()->is('roles*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#collapseRoles"
                     aria-expanded="{{ request()->is('roles*') ? 'true' : 'false' }}" aria-controls="collapseRoles">
                     <div class="nav-link-icon"><i data-feather="shield"></i></div>
                     Roles
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('roles*') ? 'show' : '' }}" id="collapseRoles"
                     data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavRoles">
                         <a class="nav-link {{ request()->is('roles') ? 'active' : '' }}"
                             href="{{ route('roles.index') }}">Data Roles</a>
                         <a class="nav-link {{ request()->is('roles/create') ? 'active' : '' }}"
                             href="{{ route('roles.create') }}">Create Role</a>
                     </nav>
                 </div>
                 {{-- end roles --}}


                 {{-- users --}}
                 <div class="sidenav-menu-heading">Users</div>
                 <a class="nav-link collapsed {{ request()->is('users*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUsers"
                     aria-expanded="{{ request()->is('users*') ? 'true' : 'false' }}" aria-controls="collapseUsers">
                     <div class="nav-link-icon"><i data-feather="users"></i></div>
                     Users
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('users*') ? 'show' : '' }}" id="collapseUsers"
                     data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                         <a class="nav-link {{ request()->is('users') ? 'active' : '' }}"
                             href="{{ route('users.index') }}">Data Users</a>
                         <a class="nav-link {{ request()->is('users/create ') ? 'active' : '' }}"
                             href="{{ route('users.create') }}">Create User</a>
                     </nav>
                 </div>
                 {{-- end users --}}

                 {{-- menu --}}
                 <div class="sidenav-menu-heading">Menus</div>
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
                 </div>
                 {{-- end menu --}}


                 {{-- news --}}
                 <div class="sidenav-menu-heading">News</div>
                 <a class="nav-link collapsed {{ request()->is('news*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#CollapseNews"
                     aria-expanded="{{ request()->is('news*') ? 'true' : 'false' }}" aria-controls="CollapseNews">
                     <div class="nav-link-icon"><i data-feather="image"></i></div>
                     News
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('news*') ? 'show' : '' }}" id="CollapseNews"
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
                 {{-- end news --}}


                 {{-- galleries --}}
                 <div class="sidenav-menu-heading">Galleries</div>
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
                 </div>
                 {{-- end galleries --}}


                 {{-- galleries --}}
                 <div class="sidenav-menu-heading">Contacts</div>
                 <a class="nav-link collapsed {{ request()->is('contacts*') ? '' : 'collapsed' }}"
                     href="javascript:void(0);" data-toggle="collapse" data-target="#collapseContacts"
                     aria-expanded="{{ request()->is('contacts*') ? 'true' : 'false' }}"
                     aria-controls="collapseContacts">
                     <div class="nav-link-icon"><i data-feather="image"></i></div>
                     Contacts
                     <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse {{ request()->is('contacts*') ? 'show' : '' }}" id="collapseContacts"
                     data-parent="#accordionSidenav">
                     <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsers">
                         <a class="nav-link {{ request()->is('contacts.index') }}"
                             href="{{ route('contacts.index') }}">Contacts Data</a>
                     </nav>
                 </div>
                 {{-- end galleries --}}



             </div>
         </div>
         <div class="sidenav-footer">
             <div class="sidenav-footer-content">
                 <div class="sidenav-footer-subtitle">Logged in as:</div>
                 <div class="sidenav-footer-title">Valerie Luna</div>
             </div>
         </div>
     </nav>
 </div>
