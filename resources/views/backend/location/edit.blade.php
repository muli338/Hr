@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Location</li>
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
                            <h3 class="card-title">Edit Location</h3>
                        </div>
                        <form  class="form-horizontal" method="post" action="{{ url('admin/location/edit/'.$getRecord->id )}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Street Address<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="text" value="{{ $getRecord->street_address }}" name="street_address" class="form-control" required>
                               </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Postal Code<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="text" value="{{ $getRecord->postal_code }}" name="postal_code" class="form-control" required>
                               </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">City<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="text" value="{{ $getRecord->city }}" name="city" class="form-control" required>
                               </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Street Province<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                               <input type="text" value="{{ $getRecord->state_province }}" name="state_province" class="form-control" required>
                               </div>
                            </div>

                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Country Name<span style="color: red;">*</span></label>
                               <div class="col-sm-10">
                                    <select class="form-control" name="countries_id">
                                        <option value="">Select Country</option>
                                       @foreach($getCountries as $value)
                                       <option value="{{ $value->id }}" {{ ($value->id == $getRecord->countries_id) ? 'selected' : '' }}>{{ $value->country_name }}</option>
                                       @endforeach
                                    </select>
                               </div>
                            </div>
                            
                            </div>
                            

                            <div class="card-footer">
                                <a href="{{ url('admin/location')}}" class="btn btn-default">Back</a>
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