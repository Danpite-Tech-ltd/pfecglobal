<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="icon" type="image/x-icon" href="{{asset($basicinfo->logo)}}">
    <!---// seo--->
    @yield('seo')
    <!---// css includes --->
    @include('webview.include.css')
</head>
<body>

    <!-- Navbar Start -->
    @include('webview.include.header')
    <!-- Navbar End -->
        @yield('maincontent')


    <!-- Footer Start -->
    @include('webview.include.footer')
    <!-- Footer End -->

    <!---// js includes --->
    @include('webview.include.js')

    <!-- DETAILED FOOTER -->


    <!-- WIDGETS -->
    <a href="https://wa.me/88{{ $basicinfo->phone_one }}" target="_blank" class="whatsapp-btn"><i class="fab fa-whatsapp"></i></a>
    <a href="https://wa.me/88{{ $basicinfo->phone_one }}" class="chat-btn"><i class="fas fa-comments"></i></a>
    <a href="" class="top-btn"><i class="fas fa-arrow-up"></i></a>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script> AOS.init({ duration: 800, offset: 100, once: true }); </script>
</body>
</html>

