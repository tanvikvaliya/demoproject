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
<title>Edit Configuration</title>
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
              <h1 class="card-title">Edit Configuration</h1>
                <div style="float:right;">
                <a href="{{route('configuration.index')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('configuration/'.$data->id)}}" method="post">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                <label>Configuration Key<label style="color:red">*</label></label>
                    <input type="text" name="conf_key" class="form-control" value="{{$data->conf_key}}" placeholder="Enter Configuration Key">
                    <span style="color:red;">{{$errors->first('conf_key','Please Enter Configuration Key')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Configuration Value<label style="color:red">*</label></label>
                    <input type="text" name="conf_value" class="form-control" value="{{$data->conf_value}}" placeholder="Enter Configuration Value" >
                    <span style="color:red;">{{$errors->first('conf_value','Please Enter Configuration Value')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Status<label style="color:red">*</label></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="1" @if($data->status=='1') checked @endif >
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" @if($data->status=='0') checked @endif>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <label id="status-error" class="error" for="status"></label>
                        <span style="color:red;">{{$errors->first('status','Please Select Status')}}</span>
                  </div>
                      <!-- select -->
           
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


</body>
</html>
@endsection