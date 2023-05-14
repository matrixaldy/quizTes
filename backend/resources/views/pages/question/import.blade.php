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
            <li class="breadcrumb-item"><a href="#">Quiz</a></li>
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
            <form class="row d-flex flex-wrap flex-column align-items-center" method="post" action="{{ route('quiz.import.store') }}" enctype="multipart/form-data">
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
                                <label class="col-md-3 col-form-label" for="fullname">File *</label>
                                <div class="col-md-8">
                                    <input type="file" accept=".csv, .xls, .xlsx" name="file" required autocomplete="off">
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
@section('js')
<script>
    var soal = 0;
    function addPilihan() {
        soal++;
        var html = '<div class="row mb-2" id="pilihan'+soal+'"> <div class="input-group col-md-11"> <div class="input-group-prepend">'+
            '<div class="input-group-text"> <input type="radio" value="'+soal+'" name="jawaban"> </div> </div>'+
            '<input type="text" name="pilihan['+soal+']" class="form-control"> </div> '+
            '<div class="col-md-1"><button type="button" class="btn btn-danger" onclick="deletePilihan('+soal+')">'+
            '<i class="fas fa-trash mr-1" aria-hidden="true"></i></button></div></div>';
            $('#pilihan').append(html);
    }
    function deletePilihan(soal) {
        $('#pilihan'+soal).remove();
    }
</script>
@endsection
