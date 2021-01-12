@extends('layouts.master')
@section('content')
  <title>Users</title>
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
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
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
                <a href="adduser" class="btn btn-primary">Add User</a>
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success" >{{ Session::get('success') }}</div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $user)
                  <tr>
                    <th>{{$user['first_name']}}
                      @if($user['id']==$userId)
                      <span class="float-right badge bg-success">Active</span>
                      @endif
                    </th>
                    <th>{{$user['last_name']}}</th>
                    <th>{{$user['email']}}</th>
                    <?php
                        if($user['status']=='Active'){
                          echo "<th style=color:green;>" . $user['status'] . "</th>";
                        }
                        else {
                          echo "<th style=color:red;>" . $user['status'] . "</th>";
                        }
                        ?>
                        <th> @foreach($user['roles'] as $role)
                          {{$role['name']}}<br>
                        @endforeach</th>
                    <th> <form id="submit-form" action="{{url('user_delete/'.$user['id'])}}" method="post" >
                    {{csrf_field()}}
                     {{ method_field('delete')}}<a href="edituser/{{$user['id']}}"><i class="fas fa-edit"></i></a>
                   
                     <button type="submit" class="btn btn-link" style="color:red;"><i class="fas fa-trash-alt"></i></button> </form> </th>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
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
</body>
</html>
@endsection