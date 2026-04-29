@extends('webview.master')
@section('title')
    {{ env('APP_NAME') }}- {{ $scholarship->title }}
@endsection
@section('maincontent')
    <style>
        .hero-banner {
            background-color: #e6f7ff;
            padding: 30px 0;
            overflow: hidden;
            position: relative;
        }

        .hero-title {
            color: #1a237e;
            font-weight: 800;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 18px;
            color: #444;
            margin-bottom: 30px;
            max-width: 500px;
        }

        .btn-consultation {
            background-color: #ee5253;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .hero-img-box img {
            width: 100%;
            max-width: 600px;
            display: block;
            margin-left: auto;
        }

        .sticky-jump-bar {
            background: #fff;
            background-color: #F0F4F7;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 15px 25px;
            margin: 40px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 15px;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .jump-text {
            color: #ff6b6b;
            font-weight: 600;
        }

        .content-label {
            color: #555;
            margin-left: 10px;
        }

        .main-heading {
            color: #1a237e;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 25px;
        }

        .content-text {
            line-height: 1.8;
            color: #555;
            font-size: 15px;
            text-align: justify;
        }

        .sidebar-cta {
            background-color: #fff3f3;
            border-radius: 15px;
            padding: 40px 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 100px;
        }

        .sidebar-cta h4 {
            font-weight: 700;
            font-size: 18px;
            margin: 20px 0;
            color: #222;
        }

        .btn-book-free {
            background-color: #ff5e57;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            width: 100%;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .hero-banner {
                text-align: center;
                padding: 30px 10px;
            }

            .hero-subtitle {
                margin: 0 auto 30px;
            }

            .hero-img-box img {
                margin: 30px auto 0;
            }

            .sidebar-cta {
                margin-top: 40px;
                position: static;
            }
        }
    </style>
    <!-- Top Hero Section -->
    <div class="hero-banner">
        <div class="container">
            <div class="row align-items: center;">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div>
                        <h1 class="hero-title">{{ $scholarship->title }}</h1>
                        <p class="hero-subtitle">Get comprehensive guidance & end-to-end assistance from expert study abroad
                            mentors for FREE!</p>
                        <a href="{{ url('contact-us') }}" class="btn-consultation">Book a FREE Consultation &rarr;</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 hero-img-box">
                    <img src="{{ asset($scholarship->image) }}" alt="Scholarship Australia">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12 col-md-8">

                <div class="sticky-jump-bar">
                    <div>
                        <span class="jump-text">Jump to Topic</span>
                        <span class="content-label">| &nbsp; Contents</span>
                    </div>
                    <i class="fas fa-chevron-up" style="color: #ff6b6b;"></i>
                </div>

                <div class="content-area">
                    {!! $scholarship->details !!}
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="sidebar-cta">
                    <div class="emoji" style="font-size: 40px;">👋</div>
                    <h4>Get Started on your Study Abroad Dream with {{ env('APP_NAME') }}</h4>
                    <a href="{{ url('contact-us') }}" class="btn-book-free">Book Free Consultation &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
