@extends('webview.master')

@section('seo')
    <!-- HTML Meta Tags -->
    <title>{{ $basicinfo->title }}</title>
    <meta name="description" content="{{ $basicinfo->meta_description }}">
    <meta name="keywords" content="{{ $basicinfo->meta_keywords }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $basicinfo->meta_title }}">
    <meta itemprop="description" content="{{ $basicinfo->meta_description }}">
    <meta itemprop="image" content="{{ url($basicinfo->meta_image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $basicinfo->meta_title }}">
    <meta property="og:description" content="{{ $basicinfo->meta_description }}">
    <meta property="og:image" content="{{ url('public/rowlogo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta property="image" content="{{ url($basicinfo->meta_image) }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ url($basicinfo->meta_image) }}">
    <meta property="twitter:card" content="{{ url($basicinfo->meta_image) }}" />
    <meta property="twitter:title" content="{{ $basicinfo->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ url($basicinfo->logo) }}">

    <!-- Favicon -->
    <link href="{{ asset($basicinfo->logo) }}" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



@endsection
@section('maincontent')
    @php
        $pcslider = App\Models\Slider::where('id', 2)->first();
        $mslider = App\Models\Slider::where('id', 1)->first();
    @endphp

    <section class="" style="background:#080f3d">
        <div class="container mobile-hide">
            <div style="display: flex; justify-content: center; align-items: center; height: 100%; padding: 50px 0;">
                <div style="max-width: 450px;text-align:center;">
                    <h3 style="font-size: 32px;color:white;">{{ $pcslider->slider_text }}</h3>
                    <p style="font-size: 16px;color:white;">{{ $pcslider->slider_btn_name }}</p>
                    <a href="{{ url('contact-us') }}" style="padding:13px 23px;box-shadow:none;text-transform: capitalize;"
                        class="btn">Book a FREE Consultation</a>
                </div>
            </div>
            <img src="{{ asset($pcslider->slider_image) }}" alt="" class="w-100">
        </div>
        <div class="container pc-hide">
            <div style="display: flex; justify-content: center; align-items: center; height: 100%; padding: 50px 0;">
                <div style="max-width: 450px;text-align:center;">
                    <h3 style="font-size: 24px;color:white;">{{ $mslider->slider_text }}</h3>
                    <p style="font-size: 16px;color:white;">{{ $mslider->slider_btn_name }}</p>
                    <a href="{{ url('contact-us') }}" style="padding:13px 23px;box-shadow:none;text-transform: capitalize;"
                        class="btn">Book a FREE Consultation</a>
                </div>
            </div>
            <img src="{{ asset($mslider->slider_image) }}" alt="" class="w-100">
        </div>
    </section>

    <style>
        .service-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            border: 1px solid #eee;
        }

        .service-card:hover {
            transform: translateY(-3px);
        }

        .service-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .icon-blue {
            background: #e6f6fb;
            color: #00a8cc;
        }

        .icon-yellow {
            background: #fff4d6;
            color: #ffc107;
        }

        .icon-red {
            background: #ffe5e5;
            color: #ff4d4f;
        }

        .icon-green {
            background: #eaffea;
            color: #28a745;
        }

        .arrow {
            color: #ff4d4f;
            font-weight: bold;
        }

        .section-title {
            font-size: 28px !important;
        }

        .section-title span {
            color: #1d3b8b;
        }
    </style>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT TEXT -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <h3 class="section-title fw-bold">
                        How PFEC Global <span>Simplifies your Study Abroad Journey?</span>
                    </h3>
                    <p class="text-muted">
                        Our services provide end-to-end assistance to study abroad aspirants.
                        We make the journey hassle-free!
                    </p>
                </div>

                <!-- RIGHT CARDS -->
                <div class="col-lg-7">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <a href="#" class="service-card">
                                <div class="service-left">
                                    <div class="icon-box icon-blue">🏫</div>
                                    <div>Admission Support</div>
                                </div>
                                <div class="arrow">></div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="service-card">
                                <div class="service-left">
                                    <div class="icon-box icon-yellow">➕</div>
                                    <div>Health Insurance</div>
                                </div>
                                <div class="arrow">></div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="service-card">
                                <div class="service-left">
                                    <div class="icon-box icon-red">🎓</div>
                                    <div>Scholarship Guidance</div>
                                </div>
                                <div class="arrow">></div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="service-card">
                                <div class="service-left">
                                    <div class="icon-box icon-red">🏠</div>
                                    <div>Student Accommodation</div>
                                </div>
                                <div class="arrow">></div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="service-card">
                                <div class="service-left">
                                    <div class="icon-box icon-green">✈️</div>
                                    <div>Visa Services</div>
                                </div>
                                <div class="arrow">></div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- study center -->
    <section class="container py-3">
        <div class="d-flex flex-column align-items-center text-center gap-3">
            <div style="max-width: 770px;">
                <h3>Gain Access to Top Institutions across the Globe</h3>
                <p class="text-muted">PFEC Global is a partner of renowned institutions across 11 countries.
                    Pick a destination below and learn everything you need to make an informed decision.</p>
            </div>
            <div class="owl-carousel certificate-slider">
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/study.png') }}" alt="">
                </div>
            </div>
            <a href="{{ url('contact-us') }}" style="padding:13px 23px;box-shadow:none;text-transform: capitalize;"
                class="btn my-4">Book a FREE Consultation</a>
        </div>
        <div>
            <img src="{{ asset('public/step.webp') }}" alt="" class="w-100">
        </div>
    </section>

    <!-- map section -->
    <section class="py-4" style="background:#e4f6fa">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="mb-5">
                        <h3 class="fw-bold">Why Choose <span style="color:#0d6efd;">Us</span></h3>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width:50px;height:50px;background:#f1c6c6;">
                                    <i class="bi bi-person" style="font-size:18px;color:#e74c3c;"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-danger">22,000+</h4>
                            <p>Students Assisted</p>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width:50px;height:50px;background:#f1c6c6;">
                                    <i class="bi bi-gem" style="font-size:18px;color:#e74c3c;"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-danger">550+</h4>
                            <p>Partner Institutions</p>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width:50px;height:50px;background:#f1c6c6;">
                                    <i class="bi bi-award" style="font-size:18px;color:#e74c3c;"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-danger">96.7%</h4>
                            <p>Visa Grants</p>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width:50px;height:50px;background:#f1c6c6;">
                                    <i class="bi bi-trophy" style="font-size:18px;color:#e74c3c;"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-danger">18</h4>
                            <p>Years of Expertise</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <img src="{{ asset('public/map.webp') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>

    <!--  -->
    <!-- CLIENT LOGOS -->
    <div class="client-section">
        <div class="container text-center">
            <p style="margin-bottom: 30px; font-weight: 700; font-size: 1.2rem; color: #94A3B8; letter-spacing: 2px;">
                Awards & achievements</p>
            <div class="owl-carousel brand-slider">

                <div class="item text-center">
                    <img src="{{ asset('public/testimonial.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/testimonial.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/testimonial.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/testimonial.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('public/testimonial.png') }}" alt="">
                </div>

            </div>

        </div>
    </div>


    <style>
        .hero-swiper {
            height: 500px;
        }

        .hero-swiper .swiper-slide {
            height: 565px;
        }

        @media (max-width:768px) {

            .hero-swiper,
            .hero-swiper .swiper-slide {
                height: 100vh;
            }
        }

        .hero-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .brand-img {
            width: 120px;
            height: 60px;
            object-fit: contain;
            margin: auto;
        }
    </style>




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        $('.brand-slider').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            dots: false,
            nav: false,

            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

        $('.certificate-slider').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            dots: false,
            nav: false,

            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        });

    </script>





@endsection