@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job History</li>
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
                            <h3 class="card-title">Add Job History</h3>
                        </div>
                        <form  class="form-horizontal" method="post" action="{{ url('admin/job_history/add')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Employees Name <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <select class="form-control" name="employee_id">
                                <option value="">Select Employees Name</option>
                                @foreach($getEmployee as $value_employee)
                                <option value="{{ $value_employee->id }}">{{ $value_employee->name }} {{ $value_employee->last_name }} </option>
                                @endforeach
                               </select>
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Start Date<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="date" value="{{ old('start_date')}}" name="start_date" class="form-control" required>
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">End Date <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                <input type="date" value="{{ old('end_date')}}" name="end_date" class="form-control" required>
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Name (Job ID)<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <select class="form-control" name="job_id">
                                <option value="">Select Job Name</option>
                                @foreach($getJobs as $value_job)
                                <option value="{{ $value_job->id }}">{{ $value_job->job_title }}</option>
                                @endforeach
                               </select>
                               </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Deparment Name (Deparment ID)<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <select class="form-control" name="department_id">
                                <option value="">1</option>
                                <option value="">Select Manager Name</option>
                                <option value="1">Mark Gomez</option>
                                <option value="2">God Bless</option>
                               </select>
                               </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/job_history')}}" class="btn btn-default">Back</a>
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