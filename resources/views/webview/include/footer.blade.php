{{-- <div class="pt-5 container-fluid bg-dark text-white-50 footer">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="#" class="mb-3 d-inline-block">
                    <img src="{{ asset($basicinfo->logo) }}" style="width: 180px;">
                </a>
                <p class="mb-0">{{$basicinfo->footer_text_logo}}</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <h5 class="mb-4 text-white">Get In Touch</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>{!! $basicinfo->address !!}</p>
                <p><i class="fa fa-phone-alt me-3"></i>{{ $basicinfo->phone_one }}</p>
                <p><i class="fa fa-envelope me-3"></i>{{ $basicinfo->email }}</p>
                <div class="pt-2 d-flex">
                    <a class="btn btn-outline-light btn-social" target="_blank" href="{{ $basicinfo->twitter }}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="{{ $basicinfo->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="{{ $basicinfo->youtube }}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="{{ $basicinfo->instagram }}"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="{{ $basicinfo->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="mb-4 text-white">Link</h5>
                <a class="btn btn-link" href="{{url('about-us')}}">About Us</a>
                <a class="btn btn-link" href="{{url('contact-us')}}">Contact Us</a>
                @php
                    $pages=App\Models\Client::where('type','footer')->where('status','Active')->get();
                    $services=App\Models\Service::where('status','Active')->get();
                @endphp
                @forelse($pages as $page)
                    <a href="{{ url('page',$page->slug) }}" class="btn btn-link">{{$page->page_name}}</a>
                @empty
                @endforelse
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <h5 class="mb-4 text-white">Our Services</h5>
                @forelse($services as $service)
                <a class="btn btn-link" href="{{$service->link}}">{{$service->service_title}}</a>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <div class="row">
                <div class="mb-3 text-center col-md-12 text-md-start mb-md-0" style="text-align: center !important;">
                    &copy; <a class="border-bottom" href="{{ url('/') }}">Syslic</a>, All Right Reserved. Designed By <a class="border-bottom" href="{{ url('/') }}">Syslic</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<footer>
        <div class="container footer-top">
            <div class="footer-col">
                <div class="logo" style="color: white; margin-bottom: 20px;">
                    <img src="{{ asset($basicinfo->logo) }}" alt="">
                </div>
                <p style="line-height: 1.8; margin-bottom: 20px;">
                    {{$basicinfo->footer_text_logo}}
                </p>
                <div class="social-links">
                    <a href="{{ $basicinfo->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $basicinfo->twitter }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $basicinfo->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ $basicinfo->instagram }}"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Garment Items</h4>
                <ul>
                    <li><a href="#garments">Woven Labels</a></li>
                    <li><a href="#garments">Hang Tags</a></li>
                    <li><a href="#garments">Heat Transfer</a></li>
                    <li><a href="#garments">Metal Buttons</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Thermal Items</h4>
                <ul>
                    <li><a href="#thermal">Thermal Stickers</a></li>
                    <li><a href="#thermal">RFID Tags</a></li>
                    <li><a href="#thermal">Barcode Ribbons</a></li>
                    <li><a href="#thermal">Price Labels</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact Factory</h4>
                <p style="margin-bottom: 10px;"><i class="fas fa-map-marker-alt" style="color: var(--orange);"></i>{!! $basicinfo->address !!}</p>
                <p style="margin-bottom: 10px;"><i class="fas fa-phone-alt" style="color: var(--orange);"></i> {{ $basicinfo->phone_one }}</p>
                <p><i class="fas fa-envelope" style="color: var(--orange);"></i> {{ $basicinfo->email }}</p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container"><p>&copy; 2026 JM International. All Rights Reserved.</p></div>
        </div>
    </footer>
