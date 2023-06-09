@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row wrapper-page">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Edit Profile Page</b></h4>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <!-- Name -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="name" name="name" class="form-control" type="text" placeholder="Full Name" required autofocus autocomplete="name" value="{{$editData->name}}">
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  id="username" name="username" class="form-control" type="text" required="" placeholder="Username" required autofocus autocomplete="username" value="{{$editData->username}}">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="email" name="email" class="form-control" type="email" required="" placeholder="Email" required autocomplete="email" value="{{$editData->email}}">
                                    </div>
                                </div>

                                <!-- Profile Image -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="profile" name="profile" class="form-control" type="file">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <img class="rounded avatar-lg" src="{{ asset('backends/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Profile</button>
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
