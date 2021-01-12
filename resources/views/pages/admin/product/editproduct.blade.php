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
  <title>Edit Product</title>
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
              <h1 class="card-title">Edit Product</h1>
                <div style="float:right;">
                <a href="{{url('product')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('product/'.$data['id'])}}" id="product_form" method="post">
                {{csrf_field()}}
                {{ method_field('PUT')}}
                <div class="card-body">
                <div class="form-group">
                    <label>Product Name<label style="color:red">*</label></label>
                    <input type="text" name="name" id="title" class="form-control" value="{{$data['name']}}" placeholder="Enter Product Name">
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
                          
                          <option value="{{$i['id']}}"  >{{$i['name']}}</option>
                          
                        @endforeach
                        </select></th>
                    <th><label>Sub</label>
                      <select class="form-control cat_value" name="cat_value_id">
                        <option value="">Select</option>                     
                        </select></th>
                      </tr>
                   </tbody>
                </table>
                <span style="color:red;">{{$errors->first('cat_id','Please Select Category')}}</span>
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
                  @foreach($attArr as $att)
                  <tr> 
                    <th><select class="form-control att_select" name="att_id[]">
                        <option value="">Select</option>
                        @foreach($valueArr as $vdata)
                       <option value="{{$vdata['id']}}" {{$vdata['id']==$att['product_attribute_id'] ? "selected": "" }}>{{$vdata['name']}}</option>
                       @endforeach
                        </select></th>
                    <th><select class="form-control att_value" name="att_value_id[]">
                        <option value="">Select</option>   
                        @if(isset($temp[$att['product_attribute_id']])) 
                          @foreach($temp[$att['product_attribute_id']] as $idata)
                          <option value="{{$idata['id']}}" {{$idata['id']==$att['product_attribute_value_id'] ? "selected": "" }}>{{$idata['attribute_value']}}</option>
                          @endforeach
                        @endif                 
                        </select></th>
                    <th>
                   <a class="btn btn-link remove" style="color:red;"><i class="fas fa-trash-alt"></i></a></th>
                   </tr>
                   @endforeach
                </tbody>
                </table>
                  </div>
                  <div class="form-group">
                    <label>Short Description<label style="color:red">*</label></label>
                    <textarea rows="2" name="shortdsc" id="shortdsc" class="form-control" value="" placeholder="Enter Short Description">{{$data['short_description']}}</textarea>
                    <span style="color:red;">{{$errors->first('shortdsc','Please Enter Short Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Long Description<label style="color:red">*</label></label>
                    <textarea type="textarea" rows="4" name="longdsc" id="longdsc" class="form-control" value="" placeholder="Enter Long Description">{{$data['long_description']}}</textarea>
                    <span style="color:red;">{{$errors->first('longdsc','Please Enter Long Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Price<label style="color:red">*</label></label>
                    <input type="text" name="price" id="price" class="form-control" value="{{$data['price']}}" placeholder="Enter Price">
                    <span style="color:red;">{{$errors->first('price','Please Enter Price')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Special Price<label style="color:red">*</label></label>
                    <input type="text" name="sprice" id="sprice" class="form-control" value="{{$data['special_price']}}" placeholder="Enter Special Price">
                    <span style="color:red;">{{$errors->first('sprice','Please Enter Special Price')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Special Price From</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="datefrom" value="{{date('d-m-Y', strtotime($data['special_price_from']))}}" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Enter Select Date From"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <label id="datefrom-error" class="error" for="datefrom"></label>
                    <span style="color:red;">{{$errors->first('datefrom','Please Select Date')}}</span>
                </div>
                <div class="form-group">
                  <label>Special Price To</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="dateto" value="{{date('d-m-Y', strtotime($data['special_price_to']))}}" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Enter Select Date To"/>
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
                          <input class="form-check-input" type="radio" name="status" value="1" @if($data['status']=='1') checked @endif>
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" @if($data['status']=='0') checked @endif>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <label id="status-error" class="error" for="status"></label>
                        <span style="color:red;">{{$errors->first('status','Please Select Status')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Quantity<label style="color:red">*</label></label>
                    <input type="text" name="qty" id="qty" class="form-control" value="{{$data['quantity']}}" placeholder="Enter Quantity">
                    <span style="color:red;">{{$errors->first('qty','Please Enter Quantity')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="mtitle" id="mtitle" class="form-control" value="{{$data['meta_title']}}" placeholder="Enter Meta Title">
                    <span style="color:red;">{{$errors->first('mtitle','Please Enter Meta Title')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea type="textarea" rows="4" name="metadsc" id="metadsc" class="form-control" value="{{$data['meta_description']}}" placeholder="Enter Meta Description"></textarea>
                    <span style="color:red;">{{$errors->first('metadsc','Please Enter Meta Description')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="mkey" id="mkey" class="form-control" value="{{$data['meta_keywords']}}" placeholder="Enter Meta Keywords">
                    <span style="color:red;">{{$errors->first('mkey','Please Enter Meta Keywords')}}</span>
                  </div>        
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
                        '@foreach($valueArr as $att)'+
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
  </script>
@endsection
</body>
</html>
@endsection