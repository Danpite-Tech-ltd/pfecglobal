@extends('backend.master')

@section('title')
    {{ env('APP_NAME') }} - Create Page
@endsection

@section('maincontent')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


<div class="px-4 pt-4 container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="p-4 rounded bg-secondary h-100">
                <h2 class="mb-4 text-center text-danger">Create New Page</h2>

                <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- LEFT SIDE -->
                        <div class="col-lg-12">
                            <div class="mb-3 form-floating">
                                <input type="text" name="page_name" class="form-control" placeholder="Page Name">
                                <label>Page Name</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" name="title" class="form-control" placeholder="Page Title" required>
                                <label>Page Title</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <select name="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="header">Header</option>
                                    <option value="footer">Footer</option>
                                </select>
                                <label>Page Type</label>
                            </div>


                        </div>

                        <!-- RIGHT SIDE -->


                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Banner Image</label>
                                <input type="file" name="banner" class="form-control bg-dark">
                            </div>
                        </div>
                        <!-- FULL WIDTH -->
                        <div class="col-12">
                            <div class="mb-3 form-floating">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" row="5"  placeholder="Page Description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="mb-3 form-floating">
                                <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                                <label>Meta Title</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords">
                                <label>Meta Keywords</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <textarea name="meta_description" class="form-control"
                                    style="height: 100px;" placeholder="Meta Description"></textarea>
                                <label>Meta Description</label>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="mb-3 form-floating">
                                <select name="status" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <label>Status</label>
                            </div>
                        </div>
                        <div class="mt-3 col-12">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Create Page
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'link', '|',
                    'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'imageUpload', 'mediaEmbed', '|',
                    'undo', 'redo'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn', 'tableRow', 'mergeTableCells'
                ]
            }
        })
        .catch( error => {
            console.error( error );
        } );
</script>


@endsection
