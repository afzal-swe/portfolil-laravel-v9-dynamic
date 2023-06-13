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
                        <h4 class="mb-sm-0">Blog Section</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blogs</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Blog Image</th>
                                        <th>Blog Category</th>
                                        <th>Blog Title</th>
                                        <th>Blog Slug</th>
                                        <th>Blog Tags</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($blog as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><img src="{{ asset($row->blog_image) }}" style="width: 40px; height:40px"></td>
                                        <td>{{ $row['blogcategory']['blog_category'] }}</td>
                                        <td>{{ $row->blog_title }}</td>
                                        <td>{{ $row->blog_slug }}</td>
                                        <td>{{ $row->blog_tags }}</td>
                                        <td>
                                            <a href="{{ route('blog.view',$row->id) }}" class="btn btn-success sm" title="View Data"><i class="ri-eye-off-fill"></i></a>
                                            <a href="{{ route('blog.edit',$row->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('blog.destroy',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                            
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
