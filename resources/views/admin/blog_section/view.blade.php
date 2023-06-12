@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($blog->blog_image)) ? 
                                                                     url('image/blog/'.$blog->blog_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Category Name : {{ $blog->blogcategory->blog_category }}</h4>
                            <hr>
                            <h4 class="card-title">Blog Title : {{ $blog->blog_title }}</h4>
                            <hr>
                            <h4 class="card-title">Blog Tags : {{ $blog->blog_tags }}</h4>
                            <hr>
                            <a href="{{ route('blog.create',$blog->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Update Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
