@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- About
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

<div class="px-4 pt-4 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="p-4 pb-0 text-center rounded h-100 bg-secondary">
                <h4 class="mb-0">Why choose us information</h4>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="p-4 rounded bg-secondary h-100">
                <form action="{{ url('admin/aboutus', $aboutus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="title" value="{{ $aboutus->title }}"
                                    id="floatingInput" placeholder="Title">
                                <label for="floatingInput">Title</label>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="floatingInput">Description</label>
                                <textarea class="form-control" name="details" id="details" rows="6">{{ $aboutus->details }}</textarea>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="title_four"
                                    value="{{ $aboutus->title_four }}" id="floatingInput" placeholder="Happy Client">
                                <label for="floatingInput">Happy Client</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="title_five"
                                    value="{{ $aboutus->title_five }}" id="floatingInput" placeholder="Complete Project">
                                <label for="floatingInput">Complete Project</label>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="title_one"
                                    value="{{ $aboutus->title_one }}" id="floatingInput" placeholder="Title One">
                                <label for="floatingInput">Title One</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="title_two"
                                    value="{{ $aboutus->title_two }}" id="floatingInput" placeholder="Title Two">
                                <label for="floatingInput">Title Two</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="title_three"
                                    value="{{ $aboutus->title_three }}" id="floatingInput" placeholder="Title Three">
                                <label for="floatingInput">Title Three</label>
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
