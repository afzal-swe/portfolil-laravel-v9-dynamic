@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($view->image)) ? 
                                                                     url('image/services/'.$view->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Title : {{ $view->title }}</h4>
                            <hr>
                            <h4 class="card-title">Description : {{ $view->description }}</h4>
                            <hr>
                            <a href="{{ route('services.index',$view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
