@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/backend/select2.min.css') }}">
<style>
.error{
  color:red;
}
</style>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Category</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h1 class="card-title">Edit User</h1>
                <div style="float:right;">
                <a href="{{url('category')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('category/'.$data->id)}}" id="catform" method="post">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                    <label>Name<label style="color:red">*</label></label>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Name">
                    <span style="color:red;">{{$errors->first('name','Please Enter Name')}}</span>
                  </div>
                  <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="parent_id">
                        <option value="">Select</option>
                        @foreach($alldata as $cat)
                          @if($cat['parent_id']==$data->id)
                            <option selected>{{$cat['name']}}</option>
                          @endif
                          @if(empty($cat['parent_data']))
                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>                             
                          @endif
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                  <label>Status<label style="color:red">*</label></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="1" @if($data['status']=='1') checked @endif >
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" @if($data['status']=='0') checked @endif>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <span style="color:red;">{{$errors->first('status','Please Select Status')}}</span>
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  jQuery( document ).ready(function( $ ) {
    $('.select2').select2();
  });
</script>
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{ asset('js/jvalidation.js') }}"></script>
@endsection
</body>
</html>
@endsection