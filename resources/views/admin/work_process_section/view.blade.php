@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <div class="card-body">
                            
                            <h4 class="card-title">Title : {{ $view->title }}</h4>
                            <hr>
                            <h4 class="card-title">Description : {{ $view->description }}</h4>
                            <hr>
                            <a href="{{ route('working.index',$view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
