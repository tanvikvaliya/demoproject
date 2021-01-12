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
<title>Edit Coupon</title>
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
              <h1 class="card-title">Edit Coupon</h1>
                <div style="float:right;">
                <a href="{{route('coupon.index')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('coupon/'.$data->id)}}" method="post">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                    <label>Coupon Code<label style="color:red">*</label></label>
                    <input type="text" name="code" class="form-control" value="{{$data->code}}" placeholder="Enter Coupon Code">
                    <span style="color:red;">{{$errors->first('code','Please Enter Coupon Code')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Discount Percentage<label style="color:red">*</label></label>
                    <input type="text" name="percent_off" maxlength="3" id="percent" class="form-control" value="{{$data->percent_off}}" placeholder="Enter Discount Percentage" onchange="handleChange(this);">
                    <span style="color:red;">{{$errors->first('percent_off','Please Enter Discount Percentage')}}</span>
                  </div>
                  <div class="form-group">
                    <label>No Off Uses<label style="color:red">*</label></label>
                    <input type="text" name="no_of_uses" id="uses" class="form-control" value="{{$data->no_of_uses}}" placeholder="Enter No of Uses" >
                    <span style="color:red;">{{$errors->first('no_of_uses','Please Enter No of Uses')}}</span>
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
@section('js')
<script>
$("#percent, #uses").keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57 || key==46){}
                    else {
                        event.preventDefault();
                    }
                });
  function handleChange(input) {
    if (input.value > 100) input.value = 100;
  }
</script>             
@endsection
</body>
</html>
@endsection