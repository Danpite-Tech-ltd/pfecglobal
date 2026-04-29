@extends('webview.master')

@section('maincontent')
    <style>
        .mobile-mt-4 {
            margin-top: 1.5rem;
        }
    </style>
    <section style="">
        <div class="container text-center py-5">
            <!-- Badge -->
            <div class="mb-3">
                <span class="badge rounded-pill px-3 py-2"
                    style="background-color: #fde8e4; color: #e74c3c; font-weight: 500;">
                    Our Leadership Team
                </span>
            </div>

            <!-- Heading -->
            <h2 class="fw-bold mb-3" style="color: #1f3c88; line-height: 1.4;">
                Rich with Experience. Fueled by Passion.<br>
                Driven by the Dreams of Study Abroad<br>
                Aspirants.
            </h2>

            <!-- Subtext -->
            <p class="text-muted fs-5">
                Meet the team that spearheads {{ env('APP_NAME') }}.
            </p>
        </div>
    </section>

    <section style="background:#e4f6fa">
        <div class="container py-5">
            <div class="row">
                @foreach ($team as $value)
                    <div class="col-6 col-lg-3">
                        <div style="background:#fff;">
                            <img src="{{ asset($value->image) }}" width="100%">
                            <p style="padding:10px;">
                                {{ $value->facebook }} <br>
                            </p>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>
@endsection