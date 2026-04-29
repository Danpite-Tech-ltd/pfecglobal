@extends('webview.master')

@section('seo')
    <title> {{ $basicinfo->title }} </title>
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
        /* --- GLOBAL VARIABLES & RESET --- */
        :root { 
            --navy: #0F172A; 
            --slate: #64748B; 
            --orange: #F97316; 
            --light: #F8FAFC; 
            --white: #FFFFFF; 
            --green: #10B981;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light); color: var(--navy); overflow-x: hidden; line-height: 1.7; }
        a { text-decoration: none; color: inherit; transition: 0.3s; }
        ul { list-style: none; }
        
        .container { max-width: 1250px; margin: 0 auto; padding: 0 20px; }
        .section { padding: 100px 0; }
        .section-bg { background: white; }
        .text-center { text-align: center; }
        
        h1, h2, h3, h4 { line-height: 1.2; font-weight: 800; }
        .section-title { font-size: 2.5rem; margin-bottom: 15px; color: var(--navy); }
        .section-subtitle { color: var(--orange); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; display: block; margin-bottom: 10px; }
        
        .btn { background: var(--orange); color: white; padding: 16px 35px; border-radius: 50px; font-weight: 700; display: inline-block; border: none; cursor: pointer; box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4); }
        .btn:hover { transform: translateY(-5px); }

        /* NAVBAR */
        .navbar { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 15px 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 30px rgba(0,0,0,0.03); }
        .nav-inner { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.8rem; font-weight: 900; color: var(--navy); display: flex; align-items: center; gap: 10px; }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a { font-weight: 600; font-size: 0.9rem; color: var(--navy); }
        .nav-links a:hover { color: var(--orange); }

        /* ABOUT HERO */
        .about-hero { 
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1565514020176-db762193b26c?auto=format&fit=crop&w=1600&q=80');
            background-size: cover; background-position: center; color: white; padding: 150px 0 120px; text-align: center;
        }
        .about-hero h1 { font-size: 3.5rem; margin-bottom: 15px; }
        .breadcrumb { opacity: 0.8; font-size: 0.9rem; }
        .breadcrumb a { color: var(--orange); }

        /* MD MESSAGE SECTION (Overlapping) */
        .md-section { display: grid; grid-template-columns: 1fr 2fr; gap: 50px; align-items: center; margin-top: -60px; position: relative; z-index: 2; margin-bottom: 80px; }
        .md-img { width: 100%; border-radius: 15px; border: 8px solid white; box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .md-content { background: white; padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .signature { font-family: 'Cursive', sans-serif; font-size: 1.5rem; color: var(--orange); margin-top: 15px; display: block; }

        /* MISSION VISION */
        .mv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 50px; }
        .mv-card { background: white; padding: 40px; border-radius: 15px; border-top: 4px solid var(--orange); box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; }
        .mv-card:hover { transform: translateY(-10px); }
        .mv-icon { font-size: 2.5rem; color: var(--orange); margin-bottom: 20px; }

        /* MACHINERY */
        .tech-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 40px; }
        .tech-card { background: white; padding: 30px 20px; text-align: center; border-radius: 10px; border: 1px solid #e2e8f0; box-shadow: 0 5px 15px rgba(0,0,0,0.02); }
        .tech-card h4 { font-size: 1.1rem; margin-bottom: 5px; }
        .tech-card span { font-size: 0.85rem; color: var(--slate); }
        .tech-icon { font-size: 2rem; color: var(--navy); margin-bottom: 15px; }

        /* CSR */
        .csr-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }
        .csr-list li { margin-bottom: 15px; display: flex; align-items: center; gap: 15px; font-weight: 600; }
        .csr-list i { color: var(--green); background: #ECFDF5; padding: 8px; border-radius: 50%; }

        /* GALLERY */
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 40px; }
        .gallery-img { width: 100%; height: 260px; object-fit: cover; border-radius: 10px; transition: 0.3s; cursor: pointer; }
        .gallery-img:hover { transform: scale(1.02); }

        /* FOOTER */
        footer { background: #0B1121; color: #94A3B8; padding: 100px 0 0; font-size: 0.95rem; margin-top: 0; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; padding-bottom: 60px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .footer-col h4 { color: white; margin-bottom: 25px; }
        .footer-col ul li { margin-bottom: 15px; }
        .footer-col ul li a:hover { color: var(--orange); padding-left: 5px; }
        .social-links a { width: 40px; height: 40px; background: rgba(255,255,255,0.1); display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white; margin-right: 10px; transition: 0.3s; }
        .social-links a:hover { background: var(--orange); }
        .footer-bottom { padding: 30px 0; text-align: center; }

        @media(max-width: 900px) {
            .md-section, .csr-grid, .mv-grid, .tech-grid, .footer-top { grid-template-columns: 1fr; }
            .nav-links { display: none; }
            .md-section { margin-top: 40px; } /* Fix overlap on mobile */
        }
    </style>

        <!-- HERO HEADER -->
    <header class="about-hero">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up" style="color:white">World-Class Manufacturing</h2>
            <div class="breadcrumb" data-aos="fade-up" data-aos-delay="100" style="display: flex;justify-content: center;">
                <a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; About Us &nbsp;/&nbsp; Factory Profile
            </div>
        </div>
    </header>

    <!-- MD MESSAGE (New Content) -->
    <div class="container md-section">
        <div >
            <img src="{{ asset( $factory->meta_image ) }}" alt="MD Photo" class="md-img">
        </div>
        <div class="md-content">
            <i class="fas fa-quote-left" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 20px;"></i>
            <h2 style="margin-bottom: 20px; color: var(--navy);">{{ $factory->meta_keywords }}</h2>
            <p style="color: var(--slate); font-size: 1.05rem; line-height: 1.8; margin-bottom: 20px;">
                {{ $factory->meta_description }} 
            </p>
            <!--<p style="color: var(--slate); font-size: 1.05rem; line-height: 1.8;">-->
            <!--    We have invested in the best German and Swiss machinery to ensure that every thread we weave meets global compliance standards."-->
            <!--</p>-->
            <div style="margin-top: 30px;">
                <strong>{{ $factory->title }}</strong><br>
                <span style="color: #64748B; font-size: 0.9rem;">{{ $factory->meta_title }}</span>
            </div>
        </div>
    </div>

    <!-- MISSION & VISION -->
    <section class="section">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <span class="section-subtitle">Our Core Values</span>
                <h2 class="section-title">Driven by Purpose</h2>
            </div>
            <div class="mv-grid">
                <div class="mv-card" data-aos="fade-up">
                    <i class="fas fa-bullseye mv-icon"></i>
                    <h3>Our Mission</h3>
                    <p style="color: var(--slate); margin-top: 15px;">{{ $factory->pinterest }}</p>
                </div>
                <div class="mv-card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-eye mv-icon"></i>
                    <h3>Our Vision</h3>
                    <p style="color: var(--slate); margin-top: 15px;">{{ $factory->linkedin }}</p>
                </div>
                <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-gem mv-icon"></i>
                    <h3>Quality Policy</h3>
                    <p style="color: var(--slate); margin-top: 15px;">{{ $factory->youtube }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TECHNOLOGY (New Content) -->
    <section class="section section-bg" style="background: #F1F5F9;">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <span class="section-subtitle">Infrastructure</span>
                <h2 class="section-title">Powered by Technology</h2>
                <p style="color: var(--slate);">State of the art machinery from Europe & USA.</p>
            </div>
            <div class="tech-grid">
                <div class="tech-card" data-aos="fade-up">
                    <i class="fas fa-cogs tech-icon"></i>
                    <h4>Muller Looms</h4>
                    <span>Origin: Switzerland</span>
                </div>
                <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-print tech-icon"></i>
                    <h4>Heidelberg Press</h4>
                    <span>Origin: Germany</span>
                </div>
                <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-cut tech-icon"></i>
                    <h4>Ultrasonic Cutters</h4>
                    <span>Origin: Italy</span>
                </div>
                <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-microchip tech-icon"></i>
                    <h4>RFID Encoders</h4>
                    <span>Origin: USA (Zebra)</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CSR (New Content) -->
    <section class="section">
        <div class="container csr-grid">
            <div data-aos="fade-right">
                <span class="section-subtitle" style="color: var(--green);">Social Responsibility</span>
                <h2 class="section-title">{{ $factory->email }}</h2>
                <p style="color: var(--slate); margin-bottom: 25px;">
                    {{ $factory->phone_one }}
                </p>
                <ul class="csr-list" style="color: var(--navy);">
                    <li><i class="fas fa-user-md"></i> {{ $factory->phone_two }}</li>
                    <li><i class="fas fa-baby"></i> {{ $factory->phone_three }}</li>
                    <li><i class="fas fa-graduation-cap"></i> {{ $factory->phone_four }}</li>
                    <li><i class="fas fa-fire-extinguisher"></i> {{ $factory->phone_five }}</li>
                </ul>
            </div>
            <div >
                <img src="https://images.unsplash.com/photo-1590402494682-cd3fb53b1f70?auto=format&fit=crop&w=800&q=80" alt="Workers" style="width: 100%; border-radius: 20px; box-shadow: 20px 20px 0 #ECFDF5;">
            </div>
        </div>
    </section>

@endsection