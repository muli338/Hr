@extends('backend.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                            <h3 class="card-title">Edit Employees</h3>
                        </div>
                        <form  class="form-horizontal" method="post" action="{{ url('admin/employees/edit/' .$getRecord->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">First Name <span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                <input type="text" value="{{ $getRecord->name }}" name="name" class="form-control" required placeholder="Enter Employee FirstName">
                               </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Last Name <span style="color: red;"></span></label>
                                <div class="col-sm-10">
                                <input type="text" value="{{ $getRecord->last_name }}" name="last_name" class="form-control" placeholder="Enter Employee LastName">
                               </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Email ID<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                <input type="email" value="{{ $getRecord->email }}" name="email" class="form-control" required placeholder="Enter Employee Email">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Phone Number <span style="color: red;"></span></label>
                                <div class="col-sm-10">
                                <input type="number" value="{{ $getRecord->phone_number }}" name="phone_number" class="form-control" placeholder="Enter Employee Phone Number">
                                <span style="color:red">{{ $errors->first('phone_number') }}</span>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Hire Date <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                <input type="date" value="{{ $getRecord->hire_date }}" name="hire_date" class="form-control" required placeholder="Enter Employee Hire Date">
                            </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Title <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="job_id" required>
                                       @foreach($getJobs as $value_job)
                                        <option {{ ($value_job->id == $getRecord->job_id) ? 'selected' : '' }} 
                                            value="{{ $value_job->id }}">{{ $value_job->job_title }}
                                       @endforeach
                                    </select>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Salary<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                <input type="number" value="{{ $getRecord->salary }}" name="salary" class="form-control" required placeholder="Enter Employee Salary">
                                <span style="color:red">{{ $errors->first('salary') }}</span>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Commission PCT<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                <input type="number" value="{{ $getRecord->commission_pct }}" name="commission_pct" class="form-control" required placeholder="Enter Commission_Pct">
                                <span style="color:red">{{ $errors->first('commission_pct') }}</span>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="manager_id" required>
                                        <option value="">Select Manager Name</option>
                                        <option {{ ($getRecord->manager_id == 1) ? 'selected' : ''}} value="1">Mark Gomez</option>
                                        <option {{ ($getRecord->manager_id == 2) ? 'selected' : ''}} value="2">God Bless</option>
                                    </select>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Department Name <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="department_id" required>
                                        <option value="">Select Department Name</option>
                                        <option {{ ($getRecord->department_id == 1) ? 'selected' : ''}} value="1">ICT</option>
                                        <option {{ ($getRecord->department_id == 2) ? 'selected' : ''}} value="2">Computer Science</option>
                                    </select>
                            </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/employees')}}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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