@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Footer Section</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Footer work</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Number</th>
                                        <th>Address</th>
                                        <th>E-mail</th>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Copyright</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($footerData as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ $row->number }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->facebook }}</td>
                                        <td>{{ $row->twitter }}</td>
                                        <td>{{ $row->copyright }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success sm" title="View Data"><i class="ri-eye-off-fill"></i></a>
                                            <a href="#" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('footer.destroy',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
@endsection
