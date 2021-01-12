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
  <title>Edit Product Attribute</title>
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
              <h1 class="card-title">Edit Product Attribute</h1>
                <div style="float:right;">
                <a href="{{url('product_attributes')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('product_attributes/'.$data->id)}}" id="product_form" method="post">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                    <label>Product Attribute Name<label style="color:red">*</label></label>
                    <input type="text" name="name" id="title" class="form-control" value="{{$data->name}}" placeholder="Enter Product Attribute Name">
                    <span style="color:red;">{{$errors->first('name','Please Enter Product Attribute Name')}}</span>
                  </div>
                  <div class="form-group" id="values">
                    <label>Product Attribute Value<label style="color:red">*</label></label>
                    <a class="btn btn-primary addRow">Add</a>
                    @foreach($attArr as $atr)
                    @if($atr->product_attribute_id == $data->id)
                    <div>
                      <input type="text" name="value[]" class="form-control" value="{{$atr->attribute_value}}" placeholder="Enter Product Attribute Value">
                    <a class="btn btn-danger remove">Delete</a>
                    </div>
                   <span style="color:red;">{{$errors->first('value','Please Enter Product Attribute Value')}}</span>
                    @endif
                    @endforeach
                  </div>
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
@section('js')
<script>
  jQuery( document ).ready(function( $ ) {
  
    $('.select2').select2();
  });

   $(function () {
    $('#reservationdate').datetimepicker({
        format: 'DD-MM-yyyy',
        minDate: moment()
    });
    $('#reservationdate2').datetimepicker({
        format: 'DD-MM-yyyy',
        minDate: moment()
    });
    $("#price,#sprice").keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57 || key==46){}
                    else {
                        event.preventDefault();
                    }
                });
  })

  $('.addRow').on('click',function(){
    addRow();
  });
  function addRow(){
    var tr = '<div class="form-group" id="values"> '+
                   '<div><input type="text" name="value[]" id="value" class="form-control" value="{{old('name[]')}}" placeholder="Enter Product Attribute Value">'+
                   '<a class="btn btn-danger remove">Delete</a></div> '+
                   '<span style="color:red;">{{$errors->first('name','Please Enter Product Attribute Value')}}</span>' +
                   '</div>';
    $('#values').append(tr);
  };
  $(document).on('click', '.remove', function(){
    $(this).parent().remove();
  })
  </script>
@endsection
</body>
</html>
@endsection