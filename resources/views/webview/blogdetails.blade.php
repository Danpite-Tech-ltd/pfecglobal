@extends('webview.master')

@section('seo')
    <title>{{$blogdata->title}}</title>
    <meta name="description" content="{{ $blogdata->meta_description }}">
    <meta name="keywords" content="{{ $blogdata->meta_keywords }}">

    <meta itemprop="name" content="{{ $blogdata->meta_title }}">
    <meta itemprop="description" content="{{ $blogdata->meta_description }}">
    <meta itemprop="image" content="{{ url($blogdata->thumbnail) }}">

    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $blogdata->meta_title }}">
    <meta property="og:description" content="{{ $blogdata->meta_description }}">
    <meta property="og:image" content="{{ url($blogdata->thumbnail) }}">
    <meta property="image" content="{{ url($blogdata->thumbnail) }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ url($blogdata->thumbnail) }}">
    <meta property="twitter:card" content="{{ url($blogdata->thumbnail) }}" />
    <meta property="twitter:title" content="{{ $blogdata->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ url($blogdata->thumbnail) }}">
@endsection

@section('maincontent')
    <style>
        /* Top Header Card */
        .header-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-top: 40px;
        }

        .blog-main-title {
            color: #002147;
            font-weight: 700;
            font-size: 28px;
        }

        .meta-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .summary-label {
            color: #ff6b6b;
            font-weight: 600;
            font-size: 18px;
        }

        .summary-text {
            font-size: 15px;
            color: #444;
            line-height: 1.7;
        }

        .main-img {
            border-radius: 10px;
            width: 100%;
            height: auto;
        }

        /* Sticky Navigation Bar */
        .jump-to-topic {
            background: #fff;
            background-color: #F0F4F7;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 12px 20px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 20px;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .jump-to-topic span {
            color: #ff6b6b;
            font-weight: 500;
        }

        .jump-to-topic .contents-text {
            color: #333;
            margin-left: 10px;
        }

        /* Sidebar CTA */
        .cta-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 100px;
        }

        .cta-card img {
            width: 100%;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .cta-title {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .cta-desc {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .cta-btn {
            background: #ff6b6b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            width: 100%;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
        }

        .content-area h3 {
            color: #002147;
            font-weight: 700;
            margin-top: 30px;
        }

        .content-area p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .blog-main-title {
                font-size: 22px;
            }

            .header-card {
                padding: 15px;
            }
        }
    </style>
    <div class="container mb-5">
        <div class="mb-5 header-card">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <h1 class="blog-main-title">{{ $blogdata->title }}</h1>
                    <div class="mt-3 meta-text">
                        <span class="me-3">
                            <i class="far fa-user"></i> {{ $blogdata->author }}
                        </span>

                        <span class="me-3">
                            <i class="far fa-calendar-alt"></i>
                            {{ $blogdata->created_at->format('F d, Y') }}
                        </span>

                        <span class="me-3">
                            <i class="far fa-clock"></i>
                            {{ $blogdata->created_at->format('g:i a') }}
                        </span>

                        <span>
                            <i class="fas fa-book-open"></i> 8 min Read
                        </span>
                    </div>
                    <h5 class="summary-label">Summary</h5>
                    <p class="summary-text">
                        {{$blogdata->short_description}}
                    </p>
                </div>
                <div class="mt-4 col-12 col-md-5 mt-md-0">
                    <img src="{{ asset($blogdata->thumbnail) }}" class="main-img" alt="{{ $blogdata->title }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-9 content-area">

                <div class="jump-to-topic">
                    <div>
                        <span>Jump to Topic</span>
                        <span class="contents-text">| &nbsp; Contents</span>
                    </div>
                    <i class="fas fa-chevron-up" style="color: #ff6b6b;"></i>
                </div>

                <div>
                    {!! $blogdata->description !!}
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="mt-5 col-12 col-md-3 mt-md-0">
                <div class="cta-card">
                    <img src="{{ asset('public/blog-details-rightside.png') }}" alt="Study Abroad">
                    <h4 class="cta-title">Take your Study Abroad Dreams to the Next Level</h4>
                    <p class="cta-desc">Receive free end-to-end assistance and personalized guidance from experts</p>
                    <a href="{{ url('contact-us') }}" class="cta-btn">GET STARTED FOR FREE &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
