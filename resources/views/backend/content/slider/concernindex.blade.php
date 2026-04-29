@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Sister Concern
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
                    <h6 class="mb-0">Sister Concern List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainConcern" class="btn btn-primary m-2"
                        style="float: right"> + Create Sister Concern</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-stripe" id="concerninfo" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Title</th>
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
        <div class="modal fade" id="mainConcern" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Sister Concern</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddConcern" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="concern_title" id="concern_title"
                                    placeholder="Title" required>
                                <label for="floatingInput">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="concern_slug" id="concern_slug"
                                    placeholder="Slug" required>
                                <label for="floatingInput">Slug</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Text" name="concern_text" id="concern_text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>

                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="concern_image"
                                    id="concern_image" type="file">
                            </div>
                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="concern_icon"
                                    id="concern_icon" type="file">
                            </div>

                            <div class="form-group mt-2" style="text-align: right">
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
        <div class="modal fade" id="editmainConcern" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Sister Concern</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditConcern" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="concern_title" id="concern_title"
                                    placeholder="Title" required>
                                <label for="floatingInput">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="concern_slug" id="concern_slug"
                                    placeholder="Slug" required>
                                <label for="floatingInput">Slug</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Text" name="concern_text" id="concern_text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>
                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="concern_image"
                                    id="concern_image" type="file">
                            </div>
                            <input type="text" name="concern_id" id="concern_id" hidden>

                            <div class="m-3 ms-0 mb-0"
                                style="text-align: center;height: 100px;margin-top:20px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                <div id="previmg" style="float: left;"></div>
                            </div>
                            <br>

                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="concern_icon"
                                    id="concern_icon" type="file">
                            </div>

                            <div class="m-3 ms-0 mb-0"
                                style="text-align: center;height: 100px;margin-top:20px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Icon : </h4>
                                <div id="prevconcernimg" style="float: left;"></div>
                            </div>
                            <br>
                            <div class="form-group mt-2" style="text-align: right">
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

        var concerninfo = $('#concerninfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.concerninfo.data') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'concern_image',
                    name: 'concern_image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'concern_icon',
                    name: 'concern_icon',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'concern_title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="concernstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="concernstatusBtn" data-id="' +
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


        //add concern

        $('#AddConcern').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.concerninfos.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Sister Concern',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#concern_slug').val('');
                        $('#concern_title').val('');
                        $('#concern_text').val('');
                        $('#concern_image').val('');
                        $('#concern_icon').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                        });
                        concerninfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit concern
        $(document).on('click', '#editConcernBtn', function() {
            let concernId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'concerninfos/' + concernId + '/edit',

                success: function(data) {
                    $('#EditConcern').find('#concern_slug').val(data
                        .concern_slug);
                    $('#EditConcern').find('#concern_title').val(data.concern_title);
                    $('#EditConcern').find('#concern_text').val(data.concern_text);
                    $('#EditConcern').find('#concern_id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.concern_image + `" alt = "" style="height: 80px" />
                    `);

                    $('#prevconcernimg').html('');
                    $('#prevconcernimg').append(`
                        <img  src="../` + data.concern_icon + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditConcern').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update concern
        $('#EditConcern').submit(function(e) {
            e.preventDefault();
            let concernId = $('#concern_id').val();

            $.ajax({
                type: 'POST',
                url: 'concerninfo/' + concernId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not update Sister Concern',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditConcern').find('#concern_slug').val('');
                        $('#EditConcern').find('#concern_title').val('');
                        $('#EditConcern').find('#concern_text').val('');
                        $('#EditConcern').find('#concern_image').val('');
                        $('#EditConcern').find('#concern_icon').val('');
                        $('#previmg').html('');

                        swal({
                            title: "Sister Concern update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        concerninfo.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // delete concern

        $(document).on('click', '#deleteConcernBtn', function() {
            let concernId = $(this).data('id');
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
                            url: 'concerninfos/' + concernId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Sister Concern has been deleted!", {
                                    icon: "success",
                                });
                                concerninfo.ajax.reload();
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

        $(document).on('click', '#concernstatusBtn', function() {
            let concernId = $(this).data('id');
            let concernStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'concerninfo/status',
                data: {
                    concern_id: concernId,
                    status: concernStatus,
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
                    concerninfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
