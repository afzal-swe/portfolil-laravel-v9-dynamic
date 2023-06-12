@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Update Portfolio</b></h4>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('portfolio.update',$edit->id) }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Portfolio Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="portfolio_name" name="portfolio_name" class="form-control" type="text" placeholder="Portfolio Name" value="{{ $edit->portfolio_name }}">
                                    </div>
                                </div>

                                <!-- Portfolio Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input  id="portfolio_title" name="portfolio_title" class="form-control" type="text" placeholder="Portfolio Title" value="{{ $edit->portfolio_title }}">
                                    </div>
                                </div>

                                {{-- Portfolio Description --}}
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="portfolio_description" >{!! $edit->portfolio_description !!}"</textarea>
                                    </div>
                                </div>

                                <!-- Portfolio Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="portfolio_image" name="portfolio_image" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset ($edit->portfolio_image) }}" alt="Card image cap">
                                    </div>
                                </div>

                                
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Portfolio</button>
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
        $('#portfolio_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
