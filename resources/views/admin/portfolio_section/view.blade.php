@extends('admin.admin_master')
@section('admin') 

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <div>
                            <a href="{{ route('portfolio.index') }}" class="btn btn-success sm" title="Back"><i class="ri-arrow-left-s-line"></i></a>
                        </div>
                        <center>
                            
                            <img class="rounded-circle avatar-xl" src="{{  (!empty($view->portfolio_image)) ? 
                                url('image/portfolio/'.$view->portfolio_image):url('image/No_Image_Available.jpg') }}">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Portfolio Name : {{ $view->portfolio_name }}</h4>
                            <hr>
                            <h4 class="card-title">Portfolio Title : {{ $view->portfolio_title }}</h4>
                            <hr>
                            <h4 class="card-title">Portfolio Description : {!! $view->portfolio_description !!}</h4>
                            <hr>
                            <a href="{{ route('portfolio.create',$view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection