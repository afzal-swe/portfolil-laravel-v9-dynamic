@extends('admin.admin_master')
@section('admin')

<div class="main-content col-lg-10">
   
            
                            <div class="page-content">
                                <div class="container-fluid">
            
                        
                                    
                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                    
                                                    <h4 class="card-title">Buttons Example</h4>
                                                    <p class="card-title-desc">The Buttons extension for DataTables
                                                        provides a common set of options, API methods and styling to display
                                                        buttons on a page that will interact with a DataTable. The core library
                                                        provides the based framework upon which plug-ins can built.
                                                    </p>
                    
                                                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">      <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="datatable-buttons" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                                        <thead>
                                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 312px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                                                        </thead>
                    
                    
                                                        <tbody>
                                                        

                                                        
                                                        
                                                        <tr class="odd">
                                                            <td class="sorting_1 dtr-control">Airi Satou</td>
                                                            <td style="display: none;">Accountant</td>
                                                            <td style="display: none;">Tokyo</td>
                                                            <td style="display: none;">33</td>
                                                            <td style="display: none;">2008/11/28</td>
                                                            <td style="display: none;">$162,700</td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                            <td style="display: none;">Chief Executive Officer (CEO)</td>
                                                            <td style="display: none;">London</td>
                                                            <td style="display: none;">47</td>
                                                            <td style="display: none;">2009/10/09</td>
                                                            <td style="display: none;">$1,200,000</td>
                                                        </tr><tr class="odd">
                                                            <td class="sorting_1 dtr-control">Ashton Cox</td>
                                                            <td style="display: none;">Junior Technical Author</td>
                                                            <td style="display: none;">San Francisco</td>
                                                            <td style="display: none;">66</td>
                                                            <td style="display: none;">2009/01/12</td>
                                                            <td style="display: none;">$86,000</td>
                                                        
                                                        
                                                        </tr>
                                                    </tbody>
                                                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                    
                                </div> <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->
                       
                            
                        </div>
                        <!-- end main content-->
            
                    </div>
                    <!-- END layout-wrapper -->
            
            </body>

        </div> <!-- container-fluid -->
    </div>
</div>

@endsection