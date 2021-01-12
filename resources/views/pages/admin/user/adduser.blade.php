@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/backend/select2.min.css') }}">
@endsection
@section('content')
  <title>Add Users</title>
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
        <h1 class="m-0">Add User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Add User</li>
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
                <a href="{{url('users')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="add_user" method="post">
                {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label>User Name<label style="color:red">*</label></label>
                    <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="Enter User Name">
                    <span style="color:red;">{{$errors->first('username','Please Enter Username')}}</span>
                  </div>
                  <div class="form-group">
                    <label>First Name<label style="color:red">*</label></label>
                    <input type="text" name="fname" class="form-control" value="{{old('fname')}}" placeholder="Enter First Name" >
                    <span style="color:red;">{{$errors->first('fname','Please Enter First Name')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Last Name<label style="color:red">*</label></label>
                    <input type="text" name="lname" class="form-control" value="{{old('lname')}}" placeholder="Enter Last Name" >
                    <span style="color:red;">{{$errors->first('lname','Please Enter Last Name')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Email address<label style="color:red">*</label></label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}"  placeholder="Enter email" >
                    <span style="color:red;">{{$errors->first('email','Please Enter Email')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password<label style="color:red">*</label></label>
                    <input type="password" name="pass" class="form-control" value="{{old('pass')}}" placeholder="Password" >
                    <ul>
                    <li>Contain Alphanumeric </li>
                    <li>Must be 8 to 12 characters </li>
                    </ul>
                    <span style="color:red;">{{$errors->first('pass','Please Enter Valid Password')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password<label style="color:red">*</label></label>
                    <input type="password" name="cpass" class="form-control" value="{{old('cpass')}}" placeholder="Retype Password">
                    <span style="color:red;">{{$errors->first('cpass','Please Enter Valid Password')}}</span>
                  </div>
                  <div class="form-group">
                  <label>Status<label style="color:red">*</label></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="Active" @if(old('status')=='Active') checked @endif>
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="Inactive" @if(old('status')=='Inactive') checked @endif>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <span style="color:red;">{{$errors->first('status','Please Select Status')}}</span>
                  </div>
                      <!-- select -->
                  <div class="form-group">
                  <label>Select Role</label>
                  <select class="select2" multiple="multiple" name='roleid[]' data-placeholder="Select" style="width: 100%;">
                  @foreach($roleArr as $role)
                        @if($role->name=='Customer')
                          <option value="{{$role->id}}" selected>{{$role->name}}  </option>
                        @else
                          <option value="{{$role->id}}" @if (old("roleid")){{ (in_array($role->id, old("roleid")) ? "selected":"") }}@endif > {{$role->name}}  </option>
                        @endif
                  @endforeach
                      </select>
                      <span style="color:red;">{{$errors->first('roleid','Please Select Role')}}</span>
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
<script>
  $( document ).ready(function(  ) {
    $('.select2').select2();
  });
</script>
@endsection
</body>
</html>
@endsection