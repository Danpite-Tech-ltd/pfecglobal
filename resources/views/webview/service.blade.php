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
    .service-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 40px 30px;
    text-align: center;
    height: 100%;
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.12);
}

.icon-box {
    width: 90px;
    height: 90px;
    margin: 0 auto 25px;
    background: #f2f6ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-box img {
    width: 45px;
}

.service-card h4 {
    font-weight: 700;
    margin-bottom: 15px;
    color: #0f172a;
}

.service-card p {
    font-size: 15px;
    color: #6b7280;
    line-height: 1.7;
    margin-bottom: 25px;
}

.read-more {
    display: inline-block;
    text-decoration: none;
    color: #2563eb;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 30px;
    background: #eef2ff;
    transition: all 0.3s ease;
}

.service-card:hover .read-more {
    background: #2563eb;
    color: #ffffff;
}
</style>
    <!-- Hero Start -->
    <div class="pt-5 mb-5 container-fluid" >
        <div class="container">
            <div class="row g-5">
                <div class="text-center col-lg-6 align-self-center text-lg-start ">
                    <h2 class="mb-3">
                        Our Services
                    </h2>
                </div>
            </div>
            <div class="row">
                @forelse($services as $service)
                <div class="mb-3 col-12 col-md-3">
                    <div class="service-card">
                        <div class="icon-box">
                            <img src="{{ asset($service->service_image) }}" alt="NodeJS">
                        </div>
                        <h4>{{ $service->service_title }}</h4>
                        <p style="height: 77px;overflow: hidden;">
                            {{ $service->service_text }}
                        </p>
                        <a href="{{ $service->link }}" class="read-more">Read More</a>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- Hero End -->

@endsection
