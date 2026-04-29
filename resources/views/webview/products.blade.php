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
        :root { --navy: #0F172A; --slate: #64748B; --orange: #F97316; --light: #F8FAFC; --white: #FFFFFF; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light); color: var(--navy); line-height: 1.7; }
        a { text-decoration: none; color: inherit; transition: 0.3s; }
        ul { list-style: none; }
        .container { max-width: 1250px; margin: 0 auto; padding: 0 20px; }
        .btn { background: var(--orange); color: white; padding: 14px 30px; border-radius: 50px; font-weight: 700; border: none; cursor: pointer; }
        
        /* Navbar (Same as other pages) */
        .navbar { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 15px 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 30px rgba(0,0,0,0.03); }
        .nav-inner { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.8rem; font-weight: 900; color: var(--navy); display: flex; align-items: center; gap: 10px; }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a { font-weight: 600; font-size: 0.9rem; color: var(--navy); }
        .nav-links a:hover { color: var(--orange); }

        /* FILTER BUTTONS */
        .filter-nav { display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; margin: 50px 0 30px; }
        .filter-btn { 
            border: 1px solid #e2e8f0; background: white; padding: 10px 25px; 
            border-radius: 30px; cursor: pointer; font-weight: 600; color: var(--slate); transition: 0.3s;
        }
        .filter-btn:hover, .filter-btn.active { background: var(--navy); color: white; border-color: var(--navy); }

        /* PRODUCT GRID */
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; padding-bottom: 80px; }
        .p-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; border: 1px solid #f1f5f9; display: block; } /* display:block is default */
        .p-card.hide { display: none; } /* Class to hide items */
        
        .p-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-color: var(--orange); }
        .p-img img { width: 100%; height: 260px; object-fit: cover; transition: 0.5s; }
        .p-card:hover .p-img img { transform: scale(1.1); }
        .p-body { padding: 25px; }
        .p-cat { color: var(--orange); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; margin-bottom: 5px; display: block; }
        .p-buyer { font-size: 0.8rem; background: #e2e8f0; padding: 3px 8px; border-radius: 4px; float: right; color: #475569; }

        /* FOOTER (Same as other pages) */
        footer { background: #0B1121; color: #94A3B8; padding: 100px 0 0; font-size: 0.95rem; margin-top: 50px; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; padding-bottom: 60px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .footer-col h4 { color: white; margin-bottom: 25px; }
        .footer-col ul li { margin-bottom: 15px; }
        .footer-col ul li a:hover { color: var(--orange); padding-left: 5px; }
        .social-links a { width: 40px; height: 40px; background: rgba(255,255,255,0.1); display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white; margin-right: 10px; transition: 0.3s; }
        .social-links a:hover { background: var(--orange); }
        .footer-bottom { padding: 30px 0; text-align: center; }
        
        @media(max-width: 900px) { .footer-top { grid-template-columns: 1fr; } .nav-links { display: none; } }
    </style>

    <div style="background: #F8FAFC; padding: 60px 0; text-align: center;">
        <div class="container">
            <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Product Gallery</h1>
            <p>Filter by category to see our latest work for global buyers.</p>
        </div>
    </div>

    <div class="container">
        <!-- FILTER BUTTONS -->
        <div class="filter-nav">
            <button class="filter-btn active" onclick="filterProduct('all')">All Products</button>
            @foreach($categories as $category)
                <button class="filter-btn" onclick="filterProduct('{{ $category->slug ?? '' }}')">
                    {{ $category->category_name }}
                </button>
            @endforeach
        </div>
    
        <!-- PRODUCT GRID -->
        <div class="product-grid">
            @foreach($products as $product)
                <div class="p-card {{ $product->category->slug ?? '' }}">
                    <div class="p-img"><img src="{{ asset($product->thumbnail) }}"></div>
                    <div class="p-body">
                        <span class="p-cat">{{ $product->category->category_name ?? '' }}</span>
                        <h3>{{ $product->title }}</h3>
                        <p>{{ $product->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
        <!-- JAVASCRIPT FOR FILTERING -->
    <script>
        function filterProduct(category) {
            let cards = document.querySelectorAll('.p-card');
            let buttons = document.querySelectorAll('.filter-btn');

            // Button Active State
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Filtering Logic
            cards.forEach(card => {
                if (category === 'all') {
                    card.classList.remove('hide');
                } else {
                    if (card.classList.contains(category)) {
                        card.classList.remove('hide');
                    } else {
                        card.classList.add('hide');
                    }
                }
            });
        }
    </script>

@endsection