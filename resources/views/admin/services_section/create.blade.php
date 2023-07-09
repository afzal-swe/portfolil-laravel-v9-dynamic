@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Services</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" placeholder="Services Title">
                                    </div>
                                </div>

                                 <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="short_description" name="short_description" required class="form-control" rows="5" placeholder="Short Description"></textarea>
                                    </div>
                                </div>

                                 <!-- Long Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="logn_description"></textarea>
                                    </div>
                                </div>

                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="image" class="form-control" type="file">
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                {{-- <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($About->image)) ? 
                                            url('image/home_image/'.$About->about_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div> --}}

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Add Services</button>
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
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
