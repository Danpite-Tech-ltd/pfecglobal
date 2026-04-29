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

    <!-- Contact Start -->
    <div class="container contact-wrapper">
        <div class="contact-info">
            <h2 style="margin-bottom: 30px;color:#fff">Contact Information</h2>
            <div style="margin-bottom: 20px;"><i class="fas fa-map-marker-alt"
                    style="color: var(--orange); margin-right: 10px;"></i> {{ $basicinfo->address }}</div>
            <div style="margin-bottom: 20px;"><i class="fas fa-phone-alt"
                    style="color: var(--orange); margin-right: 10px;"></i> {{ $basicinfo->phone_one }}</div>
            <div style="margin-bottom: 20px;"><i class="fas fa-envelope"
                    style="color: var(--orange); margin-right: 10px;"></i> {{ $basicinfo->email }}</div>
            <iframe
                src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703692693!2d90.2792399!3d23.810331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb33324832740e194!2sGazipur!5e0!3m2!1sen!2sbd!4v1647963321568!5m2!1sen!2sbd"
                width="100%" height="250" style="border:0; border-radius: 10px; margin-top: 20px;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
        <div class="contact-form">
            <h2 style="margin-bottom: 20px; color: var(--navy);">Send a Message</h2>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ url('contact-post') }}" method="POST">
                @csrf
                <label>Name</label><input type="text" placeholder="John Doe" name="name" required>
                <label>Email</label><input type="email" placeholder="email@company.com" name="email" required>
                <label>Subject</label>
                <select name="subject">
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Request Quote">Request Quote</option>
                </select>
                <label>Message</label><textarea rows="5" placeholder="How can we help?" name="message"></textarea>
                <button class="btn" type="submit" style="width: 100%;">Send Message</button>
            </form>
        </div>
    </div>
    <!-- Contact End -->
    <style>
        :root {
            --navy: #0F172A;
            --slate: #64748B;
            --orange: #F97316;
            --light: #F8FAFC;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--light);
            color: var(--navy);
            line-height: 1.7;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: 0.3s;
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1250px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            background: var(--orange);
            color: white;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        }

        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--navy);
        }

        .nav-links a:hover {
            color: var(--orange);
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            padding: 80px 0;
        }

        .contact-info {
            background: var(--navy);
            color: white;
            padding: 40px;
            border-radius: 15px;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: #f9f9f9;
        }

        /* FOOTER SAME AS INDEX */
        footer {
            background: #0B1121;
            color: #94A3B8;
            padding: 100px 0 0;
            font-size: 0.95rem;
            margin-top: 50px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-col h4 {
            color: white;
            margin-bottom: 25px;
        }

        .footer-col ul li {
            margin-bottom: 15px;
        }

        .footer-col ul li a:hover {
            color: var(--orange);
            padding-left: 5px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            margin-right: 10px;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: var(--orange);
        }

        .footer-bottom {
            padding: 30px 0;
            text-align: center;
        }

        @media(max-width: 900px) {

            .contact-wrapper,
            .footer-top {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>

@endsection
