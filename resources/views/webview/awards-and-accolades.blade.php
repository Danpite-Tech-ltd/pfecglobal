@extends('webview.master')
@section('title')
    {{ env('APP_NAME') }}- Awards
@endsection
@section('maincontent')

    <section class="banner-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <span class="badge-text">Awards and Achievements</span>
                    <h1 class="main-title">PFEC Global: Shining with Prestigious Awards!</h1>
                    <p class="sub-text">Our efforts have been recognized with many prestigious accolades over the years</p>
                    <a href="#" class="btn-consult">Book a FREE Consultation &rarr;</a>
                </div>

                <div class="col-12 col-md-6 banner-img-box">
                    <img src="https://pfecglobal.com.bd/wp-content/uploads/2025/08/Awards-page-banner-1.webp"
                        alt="Awards Banner">
                </div>
            </div>
        </div>
    </section>

    <section class="highlights-area">
        <div class="container">
            <h2 class="section-heading">Key Highlights</h2>
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="item-box">
                        <div class="skew-icon"></div>
                        <p class="item-desc">Earning a multitude of esteemed awards and honors, PFEC Global stands tall in
                            its years of remarkable operation.</p>
                    </div>
                    <div class="item-box">
                        <div class="skew-icon"></div>
                        <p class="item-desc">Our team's unmatched expertise and unwavering dedication are key to propelling
                            us to unparalleled success in the consultancy industry.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="item-box">
                        <div class="skew-icon"></div>
                        <p class="item-desc">With a rich history of more than a decade, PFEC Global boasts numerous honors
                            and awards that set us apart and fuel our drive to gain industry wide acclaim.</p>
                    </div>
                    <div class="item-box">
                        <div class="skew-icon"></div>
                        <p class="item-desc">Let's proudly present a glimpse of the remarkable accolades we've garnered
                            throughout our journey as a devoted higher education and award-winning education agency.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>

        <div class="container">
            <h2 class="mt-4 mb-2 gallery-title">Awards <span>Gallery</span></h2>

            <div class="row g-4">
                @foreach ($awards as $award)
                    <div class="col-6 col-md-4">
                        <div class="award-card">
                            <div class="logo-area">
                                <img src="{{ asset($award->image) }}"
                                    alt="Logo" class="university-logo">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <style>
        .banner-container {
            padding: 45px 0;
            background: #E4F6FA;
        }

        .badge-text {
            background-color: #fff1f1;
            color: #ff6b6b;
            padding: 6px 15px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 25px;
        }

        .main-title {
            color: #1a237e;
            font-weight: 800;
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .sub-text {
            color: #444;
            font-size: 17px;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .btn-consult {
            background-color: #ee5253;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .banner-img-box img {
            width: 100%;
            border-radius: 10px;
        }

        .highlights-area {
            background-color: #1c237e;
            color: white;
            padding: 60px 0;
        }

        .section-heading {
            color: #fff;
            text-align: center;
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 50px;
        }

        .item-box {
            display: flex;
            align-items: flex-start;
            margin-bottom: 40px;
        }

        .skew-icon {
            background-color: white;
            min-width: 12px;
            height: 25px;
            margin-right: 15px;
            transform: skewX(-20deg);
            margin-top: 5px;
        }

        .item-desc {
            font-size: 15px;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 28px;
            }

            .banner-container {
                text-align: center;
            }

            .banner-img-box {
                margin-top: 40px;
            }
        }

        .gallery-title {
            text-align: center;
            font-weight: 800;
            font-size: 32px;
            color: #1a237e;
        }

        .gallery-title span {
            color: #000;
        }

        .award-card {
            background: #fff;
            border-radius: 12px;
            height: 100%;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .award-card:hover {
            transform: translateY(-5px);
        }

        .logo-area {
            text-align: center;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .recognized-by {
            font-size: 11px;
            color: #888;
            margin-bottom: 10px;
        }

        .university-logo {
            max-width: 100%;
            object-fit: contain;
        }

        .cricos-text {
            font-size: 10px;
            color: #999;
            margin-top: 5px;
        }

        .award-list-area {
            background-color: #fff9e6;
            padding: 20px;
            min-height: 120px;
            border-top: 1px solid #eee;
        }

        .award-list-area ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .award-list-area li {
            font-size: 13px;
            color: #444;
            margin-bottom: 8px;
            position: relative;
            padding-left: 15px;
            line-height: 1.4;
            font-weight: 500;
        }

        .award-list-area li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #444;
        }

        @media (max-width: 767px) {
            .gallery-title {
                font-size: 24px;
            }

            .award-list-area {
                padding: 10px;
            }

            .award-list-area li {
                font-size: 11px;
            }

            .university-logo {
                max-width: 100%;
            }

            .logo-area {
                padding: 15px 10px;
                min-height: 100px;
            }
        }
    </style>
@endsection
