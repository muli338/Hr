@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Regions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Regions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Regions</h3>
                        </div>
                        <form  class="form-horizontal" method="post" action="{{ url('admin/regions/add')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card-body">

                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Regions Name<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="text" value="{{ old('region_name')}}" name="region_name" class="form-control" placeholder="Enter Regions Name" required>
                               </div>
                            </div>
                            
                            </div>
                            

                            <div class="card-footer">
                                <a href="{{ url('admin/regions')}}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
@endsection