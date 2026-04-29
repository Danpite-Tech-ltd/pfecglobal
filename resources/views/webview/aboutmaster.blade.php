@extends('webview.master')

@section('seo')
    <title> {{ App\Models\Basicinfo::first()->title }} </title>
    <meta name="description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta name="keywords" content="{{ App\Models\Basicinfo::first()->meta_keywords }}">

    <meta itemprop="name" content="{{ App\Models\Basicinfo::first()->meta_title }}">
    <meta itemprop="description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta itemprop="image" content="{{ url(App\Models\Basicinfo::first()->logo) }}">

    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ App\Models\Basicinfo::first()->meta_title }}">
    <meta property="og:description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta property="og:image" content="{{ url(App\Models\Basicinfo::first()->logo) }}">
    <meta property="image" content="{{ url(App\Models\Basicinfo::first()->logo) }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ url(App\Models\Basicinfo::first()->logo) }}">
    <meta property="twitter:card" content="{{ url(App\Models\Basicinfo::first()->logo) }}" />
    <meta property="twitter:title" content="{{ App\Models\Basicinfo::first()->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ url(App\Models\Basicinfo::first()->logo) }}">
@endsection

@section('maincontent')

@php
$aboutus = App\Models\Aboutlist::findOrfail(1);
$aboutinfos = App\Models\Aboutinfo::get();
$teamdata = App\Models\Aboutlist::findOrfail(4);
@endphp




    <!-- About Start -->
    <div class="py-5 container-fluid" id="aboutpart">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ asset($aboutus->image) }}" style="max-width: 90%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="px-3 mb-3 border btn btn-sm rounded-pill text-primary">About Us</div>
                    <h1 class="mb-4">{{$aboutus->title}}</h1>
                    <p class="mb-4">
                        {{$aboutus->details}}
                    </p>
                    <p class="mb-4">
                        {{$aboutus->small_details}}
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>{{$aboutus->title_one}}</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>{{$aboutus->title_two}}</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>{{$aboutus->title_three}}</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>{{$aboutus->title_four}}</h6>
                        </div>
                    </div>
                    <div class="mt-4 d-flex align-items-center">
                        <a class="px-4 btn btn-primary rounded-pill me-3" href="{{url('about-us')}}">Read More</a>
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank" href="{{$basicinfo->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank" href="{{$basicinfo->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank" href="{{$basicinfo->rss}}"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square" target="_blank" href="{{$basicinfo->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <div class="container py-5">
        @foreach($aboutinfos as $key => $about)
            <div class="row mb-4 g-5 {{ $key % 2 == 0 ? '' : 'flex-row-reverse' }}">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="{{ $key % 2 == 0 ? '0.1s' : '0.5s' }}">
                    <h3 class="pt-2 mt-4 mb-4">{{ $about->about_title }}</h3>
                    <p class="mb-4" style="text-align: justify">{{ $about->about_text }}</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="{{ $key % 2 == 0 ? '0.5s' : '0.1s' }}">
                    <div>
                        <img src="{{ asset($about->about_image) }}"  class="fade-in-left w-100" style="border-radius:6px;">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Team Start -->
    <div class="py-5 container-fluid bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="px-3 mb-3 border btn btn-sm rounded-pill text-primary">Our Team</div>
                    <h1 class="mb-4">{{$teamdata->title}}</h1>
                    <p class="mb-4">{{$teamdata->details}}</p>
                    <a class="px-4 btn btn-primary rounded-pill" href="#">Read More</a>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel team-carousel">
                        @include('webview.include.team')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
