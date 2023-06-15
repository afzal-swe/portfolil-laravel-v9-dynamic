@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $view_message->name }}</h4>
                            <hr>
                            <h4 class="card-title">Number : {{ $view_message->phone }}</h4>
                            <hr>
                            <h4 class="card-title">E-mail : {{ $view_message->email }}</h4>
                            <hr>
                            <h4 class="card-title">Message : {{ $view_message->message }}</h4>
                            <hr>
                            <a href="{{ route('message.index',$view_message->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection