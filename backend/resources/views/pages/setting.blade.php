@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="row">
        <div class="col-12" id="validasi">
            <form class="row d-flex flex-wrap flex-column align-items-center" method="post" action="{{ route('setting.update') }}">
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
                                <label class="col-md-3 col-form-label" for="fullname">Quiz Time (Minutes) *</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{ $setting->quiz_time }}" name="quiz_time" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="fullname">Max Score *</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{ $setting->max_score }}" name="max_score" required autocomplete="off">
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
