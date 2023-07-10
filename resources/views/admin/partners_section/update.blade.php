@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Services Edit</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('working_about.update',$working->id) }}">
                                @csrf
                                
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" value="{{ $working->title }}">
                                    </div>
                                </div>

                                 <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="description" name="description" required class="form-control" rows="5" >{{ $working->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Working Group About</button>
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
