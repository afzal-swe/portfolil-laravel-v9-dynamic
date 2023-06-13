@extends('admin.admin_master')
@section('admin')



<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Create A New Footer</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('footer.store') }}" enctype="multipart/form-data">
                                @csrf
                                

                                <!-- Number Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Number <span class="text-danger" >*</span></label>
                                    <div class="col-sm-10">
                                        <input id="number" name="number" class="form-control" type="number" placeholder="01XXXXXXXXX" value="{{old('number')}}">
                                    </div>
                                </div>


                                <!-- Address Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="address" name="address" class="form-control" type="text" placeholder="Address">
                                    </div>
                                </div>
                                
                                <!-- Email Section-->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="email" name="email" class="form-control" type="email" placeholder="example@gmail.com">
                                    </div>
                                </div>

                                <!-- Facebook Section-->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="facebook" name="facebook" class="form-control" type="text" placeholder="Facebook Link">
                                    </div>
                                </div>

                                <!-- Twitter Section-->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Twitter<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="twitter" name="twitter" class="form-control" type="text" placeholder="Twitter Link">
                                    </div>
                                </div>


                                <!-- Copyright Section-->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Copyright<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="copyright" name="copyright" class="form-control" type="text" placeholder="@example">
                                    </div>
                                </div>

                                <!-- Footer Description Section -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Footer Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="short_description" name="short_description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Create Footer</button>
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
