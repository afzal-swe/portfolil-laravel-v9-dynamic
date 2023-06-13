@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #201f1f;
        font-weight: 700px;
    } 
</style>

<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Update Blog Page</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('blog.update',$edit->id) }}" enctype="multipart/form-data">
                                @csrf
                                

                                <!-- Blog Category Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name <span class="text-danger" >*</span></label>
                                    <div class="col-sm-10">
                                        <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Choose Category</option>
                                            @foreach ($blog_category as $cat)
                                                <option value="{{$cat->id}}" {{ $cat->id == $edit->blog_category_id ? 'selected' : ''}}>{{ $cat->blog_category }}</option>
                                            @endforeach
                                            
                                            </select>
                                    </div>
                                </div>

                                <!-- Blog Title Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title <span class="text-danger" >*</span></label>
                                    <div class="col-sm-10">
                                        <input id="blog_title" name="blog_title" class="form-control" type="text" value="{{$edit->blog_title}}">
                                    </div>
                                </div>


                                <!-- Blog Description Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="blog_description">{!!$edit->blog_description!!}"</textarea>
                                    </div>
                                </div>

                                <!-- Blog Tags Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="blog_tags" name="blog_tags" class="form-control" type="text" data-role="tagsinput" value="{{$edit->blog_tags}}">
                                    </div>
                                </div>

                                <!-- Blog Image Section-->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="blog_image" name="blog_image" class="form-control" type="file">
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset ($edit->blog_image) }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Blog</button>
                                    </div>
                                </div>
    
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#blog_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
