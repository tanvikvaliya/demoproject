@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/backend/select2.min.css') }}">
@endsection
@section('content')
  <title>Edit User</title>
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
                <a href="{{url('users')}}" class="btn btn-primary">Back</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="../update_user/{{$user['id']}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label>User Name<label style="color:red">*</label></label>
                    <input type="text" name="username" class="form-control" value="{{$user['username']}}" placeholder="Enter User Name">
                    <span style="color:red;">{{$errors->first('username','Please Enter Username')}}</span>
                  </div>
                  <div class="form-group">
                    <label>First Name<label style="color:red">*</label></label>
                    <input type="text" name="fname" class="form-control" value="{{$user['first_name']}}" placeholder="Enter First Name" >
                    <span style="color:red;">{{$errors->first('fname','Please Enter First Name')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Last Name<label style="color:red">*</label></label>
                    <input type="text" name="lname" class="form-control" value="{{$user['last_name']}}" placeholder="Enter Last Name" >
                    <span style="color:red;">{{$errors->first('lname','Please Enter Last Name')}}</span>
                  </div>
                  <div class="form-group">
                    <label>Email address<label style="color:red">*</label></label>
                    <input type="email" name="email" class="form-control" value="{{$user['email']}}"  placeholder="Enter email" >
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
                          <?php
                          if($user['status']=="Active"){
                          echo "<input class=form-check-input type=radio name=status value=Active checked>";
                          }
                          else{
                            echo "<input class=form-check-input type=radio name=status value=Active>";
                          }
                          ?>
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                        <?php
                        if($user['status']=="Inactive"){
                          echo "<input class=form-check-input type=radio name=status value=Inactive checked>";
                          }
                          else{
                            echo "<input class=form-check-input type=radio name=status value=Inactive>";
                          }
                          ?>
                          <label class="form-check-label">Inactive</label>
                        </div>
                        <span style="color:red;">{{$errors->first('radio1','Please Select Status')}}</span>
                  </div>
                      <!-- select -->
                  <div class="form-group">
                  
                  <label>Select Role</label>
                  <select class="select2" multiple="multiple" name='roleid[]' data-placeholder="Select" style="width: 100%;">
                  @foreach($roleArr as $role)
                        @if(in_array($role->id,$role_id))
                          <option value="{{$role->id}}" selected>{{$role->name}}  </option>
                        @else
                          <option value="{{$role->id}}" >{{$role->name}}  </option>
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
<!-- Page specific script -->
@section('js')
<script>
  jQuery( document ).ready(function( $ ) {
    $('.select2').select2();
  });
</script>
@endsection
</body>
</html>
@endsection