@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Web Texts
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row">


        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Website Extra Text Information</h2>
                <form action="{{ url('/admin/update/web/texts', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="What We are" name="about_us" id="floatingTextarea" style="height: 150px;">{{ $webinfo->about_us }}</textarea>
                                <label for="floatingTextarea">What We are</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Sister Concern" name="concern" id="floatingTextarea" style="height: 150px;">{{ $webinfo->concern }}</textarea>
                                <label for="floatingTextarea">Sister Concern</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Services" name="service_info" id="service_info" style="height: 150px;">{{ $webinfo->service_info }}</textarea>
                                <label for="floatingTextarea">Services</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Call To Action" name="call_to" id="call_to" style="height: 150px;">{{ $webinfo->call_to }}</textarea>
                                <label for="floatingTextarea">Call To Action</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Facts" name="fact_info" id="fact_info" style="height: 150px;">{{ $webinfo->fact_info }}</textarea>
                                <label for="floatingTextarea">Facts</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Teams" name="team_info" id="team_info" style="height: 150px;">{{ $webinfo->team_info }}</textarea>
                                <label for="floatingTextarea">Teams</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Contact Us" name="contact_us" id="contact_us" style="height: 150px;">{{ $webinfo->contact_us }}</textarea>
                                <label for="floatingTextarea">Contact Us</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="News Letter" name="news" id="floatingTextarea" style="height: 150px;">{{ $webinfo->news }}</textarea>
                                <label for="floatingTextarea">News Letter</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Footer Logo Text" name="footer_text_logo" id="footer_text_logo"
                                    style="height: 150px;">{{ $webinfo->footer_text_logo }}</textarea>
                                <label for="floatingTextarea">Footer Logo Text</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
