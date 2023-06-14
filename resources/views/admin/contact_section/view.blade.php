@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $single_message_view->name }}</h4>
                            <hr>
                            <h4 class="card-title">Number : {{ $single_message_view->phone }}</h4>
                            <hr>
                            <h4 class="card-title">E-mail : {{ $single_message_view->email }}</h4>
                            <hr>
                            <h4 class="card-title">Subject : {{ $single_message_view->subject }}</h4>
                            <hr>
                            <h4 class="card-title">Message : {{ $single_message_view->message }}</h4>
                            <hr>
                            <a href="{{ route('contact.index',$single_message_view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection