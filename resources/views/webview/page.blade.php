@extends('webview.master')

@section('seo')
    <title> {{$page->title}}</title>
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">

    <meta itemprop="name" content="{{ $page->meta_title }}">
    <meta itemprop="description" content="{{ $page->meta_description }}">
    <meta itemprop="image" content="{{ asset($page->banner) }}">

    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->meta_title }}">
    <meta property="og:description" content="{{ $page->meta_description }}">
    <meta property="og:image" content="{{ asset($page->banner) }}">
    <meta property="image" content="{{ asset($page->banner) }}" />
    <meta property="url" content="{{Request::url()}}">
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="{{ asset($page->banner) }}">
    <meta property="twitter:card" content="{{ asset($page->banner) }}" />
    <meta property="twitter:title" content="{{ $page->meta_title }}" />
    <meta property="twitter:url" content="{{Request::url()}}">
    <meta name="twitter:image" content="{{ asset($page->banner) }}">
@endsection

@section('maincontent')

    <!-- Hero Start -->
    <div class="pt-5 mb-5 container-fluid" >
        <div class="container">
            <div class="row g-5">
                <div class="text-center col-lg-12 align-self-center ">
                    <h2 class="mb-3">
                        {{$page->page_name}}
                    </h2>
                    <p>{{$page->title}}</p>
                </div>
                <img src="{{asset($page->banner)}}" alt="" style="width:100%;">
            </div>
            <div class="row">
                {!!$page->description!!}
            </div>
        </div>
    </div>
    <!-- Hero End -->

@endsection
