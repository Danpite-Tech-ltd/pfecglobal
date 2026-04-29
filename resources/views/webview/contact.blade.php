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

        .contact-section {
            padding: 60px 0;
            background: #E4F6FA;
        }

        .contact-left h2 {
            color: #1f3c88;
            font-weight: 700;
            font-size: 36px;
        }

        .contact-left p {
            color: #333;
            margin-top: 15px;
        }

        .contact-tag {
            background: #fde2e2;
            color: #ff4d4d;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .contact-image {
            margin-top: 30px;
        }

        .contact-image img {
            max-width: 100%;
        }

        .form-card {
            background: #f8f8f8;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .form-card h5 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control, .form-select {
            border: 1px solid red;
            border-radius: 10px;
            height: 40px;
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: red;
        }

        .phone-group {
            display: flex;
            gap: 10px;
        }

        .phone-group .code {
            max-width: 80px;
        }

        .submit-btn {
            background: #ff4d4d;
            color: #fff;
            border-radius: 30px;
            padding: 10px 30px;
            border: none;
            display: block;
            margin: 15px auto 0;
        }

        @media (max-width: 768px) {
            .contact-left {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<section class="contact-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 contact-left">
                <span class="contact-tag">Contact us</span>

                <h2>
                    Reach out to us and get started on your Study Abroad Dreams
                </h2>

                <p>
                    Our team of experts are waiting to assist you further. You can get in touch by:
                </p>

                <div class="contact-image">
                    <img src="https://pfecglobal.com.bd/wp-content/uploads/2025/07/Contact-us-image-1.webp" alt="">
                </div>
            </div>

            <!-- RIGHT SIDE FORM -->
            <div class="mt-4 col-lg-6 mt-lg-0">
                <div class="form-card">
                    <h5>Register with Us to Take the Next Step</h5>

                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="mb-3 phone-group">
                            <input type="text" class="form-control code" value="+880">
                            <input type="text" class="form-control" placeholder="Mobile Number">
                        </div>

                        <div class="mb-3">
                            <select class="form-select">
                                <option>Your Nearest Office</option>
                                <option value="Banani">Banani</option>
                                <option value="Catttogram">Catttogram</option>
                                <option value="Dhanmondi">Dhanmondi</option>
                                <option value="Uttara">Uttara</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select">
                                <option>Your Preferred Study Destination</option>
                                <option value="Australia">Australia</option>
                                <option value="UK">UK</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="Ireland">Ireland</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Japan">Japan</option>
                                <option value="Europe">Europe</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select">
                                <option>English Language Test Status</option>
                                <option value="English Language TEst Status">English Language TEst Status</option>
                                <option value="I have the scores available">I have the scores available</option>
                                <option value="My exams are scheduled or waiting for results">My exams are scheduled or waiting for results</option>
                                <option value="I have not appeared for any exams">I have not appeared for any exams</option>
                                <option value="I am planning to reappear soon">I am planning to reappear soon</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select">
                                <option>How do you plan to fund your studies</option>
                                <option value="I have my own funds">I have my own funds</option>
                                <option value="I am looking for education loans">I am looking for education loans</option>
                                <option value="My parents or siblings will fund my studies">My parents or siblings will fund my studies</option>
                                <option value="I don't have source of funds">I don't have source of funds</option>
                            </select>
                        </div>

                        <div class="mb-2 form-check">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label small">
                                I agree to PFEC's Privacy Policy and consent to receive marketing and transactional updates via RCS, SMS, WhatsApp, and Email.
                            </label>
                        </div>

                        <button class="submit-btn">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
