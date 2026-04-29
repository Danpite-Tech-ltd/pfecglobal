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
        /* --- GLOBAL STYLES (SAME AS HOME) --- */
        :root { --navy: #0F172A; --slate: #64748B; --orange: #F97316; --light: #F8FAFC; --white: #FFFFFF; --red: #DC2626; --dark-red: #7F1D1D; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #FFF1F2; color: var(--navy); line-height: 1.7; }
        a { text-decoration: none; color: inherit; transition: 0.3s; }
        ul { list-style: none; }
        .container { max-width: 1250px; margin: 0 auto; padding: 0 20px; }
        
        /* NAVBAR */
        .navbar { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 15px 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 30px rgba(0,0,0,0.03); border-bottom: 1px solid rgba(0,0,0,0.05); }
        .nav-inner { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.8rem; font-weight: 900; color: var(--navy); letter-spacing: -1px; display: flex; align-items: center; gap: 10px; }
        .logo i { color: var(--orange); }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a { font-weight: 600; font-size: 0.9rem; color: var(--navy); position: relative; }
        .nav-links a:hover { color: var(--orange); }
        .btn { background: var(--orange); color: white; padding: 14px 30px; border-radius: 50px; font-weight: 700; border: none; cursor: pointer; font-size: 0.9rem; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3); }

        /* BLACKLIST HEADER */
        .alert-header { text-align: center; padding: 80px 0; background: var(--navy); color: white; border-bottom: 6px solid var(--red); }
        .alert-icon { font-size: 4rem; color: var(--red); margin-bottom: 15px; animation: flash 2s infinite; }
        @keyframes flash { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }

        /* SECTION TITLES */
        .section-divider { text-align: center; margin: 60px 0 40px; position: relative; }
        .section-divider h2 { font-size: 2.2rem; background: #FFF1F2; display: inline-block; padding: 0 20px; position: relative; z-index: 1; color: var(--navy); }
        .section-divider::after { content: ''; position: absolute; width: 100%; height: 2px; background: #cbd5e1; left: 0; top: 50%; z-index: 0; }

        /* SCAM CARD GRID */
        .scam-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; margin-bottom: 60px; }
        .scam-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #FECACA; position: relative; transition: 0.3s; }
        .scam-card:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(220, 38, 38, 0.15); }
        
        .scam-img-box { height: 320px; width: 100%; position: relative; overflow: hidden; background: #e2e8f0; }
        .scam-img-box img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: 0.3s; }
        .scam-card:hover .scam-img-box img { filter: grayscale(0%); }
        
        .badge { position: absolute; top: 20px; right: 20px; color: white; padding: 6px 15px; font-weight: 800; transform: rotate(-5deg); letter-spacing: 1px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); border: 2px solid white; text-transform: uppercase; }
        .badge-fraud { background: var(--red); }
        .badge-terminated { background: #000000; }

        .scam-body { padding: 30px; }
        .scam-name { font-size: 1.5rem; font-weight: 800; color: var(--navy); margin-bottom: 5px; }
        .scam-role { color: var(--red); font-weight: 700; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 15px; display: block; }
        
        .scam-details { list-style: none; margin-bottom: 20px; border-top: 1px solid #eee; padding-top: 15px; }
        .scam-details li { margin-bottom: 8px; font-size: 0.9rem; display: flex; gap: 10px; color: var(--slate); }
        .scam-details li i { color: var(--navy); width: 20px; }

        .reason-box { background: #FFF1F2; padding: 15px; border-radius: 8px; border-left: 4px solid var(--red); }
        .reason-title { font-size: 0.8rem; font-weight: 700; color: var(--red); text-transform: uppercase; display: block; margin-bottom: 5px; }
        .reason-text { font-size: 0.95rem; color: var(--dark-red); font-weight: 600; line-height: 1.5; }

        /* FOOTER */
        footer { background: #0B1121; color: #94A3B8; padding: 100px 0 0; font-size: 0.95rem; margin-top: 50px; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; padding-bottom: 60px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .footer-col h4 { color: white; margin-bottom: 25px; }
        .footer-col ul li { margin-bottom: 15px; }
        .footer-col ul li a:hover { color: var(--orange); padding-left: 5px; }
        .social-links a { width: 40px; height: 40px; background: rgba(255,255,255,0.1); display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white; margin-right: 10px; transition: 0.3s; }
        .social-links a:hover { background: var(--orange); }
        .footer-bottom { padding: 30px 0; text-align: center; }

        @media(max-width: 900px) { 
            .nav-links, .top-bar { display: none; } 
            .scam-grid, .footer-top { grid-template-columns: 1fr; }
        }
    </style>
    
    
        <!-- HEADER -->
    <header class="alert-header">
        <div class="container">
            <i class="fas fa-shield-alt alert-icon"></i>
            <h1 style="font-size: 2.5rem; margin-bottom: 10px;color:white;">Security Notice Board</h1>
            <p style="opacity: 0.9; max-width: 600px; margin: 0 auto;">
                Official list of blacklisted entities and terminated employees due to fraud, theft, or policy violations.
            </p>
        </div>
    </header>

    <div class="container" style="margin-top: 50px;">

        <!-- SECTION 1: BLACKLISTED CLIENTS -->
        <div class="section-divider">
            <h2>🚫 Banned Clients & Companies</h2>
        </div>

        <div class="scam-grid">
            <!-- Client 1 -->
            @foreach($clients as $value)
                <div class="scam-card">
                    <div class="scam-img-box">
                        <img src="{{ asset($value->image) }}" alt="Client">
                        <span class="badge badge-fraud">{{ $value->badge }}</span>
                    </div>
                    <div class="scam-body">
                        <h3 class="scam-name">{{ $value->name }}</h3>
                        <span class="scam-role">{{ $value->title }}</span>
                        <ul class="scam-details">
                            <li><i class="fas fa-map-marker-alt"></i> Address: {{ $value->facebook }}</li>
                            <li><i class="fas fa-phone"></i> Contact: {{ $value->tweitter }}</li>
                            <li><i class="fas fa-calendar-times"></i> Banned: {{ $value->instagram }}</li>
                        </ul>
                        <div class="reason-box">
                            <span class="reason-title">Crime / Reason:</span>
                            <p class="reason-text">"{{ $value->linkedin }}"</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <!-- SECTION 2: TERMINATED EMPLOYEES -->
        <div class="section-divider">
            <h2 style="color: #7F1D1D;">⚠️ Terminated Employees (Staff)</h2>
        </div>
        <div class="scam-grid">
            @foreach($stafs as $value)
                <div class="scam-card">
                    <div class="scam-img-box">
                        <img src="{{ asset($value->image) }}" alt="Staf">
                        <span class="badge badge-fraud">{{ $value->badge }}</span>
                    </div>
                    <div class="scam-body">
                        <h3 class="scam-name">{{ $value->name }}</h3>
                        <span class="scam-role">{{ $value->title }}</span>
                        <ul class="scam-details">
                            <li><i class="fas fa-map-marker-alt"></i> Address: {{ $value->facebook }}</li>
                            <li><i class="fas fa-phone"></i> Contact: {{ $value->tweitter }}</li>
                            <li><i class="fas fa-calendar-times"></i> Banned: {{ $value->instagram }}</li>
                        </ul>
                        <div class="reason-box">
                            <span class="reason-title">Crime / Reason:</span>
                            <p class="reason-text">"{{ $value->linkedin }}"</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection