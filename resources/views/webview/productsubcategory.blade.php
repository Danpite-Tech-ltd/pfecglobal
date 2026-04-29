@extends('webview.master')

@section('seo')
    <title>{{$subcategory?->title}}</title>
    <meta name="description" content="{{ $subcategory?->meta_description }}">
    <meta name="keywords" content="{{ $subcategory?->meta_keywords }}">

    <meta itemprop="name" content="{{ $subcategory?->meta_title }}">
    <meta itemprop="description" content="{{ $subcategory?->meta_description }}">
    <meta itemprop="image" content="{{ asset($subcategory->thumbnail ?? '') }}">

    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $subcategory?->meta_title }}">
    <meta property="og:description" content="{{ $subcategory?->meta_description }}">
    <meta property="og:image" content="{{ asset($subcategory->thumbnail ?? '') }}">
    <meta property="image" content="{{ asset($subcategory->thumbnail ?? '') }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ asset($subcategory->thumbnail ?? '') }}">
    <meta property="twitter:card" content="{{ asset($subcategory->thumbnail ?? '') }}" />
    <meta property="twitter:title" content="{{ $subcategory?->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ asset($subcategory->thumbnail ?? '') }}">
@endsection

@section('maincontent')

    @if($products)

        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-sidebar">
                        <h5 class="sidebar-title">Subcategory</h5>

                        <ul class="product-list">
                            @foreach ($subcategories as $value)
                                <li>
                                    <a href="{{ url('product/subcategory/'. $category->slug. '/' .$value->slug) }}">
                                        <img src="{{ asset($value->image) }}" alt="">
                                        <span>{{ $value->subcategory_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--{{ $products }}-->
                <div class="col-lg-9">
                    <section id="garments" class="section2 section-bg">
                        <div class="container">
                            <h5 class="sidebar-title">Products</h5>
                            <div class="product-grid2">
                                @foreach ($products as $value)
                                    <a>
                                        <div class="p-card" data-aos="fade-up">
                                            <div class="p-img"><img src="{{ asset($value->thumbnail) }}"
                                                    alt="Woven Label">
                                                    <!--@if($value->subtitle)-->
                                                    <!--<span class="p-badge">{{ $value->subtitle }}</span> @endif-->
                                            </div>
                                            <div class="p-body">
                                                <h3>{{ $value->title }}</h3><span class="p-spec">{{ $value->short_description }}</span>
                                                <!--<p style="color: var(--slate); font-size: 0.9rem; margin-top: 10px;">-->
                                                <!--    {{$value->details}}-->
                                                <!--</p>-->
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    @else
        <h3 class="py-5 text-center text-danger">No Products Available!</h3>
    @endif
    <style>
        .product-grid2 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 50px;
        }
        
        /* Mobile */
        @media (max-width: 768px) {
            .product-grid2 {
                grid-template-columns: repeat(1, 1fr);
            }
        }


        .section2 {
            padding: 10px 0
        }

        .garment-product {
            padding: 20px;
        }

        .garment-product .productImg {
            width: 100%;
            height: auto
        }

        .product-sidebar {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .product-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .product-list li {
            margin-bottom: 12px;
        }

        .product-list a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            gap: 10px;
            padding: 8px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .product-list a:hover {
            background: #f5f5f5;
        }

        .product-list img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
@endsection
