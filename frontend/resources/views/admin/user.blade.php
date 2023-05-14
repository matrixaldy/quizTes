@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">User List</h1>
        </div><!-- /.col -->
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="row d-flex flex-wrap flex-column align-items-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <table id="user-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) < 1)
                            <td colspan="7" align="center">Data tidak ditemukan!</td>
                            @endif
                            @foreach($users as $usr)
                            <tr>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->role->name }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            {{ $users->appends(request()->input())->links() }}
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>

  @endsection

  @section('js')
  <script>
  </script>
  @endsection
