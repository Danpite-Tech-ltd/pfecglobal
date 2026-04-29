{{-- @if (Request::url()=='http://localhost/arcadex/' || Request::url()=='https://syslic.xyz/' ||
Request::url()=='https://syslic.xyz/about-us/')


<div class="container-fluid sticky-top">
    @else
    <div class="container-fluid sticky-top bg-primary" style="background-color: #0060d6 !important;">
        @endif
        <div class="container">
            <nav class="p-0 navbar navbar-expand-lg navbar-dark">
                <a href="{{ url('/') }}" class="navbar-brand" id="logonav">
                    <img src="{{ asset($basicinfo->logo) }}" id="logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        @php
                        $currentUrl = url()->current();
                        @endphp

                        <a href="{{ url('/') }}"
                            class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        <a href="{{ url('services') }}"
                            class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>

                        @php
                        $pages = App\Models\Client::where('type','header')->where('status','Active')->get();
                        @endphp

                        @forelse($pages as $page)
                        <a href="{{ url('page', $page->slug) }}"
                            class="nav-item nav-link {{ request()->is('page/'.$page->slug) ? 'active' : '' }}">
                            {{ $page->page_name }}
                        </a>
                        @empty
                        @endforelse

                        <a href="{{ url('blogs') }}"
                            class="nav-item nav-link {{ request()->is('blogs') ? 'active' : '' }}">Blogs</a>
                        <a href="{{ url('about-us') }}"
                            class="nav-item nav-link {{ request()->is('about-us') ? 'active' : '' }}">About Us</a>
                        <a href="{{ url('contact-us') }}"
                            class="nav-item nav-link {{ request()->is('contact-us') ? 'active' : '' }}">Contact Us</a>

                    </div>
                </div>
            </nav>
        </div>
    </div> --}}

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        .menu-bar {
            font-size: 24px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            overflow: hidden;
        }

        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo img {
            max-width: 150px;
            width: 100%;
            height: auto;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            font-weight: 600;
            color: #111;
            white-space: nowrap;
        }

        .nav-links a:hover {
            color: #f97316;
        }

        .navbar .btn {
            white-space: nowrap;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 999;
        }

        /* sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100%;
            background: #fff;
            transition: 0.3s;
            z-index: 1000;
        }

        /* header */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar-header h3 {
            margin: 0;
        }

        .sidebar-header i {
            cursor: pointer;
            font-size: 20px;
        }

        /* list */
        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list li {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .sidebar-list li:hover {
            background: #f5f5f5;
        }

        /* active */
        .sidebar.active {
            left: 0;
        }

        .sidebar-overlay.active {
            display: block;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        .category-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /*padding:12px 15px;*/
            /*border-bottom:1px solid #eee;*/
        }

        .category-title a {
            text-decoration: none;
            color: #000;
        }

        .toggle-btn {
            cursor: pointer;
            font-weight: bold;
            font-size: 22px;
        }

        .subcategory-list {
            display: none;
            background: #f8f8f8;
        }

        .subcategory-list li {
            padding: 10px 25px;
            border-bottom: 1px solid #eee;
        }

        .subcategory-list a {
            text-decoration: none;
            color: #333;
        }

        .nav-links.dropdown {
            position: relative;
        }

        .nav-links:hover .dropdown-menu {
            display: block;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0;
            z-index: 999999;
        }

        @media (max-width: 991px) {
            .nav-inner {
                justify-content: space-between;
            }

            .nav-links {
                display: none !important;
            }

            .navbar .btn {
                padding: 10px 16px;
                font-size: 0.9rem;
            }

            .logo {
                flex: 1;
            }
        }

        @media (max-width: 575px) {
            .logo img {
                max-width: 120px;
            }

            .navbar .btn {
                padding: 8px 14px;
                font-size: 0.85rem;
            }

            .mobile-none {
                display: none;
            }
        }

        .navbar {
            position: relative;
            z-index: 1000;
            overflow: visible !important;
        }

        .nav-inner {
            overflow: visible !important;
        }

        .nav-links.dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1050;
        }
    </style>
    @php
        $categories = App\Models\Portfoliocategory::where('status', 'Active')->get();
    @endphp

    <!-- TOP NOTIFICATION BAR -->
    <div class="top-bar d-none">
        <div class="container top-bar-inner">

            <div class="top-info">
                <span><i class="fas fa-envelope"></i> {{ $basicinfo->email }}</span>
                <span><i class="fas fa-phone-alt"></i> {{ $basicinfo->phone_one }}</span>
            </div>
            <div class="top-info d-none" style="display: flex; gap: 15px; align-items: center;">
                <span><i class="fas fa-certificate"></i> ISO 9001:2015</span>
                <!-- Language Switcher -->
                <select class="lang-select">
                    <option>🇺🇸 English</option>
                    <option>🇪🇸 Spanish</option>
                    <option>🇨🇳 Chinese</option>
                    <option>🇧🇩 Bangla</option>
                </select>
            </div>
        </div>
    </div>


    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container nav-inner">
            <div class="menu-bar d-sm-none">
                <i class="fa-solid fa-bars" id="openSidebar"></i>
            </div>


            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset($basicinfo->logo) }}" alt="" width="150">
                </a>
            </div>
            <!-- about us -->
            <div class="nav-links dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-bs-toggle="dropdown">
                    About Us
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="#">Awards and Achievements</a></li>
                    <li><a class="dropdown-item " href="#">Our Leadership Team</a></li>
                    <li><a class="dropdown-item" href="#">Testimonials</a></li>
                </ul>
            </div>
            <!-- Destination -->
            <div class="nav-links dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-bs-toggle="dropdown">
                    Destination
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="#">Study In Australia</a></li>
                    <li><a class="dropdown-item " href="#">Study In UK</a></li>
                    <li><a class="dropdown-item" href="#">Study In USA</a></li>
                    <li><a class="dropdown-item" href="#">Study In Nepal</a></li>
                    <li><a class="dropdown-item" href="#">Study In Korea</a></li>
                </ul>
            </div>
            <!-- Our Services -->
            <div class="nav-links dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-bs-toggle="dropdown">
                    Our Services
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="#">Study In Australia</a></li>
                    <li><a class="dropdown-item " href="#">Study In UK</a></li>
                    <li><a class="dropdown-item" href="#">Study In USA</a></li>
                    <li><a class="dropdown-item" href="#">Study In Nepal</a></li>
                    <li><a class="dropdown-item" href="#">Study In Korea</a></li>
                </ul>
            </div>
            <!-- Resources -->
            <div class="nav-links dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-bs-toggle="dropdown">
                    Resources
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="#">Study In Australia</a></li>
                    <li><a class="dropdown-item " href="#">Study In UK</a></li>
                    <li><a class="dropdown-item" href="#">Study In USA</a></li>
                    <li><a class="dropdown-item" href="#">Study In Nepal</a></li>
                    <li><a class="dropdown-item" href="#">Study In Korea</a></li>
                </ul>
            </div>
            <!-- Scolarships -->
            <div class="nav-links dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-bs-toggle="dropdown">
                    Scolarships
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="#">Study In Australia</a></li>
                    <li><a class="dropdown-item " href="#">Study In UK</a></li>
                    <li><a class="dropdown-item" href="#">Study In USA</a></li>
                    <li><a class="dropdown-item" href="#">Study In Nepal</a></li>
                    <li><a class="dropdown-item" href="#">Study In Korea</a></li>
                </ul>
            </div>

            <a class="mobile-none" href="{{ url('/contact-us') }}">Contact</a>

            <a href="{{ $basicinfo->ecommerweb }}" class="btn" style="padding:10px 20px">Register Now</a>
        </div>
    </nav>
    <!-- overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- sidebar -->
    <div class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <h3><img src="{{ asset($basicinfo->logo) }}" alt="" width="150"></h3>
            <i class="fa-solid fa-xmark" id="closeSidebar"></i>
        </div>

        <ul class="sidebar-list">
            <li><a href="{{ url('/') }}">Home</a></li>
            @foreach ($categories as $category)
                <li class="category-item">

                    <div class="category-title">
                        <a href="{{ url('product/category/' . $category->slug) }}">
                            {{ $category->category_name }}
                        </a>

                        @if($category->subcategories->count() > 0)
                            <span class="toggle-btn">+</span>
                        @endif
                    </div>

                    @if($category->subcategories->count() > 0)
                        <ul class="subcategory-list">
                            @foreach ($category->subcategories as $sub)
                                <li>
                                    <a href="{{ url('product/subcategory/' . $category->slug . '/' . $sub->slug) }}">
                                        {{ $sub->subcategory_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </li>
            @endforeach
            <li><a href="{{ url('factory') }}">Factory</a></li>
            <li><a href="{{ url('contact-us') }}">Contact</a></li>
            <li><a href="{{ url('products') }}">Products</a></li>
            <li><a href="{{ url('blacklist') }}">Blacklist</a></li>
        </ul>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const openBtn = document.getElementById("openSidebar");
            const closeBtn = document.getElementById("closeSidebar");
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("sidebarOverlay");

            const toggleSidebar = (open) => {
                sidebar.classList.toggle("active", open);
                overlay.classList.toggle("active", open);
                document.body.classList.toggle("sidebar-open", open);
            };

            openBtn.addEventListener("click", function () {
                toggleSidebar(true);
            });

            closeBtn.addEventListener("click", function () {
                toggleSidebar(false);
            });

            overlay.addEventListener("click", function () {
                toggleSidebar(false);
            });

            document.querySelectorAll(".toggle-btn").forEach(btn => {
                btn.addEventListener("click", function () {
                    let subMenu = this.closest(".category-item").querySelector(".subcategory-list");
                    if (subMenu.style.display === "block") {
                        subMenu.style.display = "none";
                        this.innerHTML = "+";
                    } else {
                        subMenu.style.display = "block";
                        this.innerHTML = "-";
                    }
                });
            });

        });

    </script>
