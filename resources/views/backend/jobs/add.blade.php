@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Jobs</li>
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
                            <h3 class="card-title">Add Jobs</h3>
                        </div>
                        <form  class="form-horizontal" method="post" action="{{ url('admin/jobs/add')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Title <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                <input type="text" value="{{ old('job_title')}}" name="job_title" class="form-control" required placeholder="Enter Job Title">
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Minimum Salary <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                <input type="number" value="{{ old('min_salary')}}" name="min_salary" class="form-control" required placeholder="Enter Minimum Salary">
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Maximum Salary <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                <input type="number" value="{{ old('max_salary')}}" name="max_salary" class="form-control" required placeholder="Enter Maximum Salary">
                               </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/jobs')}}" class="btn btn-default">Back</a>
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