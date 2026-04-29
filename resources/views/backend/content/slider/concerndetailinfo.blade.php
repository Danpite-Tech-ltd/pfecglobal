@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Details For {{ $concern->concern_title }}
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
            <div class="h-100 bg-secondary rounded p-4 pb-0">
                <div class="d-flex align-items-center justify-content-between" style="width: 50%;float:left;">
                    <h6 class="mb-0">Details For :- {{ $concern->concern_title }}</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="{{ url('admin/concern-details/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="concern_list_id" id="concern_list_id" value="{{ $concern->id }}"
                        hidden>
                    <div class="form-group mb-3">
                        <label for="floatingInput">{{ $concern->concern_title }} Details:</label>
                        <br>
                        <textarea class="ckeditor form-control" name="concern_details">{{ $concern->concern_details }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"
                        style="float: right;margin-bottom:20px">Update</button>
                </form>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection
