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
@endsection
@section('maincontent')
    @php
    $aboutus = App\Models\Aboutlist::findOrfail(1);
    $servicetext = App\Models\Aboutlist::findOrfail(3);
    $chooseus = App\Models\Aboutlist::findOrfail(2);
    $teamdata = App\Models\Aboutlist::findOrfail(4);
    $reviewtext = App\Models\Aboutlist::findOrfail(5);
    @endphp

    <!-- Hero Start -->
    <div class="pt-5 mb-5 container-fluid bg-primary hero-header">
        <div class="owl-carousel slider-carousel">
            @forelse ($sliders as $slider)
                <div class="item">
                    <div class="container pt-5">
                        <div class="pt-5 row g-5">
                            <div class="text-center col-lg-6 align-self-center text-lg-start mb-lg-5">
                                <div class="px-3 mb-3 text-white border btn btn-sm rounded-pill animated slideInRight">ArcadexIT</div>
                                <h1 class="mb-4 text-white display-4 animated slideInRight">{{ $slider->slider_title }}</h1>
                                <p class="mb-4 text-white animated slideInRight">{{ $slider->slider_text }}</p>
                                <a href="{{$slider->slider_btn_link}}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">{{ $slider->slider_btn_name }}</a>
                                <a href="tel:{{ $basicinfo->phone_one }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                            </div>
                            <div class="text-center col-lg-6 align-self-end text-lg-end">
                                <img class="img-fluid" src="{{ asset($slider->slider_image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
    <!-- Hero End -->


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


    <!-- Service Start -->
    <div class="py-5 mt-5 container-fluid bg-light" id="servicepart">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="px-3 mb-3 border btn btn-sm rounded-pill text-primary">Our Services</div>
                    <h1 class="mb-4">{{$servicetext->title}}</h1>
                    <p class="mb-4">{{$servicetext->details}}</p>
                    <a class="px-4 btn btn-primary rounded-pill" href="{{url('services')}}">See More</a>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel services-carousel">
                        @include('webview.include.service')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="pt-5 container-fluid bg-primary feature">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="px-3 mb-3 text-white border btn btn-sm rounded-pill">Why Choose Us</div>
                    <h1 class="mb-4 text-white">{{$chooseus->title}}</h1>
                    <p class="mb-4 text-light">{{$chooseus->details}}</p>
                    <div class="mb-3 text-white d-flex align-items-center">
                        <div class="bg-white btn-sm-square text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>{{$chooseus->title_one}}</span>
                    </div>
                    <div class="mb-3 text-white d-flex align-items-center">
                        <div class="bg-white btn-sm-square text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>{{$chooseus->title_two}}</span>
                    </div>
                    <div class="mb-3 text-white d-flex align-items-center">
                        <div class="bg-white btn-sm-square text-primary rounded-circle me-3" style="width:52px">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>{{$chooseus->title_three}}</span>
                    </div>
                    <div class="pt-3 row g-4">
                        <div class="col-sm-6">
                            <div class="p-3 rounded d-flex" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="text-white fa fa-users fa-3x"></i>
                                <div class="ms-3">
                                    <h2 class="mb-0 text-white" data-toggle="counter-up">{{$chooseus->title_four}}</h2>
                                    <p class="mb-0 text-white">Happy Clients</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded d-flex" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="text-white fa fa-check fa-3x"></i>
                                <div class="ms-3">
                                    <h2 class="mb-0 text-white" data-toggle="counter-up">{{$chooseus->title_five}}</h2>
                                    <p class="mb-0 text-white">Project Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center col-lg-6 align-self-end text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid" src="{{ asset($chooseus->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->




    <!-- FAQs Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="px-3 mb-3 border btn btn-sm rounded-pill text-primary">See Our FAQs</div>
                <h1 class="mb-4">Frequently Asked Questions</h1>
            </div>
            <div class="accordion" id="accordionFAQ1">
                <div class="row">
                    @forelse ($faqs as $key=>$faq)
                        <div class="col-lg-6">
                            <div class="accordion-item wow fadeIn" data-wow-delay="0.{{ $key+1 }}s">
                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionFAQ1">
                                    <div class="accordion-body">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Start -->


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


    <!-- Testimonial Start -->
    <div class="py-5 container-xxl">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="px-3 mb-3 border btn btn-sm rounded-pill text-primary">Testimonial</div>
                    <h1 class="mb-4">{{$reviewtext->title}}</h1>
                    <p class="mb-4">{{$reviewtext->details}}</p>
                    <a class="px-4 btn btn-primary rounded-pill" href="#">Read More</a>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel border-start border-primary">
                        @forelse ($testimonials as $testimonial)
                            <div class="testimonial-item ps-5">
                                <i class="mb-3 fa fa-quote-left fa-2x text-primary"></i>
                                <p class="fs-4">{{ $testimonial->text }}</p>
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset($testimonial->image) }}" style="width: 60px; height: 60px;">
                                    <div class="ps-3">
                                        <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                        <span>{{ $testimonial->title }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


@endsection
