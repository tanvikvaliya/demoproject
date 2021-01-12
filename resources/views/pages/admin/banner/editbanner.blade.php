@extends('layouts.master')
@section('css')
<style>
.error{
  color:red;
}
  </style>
@endsection
@section('content')
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
                <a href="{{url('banner')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('banner/'.$data->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                    <label>Title<label style="color:red">*</label></label>
                    <input type="text" name="title" class="form-control" value="{{$data->title}}" placeholder="Enter Title">
                    <span style="color:red;">{{$errors->first('title','Please Enter Title')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Image<label style="color:red">*  (Allowed : jpeg, jpg, png)</label></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input">
                        <label class="custom-file-label">Choose Image</label>
                        </div>
                    </div>  
                    <label id="image-error" class="error" for="image"></label>
                    <span style="color:red;">{{$errors->first('image','Please Select Valid Image')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Old Image</label><br>
                  <img src="{{asset('images/banner/'.$data->img)}}" width="150px;" height="80px;" alt="Image Not Found">
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
</body>
</html>
@endsection