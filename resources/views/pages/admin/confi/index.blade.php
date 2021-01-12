@extends('layouts.master')
@section('content')
  <title>Configurations</title>
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
        <h1 class="m-0">Configuration</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Configurations</li>
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
                <a href="{{route('configuration.create')}}" class="btn btn-primary">Add Configuration</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session::has('success'))
                <div class="alert alert-success" >{{ Session::get('success') }}</div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Configuration Key</th>
                    <th>Configuration Value</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $confi)
                  <tr>
                    <th>{{$confi->conf_key}}</th>
                    <th>{{$confi->conf_value}}</th>
                    @if($confi->status=='1')
                    <th style=color:green;>Active</th>
                    @else 
                    <th style=color:red;>Inactive</th>
                    @endif 
                    <th><form id="submit-form" action="{{route('configuration.destroy',$confi->id) }}" method="post">
                    {{csrf_field()}}
                     {{ method_field('delete')}}<a class="fas fa-edit" href="{{route('configuration.edit',$confi->id)}}"></a>
                   
                    <button type="submit" class="btn btn-link" style="color:red;"><i class="fas fa-trash-alt"></i></button></form></th>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
          
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

  $("document").ready(function(){
    setTimeout(function(){
        $(".alert").remove();
    }, 2000 ); 

});
</script>
@endsection
</body>
</html>
@endsection