@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <div class="card-body">
                            <h4 class="card-title">Number : {{ $view->number }}</h4>
                            <hr>
                            <h4 class="card-title">E-mail : {{ $view->email }}</h4>
                            <hr>
                            <h4 class="card-title">Address : {{ $view->address }}</h4>
                            <hr>
                            <h4 class="card-title">Facebook Link : {{ $view->facebook }}</h4>
                            <hr>
                            <h4 class="card-title">Twitter Link : {{ $view->twitter }}</h4>
                            <hr>
                            <a href="{{ route('footer.create',$view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Update Footer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
