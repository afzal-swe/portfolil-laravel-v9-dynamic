@extends('admin.admin_master')
@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Add New Feedback</b></h4><br><br>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('feedback.store') }}">
                                @csrf
                                
                                <!-- Client Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Client Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" class="form-control" type="text" placeholder="client Name" value="{{old('name')}}">
                                    </div>
                                </div>

                                <!-- Title Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" placeholder="Feedback Title" value="{{old('title')}}">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="short_title" name="short_title" class="form-control" type="text" placeholder="Short Description" value="{{old('short_title')}}">
                                    </div>
                                </div><br>
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Add Feedback</button>
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
