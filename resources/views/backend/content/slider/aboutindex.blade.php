@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Aboutinfo
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
                <div class="p-4 pb-0 rounded h-100 bg-secondary">
                    <div class="d-flex align-items-center justify-content-between" style="width: 50%;float:left;">
                        <h6 class="mb-0">Client Counter List</h6>
                    </div>
                    <div class="" style="width: 50%;float:left;">
                        {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#mainAboutinfo"
                            class="m-2 btn btn-primary" style="float: right"> + Create Aboutinfo</a> --}}
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="p-4 rounded bg-secondary h-100">
                    <div class="data-tables">
                        <table class="table table-stripe" id="aboutinfo" width="100%" style="text-align: center;">
                            <thead class="thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Counter Text</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- create payment icon --}}
            <div class="modal fade" id="mainAboutinfo" tabindex="-1">
                <div class="modal-dialog">
                    <div class="rounded modal-content bg-secondary h-100">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: red;">Create New Aboutinfo</h5>
                            <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form name="form" id="AddAboutinfo" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" name="about_title" id="about_title"
                                        placeholder="Title" required>
                                    <label for="floatingInput">Title</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <textarea class="form-control" placeholder="Text" name="about_text" id="about_text"
                                        style="height: 80px;"></textarea>
                                    <label for="floatingTextarea">Text</label>
                                </div>

                                <div class="mt-4 mb-4 d-none">
                                    <input class="form-control form-control-lg bg-dark" name="about_image" id="about_image"
                                        type="file">
                                </div>
                                <div class="mt-4 mb-4 d-none">
                                    <input class="form-control form-control-lg bg-dark" name="about_icon" id="about_icon"
                                        type="file">
                                </div>

                                <div class="mt-2 form-group" style="text-align: right">
                                    <div class="submitBtnSCourse">
                                        <button type="submit" name="btn" data-bs-dismiss="modal"
                                            class="btn btn-dark btn-block" style="float: left">Close</button>
                                        <button type="submit" name="btn"
                                            class="btn btn-primary AddCourierBtn btn-block">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div><!-- End popup Modal-->

            {{-- edit payment icon --}}
            <div class="modal fade" id="editmainAboutinfo" tabindex="-1">
                <div class="modal-dialog">
                    <div class="rounded modal-content bg-secondary h-100">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: red;">Edit Counter</h5>
                            <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form name="form" id="EditAboutinfo" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" name="about_title" id="about_title"
                                        placeholder="Title" required>
                                    <label for="floatingInput">Text</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <textarea class="form-control" placeholder="Text" name="about_text" id="about_text"
                                        style="height: 80px;"></textarea>
                                    <label for="floatingTextarea">Counter</label>
                                </div>
                                <div class="mt-4 mb-4 d-none">
                                    <input class="form-control form-control-lg bg-dark" name="about_image" id="about_image"
                                        type="file">
                                </div>
                                <input type="text" name="about_id" id="about_id" hidden>

                                <div class="m-3 mb-0 ms-0 d-none"
                                    style="text-align: center;height: 100px;margin-top:20px !important">
                                    <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                    <div id="previmg" style="float: left;"></div>
                                </div>
                                <br>

                                <div class="mt-4 mb-4 d-none">
                                    <input class="form-control form-control-lg bg-dark" name="about_icon" id="about_icon"
                                        type="file">
                                </div>

                                <div class="m-3 mb-0 ms-0 d-none"
                                    style="text-align: center;height: 100px;margin-top:20px !important">
                                    <h4 style="width:30%;float: left;text-align: left;">Icon : </h4>
                                    <div id="prevaboutimg" style="float: left;"></div>
                                </div>
                                <br>
                                <div class="mt-2 form-group" style="text-align: right">
                                    <div class="submitBtnSCourse">
                                        <button type="submit" name="btn" data-bs-dismiss="modal"
                                            class="btn btn-dark btn-block" style="float: left">Close</button>
                                        <button type="submit" name="btn"
                                            class="btn btn-primary AddCourierBtn btn-block">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div><!-- End popup Modal-->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var token = $("input[name='_token']").val();

            var aboutinfo = $('#aboutinfo').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.aboutinfo.data') !!}',
                columns: [{
                    data: 'id'
                },
                // {
                //     data: 'about_image',
                //     name: 'about_image',
                //     render: function(data, type, full, meta) {
                //         return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                //     }
                // },
                // {
                //     data: 'about_icon',
                //     name: 'about_icon',
                //     render: function(data, type, full, meta) {
                //         return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                //     }
                // },
                {
                    data: 'about_title'
                },
                {
                    data: 'about_text'
                },
                {
                    "data": null,
                    render: function (data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="aboutstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="aboutstatusBtn" data-id="' +
                                data.id + '" >Inactive</button>';
                        }


                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

                ]
            });


            //add about

            $('#AddAboutinfo').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    uploadUrl: '{{ route('admin.aboutinfos.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function (data) {
                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Aboutinfo',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            $('#about_small_title').val('');
                            $('#about_title').val('');
                            $('#about_text').val('');
                            $('#about_image').val('');
                            $('#about_icon').val('');

                            swal({
                                title: "Success!",
                                icon: "success",
                            });
                            aboutinfo.ajax.reload();
                        }

                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            });

            //edit about
            $(document).on('click', '#editAboutinfoBtn', function () {
                let aboutId = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'aboutinfos/' + aboutId + '/edit',

                    success: function (data) {
                        $('#EditAboutinfo').find('#about_small_title').val(data
                            .about_small_title);
                        $('#EditAboutinfo').find('#about_title').val(data.about_title);
                        $('#EditAboutinfo').find('#about_text').val(data.about_text);
                        $('#EditAboutinfo').find('#about_id').val(data.id);

                        $('#previmg').html('');
                        $('#previmg').append(`
                            <img  src="../` + data.about_image + `" alt = "" style="height: 80px" />
                        `);

                        $('#prevaboutimg').html('');
                        $('#prevaboutimg').append(`
                            <img  src="../` + data.about_icon + `" alt = "" style="height: 80px" />
                        `);

                        $('#EditAboutinfo').attr('data-id', data.id);
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            });

            //update about
            $('#EditAboutinfo').submit(function (e) {
                e.preventDefault();
                let aboutId = $('#about_id').val();

                $.ajax({
                    type: 'POST',
                    url: 'aboutinfo/' + aboutId,
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function (data) {
                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not update Aboutinfo',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            $('#EditAboutinfo').find('#about_small_title').val('');
                            $('#EditAboutinfo').find('#about_title').val('');
                            $('#EditAboutinfo').find('#about_text').val('');
                            $('#EditAboutinfo').find('#about_image').val('');
                            $('#EditAboutinfo').find('#about_icon').val('');
                            $('#previmg').html('');

                            swal({
                                title: "Aboutinfo update successfully !",
                                icon: "success",
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes",
                                cancelButtonText: "No",
                            });
                            aboutinfo.ajax.reload();
                        }

                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            });

            // delete about

            $(document).on('click', '#deleteAboutinfoBtn', function () {
                let aboutId = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'DELETE',
                                url: 'aboutinfos/' + aboutId,
                                data: {
                                    '_token': token
                                },
                                success: function (data) {
                                    swal("Aboutinfo has been deleted!", {
                                        icon: "success",
                                    });
                                    aboutinfo.ajax.reload();
                                },
                                error: function (error) {
                                    console.log('error');
                                }

                            });


                        } else {
                            swal("Your data is safe!");
                        }
                    });

            });

            // status update

            $(document).on('click', '#aboutstatusBtn', function () {
                let aboutId = $(this).data('id');
                let aboutStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'aboutinfo/status',
                    data: {
                        about_id: aboutId,
                        status: aboutStatus,
                        '_token': token
                    },

                    success: function (data) {
                        swal({
                            title: "Status updated !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        aboutinfo.ajax.reload();
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            });

        });
    </script>

@endsection
