@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Home Slide Page</b></h4>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('update.slide',$homeSlide->id) }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" placeholder="Title" value="{{ $homeSlide->title }}">
                                    </div>
                                </div>

                                <!-- Short Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input  id="short_title" name="short_title" class="form-control" type="text" placeholder="Short Title" value="{{ $homeSlide->short_title }}">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video url<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="video_url" name="video_url" class="form-control" type="text" value="{{ $homeSlide->video_url }}">
                                    </div>
                                </div>

                                <!-- Home Slide Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="home_slide" name="home_slide" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeSlide->home_slide)) ? 
                                            url($homeSlide->home_slide):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Slide</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#home_slide').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
