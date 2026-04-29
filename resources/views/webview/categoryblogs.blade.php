@extends('webview.master')

@section('seo')
    <title>{{$blogcategoryingle->category_name}}</title>
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
    .service-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 20px 15px;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.12);
}

.icon-box {
    background: #f2f6ff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-box img {
    width: 100%;
    border-radius:8px;
}

.service-card h4 {
    font-weight: bold;
    margin-bottom: 15px;
    color: #0f172a;
    text-align: left;
}

.service-card p {
    font-size: 15px;
    color: #6b7280;
    line-height: 1.7;
    margin-bottom: 25px;
    text-align: left;

}

.read-more {
    display: inline-block;
    text-decoration: none;
    color: #2563eb;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 30px;
    background: #eef2ff;
    transition: all 0.3s ease;
}

.service-card:hover .read-more {
    background: #2563eb;
    color: #ffffff;
}

.category-wrapper{
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.category-tag{
    padding: 6px 14px;
    background: #f1f5f9;
    color: #0f172a;
    border-radius: 20px;
    font-size: 13px;
    text-decoration: none;
    white-space: nowrap;
    transition: 0.3s;
}
.category-tag:hover{
    background: #2563eb;
    color: #fff;
}
</style>
    <!-- Hero Start -->
    <div class="pt-5 mb-5 container-fluid" >
        <div class="container">
            <div class="row g-5">
                <div class="text-center col-lg-12 align-self-center">
                    <h2 class="mb-3">
                        {{$blogcategoryingle->category_name}}
                    </h2>
                </div>
                <div class="col-lg-4 d-block d-lg-none">
                    <div class="p-2 card">
                        <h4 class="text-center"><b>Category</b></h4>
                        <div class="category-wrapper">
                            @foreach($blogcategorys as $category)
                                <a href="{{ url('blog/category', $category->slug) }}"
                                class="category-tag">
                                    {{ $category->category_name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($blogdatas as $blog)
                        <div class="mb-3 col-12 col-md-12">
                            <div class="service-card" style="border: 1px solid #efefef;">
                                <div class="icon-box">
                                    <img src="{{ asset($blog->thumbnail) }}" alt="{{$blog->title}}">
                                </div>
                                <h4 class="mt-3">{{ $blog->title }}</h4>
                                <p style="height: 77px;overflow: hidden;">
                                    {{ $blog->short_description }}
                                </p>
                                <a href="{{ url('blog',$blog->slug) }}" class="read-more">Read More</a>
                            </div>
                        </div>
                        @empty
                        <h4>No data found</h4>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-2 card d-none d-lg-block">
                        <h4 class="text-left"><b>Category</b></h4>
                        <div class="category-wrapper">
                            @foreach($blogcategorys as $category)
                                <a href="{{ url('blog/category', $category->slug) }}"
                                class="category-tag">
                                    {{ $category->category_name }}
                                </a>
                            @endforeach
                        </div>
                    </div>


                    <h4 class="mt-4 text-left"><b>Recent Blogs</b></h4>
                    @foreach($blogs->shuffle()->take(8) as $blog)
                        <a href="{{ url('blog/'.$blog->slug) }}" class="blog-card">
                            <div class="p-2 card">
                                <div class=" d-flex">
                                    <img src="{{ asset($blog->thumbnail ?? 'assets/default/blog.jpg') }}" style="height: 120px;width:120px;border-radius:6px" alt="{{ $blog->title }}">
                                    <div class="ps-2 blog-content">
                                        <h5>{{ Str::limit($blog->title, 50) }}</h5>
                                        <p style="color: black;"class="mb-1">{{ Str::limit($blog->short_description, 60) }}</p>
                                        <span class="blog-btn btn btn-primary btn-sm">Read More</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    <!-- Hero End -->

@endsection
