@extends('layouts.master')
@section('css')
<style>
.error{
  color:red;
}
  </style>
@endsection
@section('content')
  <title>Users</title>
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
        <h1 class="m-0">Add Banner</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Add Banner</li>
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
                <a href="{{url('banner')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('banner.store')}}" id="addbanner" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label>Title<label style="color:red">*</label></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Enter Title">
                    <span style="color:red;">{{$errors->first('title','Please Enter Title')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Image<label style="color:red">*  (Allowed : jpeg, jpg, png)</label></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" value="{{old('image')}}">
                        <label class="custom-file-label">Choose Image</label>
                        </div>
                    </div>
                    <label id="image-error" class="error" for="image"></label>
                    <span style="color:red;">{{$errors->first('image','Please Select Valid Image')}}</span>
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