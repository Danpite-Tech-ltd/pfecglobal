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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



@endsection
@section('maincontent')


    <!-- CLIENT LOGOS -->
    <div class="client-section">
        <div class="container text-center">
            <p style="margin-bottom: 30px; font-weight: 700; font-size: 0.85rem; color: #94A3B8; letter-spacing: 2px;">
                TRUSTED BY INDUSTRY GIANTS</p>
           <div class="owl-carousel brand-slider">

                @foreach ($testimonials as $value)
                    <div class="item text-center">
                        <img src="{{ $value->image }}" alt="" class="brand-img">
                    </div>
                @endforeach

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
        
        .brand-img{
            width:120px;
            height:60px;
            object-fit:contain;
            margin:auto;
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
        
            responsive:{
                0:{
                    items:2
                },
                576:{
                    items:3
                },
                768:{
                    items:4
                },
                1000:{
                    items:6
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
        
            responsive:{
                0:{
                    items:1
                },
                576:{
                    items:1
                },
                768:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        });

    </script>
    
    



@endsection
