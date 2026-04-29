@extends('backend.master')

@section('maincontent')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    @section('title')
        {{ env('APP_NAME') }}- Scolarships
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
                        <h6 class="mb-0">Scolarships List</h6>
                    </div>
                    <div class="" style="width: 50%;float:left;">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#mainCategory" class="m-2 btn btn-primary"
                            style="float: right"> + Add New Scolarship</a>
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
                            <h5 class="modal-title" style="color: red;">Create New Scolarship</h5>
                            <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form name="form" id="AddCategory" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                        required>
                                    <label for="floatingInput">Title</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Image"
                                        required>
                                    <label for="floatingInput">Image</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <textarea name="details" id="details" class="form-control "></textarea>
                                    <label for="floatingInput">Details</label>
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
                            <h5 class="modal-title" style="color: red;">Edit Scolarship</h5>
                            <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form name="form" id="EditCategory" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" name="title" id="edittitle" placeholder="Title"
                                        required>
                                    <label for="floatingInput">Title</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                                    <label for="floatingInput">Image</label>
                                </div>

                                <img id="previewImage" src="" width="120" class="mb-2 d-block">

                                <input type="text" name="subportfoliocategory_id" id="subportfoliocategory_id" hidden>

                                <br>
                                <div class="mb-3 form-floating">
                                    <textarea name="details" id="editdetails" class="form-control"></textarea>
                                    <label for="floatingInput">Details</label>
                                </div>
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
        let detailsEditor;
        let editDetailsEditor;
        const baseUrl = '{{ url('/') }}';

        ClassicEditor
            .create(document.querySelector('#details'))
            .then(editor => {
                detailsEditor = editor;
            })
            .catch(error => console.error(error));
        ClassicEditor
            .create(document.querySelector('#editdetails'))
            .then(editor => {
                editDetailsEditor = editor;
            })
            .catch(error => console.error(error));

        $(document).ready(function () {
            var token = $("input[name='_token']").val();

            var portfoliocategory = $('#portfoliocategory').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.portfoliosubcategory.data') !!}',
                columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    "data": null,
                    render: function (data) {

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

            $('#AddCategory').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                if (detailsEditor) {
                    formData.set('details', detailsEditor.getData());
                }

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.portfoliosubcategories.store') }}',
                    processData: false,
                    contentType: false,
                    data: formData,

                    success: function (data) {
                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Scholarship',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            $('#title').val('');

                            swal({
                                title: "Success!",
                                icon: "success",
                            });

                            // Close modal and cleanup backdrop
                            const createModal = bootstrap.Modal.getInstance(document.getElementById('mainCategory'));
                            if (createModal) {
                                createModal.hide();
                            }
                            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                            document.body.classList.remove('modal-open');

                            portfoliocategory.ajax.reload();
                        }

                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            });

            let editorInstance;


            $(document).on('click', '#editCategoryBtn', function () {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'portfoliosubcategories/' + id + '/edit',
                    success: function (data) {
                        $('#edittitle').val(data.title ?? '');
                        $('#subportfoliocategory_id').val(data.id);

                        if (editDetailsEditor) {
                            editDetailsEditor.setData(data.details ?? '');
                        } else {
                            $('#editdetails').val(data.details ?? '');
                        }

                        if (data.image) {
                            let imagePath = data.image.startsWith('/') ? data.image : '/' + data.image;
                            let fullImageUrl = baseUrl + imagePath;
                            $('#previewImage').attr('src', fullImageUrl).show();
                        } else {
                            $('#previewImage').attr('src', '').hide();
                        }

                        // Show the edit modal
                        var editModal = new bootstrap.Modal(document.getElementById('editmainCategory'));
                        editModal.show();
                    }
                });
            });



            //update portfoliocategory

            $('#EditCategory').submit(function (e) {
                e.preventDefault();

                let id = $('#subportfoliocategory_id').val();
                let formData = new FormData(this);

                if (editDetailsEditor) {
                    formData.set('details', editDetailsEditor.getData());
                }

                formData.append('_method', 'PUT');

                $.ajax({
                    type: 'POST',
                    url: 'portfoliosubcategories/' + id,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            title: "Updated Successfully!",
                            icon: "success",
                            button: "OK"
                        });

                        const modal = bootstrap.Modal.getInstance(document.getElementById('editmainCategory'));
                        if (modal) {
                            modal.hide();
                        }
                        portfoliocategory.ajax.reload();
                    }
                });
            });

            $('#editmainCategory').on('hidden.bs.modal', function () {
                if (editDetailsEditor) {
                    editDetailsEditor.setData('');
                }
                // Remove modal backdrop overlay
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                document.body.classList.remove('modal-open');
            });


            // delete portfoliocategory

            $(document).on('click', '#deleteCategoryBtn', function () {
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
                                url: 'portfoliosubcategories/' + portfoliocategoryId,
                                data: {
                                    '_token': token
                                },
                                success: function (data) {
                                    swal("Subcategory has been deleted!", {
                                        icon: "success",
                                    });
                                    portfoliocategory.ajax.reload();
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

            $(document).on('click', '#portfoliocategorystatusBtn', function () {
                let portfoliocategoryId = $(this).data('id');
                let portfoliocategoryStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'portfoliocategory/status',
                    data: {
                        subportfoliocategory_id: portfoliocategoryId,
                        status: portfoliocategoryStatus,
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
                        portfoliocategory.ajax.reload();
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            });

        });
    </script>

@endsection
