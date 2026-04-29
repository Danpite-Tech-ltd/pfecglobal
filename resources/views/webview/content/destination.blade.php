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
                        <h3 style="color:#1D297C;">{{ $destination->about_title }}</h3>
                        <h3>with Expert Guidance</h3>
                        <p>Get comprehensive guidance & end-to-end assistance from expert study abroad mentors for FREE!</p>
                        <a href=" {{ url('contact-us') }}"
                    style="padding:13px 23px;box-shadow:none;text-transform: capitalize;" class="btn">Book a FREE
                    Consultation</a>
                </div>
                <div class="col-12 col-md-6 mobile-mt-4">
                    <img src="{{ asset($destination->about_icon) }}" alt="destination" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5">
       {!! $destination->about_text !!}
    </div>
@endsection