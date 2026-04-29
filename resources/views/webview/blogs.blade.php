@extends('webview.master')

@section('seo')
    <title>Our Blogs</title>
    <meta name="description" content="{{ $basicinfo->meta_description }}">
    <meta name="keywords" content="{{ $basicinfo->meta_keywords }}">

    <meta itemprop="name" content="{{ $basicinfo->meta_title }}">
    <meta itemprop="description" content="{{ $basicinfo->meta_description }}">
    <meta itemprop="image" content="{{ url($basicinfo->logo) }}">

    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $basicinfo->meta_title }}">
    <meta property="og:description" content="{{ $basicinfo->meta_description }}">
    <meta property="og:image" content="{{ url($basicinfo->logo) }}">
    <meta property="image" content="{{ url($basicinfo->logo) }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ url($basicinfo->logo) }}">
    <meta property="twitter:card" content="{{ url($basicinfo->logo) }}" />
    <meta property="twitter:title" content="{{ $basicinfo->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ url($basicinfo->logo) }}">
@endsection

@section('maincontent')
    <style>

        /* Top Hero Section */
        .hero-area {
            background-color: #f0faff;
            overflow: hidden;
        }

        .hero-text-side {
            padding: 60px 0;
        }

        .hero-text-side h1 {
            font-weight: bold;
            font-size: 40px;
            margin-bottom: 25px;
            color: #000;
        }

        .hero-text-side p {
            color: #444;
            line-height: 1.6;
            font-size: 16px;
            text-align: justify;
        }

        .hero-img-side {
            background-image: url('https://pfecglobal.in/wp-content/uploads/2025/06/Group-1000001271-7.webp');
            background-size: cover;
            background-position: center;
            min-height: 300px;
        }

        /* Blog Section */
        .blog-container {
            padding: 50px 0;
            background-color: #fff;
        }

        .blog-card {
            border: 1px solid #eee;
            border-radius: 8px;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: -25px;
        }

        .blog-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .card-img-box {
            position: relative;
        }

        .card-img-box img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .blog-content {
            padding: 20px;
        }

        .blog-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #222;
            line-height: 1.4;
            min-height: 50px;
        }

        .read-more-btn {
            background-color: #eb5744;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }

        .read-more-btn:hover {
            background-color: #d43f2d;
            color: white;
        }

        .blog-footer {
            border-top: 1px solid #eee;
            padding: 15px 20px;
            font-size: 13px;
            color: #666;
        }

        .meta-item {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .meta-item i {
            margin-right: 8px;
            width: 15px;
        }

        /* Responsive Mobile View */
        @media (max-width: 767px) {
            .hero-img-side {
                min-height: 250px;
            }
            .hero-text-side {
                padding: 30px 20px;
                text-align: center;
            }
            .hero-text-side h1 {
                font-size: 30px;
            }
        }
    </style>
    <!-- Hero Section (image_8b80b3.jpg reference design) -->
    <div class="hero-area">
        <div class="container p-0">
            <div class="row g-0">
                <!-- Text Side: PC-6, Mobile-12 -->
                <div class="col-12 col-md-6 d-flex align-items: center;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-11 hero-text-side">
                                <h1>Blogs</h1>
                                <p>Welcome to {{ env('APP_NAME') }} blog—your trusted guide for everything you need to know about studying and living Down Under. From expert insights on universities and visas to inspiring student success stories, we're here to help you take the next step toward your Australian dream.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Image Side: PC-6, Mobile-12 -->
                <div class="col-12 col-md-6 hero-img-side">
                    <!-- Background image used here from your link -->
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="blog-container">
        <div class="container">
            <div class="row g-4">

                <!-- Blog 1: PC-4, Mobile-12 -->
                <div class="col-12 col-md-4">
                    <div class="blog-card">
                        <div class="card-img-box">
                            <img src="https://via.placeholder.com/400x250" alt="Study Canada">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">Cost of Living in Canada for Bangladeshi Students: A Complete Guide (2026)</h2>
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                        <div class="blog-footer">
                            <div class="meta-item"><i class="fa-solid fa-user"></i> By Junayed Leon</div>
                            <div class="meta-item"><i class="fa-solid fa-calendar"></i> April 29, 2026</div>
                            <div class="meta-item"><i class="fa-solid fa-folder"></i> Study in Canada</div>
                        </div>
                    </div>
                </div>

                <!-- Blog 2: PC-4, Mobile-12 -->
                <div class="col-12 col-md-4">
                    <div class="blog-card">
                        <div class="card-img-box">
                            <img src="https://via.placeholder.com/400x250" alt="Griffith University">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">Why Choose Griffith University? Ranking and Popular Courses</h2>
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                        <div class="blog-footer">
                            <div class="meta-item"><i class="fa-solid fa-user"></i> By Junayed Leon</div>
                            <div class="meta-item"><i class="fa-solid fa-calendar"></i> April 15, 2026</div>
                            <div class="meta-item"><i class="fa-solid fa-folder"></i> Study in Australia</div>
                        </div>
                    </div>
                </div>

                <!-- Blog 3: PC-4, Mobile-12 -->
                <div class="col-12 col-md-4">
                    <div class="blog-card">
                        <div class="card-img-box">
                            <img src="https://via.placeholder.com/400x250" alt="Adelaide University">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">Study at Adelaide University: Easy scholarships and research opportunities in Australia</h2>
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                        <div class="blog-footer">
                            <div class="meta-item"><i class="fa-solid fa-user"></i> By Junayed Leon</div>
                            <div class="meta-item"><i class="fa-solid fa-calendar"></i> April 15, 2026</div>
                            <div class="meta-item"><i class="fa-solid fa-folder"></i> Study in Australia</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
