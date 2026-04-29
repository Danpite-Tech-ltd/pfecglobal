@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Service
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
                    <h6 class="mb-0">Service List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainService" class="m-2 btn btn-primary"
                        style="float: right"> + Create Service</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="p-4 rounded bg-secondary h-100">
                <div class="data-tables">
                    <table class="table table-stripe" id="service" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <!--<th>Title</th>-->
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
        <div class="modal fade" id="mainService" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Service</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddService" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="service_title" id="service_title"
                                    placeholder="Title" >
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="link" id="link"
                                    placeholder="Button Link" >
                                <label for="floatingInput">Button Link</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <textarea class="form-control" placeholder="Text" name="service_text" id="service_text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>

                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="service_image"
                                    id="service_image" type="file">
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
        <div class="modal fade" id="editmainService" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Service</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditService" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control d-none" name="service_title" id="service_title"
                                    placeholder="Title" >
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control d-none" name="link" id="link"
                                    placeholder="Button Link" >
                                <label for="floatingInput">Button Link</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <textarea class="form-control d-none" placeholder="Text" name="service_text" id="service_text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>
                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="service_image"
                                    id="service_image" type="file">
                            </div>
                            <input type="text" name="service_id" id="service_id" hidden>

                            <div class="m-3 mb-0 ms-0"
                                style="text-align: center;height: 100px;margin-top:20px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                <div id="previmg" style="float: left;"></div>
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
    $(document).ready(function() {
        var token = $("input[name='_token']").val();

        var service = $('#service').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.service.data') !!}',
            columns: [{
                    data: 'id'
                }, {
                    data: 'service_image',
                    name: 'service_image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                // {
                //     data: 'service_title'
                // },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="servicestatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="servicestatusBtn" data-id="' +
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


        //add service

        $('#AddService').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.services.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Service',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#service_small_title').val('');
                        $('#service_title').val('');
                        $('#service_text').val('');
                        $('#service_image').val('');
                        $('#link').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                        });
                        service.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit service
        $(document).on('click', '#editServiceBtn', function() {
            let serviceId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'services/' + serviceId + '/edit',

                success: function(data) {
                    $('#EditService').find('#service_small_title').val(data
                        .service_small_title);
                    $('#EditService').find('#service_title').val(data.service_title);
                    $('#EditService').find('#service_text').val(data.service_text);
                    $('#EditService').find('#service_id').val(data.id);
                    $('#EditService').find('#link').val(data.link);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.service_image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditService').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update service
        $('#EditService').submit(function(e) {
            e.preventDefault();
            let serviceId = $('#service_id').val();

            $.ajax({
                type: 'POST',
                url: 'service/' + serviceId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not update Service',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditService').find('#service_small_title').val('');
                        $('#EditService').find('#service_title').val('');
                        $('#EditService').find('#service_text').val('');
                        $('#EditService').find('#service_btn_name').val('');
                        $('#EditService').find('#service_btn_link').val('');
                        $('#EditService').find('#service_image').val('');
                        $('#previmg').html('');

                        swal({
                            title: "Service update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        service.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // delete service

        $(document).on('click', '#deleteServiceBtn', function() {
            let serviceId = $(this).data('id');
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
                            url: 'services/' + serviceId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Service has been deleted!", {
                                    icon: "success",
                                });
                                service.ajax.reload();
                            },
                            error: function(error) {
                                console.log('error');
                            }

                        });


                    } else {
                        swal("Your data is safe!");
                    }
                });

        });

        // status update

        $(document).on('click', '#servicestatusBtn', function() {
            let serviceId = $(this).data('id');
            let serviceStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'service/status',
                data: {
                    service_id: serviceId,
                    status: serviceStatus,
                    '_token': token
                },

                success: function(data) {
                    swal({
                        title: "Status updated !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    service.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
