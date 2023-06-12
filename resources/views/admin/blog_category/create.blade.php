@extends('admin.admin_master')
@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Create A New Blog Category</b></h4><br><br>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('blog_category.store') }}">
                                @csrf
                                
                                <!-- Portfolio Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="blog_category" name="blog_category" class="form-control" type="text" placeholder="Blog Category Name" value="{{old('blog_category')}}">
                                        
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><br>
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Create Blog Category</button>
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
