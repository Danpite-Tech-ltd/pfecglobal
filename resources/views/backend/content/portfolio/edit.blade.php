@extends('backend.master')

@section('title', 'Edit Blog')

@section('maincontent')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <div class="px-4 pt-4 container-fluid">
        <div class="p-4 rounded bg-secondary">
            <h2 class="mb-4 text-center text-danger">Edit Blog</h2>

            <form action="{{ route('admin.portfolios.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3 form-floating">
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                    <label>Title</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="author" class="form-control" value="{{ $blog->author }}" placeholder="Author Name" required>
                    <label>Author Name</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="study_title" class="form-control" value="{{ $blog->study_title }}" placeholder="Study Title" required>
                    <label>Study Title</label>
                </div>

                {{-- Short Description --}}
                <div class="mb-3 form-floating">
                    <textarea name="short_description" class="form-control"
                        style="height:100px">{{ $blog->short_description }}</textarea>
                    <label>Short Description</label>
                </div>

                {{-- Thumbnail --}}
                <div class="mb-3">
                    <label>Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control bg-dark">

                    @if($blog->thumbnail)
                        <img src="{{ asset($blog->thumbnail) }}" class="mt-2 rounded" style="max-height:80px">
                    @endif
                </div>

                {{-- Description --}}
                <label>Description</label>
                <textarea name="description" id="editor">
        {!! $blog->description !!}
                    </textarea>
                <br>
                <div class="mb-3 form-floating">
                    <input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title }}">
                    <label>Meta Title</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}">
                    <label>Meta Keywords</label>
                </div>

                <div class="mb-3 form-floating">
                    <textarea name="meta_description" class="form-control"
                        style="height:100px">{{ $blog->meta_description }}</textarea>
                    <label>Meta Description</label>
                </div>
                {{-- Status --}}
                <div class="mt-3 form-floating">
                    <select name="status" class="form-control">
                        <option value="Active" {{ $blog->status == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="Inactive" {{ $blog->status == 'Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                    <label>Status</label>
                </div>

                <button class="mt-3 btn btn-primary w-100">
                    Update Blog
                </button>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => console.error(error));


        function loadSubcategory(category_id, selected_subcategory = null){

            if(category_id){

                $.ajax({
                    url: "/admin/get-subcategory/" + category_id,
                    type: "GET",
                    dataType: "json",

                    success:function(data){

                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="">Select Subcategory</option>');

                        $.each(data,function(key,value){

                            let selected = selected_subcategory == value.id ? 'selected' : '';

                            $('#subcategory').append(
                                '<option value="'+value.id+'" '+selected+'>'+value.subcategory_name+'</option>'
                            );
                        });

                    }
                });

            }
        }

        // Page load হলে (Edit data load)
        $(document).ready(function(){

            var category_id = $('#category').val();
            var selected_subcategory = "{{ $blog->subcategory_id }}";

            loadSubcategory(category_id, selected_subcategory);

        });

        // Category change হলে
        $('#category').change(function(){

            var category_id = $(this).val();
            loadSubcategory(category_id);

        });
    </script>
@endsection
