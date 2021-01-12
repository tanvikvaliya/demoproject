@extends('layouts.master')
@section('content')
  <title>Banner</title>
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
        <h1 class="m-0">Banners</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Banners</li>
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
                <a href="{{route('banner.create')}}" class="btn btn-primary">Add Banner</a>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $ban)
                  <tr>
                    <th>{{$ban->title}}</th>
                    <th><img src="{{asset('images/banner/'.$ban->img)}}" width="150px;" height="80px;" alt="Image Not Found"></th>
                    <th><form id="submit-form" action="{{route('banner.destroy',$ban->id) }}" method="post">
                    {{csrf_field()}}
                     {{ method_field('delete')}}<a class="fas fa-edit" href="{{route('banner.edit',$ban->id)}}"></a>
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