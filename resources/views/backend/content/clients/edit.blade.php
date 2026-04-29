@extends('backend.master')

@section('title')
    {{ env('APP_NAME') }} - Edit Page
@endsection

@section('maincontent')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="px-4 pt-4 container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="p-4 rounded bg-secondary h-100">
                <h2 class="mb-4 text-center text-danger">Edit Page</h2>

                <form action="{{ route('admin.clients.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-12">
                            <div class="mb-3 form-floating">
                                <input type="text" name="page_name" class="form-control"
                                    value="{{ $page->page_name }}">
                                <label>Page Name</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" name="title" class="form-control"
                                    value="{{ $page->title }}" required>
                                <label>Page Title</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <select name="type" class="form-control">
                                    <option value="header" {{ $page->type=='header'?'selected':'' }}>Header</option>
                                    <option value="footer" {{ $page->type=='footer'?'selected':'' }}>Footer</option>
                                </select>
                                <label>Page Type</label>
                            </div>
                        </div>

                        <div class="mb-3 col-12">
                            <label>Banner Image</label>
                            <input type="file" name="banner" class="form-control bg-dark">
                            @if($page->banner)
                                <img src="{{ asset($page->banner) }}" class="mt-2" height="80">
                            @endif
                        </div>

                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control">
                                {!! $page->description !!}
                            </textarea>
                        </div>

                        <div class="mt-3 col-12">
                            <div class="mb-3 form-floating">
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ $page->meta_title }}">
                                <label>Meta Title</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" name="meta_keywords" class="form-control"
                                    value="{{ $page->meta_keywords }}">
                                <label>Meta Keywords</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <textarea name="meta_description" class="form-control"
                                    style="height:100px">{{ $page->meta_description }}</textarea>
                                <label>Meta Description</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 form-floating">
                                <select name="status" class="form-control">
                                    <option value="Active" {{ $page->status=='Active'?'selected':'' }}>Active</option>
                                    <option value="Inactive" {{ $page->status=='Inactive'?'selected':'' }}>Inactive</option>
                                </select>
                                <label>Status</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary btn-lg w-100">
                                Update Page
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
.create(document.querySelector('#description'), {
    toolbar: [
        'heading','|','bold','italic','underline','link','|',
        'bulletedList','numberedList','blockQuote','|',
        'insertTable','imageUpload','mediaEmbed','|',
        'undo','redo'
    ]
})
.catch(error => console.error(error));
</script>
@endsection
