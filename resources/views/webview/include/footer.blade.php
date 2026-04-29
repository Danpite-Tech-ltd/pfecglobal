
<style>
    .main-footer {
        background-color: #f8f9fa;
        padding: 60px 0 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #444;
    }

    .footer-logo { max-width: 150px; margin-bottom: 20px; }
    .footer-desc { font-size: 14px; line-height: 1.6; margin-bottom: 25px; max-width: 250px; }

    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 4px;
        margin-right: 8px;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
    }
    .si-fb { background-color: #3b5998; }
    .si-ig { background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
    .si-in { background-color: #0077b5; }
    .si-yt { background-color: #ff0000; }

    .footer-title {
        color: #ff6b6b;
        font-weight: 700;
        font-size: 17px;
        margin-bottom: 20px;
    }

    .footer-links { list-style: none; padding: 0; }
    .footer-links li { margin-bottom: 8px; }
    .footer-links li a {
        color: #555;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
    }
    .footer-links li a:hover { color: #ff6b6b; padding-left: 5px; }

    /* Office Section */
    .office-section {
        border-top: 1px solid #ddd;
        padding: 40px 0;
        margin-top: 40px;
    }
    .office-main-title {
        color: #ff6b6b;
        text-align: center;
        font-weight: 700;
        margin-bottom: 40px;
        font-size: 22px;
    }
    .office-box h5 { color: #ff6b6b; font-weight: 700; font-size: 16px; margin-bottom: 15px; }
    .office-info { font-size: 13px; line-height: 1.6; margin-bottom: 10px; position: relative; padding-left: 20px; }
    .office-info i { position: absolute; left: 0; top: 4px; color: #ff6b6b; }
    .office-box a { color: #ff6b6b; font-size: 13px; text-decoration: none; font-weight: 500; }

    /* Bottom Copyright */
    .footer-bottom {
        border-top: 1px solid #ddd;
        padding-top: 20px;
        text-align: center;
        font-size: 14px;
        color: #666;
    }
    .footer-bottom a { color: #666; text-decoration: none; margin: 0 5px; }

    @media (max-width: 768px) {
        .footer-desc { max-width: 100%; }
        .office-box { margin-bottom: 30px; text-align: center; }
        .office-info { padding-left: 0; }
        .office-info i { position: static; margin-right: 5px; }
    }
</style>

<footer class="main-footer">
    <div class="container">
        <!-- Top Links Section -->
        <div class="row">
            <div class="mb-4 col-12 col-md-3">
                <img src="{{ asset($basicinfo->logo) }}" alt="PFEC" class="footer-logo">
                <p class="footer-desc">Since 2006, {{ env('APP_NAME') }} has been guiding students toward a better life abroad through expert higher education consultancy and end-to-end support.</p>
                <div class="social-icons">
                    <a href="{{ $basicinfo->facebook }}" class="si-fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $basicinfo->rss }}" class="si-ig"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $basicinfo->linkedin }}" class="si-in"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ $basicinfo->youtube }}" class="si-yt"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            @php
                $scholarships = App\Models\Portfoliosubcategory::get();
                $destinations = App\Models\Aboutinfo::get();
            @endphp

            <div class="mb-4 col-6 col-md-3">
                <h4 class="mt-4 footer-title">Scholarships</h4>
                <ul class="footer-links">
                    @foreach ($scholarships as $value)
                    <li><a href="{{ url('scholarship') }}/{{ $value->slug }}">{{ $value->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-4 col-6 col-md-3">
                <h4 class="footer-title">Study Destinations</h4>
                <ul class="footer-links">
                    @foreach ($destinations as $destination)
                        <li><a href="{{ url('destination') }}/{{ $destination->id }}">{{ $destination->about_title }}</a></li>
                    @endforeach
                </ul>
                <h4 class="mt-2 footer-title">Resources</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('blogs') }}">Blogs</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <div class="mb-4 col-6 col-md-3">
                <h4 class="footer-title">About {{ env('APP_NAME') }} </h4>
                <ul class="footer-links">
                    <li><a href="{{ url('team') }}">Our Leadership</a></li>
                    <li><a href="{{ url('awards-and-accolades') }}">Awards & Achievements</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Office Details Section -->
        <div class="office-section">
            <h3 class="office-main-title">{{ env('APP_NAME') }} Offices in Bangladesh</h3>
            <div class="row justify-content-center">
                <div class="col-12 col-md-3 office-box">
                    <h5>Location</h5>
                    <p class="office-info"><i class="fas fa-map-marker-alt"></i> {{ $basicinfo->address }}</p>
                    <p class="office-info"><i class="fas fa-phone-alt"></i> {{ $basicinfo->phone_one }}</p>
                    {{-- <a href="#">Learn More >></a> --}}
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright © 2026 PFEC. | Developed by <a href="#">Danpite Tech</a></p>
        </div>
    </div>
</footer>
