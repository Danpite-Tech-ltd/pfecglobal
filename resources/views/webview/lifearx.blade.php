@extends('webview.master')

@section('seo')
    <!-- HTML Meta Tags -->
    <title>{{ App\Models\Basicinfo::first()->title }}</title>
    <meta name="description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta name="keywords" content="{{ App\Models\Basicinfo::first()->meta_keywords }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ App\Models\Basicinfo::first()->meta_title }}">
    <meta itemprop="description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta itemprop="image" content="{{ url(App\Models\Basicinfo::first()->meta_image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ App\Models\Basicinfo::first()->meta_title }}">
    <meta property="og:description" content="{{ App\Models\Basicinfo::first()->meta_description }}">
    <meta property="og:image" content="{{ url('public/rowlogo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta property="image" content="{{ url(App\Models\Basicinfo::first()->meta_image) }}" />
    <meta property="url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ url(App\Models\Basicinfo::first()->meta_image) }}">
    <meta property="twitter:card" content="{{ url(App\Models\Basicinfo::first()->meta_image) }}" />
    <meta property="twitter:title" content="{{ App\Models\Basicinfo::first()->meta_title }}" />
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{ url('public/rowlogo.png') }}">

    <!-- Favicon -->
    <link href="{{ asset('public/webview/img/') }}/metaarcade.jpg" rel="icon">
@endsection
@section('maincontent')

<!-- Testimonial Start -->
<div class="container-xxl">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-150">
                <h1 class="mb-4">Life @ <span style="color:#0060d6">Arcadex-IT</span></h1>
                <p class="mb-4" style="text-align: justify">
                    ArcadexIT ensures a harmonious blend of work-life balance. We nurture an environment that's both fun-loving and growth-oriented. Every day represents opportunities to enjoy what you do while enhancing your skills. Join us on a journey where you can thrive professionally and personally.
                </p>
                <a class="btn btn-primary px-4" href="">View Openings</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/collups.webp') }}" alt="" class="fade-in-left w-100" style="border-radius:6px;">
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/fm1.png') }}" alt="" class="w-100" style="border-radius:6px;">
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-130">
                <h3 class="mb-4">Collaboration is Our <span style="color:#0060d6">Strength</span></h3>
                <p class="mb-4" style="text-align: justify">
                    Our vibrant culture practices collaboration, innovation, and respect. Our team is more than just colleagues – we're a community of good people who support, inspire, and uplift each other.
                </p>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-130">
                <h3 class="mb-4">Working Together is <span style="color:#0060d6">Relaxing & Fun</span></h3>
                <p class="mb-4" style="text-align: justify">
                    We unwind and recharge ourselves with various activities that promote well-being and companionship. We ensure that every employee has opportunities to relax and have fun during work.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/fm2.png') }}" alt="" class="w-100" style="border-radius:6px;">
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/fm3.png') }}" alt="" class="w-100" style="border-radius:6px;">
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-130">
                <h3 class="mb-4">We Enjoy Happy <span style="color:#0060d6">Tummy & Mind</span></h3>
                <p class="mb-4" style="text-align: justify">
                    Fueling creativity and productivity is at the heart of what we do. We have a curated selection of meals, snacks, tea, and coffee and never worry about a rumbling stomach or a caffeine crash.
                </p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-130">
                <h3 class="mb-4">Nurturing Our Bonds &<br><span style="color:#0060d6">Creating Memories</span></h3>
                <p class="mb-4" style="text-align: justify">
                    Our yearly company outing is a cherished tradition. Where we come together to create lasting memories, strengthen bonds, and recharge our spirits in an enjoyable and relaxed setting.
                </p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/fm4.png') }}" alt="" class="w-100" style="border-radius:6px;">
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div>
                    <img src="{{ asset('public/fm5.png') }}" alt="" class="w-100" style="border-radius:6px;">
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" id="mr-top-130">
                <h3 class="mb-4">Celebrating Every <span style="color:#0060d6">Milestones</span></h3>
                <p class="mb-4" style="text-align: justify">
                    Exceptional efforts deserve recognition. At Arcadex-IT, we go the extra mile to celebrate employee excellence through awards and special honors. Every accomplishment stands as a monument to our success.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 pb-4 mb-4">
        <div class="owl-carousel gallery-carousel">
            @forelse (App\Models\Team::where('status','Active')->get() as $team)
                <div class="item">
                    <img src="{{ asset($team->image) }}" alt="" style="height:300px">
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8 m-auto text-center wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Explore The <span style="color:#0060d6">Arcadex-IT HQ</span></h1>
                <p class="text-center">
                    Join us on this virtual office tour and explore how we bridge culture, creativity and ethics under one roof to develop all the amazing software for your success.
                </p>
            </div>
        </div>
        <div class="row mt-4 pt-4">
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/well.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Mental Well-being</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    A healthy mind fuels productivity. Here, mental well-being is not just a consideration; it's a priority.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/people.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">People First, Always</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    People are at the forefront. We value skills, experiences, and perspectives that shape our team.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/courtesy.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Courtesy & Kindness</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    It’s how we interact with one another, creating an environment of respect, collaboration, and mutual support.
                </p>
            </div>

            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/career.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Career Development</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    We provide every member with the tools, resources, and opportunities to advance and learn.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/attention.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Attention to Detail</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    We ensure that every line of code, every design element, and every solution is crafted to perfection.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/embrace.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Embrace Innovation</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    Innovation is our compass. We always encourage innovative ideas that help us grow together.
                </p>
            </div>

        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/equality.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Equality & Empathy</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    We stand united in our commitment to fairness, diversity, and understanding, where every voice is heard.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn text-center mb-4" data-wow-delay="0.1s">
                <img src="{{ asset('public/joyfull.png') }}" alt="" style="width:60px">
                <h4 class="mb-2 mt-2">Joyful Workspace</h4>
                <p class="m-0 p-0" style="font-size: 15px;">
                    Our workspace is a hub where we share joyful experiences. We work, laugh, and vibe together in harmony.
                </p>
            </div>
        </div>
    </div>

</div>
<!-- Testimonial End -->


@endsection
