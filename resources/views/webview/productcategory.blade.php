@extends('webview.master')
@section('title')
    {{ env('APP_NAME') }}- Category
@endsection
@section('maincontent')
    <section id="garments" class="section section-bg">
        <div class="container">
            <div class="text-center" style="max-width: 700px; margin: 0 auto 50px;" data-aos="fade-up">
                <h2 class="section-title">{{ $category->category_name }}</h2>
                <p style="color: var(--slate);">{{ $category->title }}</p>
            </div>
            <div class="product-grid">
                @foreach ($subcategories as $subcat)
                    <a href="{{ url('product/subcategory/'. $category->slug. '/' .$subcat->slug) }}">
                        <div class="p-card" data-aos="fade-up">
                            <div class="p-img"><img src="{{ asset($subcat->image) }}" alt="Woven Label">@if($subcat->subtitle)
                            <span class="p-badge">{{ $subcat->subtitle }}</span> @endif</div>
                            <div class="p-body">
                                <h3>{{ $subcat->subcategory_name }}</h3><span class="p-spec">{{ $subcat->title }}</span>
                                <p style="color: var(--slate); font-size: 0.9rem; margin-top: 10px;">{{$subcat->details}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
@endsection
