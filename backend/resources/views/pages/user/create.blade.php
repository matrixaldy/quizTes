@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">Create User</h1>
        </div><!-- /.col -->
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="row">
        <div class="col-12" id="validasi">
            <form class="row d-flex flex-wrap flex-column align-items-center" method="post" action="{{ route('user.store') }}">
                @csrf
                @if($errors->any())
                <div class="alert alert-card alert-warning" role="alert">{{ $errors->first() }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="fullname">Nama *</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="{{ old('name') }}" name="name" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="fullname">Email *</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="{{ old('email') }}" name="email" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="alamat">Role *</label>
                                <div class="col-md-8">
                                    <select name="role_id" required class="form-control" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" {{ $role->id == old('role_id') ? 'selected': ''}}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="fullname">Password *</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control"  name="password" required autocomplete="off">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-success px-5 float-right mt-5">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </section>

  @endsection
