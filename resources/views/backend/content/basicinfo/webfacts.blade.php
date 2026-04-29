@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Web Facts
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row">


        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Website Facts Part</h2>
                <form action="{{ url('/admin/update/web/facts', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="clients"
                                    value="{{ $webinfo->clients }}" id="floatingInput" placeholder="Clients">
                                <label for="floatingTextarea">Clients</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="projects"
                                    value="{{ $webinfo->projects }}" id="floatingInput" placeholder="Projects">
                                <label for="floatingTextarea">Projects</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="working_hour"
                                    value="{{ $webinfo->working_hour }}" id="floatingInput"
                                    placeholder="Supports Hours">
                                <label for="floatingTextarea">Supports Hours</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="workers"
                                    value="{{ $webinfo->workers }}" id="floatingInput" placeholder="Workers">
                                <label for="floatingTextarea">Workers</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="screenshot" id="screenshot"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 156px;margin-top:50px !important">
                                <h4 style="width:40%;float: left;text-align: left;">Screenshot: </h4>
                                <img src="{{ asset($webinfo->screenshot) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
