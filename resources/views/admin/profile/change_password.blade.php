@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row wrapper-page">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Update Password</b></h4>
    
                        <div class="p-3">
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('update.password') }}">
                                @csrf
                                
                                <!-- Old Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="oldpassword" name="oldpassword" class="form-control" type="password" placeholder="Old Password">
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="new_password" name="new_password" class="form-control" type="password" placeholder="New Password">
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="confirm_password" name="confirm_password" class="form-control" type="password" placeholder="Confirm Password">
                                    </div>
                                </div>

                               
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Change Password</button>
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
