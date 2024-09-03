@extends('admin_dashboard')
@section('admin')

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <a href="{{route('add.roles')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Roles</a>
                                          
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Roles</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Roles</h4>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($roles as $key=> $item)
                            <tr>
                                <td>{{$key+1}}</td>
                              <td>{{$item->name}}</td>
                            <td>
                            <a href="{{ route('edit.roles',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                              <a href="{{ route('delete.roles',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->




                    </div> <!-- container -->

                </div> <!-- content -->


@endsection 