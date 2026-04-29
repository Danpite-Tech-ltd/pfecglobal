@extends('backend.master')

@section('title', 'Create Blog')

@section('maincontent')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <div class="px-4 pt-4 container-fluid">
        <div class="p-4 rounded bg-secondary">
            <h2 class="mb-4 text-center text-danger">Create Blog</h2>

            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 form-floating">
                    <input type="text" name="title" class="form-control" placeholder="Blog Title" required>
                    <label>Title</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="author" class="form-control" placeholder="Author Name" required>
                    <label>Author Name</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="study_title" class="form-control" placeholder="Study Title" required>
                    <label>Study Title</label>
                </div>

                <div class="mb-3 form-floating">
                    <textarea name="short_description" class="form-control" style="height:100px"
                        placeholder="Summary"></textarea>
                    <label>Summary</label>
                </div>

                <div class="mb-3">
                    <label>Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control bg-dark">
                </div>

                <label>Description</label>
                <textarea name="description" id="editor"></textarea>

                <br>
                <div class="mb-3 form-floating">
                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                    <label>Meta Title</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords">
                    <label>Meta Keywords</label>
                </div>

                <div class="mb-3 form-floating">
                    <textarea name="meta_description" class="form-control" style="height:100px"
                        placeholder="Meta Description"></textarea>
                    <label>Meta Description</label>
                </div>

                <div class="mt-3 form-floating">
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    <label>Status</label>
                </div>

                <button class="mt-3 btn btn-primary w-100">Publish Blog</button>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor.create(document.querySelector('#editor')).catch(error => console.log(error));

        $('#category').change(function(){

            var category_id = $(this).val();

            if(category_id){

                $.ajax({
                    url: "/admin/get-subcategory/" + category_id,
                    type: "GET",
                    dataType: "json",

                    success:function(data){

                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="">Select Subcategory</option>');

                        $.each(data,function(key,value){
                            $('#subcategory').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                        });

                    }

                });

            }else{
                $('#subcategory').empty();
            }

        });
    </script>
@endsection
