@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <form action="{{ url('admin/location_export') }}" method="get">
            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
            <a href="{{ url('admin/location_export?start_date='.Request()->start_date.'&end_date='.Request()->end_date) }}" class="btn btn-success">Excel Export</a>
          </form>
          <br>
          <a href="{{ url('admin/location/add') }}" class="btn btn-primary">Add location</a> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search location</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">

                  <div class="form-group col-md-1">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="Enter ID">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Street Address</label>
                    <input type="text" name="street_address" class="form-control" value="{{ Request()->street_address }}" placeholder="Enter Street Address">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Postal Code</label>
                    <input type="text" name="postal_code" class="form-control" value="{{ Request()->postal_code }}" placeholder="Enter Postal Code">
                  </div>

                  <div class="form-group col-md-2">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="{{ Request()->city }}" placeholder="Enter City">
                  </div>

                  
                  <div class="form-group col-md-2">
                    <label>State Province</label>
                    <input type="text" name="state_province" class="form-control" value="{{ Request()->state_province }}" placeholder="Enter State Province">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Country Name</label>
                    <input type="text" name="country_name" class="form-control" value="{{ Request()->country_name }}" placeholder="Enter Country Name">
                  </div>

                <div class="form-group col-md-3">
                <label>Form Date (Start Date)</label>
                <input type="date" name="start_date" value="{{ Request()
                ->start_date}}" class="form-control">
              </div>

              <div class="form-group col-md-3">
                <label>To Date (End Date)</label>
                <input type="date" name="end_date" value="{{ Request()
                ->end_date}}" class="form-control">
              </div>

                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/location')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                  </div>
                </div>
              </div>
            </form>
          </div>

          @include('_message')
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">location List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Street Address</th>
                      <th>Postal Code</th>
                      <th>City</th>
                      <th>State Province</th>
                      <th>Country Name</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->street_address }}</td>
                      <td>{{ $value->postal_code }}</td>
                      <td>{{ $value->city }}</td>
                      <td>{{ $value->state_province }}</td>
                      <td>{{ !empty($value->get_country_name->country_name) ? $value->get_country_name->country_name : '' }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                      <td>
                       <a href="{{ url('admin/location/edit/' .$value->id)}}" class="btn btn-primary">Edit</a>
                       <a href="{{ url('admin/location/delete/' .$value->id)}}" onclick="return confirm('Are you sure you want to delete this Location?')" class="btn btn-danger">Delete</a>
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