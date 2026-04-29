@extends('webview.master')

@section('maincontent')
<style>
    .mobile-mt-4 {
        margin-top: 1.5rem;
    }
</style>
    <section style="background:#e4f6fa">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                        <div>
                            <button style="border: navajowhite;background: #fdedeb;color: #ec5537;padding: 4px 10px;border-radius: 4px;margin-bottom: 22px;">{{ $resources->service_title }}</button>
                        </div>
                        <h3 style="color:#1D297C;">{{ $resources->link }}</h3>
                        <p>{{ $resources->subtitle }}</p>
                        <a href=" {{ url('contact-us') }}"
                    style="padding:13px 23px;box-shadow:none;text-transform: capitalize;" class="btn">Book a FREE
                    Consultation</a>
                </div>
                <div class="col-12 col-md-6 mobile-mt-4">
                    <img src="{{ asset($resources->service_image) }}" alt="resources" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5">
       {!! $resources->service_text !!}
    </div>
@endsection