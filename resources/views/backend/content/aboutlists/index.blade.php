@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- About us
@endsection
<style>
    div#roleinfo_length {
        color: red;
    }

    div#roleinfo_filter {
        color: red;
    }

    div#roleinfo_info {
        color: red;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-secondary rounded p-4 pb-0 text-center">
                <h4 class="mb-0">About us information</h4>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('admin/aboutus', $aboutus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" value="{{ $aboutus->title }}"
                                    id="floatingInput" placeholder="Title">
                                <label for="floatingInput">Title</label>
                            </div>

                            <div class="form-group mb-3">
                                <label for="floatingInput">Description</label>
                                <textarea class="form-control" name="details" id="details" rows="6">{{ $aboutus->details }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="floatingInput">Small Description</label>
                                <textarea class="form-control" name="small_details" id="small_details" rows="3">{{ $aboutus->small_details }}</textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_one"
                                    value="{{ $aboutus->title_one }}" id="floatingInput" placeholder="Award">
                                <label for="floatingInput">Award</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_two"
                                    value="{{ $aboutus->title_two }}" id="floatingInput" placeholder="Support">
                                <label for="floatingInput">Support</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_three"
                                    value="{{ $aboutus->title_three }}" id="floatingInput" placeholder="Staff">
                                <label for="floatingInput">Staff</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_four"
                                    value="{{ $aboutus->title_four }}" id="floatingInput" placeholder="Price">
                                <label for="floatingInput">Price</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_five"
                                    value="{{ $aboutus->title_five }}" id="floatingInput" placeholder="Button Link">
                                <label for="floatingInput">Button Link</label>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="image" id="formFileLg"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 156px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                <img src="{{ asset($aboutus->image) }}" alt="" srcset=""
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

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
</div>


@endsection
