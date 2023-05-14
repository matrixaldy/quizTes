@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">User List</h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <a href="{{route('user.create')}}" style="color: white; cursor:pointer" data-target="#addUser" class="btn btn-info btn-xs">Add New User</a>
        </div>
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
                                <th> </th>
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
                                <td>
                                <a href="{{route('user.edit', ['id' => $usr->id])}}" class="btn btn-info btn-sm" title="Edit"
                                    style="color: white; cursor:pointer"><i class="fas fa-edit"></i></a>
                                <button onClick="deleteUser({{$usr->id}})" class="btn btn-danger btn-sm" title="Hapus"
                                    style="color: white; cursor:pointer"><i class="fas fa-trash"></i></button>
                                </td>
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
    function deleteUser(id) {
        Swal.fire({
        title: 'Anda yakin?',
        text: "Anda ingin menghapus user ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            return location.href="{{route('user.index')}}/delete/"+id;
        }
        })
    }
  </script>
  @endsection
