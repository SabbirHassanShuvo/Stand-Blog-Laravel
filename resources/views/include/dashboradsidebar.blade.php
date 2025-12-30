<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator'))
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Users Manage
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="{{ route('show_Creat_User') }}"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Add Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('all_user') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                All Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Category"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></i></div>
                        Category Manage
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Category" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="{{ route('showCategore') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Add Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('all_category') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                All Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#post"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-pen-to-square"></i></div>
                        Posts Manage
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="post" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="{{ route('Show_post') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Add Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('all_post') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                All Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('pendding_post') }}"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Pendding Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('publish_post') }}"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Published Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('user_post') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Users Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="{{ route('commnet_show') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-comment"></i></div>
                        Comment
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('contect_show') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-address-book"></i></div>
                        Contect
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('blog_media') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-photo-film"></i></div>
                        Media
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('porfile') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Profile
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                        Logout
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                @endif
                @if (Auth::user()->hasRole('user'))
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#post"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-pen-to-square"></i></div>
                        Posts Manage
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="post" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="{{ route('Show_post') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Add Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="{{ route('all_post') }}" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth">
                                All Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-angle-right"></i></div>
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="{{ route('blog_media') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-photo-film"></i></div>
                        Media
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('porfile') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Profile
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                        Logout
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: Stand Blog
            </div>
        </div>
    </nav>
</div>
