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
  <title>Add Category</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Category</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Add Category</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div style="float:right;">
                <a href="{{url('category')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('category.store')}}" id="catform" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label>Name<label style="color:red">*</label></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Enter Title">
                    <span style="color:red;">{{$errors->first('name','Please Enter Name')}}</span>
                  </div>
                  <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="parent_id">
                        <option value="">Select</option>
                        @foreach($data as $cat)
                          @if(empty($cat['parent_data']))
                          <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                          @endif
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                  <label>Status<label style="color:red">*</label></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="1" @if(old('status')=='1') checked @endif>
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" @if(old('status')=='0') checked @endif>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <label id="status-error" class="error" for="status"></label>
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
</body>
</html>
@endsection