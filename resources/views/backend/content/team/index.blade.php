@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Team
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
                    <h6 class="mb-0">Team-member List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainTeam" class="btn btn-primary m-2"
                        style="float: right"> + Create Team-member</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-stripe" id="team" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
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
        <div class="modal fade" id="mainTeam" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Team</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddTeam" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name" required>
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Title" required>
                                <label for="floatingInput">Title</label>
                            </div>

                           <div class="form-floating mb-3">
                                <textarea class="form-control" name="facebook" id="facebook"
                                    placeholder="Facebook" style="height: 100px"></textarea>
                                <label for="facebook">Description</label>
                            </div>

                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tweitter" id="tweitter"
                                    placeholder="Tweitter">
                                <label for="floatingInput">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="instagram" id="instagram"
                                    placeholder="Instagram">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="linkedin" id="linkedin"
                                    placeholder="Linkedin">
                                <label for="floatingInput">Reason</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="badge" id="badge"
                                    placeholder="Linkedin">
                                <label for="floatingInput">Badge</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select class="form-control" name="soc" id="soc">
                                    <option value="">Select Badge</option>
                                    <option value="client">Client</option>
                                    <option value="staff">Staff</option>
                                </select>
                                <label for="soc">Badge</label>
                            </div> -->


                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="image" id="image"
                                    type="file">
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
        <div class="modal fade" id="editmainTeam" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Team</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditTeam" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name" required>
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Title" required>
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="facebook" id="facebook"
                                    placeholder="Facebook" style="height: 100px"></textarea>
                                <label for="facebook">Description</label>
                            </div>
                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tweitter" id="tweitter"
                                    placeholder="Tweitter">
                                <label for="floatingInput">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="instagram" id="instagram"
                                    placeholder="Instagram">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="linkedin" id="linkedin"
                                    placeholder="Linkedin">
                                <label for="floatingInput">Reason</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="badge" id="badge"
                                    placeholder="Linkedin">
                                <label for="floatingInput">Badge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="soc" id="soc">
                                    <option value="">Select Badge</option>
                                    <option value="client">Client</option>
                                    <option value="staff">Staff</option>
                                </select>
                                <label for="soc">Badge</label>
                            </div> -->
                            <div class="mt-4 mb-4">
                                <input class="form-control form-control-lg bg-dark" name="image" id="image"
                                    type="file">
                            </div>
                            <input type="text" name="id" id="id" hidden>

                            <div class="m-3 ms-0 mb-0"
                                style="text-align: center;height: 100px;margin-top:20px !important">
                                <h4 style="width:30%;float: left;text-align: left;">Image : </h4>
                                <div id="previmg" style="float: left;"></div>
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

        var team = $('#team').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.team.data') !!}',
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
                    data: 'title'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="teamstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="teamstatusBtn" data-id="' +
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


        //add team

        $('#AddTeam').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.teams.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not save Team',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#name').val('');
                        $('#title').val('');
                        $('#facebook').val('');
                        $('#tweitter').val('');
                        $('#linkedin').val('');
                        $('#badge').val('');
                        $('#soc').val('');
                        $('#instagram').val('');
                        $('#image').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                        });
                        team.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit team
        $(document).on('click', '#editTeamBtn', function() {
            let teamId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'teams/' + teamId + '/edit',

                success: function(data) {
                    $('#EditTeam').find('#name').val(data
                        .name);
                    $('#EditTeam').find('#title').val(data.title);
                    $('#EditTeam').find('#facebook').val(data.facebook);
                    $('#EditTeam').find('#tweitter').val(data.tweitter);
                    $('#EditTeam').find('#linkedin').val(data.linkedin);
                    $('#EditTeam').find('#badge').val(data.badge);
                    $('#EditTeam').find('#soc').val(data.soc);
                    $('#EditTeam').find('#instagram').val(data.instagram);
                    $('#EditTeam').find('#id').val(data.id);

                    $('#previmg').html('');
                    $('#previmg').append(`
                        <img  src="../` + data.image + `" alt = "" style="height: 80px" />
                    `);

                    $('#EditTeam').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update team
        $('#EditTeam').submit(function(e) {
            e.preventDefault();
            let teamId = $('#id').val();

            $.ajax({
                type: 'POST',
                url: 'team/' + teamId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Can not update Team',
                            text: 'Please fill Title Name',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#EditTeam').find('#name').val('');
                        $('#EditTeam').find('#title').val('');
                        $('#EditTeam').find('#facebook').val('');
                        $('#EditTeam').find('#tweitter').val('');
                        $('#EditTeam').find('#linkedin').val('');
                        $('#EditTeam').find('#badge').val('');
                        $('#EditTeam').find('#soc').val('');
                        $('#EditTeam').find('#instagram').val('');
                        $('#EditTeam').find('#image').val('');
                        $('#previmg').html('');

                        swal({
                            title: "Team update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        team.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // delete team

        $(document).on('click', '#deleteTeamBtn', function() {
            let teamId = $(this).data('id');
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
                            url: 'teams/' + teamId,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                swal("Team has been deleted!", {
                                    icon: "success",
                                });
                                team.ajax.reload();
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

        $(document).on('click', '#teamstatusBtn', function() {
            let teamId = $(this).data('id');
            let teamStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'team/status',
                data: {
                    team_id: teamId,
                    status: teamStatus,
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
                    team.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection
