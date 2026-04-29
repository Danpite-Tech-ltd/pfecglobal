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
    @php
        $aboutus = App\Models\Aboutlist::findOrfail(1);
        $servicetext = App\Models\Aboutlist::findOrfail(3);
        $chooseus = App\Models\Aboutlist::findOrfail(2);
        $teamdata = App\Models\Aboutlist::findOrfail(4);
        $reviewtext = App\Models\Aboutlist::findOrfail(5);
        $teams = App\Models\Team::where('status', 'Active')->get();
        $categories = App\Models\Portfoliocategory::where('status', 'Active')->get();
    @endphp

    <!-- HERO SLIDER -->
    <!-- Slider main container -->
    <div class="swiper hero-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach ($sliders as $value)
                <div class="swiper-slide hero-video-wrapper" style="
                                                    background-image: url('{{ asset($value->slider_image) }}');
                                                    background-size: cover;
                                                    background-position: center;
                                                    background-repeat: no-repeat;
                                                ">
                    <div class="slider-overlay"></div>
                    <div class="container hero-content" data-aos="fade-up">
                        <span style="color: var(--orange); font-weight: 800; letter-spacing: 3px;">SINCE 1998</span>
                        <h1>The Fine Detail <br>In Every Garment</h1>
                        <p>We are the leading manufacturer of Woven Labels, Thermal Stickers, and Sustainable Packaging
                            solutions.
                            Trusted by 450+ global fashion brands.</p>
                        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                            <a href="#garments" class="btn">Explore Products</a>
                            <a href="{{ url('contact-us') }}" class="btn btn-outline">Order Sample</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Optional navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


    {{-- <div class="hero-video-wrapper">
        <div class="slider-overlay"></div>
        <div class="slide"></div>
        <div class="slide"></div>
        <div class="slide"></div>
        <div class="container hero-content" data-aos="fade-up">
            <span style="color: var(--orange); font-weight: 800; letter-spacing: 3px;">SINCE 1998</span>
            <h1>The Fine Detail <br>In Every Garment</h1>
            <p>We are the leading manufacturer of Woven Labels, Thermal Stickers, and Sustainable Packaging solutions.
                Trusted by 450+ global fashion brands.</p>
            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <a href="#garments" class="btn">Explore Products</a>
                <a href="contact.html" class="btn btn-outline">Order Sample</a>
            </div>
        </div>
    </div> --}}

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

    <!-- ABOUT SECTION -->
    <section class="section section-bg">
        <div class="container about-split">
            <div class="about-content" data-aos="fade-right">
                <span class="section-subtitle">Who We Are</span>
                <h2 class="section-title">{{ $aboutus->title }}</h2>
                <p style="color: var(--slate); margin-bottom: 20px;">
                    {{ $aboutus->details }}
                </p>
                <ul style="margin-bottom: 30px; color: var(--slate);">
                    <li><i class="fas fa-check-circle" style="color: var(--orange);"></i> {{ $aboutus->title_one }}</li>
                    <li><i class="fas fa-check-circle" style="color: var(--orange);"></i> {{ $aboutus->title_two }}</li>
                </ul>
                <a href="" class="btn btn-outline" style="color: var(--orange); border-color: var(--orange);">Read
                    Our Story</a>
            </div>
            <div class="about-img" >
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80"
                    alt="Factory Machine">
                <div class="exp-badge">
                    <span style="font-size: 3rem; font-weight: 800; display: block; line-height: 1;">25+</span>
                    <span>Years of<br>Excellence</span>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <div class="stats-section">
        <div class="container stats-grid">
            @foreach ($clientcounter as $value)
                <div class="stat-item" data-aos="fade-up">
                    <h3>{{ $value->about_text }}</h3>
                    <p>{{ $value->about_title }}</p>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($categories as $key => $value)
        @if($value->subcategories->count() > 0)
            <!-- SECTION 1: GARMENT ACCESSORIES -->
            <section id="garments" class="section section-bg" @if($key % 2) style="background: #ECFDF5;" @endif>
                <div class="container">
                    <div class="text-center" style="max-width: 700px; margin: 0 auto 50px;" data-aos="fade-up">
                        <span class="section-subtitle">Category {{ $key + 1 }}</span>
                        <h2 class="section-title">{{ $value->category_name }}</h2>
                        <p style="color: var(--slate);">{{ $value->title }}</p>
                    </div>
                    <div class="product-grid">
                        @foreach ($value->subcategories as $subcat)
                            <a href="{{ url('product/subcategory/'. $value->slug. '/' . $subcat->slug) }}" class="p-card" data-aos="fade-up">
                                <div class="p-img"><img src="{{ asset($subcat->image) }}" alt="Woven Label">@if($subcat->subtitle) <span
                                class="p-badge">{{ $subcat->subtitle }}</span> @endif</div>
                                <div class="p-body">
                                    <h3>{{ $subcat->subcategory_name }}</h3><span class="p-spec">{{ $subcat->title }}</span>
                                    <p style="color: var(--slate); font-size: 0.9rem; margin-top: 10px;">{{$subcat->details}}</p>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <!-- SUSTAINABILITY -->
    <section class="sustain-section">
        <div class="container sustain-grid">
            <div data-aos="fade-right">
                <span class="section-subtitle" style="color: var(--green);">Eco-Friendly</span>
                <h2 class="section-title">{{ $chooseus->title }}</h2>
                <p style="margin-bottom: 30px; color: var(--slate);">{{$chooseus->details}}</p>
                <ul class="check-list">
                    <li><i class="fas fa-leaf"></i> <span>{{ $chooseus->title_one }}</span></li>
                    <li><i class="fas fa-tint"></i> <span>{{ $chooseus->title_two }}</span></li>
                    <li><i class="fas fa-certificate"></i> <span>{{ $chooseus->title_three }}</span></li>
                </ul>
            </div>
            <div >
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80"
                    style="width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);"
                    alt="Green Leaf">
            </div>
        </div>
    </section>

    <!-- === NEW: BLOG SECTION === -->
    <section class="section section-bg d-none">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <span class="section-subtitle">Insights</span>
                <h2 class="section-title">Latest Industry News</h2>
            </div>
            <div class="blog-grid">
                <div class="blog-card" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1605518216938-7c31b7b14ad0?auto=format&fit=crop&w=500&q=80"
                        alt="News 1" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-date">Oct 15, 2024</span>
                        <h3>Sustainable Trends in Garment Trims</h3>
                        <p style="color: var(--slate); font-size: 0.9rem;">How major brands are shifting to recycled
                            polyester labels.</p>
                        <a href="#" class="blog-link">Read More &rarr;</a>
                    </div>
                </div>
                <div class="blog-card" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1577782161208-a554a9fc964a?auto=format&fit=crop&w=500&q=80"
                        alt="News 2" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-date">Oct 02, 2024</span>
                        <h3>The Future of RFID in Retail</h3>
                        <p style="color: var(--slate); font-size: 0.9rem;">Why every garment will soon need a smart tag for
                            tracking.</p>
                        <a href="#" class="blog-link">Read More &rarr;</a>
                    </div>
                </div>
                <div class="blog-card" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=500&q=80"
                        alt="News 3" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-date">Sep 20, 2024</span>
                        <h3>Choosing the Right Thermal Ribbon</h3>
                        <p style="color: var(--slate); font-size: 0.9rem;">Wax vs Resin: What works best for your shipping
                            labels?</p>
                        <a href="#" class="blog-link">Read More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ & TESTIMONIALS -->
    <section class="section">
        <div class="container">
            <h2 class="text-center section-title">FAQ</h2>
            <div style="max-width: 800px; margin: 40px auto 0; display: grid; gap: 20px;">
                @foreach ($faqs as $key => $faq)
                    <div
                        style="background: white; padding: 25px; border-radius: 10px; border-left: 5px solid @if($key % 2) var(--navy); @else var(--orange); @endif">
                        <h4>{{ $faq->title }}</h4>
                        <p style="color: var(--slate); margin-top: 5px;">{{ $faq->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Certificate -->
      <div class="client-section">
        <div class="container text-center">
            <p style="margin-bottom: 30px; font-weight: 700; font-size: 0.85rem; color: #94A3B8; letter-spacing: 2px;text-transform:uppercase">
                Recognized & Certified By</p>
           <div class="owl-carousel certificate-slider">

                @foreach ($services as $value)
                    <div class="item text-center">
                        <img src="{{ $value->service_image }}" alt="" class="certificate-img">
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    

    <!-- CTA BANNER (UPDATED WITH DOWNLOAD) -->
    <section style="background: var(--orange); padding: 80px 0; text-align: center; color: white;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 15px;">Ready to Elevate Your Brand?</h2>
            <p style="margin-bottom: 30px; font-size: 1.1rem; opacity: 0.9;">Get a free quote or download our full product
                catalog.</p>
            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ url('contact-us') }}" class="btn" style="background: white; color: var(--orange);">Contact Us</a>
                <a href="#" class="btn btn-outline" onclick="alert('Downloading Catalog...')"><i
                        class="fas fa-download"></i> Download Catalog</a>
            </div>
        </div>
    </section>
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
