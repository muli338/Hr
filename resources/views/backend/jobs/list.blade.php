@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <form action="{{ url('admin/jobs_export')}}" method="get">
            <input type="hidden" name="start_date" value="{{Request()->start_date }}">
            <input type="hidden" name="end_date" value="{{Request()->end_date }}">
            <a class="btn btn-success" href="{{ url('admin/jobs_export?start_date='.
              Request::get('start_date').'&end_date='.
              Request::get('end_date')) }}">Excel Export</a>
          </form>
          <br>
          <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary">Add Jobs</a> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">

          <div class="row">
            <section class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Search Job</h3>
                </div>
              </div>
            </section>
          </div>
        </div>
        <form method="get" action="">
          <div class="card-body">
            <div class="row">
            <div class="form-group col-md-3">
                <label>ID</label>
                <input type="text" name="id" class="form-control" value="{{ Request()
                ->id}}" placeholder="ID">
              </div>
              <div class="form-group col-md-3">
                <label>Job Title</label>
                <input type="text" name="job_title" value="{{ Request()
                ->job_title}}" class="form-control" placeholder="Job Title">
              </div>

              <div class="form-group col-md-3">
                <label>Min Salary</label>
                <input type="text" name="min_salary" value="{{ Request()
                ->min_salary}}" class="form-control" placeholder="Min Salary">
              </div>

              <div class="form-group col-md-3">
                <label>Max Salary</label>
                <input type="text" name="max_salary" value="{{ Request()
                ->max_salary}}" class="form-control" placeholder="Max Salary">
              </div>

              <div class="form-group col-md-3">
                <label>From Date</label>
                <input type="date" name="start_date" value="{{ Request()
                ->start_date}}" class="form-control">
              </div>

              <div class="form-group col-md-3">
                <label>To Date</label>
                <input type="date" name="end_date" value="{{ Request()
                ->end_date}}" class="form-control">
              </div>

              <div class="form-group col-md-2">
                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">
                Search
                </button>
                <a href="{{ url('admin/jobs') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
              </div>
            </div>
          </div>
        </form>
        @include('_message')
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Jobs List</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Job Title</th>
                  <th>Min Salary</th>
                  <th>Max Salary</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @forelse($getRecord as $value)
                <tr>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->job_title }}</td>
                <td>Ksh {{ $value->min_salary }}</td>
                <td>Ksh {{ $value->max_salary }}</td>
                  <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                  <td>
                  <a href="{{ url('admin/jobs/view/'.$value->id)}}" class="btn btn-info">View</a>
                    <a href="{{ url('admin/jobs/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('admin/jobs/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete these Job Record?')" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="100%">
                    No Records Found please enter valid details
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div style="padding: 10px; float: right;">
            </div>
          </div>
        </div>
       </section>
     <!-- /.row (main row) -->
     </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
@endsection