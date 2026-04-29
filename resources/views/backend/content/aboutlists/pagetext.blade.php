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

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-secondary rounded p-4 pb-0 text-center">
                <h4 class="mb-0">
                    @if ($aboutus->id=='3')
                    Service Data
                    @elseif($aboutus->id=='4')
                    Teams Data
                    @elseif($aboutus->id=='5')
                    Testimonials Data
                    @else
                    @endif
                    information</h4>
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


                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title_one"
                                    value="{{ $aboutus->title_one }}" id="floatingInput" placeholder="Button Link">
                                <label for="floatingInput">Button Link</label>
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
