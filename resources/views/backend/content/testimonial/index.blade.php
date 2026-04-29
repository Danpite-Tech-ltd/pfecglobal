@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Award Gallery
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
                    <h6 class="mb-0">Award Gallery List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainTestimonial"
                        class="m-2 btn btn-primary" style="float: right"> + Create Award Gallery</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="p-4 rounded bg-secondary h-100">
                <div class="data-tables">
                    <table class="table table-stripe" id="testimonial" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Name</th>
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
        <div class="modal fade" id="mainTestimonial" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Award Gallery</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddTestimonial" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name" required>
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Title" >
                                <label for="floatingInput">Title</label>
                            </div>

                            <div class="mb-3 form-floating d-none">
                                <textarea class="form-control" placeholder="Text" name="text" id="text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>

                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="image" id="image"
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
        <div class="modal fade" id="editmainTestimonial" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Award Gallery</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditTestimonial" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name" required>
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Title" >
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="mb-3 form-floating d-none">
                                <textarea class="form-control" placeholder="Text" name="text" id="text" style="height: 80px;"></textarea>
                                <label for="floatingTextarea">Text</label>
                            </div>
                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="image" id="image"
                                    type="file">
                            </div>

                            <input type="text" name="id" id="id" hidden>

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

        var testimonial = $('#testimonial').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.testimonial.data') !!}',
            columns: [{
                    data: 'id'
                }, {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta) {
                        return "<img src=../" + data + " height=\"40\" alt='No Image'/>";
                    }
                },
                {
                    data: 'name'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="testimonialstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="testimonialstatusBtn" data-id="' +
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


        //add testimonial

        $('#AddTestimonial').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.testimonials.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Testimonial',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#name').val('');
                        $('#title').val('');
                        $('#text').val('');
                        $('#image').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                        });
                        testimonial.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit testimonial
        $(document).on('click', '#editTestimonialBtn', function() {
            let testimonialId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'testimonials/' + testimonialId + '/edit',

                success: function(data) {
                    $('#EditTestimonial').find('#name').val(data
                        .name);
                    $('#EditTestimonial').find('#title').val(data.title);
                    $('#EditTestimonial').find('#text').val(data.text);
                    $('#EditTestimonial').find('#id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditTestimonial').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update testimonial
        $('#EditTestimonial').submit(function(e) {
            e.preventDefault();
            let testimonialId = $('#id').val();

            $.ajax({
                type: 'POST',
                url: 'testimonial/' + testimonialId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not update Testimonial',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditTestimonial').find('#name').val('');
                        $('#EditTestimonial').find('#title').val('');
                        $('#EditTestimonial').find('#text').val('');
                        $('#EditTestimonial').find('#image').val('');
                        $('#previmg').html('');

                        swal({
                            title: "Testimonial update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        testimonial.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // delete testimonial

        $(document).on('click', '#deleteTestimonialBtn', function() {
            let testimonialId = $(this).data('id');
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
                            url: 'testimonials/' + testimonialId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Testimonial has been deleted!", {
                                    icon: "success",
                                });
                                testimonial.ajax.reload();
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

        $(document).on('click', '#testimonialstatusBtn', function() {
            let testimonialId = $(this).data('id');
            let testimonialStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'testimonial/status',
                data: {
                    testimonial_id: testimonialId,
                    status: testimonialStatus,
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
                    testimonial.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
