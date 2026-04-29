@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Basicinfo
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row">

        

        <!--<div class="col-sm-12 col-md-12 col-xl-12 mb-4">-->
        <!--    <div class="bg-secondary rounded h-100 p-4">-->
        <!--        <h2 class="mb-4" style="text-align: center;color:red">Pixel & Analytics</h2>-->
        <!--        <form action="{{ url('/admin/pixel/analytics', $webinfo->id) }}" method="POST"-->
        <!--            enctype="multipart/form-data">-->
        <!--            @csrf-->
        <!--            <div class="row">-->
        <!--                <div class="col-lg-6">-->
        <!--                    <div class="form-floating mb-3">-->
        <!--                        <textarea class="form-control" placeholder="Facebook Pixel" name="facebook_pixel" id="floatingTextarea"-->
        <!--                            style="height: 150px;">{{ $webinfo->facebook_pixel }}</textarea>-->
        <!--                        <label for="floatingTextarea">Facebook Pixel</label>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-6">-->
        <!--                    <div class="form-floating mb-3">-->
        <!--                        <textarea class="form-control" placeholder="Google Analytics" name="google_analytics" id="floatingTextarea"-->
        <!--                            style="height: 150px;">{{ $webinfo->google_analytics }}</textarea>-->
        <!--                        <label for="floatingTextarea">Google Analytics</label>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="mt-3">-->
        <!--                    <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </form>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Profile Information</h2>
                <form action="{{ url('/admin/metainfo/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title"
                                    value="{{ $webinfo->title }}" id="floatingInput" placeholder="Name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $webinfo->meta_title }}" id="floatingPassword"
                                    placeholder="Designation">
                                <label for="floatingPassword">Designation</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ $webinfo->meta_keywords }}" id="floatingPassword"
                                    placeholder="Title">
                                <label for="floatingPassword">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="floatingTextarea"
                                    style="height: 100px;">{{ $webinfo->meta_description }}</textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="meta_image" id="formFileLg"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 156px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                <img src="{{ asset($webinfo->meta_image) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Driven by Purpose</h2>
                <form action="{{ url('/admin/factory/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!--<div class="col-lg-6">-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="text" class="form-control" name="facebook"-->
                        <!--            value="{{ $webinfo->facebook }}" id="floatingInput"-->
                        <!--            placeholder="https://www.facebook.com/">-->
                        <!--        <label for="floatingInput">Facebook</label>-->
                        <!--    </div>-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="text" class="form-control" name="twitter"-->
                        <!--            value="{{ $webinfo->twitter }}" id="floatingInput"-->
                        <!--            placeholder="https://www.twitter.com/">-->
                        <!--        <label for="floatingInput">Twitter</label>-->
                        <!--    </div>-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="text" class="form-control" name="google"-->
                        <!--            value="{{ $webinfo->google }}" id="floatingInput"-->
                        <!--            placeholder="https://google.com">-->
                        <!--        <label for="floatingInput">Google</label>-->
                        <!--    </div>-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="text" class="form-control" name="rss"-->
                        <!--            value="{{ $webinfo->rss }}" id="floatingInput"-->
                        <!--            placeholder="https://www.instagram.com/">-->
                        <!--        <label for="floatingInput">Instagram</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="pinterest"
                                    value="{{ $webinfo->pinterest }}" id="floatingInput"
                                    placeholder="https://www.pinterest.com/">
                                <label for="floatingInput">Our Mission</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="linkedin"
                                    value="{{ $webinfo->linkedin }}" id="floatingInput"
                                    placeholder="https://www.linkedin.com/">
                                <label for="floatingInput">Our Vision</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ $webinfo->youtube }}" id="floatingInput"
                                    placeholder="https://www.Youtube.com/">
                                <label for="floatingInput">Quality Policy</label>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Social Responsibility</h2>
                <form action="{{ route('admin.factory.update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" value="{{ $webinfo->email }}"
                                    id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_one"
                                    value="{{ $webinfo->phone_one }}" id="floatingPassword" placeholder="Phone One">
                                <label for="floatingPassword">Short Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_two"
                                    value="{{ $webinfo->phone_two }}" id="floatingPassword" placeholder="Phone Two">
                                <label for="floatingPassword">Item 1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_three"
                                    value="{{ $webinfo->phone_three }}" id="floatingPassword" placeholder="Phone Three">
                                <label for="floatingPassword">Item 2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_four"
                                    value="{{ $webinfo->phone_four }}" id="floatingPassword" placeholder="Phone Four">
                                <label for="floatingPassword">Item 3</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_five"
                                    value="{{ $webinfo->phone_five }}" id="floatingPassword" placeholder="Phone Five">
                                <label for="floatingPassword">item 4</label>
                            </div>
                            <!--<div class="form-floating mb-3">-->
                            <!--    <textarea class="form-control" placeholder="Office Address" name="address" id="floatingTextarea" style="height: 100px;">{{ $webinfo->address }}</textarea>-->
                            <!--    <label for="floatingTextarea">Office Address</label>-->
                            <!--</div>-->
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>
                        <!--<div class="col-lg-6">-->

                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="email" class="form-control" name="email_two"-->
                        <!--            value="{{ $webinfo->email_two }}" id="floatingInput" placeholder="name@example.com">-->
                        <!--        <label for="floatingInput">Email two</label>-->
                        <!--    </div>-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="email" class="form-control" name="email_three"-->
                        <!--            value="{{ $webinfo->email_three }}" id="floatingInput"-->
                        <!--            placeholder="name@example.com">-->
                        <!--        <label for="floatingInput">Email three</label>-->
                        <!--    </div>-->
                        <!--    <div class="mb-3">-->
                        <!--        <input class="form-control form-control-lg bg-dark" name="logo" id="formFileLg"-->
                        <!--            type="file">-->
                        <!--    </div>-->
                        <!--    <div class="m-3 ms-0" style="text-align: center;height: 156px;margin-top:50px !important">-->
                        <!--        <h4 style="width:30%;float: left;text-align: left;">LOGO : </h4>-->
                        <!--        <img src="{{ asset($webinfo->logo) }}" alt="" srcset=""-->
                        <!--            style="max-height: 100px;">-->
                        <!--    </div>-->
                        <!--    <div class="form-floating mb-3">-->
                        <!--        <input type="text" class="form-control" name="ecommerweb"-->
                        <!--            value="{{ $webinfo->ecommerweb }}" id="floatingInput"-->
                        <!--            placeholder="https://jmaccessories.com">-->
                        <!--        <label for="floatingInput">Ecommerce Website Url</label>-->
                        <!--    </div>-->
                        <!--    <div class="mt-3">-->
                        <!--        <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
