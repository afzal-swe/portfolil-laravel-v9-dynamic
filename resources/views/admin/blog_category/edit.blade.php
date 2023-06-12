@extends('admin.admin_master')
@section('admin')


<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Update Blog Category</b></h4>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('blog_category.update',$edit->id) }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Portfolio Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="blog_category" name="blog_category" class="form-control" type="text" value="{{ $edit->blog_category }}">
                                    </div>
                                </div><br>
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Blog Category</button>
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
@endsection
