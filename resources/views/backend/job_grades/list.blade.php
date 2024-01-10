@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary">Add Job Grades</a> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Job</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">

                  <div class="form-group col-md-1">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="Enter ID">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Grade Level</label>
                    <input type="text" name="grade_level" class="form-control" value="{{ Request()->grade_level }}" placeholder="Enter Grade Level">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Lowest Salary</label>
                    <input type="number" name="lowest_sal" class="form-control" value="{{ Request()->lowest_sal }}" placeholder="Enter Lowest Salary">
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label>Highest Salary</label>
                    <input type="number" name="highest_sal" class="form-control" value="{{ Request()->highest_sal }}" placeholder="Enter Highest Salary">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Created At</label>
                    <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at }}" >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Updated At</label>
                    <input type="date" name="updated_at" class="form-control" value="{{ Request()->updated_at }}">
                  </div>

                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/job_grades')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                  </div>
                </div>
              </div>
            </form>
          </div>

          @include('_message')
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jobs Grades List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Grade Level</th>
                      <th>Lowest Salary</th>
                      <th>Highest Salary</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->grade_level }}</td>
                      <td>{{ $value->lowest_sal }}</td>
                      <td>{{ $value->highest_sal }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                      <td>
                       <a href="{{ url('admin/job_grades/edit/' .$value->id)}}" class="btn btn-primary">Edit</a>
                       <a href="{{ url('admin/job_grades/delete/' .$value->id)}}" onclick="return confirm('Are you sure you want to delete the Job Grade?')" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @empty
                    <tr>
                      <td>No Record Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
          </section>
        </div>
      </div>
    </section>
    </div>
    </div><!-- /.container-fluid --
    <!-- /.content -->
  </div>
  @endsection