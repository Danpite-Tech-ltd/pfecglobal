@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Category
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
                    <h6 class="mb-0">Category List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainCategory"
                        class="m-2 btn btn-primary" style="float: right"> + Add New Category</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="p-4 rounded bg-secondary h-100">
                <div class="data-tables">
                    <table class="table table-stripe" id="portfoliocategory" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
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
        <div class="modal fade" id="mainCategory" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Category</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                    placeholder="Category Name" required>
                                <label for="floatingInput">Category Name</label>
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
        <div class="modal fade" id="editmainCategory" tabindex="-1">
            <div class="modal-dialog">
                <div class="rounded modal-content bg-secondary h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Category</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                    placeholder="Category Name" required>
                                <label for="floatingInput">Category Name</label>
                            </div>
                            <input type="text" name="portfoliocategory_id" id="portfoliocategory_id" hidden>

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

        var portfoliocategory = $('#portfoliocategory').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.portfoliocategory.data') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'category_name'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="portfoliocategorystatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="portfoliocategorystatusBtn" data-id="' +
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


        //add portfoliocategory

        $('#AddCategory').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.portfoliocategories.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Category',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#category_name').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                        });
                        portfoliocategory.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit portfoliocategory
        $(document).on('click', '#editCategoryBtn', function() {
            let portfoliocategoryId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'portfoliocategories/' + portfoliocategoryId + '/edit',

                success: function(data) {
                    $('#EditCategory').find('#category_name').val(data.category_name);
                    $('#EditCategory').find('#portfoliocategory_id').val(data.id);

                    $('#EditCategory').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update portfoliocategory
        $('#EditCategory').submit(function(e) {
            e.preventDefault();
            let portfoliocategoryId = $('#portfoliocategory_id').val();

            $.ajax({
                type: 'POST',
                url: 'portfoliocategory/' + portfoliocategoryId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not update Category',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditCategory').find('#category_name').val('');
                        swal({
                            title: "Category update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        portfoliocategory.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // delete portfoliocategory

        $(document).on('click', '#deleteCategoryBtn', function() {
            let portfoliocategoryId = $(this).data('id');
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
                            url: 'portfoliocategories/' + portfoliocategoryId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Category has been deleted!", {
                                    icon: "success",
                                });
                                portfoliocategory.ajax.reload();
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

        $(document).on('click', '#portfoliocategorystatusBtn', function() {
            let portfoliocategoryId = $(this).data('id');
            let portfoliocategoryStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'portfoliocategory/status',
                data: {
                    portfoliocategory_id: portfoliocategoryId,
                    status: portfoliocategoryStatus,
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
                    portfoliocategory.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
