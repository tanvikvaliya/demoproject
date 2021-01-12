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
  <title>Product</title>

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
        <h1 class="m-0">Add Product</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Add Product</li>
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
                <a href="{{url('product')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('product.store')}}" id="product_form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label>Product Name<label style="color:red">*</label></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Enter Product Name">
                    <span style="color:red;">{{$errors->first('name','Please Enter Product Name')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Category<label style="color:red">*</label></label>
                  <table class="table table-bordered table-hover" style="overflow-x:auto;">
                  <tbody>
                  <tr> 
                    <th><label>Main</label>
                      <select class="form-control cat_select" name="cat_id">
                        <option value="">Select</option>
                        @foreach($cat as $i)
                          <option value="{{$i['id']}}">{{$i['name']}}</option>
                        @endforeach
                        </select></th>
                    <th><label>Sub</label>
                      <select class="form-control cat_value" name="cat_value_id">
                        <option value="">Select</option>                     
                        </select></th>
                   </tr>
                </tbody>
                </table>
                  </div>
                  <div class="form-group">
                  <label>Image<label style="color:red">*  (Allowed : jpeg, jpg, png)</label></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="files" name="image[]" class="custom-file-input" value="{{old('image')}}" multiple>
                        <label id="lblfile" class="custom-file-label">Choose Image</label>
                        </div>
                    </div>
                    <label style="color:red">Please Select Max 3 Images</label><br>
                    <span style="color:red;">{{$errors->first('image','Please Select Image')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Product Attributes<label style="color:red">*</label></label>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary addRow">Add</a>
                    <table class="table table-bordered table-hover" style="overflow-x:auto;">
                  <thead>
                  <tr>
                    <th>Attribute</th>
                    <th>Attribute Values</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  <tr> 
                    <th><select class="form-control att_select" name="att_id[]">
                        <option value="">Select</option>
                        @foreach($data as $att)
                          <option value="{{$att['id']}}">{{$att['name']}}</option>
                        @endforeach
                        </select></th>
                    <th><select class="form-control att_value" name="att_value_id[]">
                        <option value="">Select</option>                     
                        </select></th>
                    <th>
                   <a class="btn btn-link remove" style="color:red;"><i class="fas fa-trash-alt"></i></a></th>
                   </tr>
                </tbody>
                </table>
                  </div>
                  <div class="form-group">
                    <label>Short Description<label style="color:red">*</label></label>
                    <textarea rows="2" name="shortdsc" id="shortdsc" class="form-control" value="{{old('shortdsc')}}" placeholder="Enter Short Description"></textarea>
                    <span style="color:red;">{{$errors->first('shortdsc','Please Enter Short Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Long Description<label style="color:red">*</label></label>
                    <textarea type="textarea" rows="4" name="longdsc" id="longdsc" class="form-control" value="{{old('longdsc')}}" placeholder="Enter Long Description"></textarea>
                    <span style="color:red;">{{$errors->first('longdsc','Please Enter Long Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Price<label style="color:red">*</label></label>
                    <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}" placeholder="Enter Price">
                    <span style="color:red;">{{$errors->first('price','Please Enter Price')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Special Price<label style="color:red">*</label></label>
                    <input type="text" name="sprice" id="sprice" class="form-control" value="{{old('sprice')}}" placeholder="Enter Special Price">
                    <span style="color:red;">{{$errors->first('sprice','Please Enter Special Price')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Special Price From<label style="color:red">*</label></label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="datefrom" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Enter Select Date From"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <label id="datefrom-error" class="error" for="datefrom"></label>
                    <span style="color:red;">{{$errors->first('datefrom','Please Select Date')}}</span>
                </div>
                <div class="form-group">
                  <label>Special Price To<label style="color:red">*</label></label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="dateto" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Enter Select Date To"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                  </div>
                  <label id="dateto-error" class="error" for="dateto"></label>
                    <span style="color:red;">{{$errors->first('dateto','Please Select Date')}}</span>
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
                  <div class="form-group">
                    <label>Quantity<label style="color:red">*</label></label>
                    <input type="text" name="qty" id="qty" class="form-control" value="{{old('qty')}}" placeholder="Enter Quantity">
                    <span style="color:red;">{{$errors->first('qty','Please Enter Quantity')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="mtitle" id="mtitle" class="form-control" value="{{old('mtitle')}}" placeholder="Enter Meta Title">
                    <span style="color:red;">{{$errors->first('mtitle','Please Enter Meta Title')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea type="textarea" rows="4" name="metadsc" id="metadsc" class="form-control" value="{{old('metadsc')}}" placeholder="Enter Meta Description"></textarea>
                    <span style="color:red;">{{$errors->first('metadsc','Please Enter Meta Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="mkey" id="mkey" class="form-control" value="{{old('mkey')}}" placeholder="Enter Meta Keywords">
                    <span style="color:red;">{{$errors->first('mkey','Please Enter Meta Keywords')}}</span>
                  </div>        
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
@section('js')
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script>

   $(function () {
    $('#reservationdate').datetimepicker({
        format: 'DD-MM-yyyy',
        minDate: moment()
    });
    $('#reservationdate2').datetimepicker({
        format: 'DD-MM-yyyy',
        minDate: moment()
    });
    $("#price,#sprice,#qty").keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57 || key==46){}
                    else {
                        event.preventDefault();
                    }
                });
    $("#qty").keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57){}
                    else {
                        event.preventDefault();
                    }
                });
  })

    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
          var numFiles = $(this).get(0).files.length
          $("#lblfile").text(numFiles + " Selected");
       
        });
          
    
    });
    $(document).on('change', '.att_select', function(){
      var j= $(this).val();
      var current=$(this);
      $.ajax({
                type:'POST',
                url:'{{url("/getvalue")}}',
                data:{"_token": "{{ csrf_token() }}","id":j,
                },
                success: function( response ) {
                  var html = "<option value=''>Select</option>";
                  for (var i = 0; i < response.length; i++) {
                  html = html + "<option value='" + response[i].id + "'>" + response[i].attribute_value + "</option> ";
                  };
                  // $(".att_value").html(html);
                  current.parent().next().find('.att_value').html(html);
                }
            });
       })
       $(document).on('change', '.cat_select', function(){
        var j= $(this).val();
        var current=$(this);
        $.ajax({
                type:'POST',
                url:'{{url("/getcat")}}',
                data:{"_token": "{{ csrf_token() }}","id":j,
                },
                success: function( response ) {
                  var html = "<option value=''>Select</option>";
                  for (var i = 0; i < response.length; i++) {
                  html = html + "<option value='" + response[i].id + "'>" + response[i].name + "</option> ";
                  };
                  // $(".att_value").html(html);
                  current.parent().next().find('.cat_value').html(html);
                }
            });
       })


  $('.addRow').on('click',function(){
    addRow();
  });
  function addRow(){
    var tr = ' <tr><th><select class="form-control att_select" name="att_id[]">'+
                        '<option value="">Select</option>'+
                        '@foreach($data as $att)'+
                         ' <option value="{{$att['id']}}">{{$att['name']}}</option>'+
                       ' @endforeach'+
                        '</select></th>'+
                    '<th><select class="form-control att_value" name="att_value_id[]">'+
                        '<option value="">Select</option>'+                     
                      '</select></th>' + 
                      '<th>'+
                        '<a class="btn btn-link remove" style="color:red;"><i class="fas fa-trash-alt"></i></a></th>'+
                        '</tr>';
    $('tbody').append(tr);
  };
  $(document).on('click', '.remove', function(){
    $(this).parent().parent().remove();
  })
  </script>
  @endsection
</body>
</html>
@endsection