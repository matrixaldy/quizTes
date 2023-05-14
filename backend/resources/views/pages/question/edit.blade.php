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
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="row">
        <div class="col-12" id="validasi">
            <form class="row d-flex flex-wrap flex-column align-items-center" method="post" action="{{ route('quiz.update', ['id' => $question->id]) }}">
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
                                <label class="col-md-3 col-form-label" for="fullname">Pertanyaan *</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="question" required>{{ $question->question }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="fullname">Score *</label>
                                <div class="col-md-8">
                                    <input type="number" min="1" class="form-control" value="{{ $question->score }}" name="score" required>
                                </div>
                            </div>

                            <div id="pgJawaban">
                                <div class="form-group row">
                                    <label class="col-md-3" ><h4><strong>Pilihan</strong></h4></label>
                                    <button type="button" onClick="addPilihan()" class="btn btn-rounded btn-primary mr-2 mb-2">
                                        Tambah Pilihan
                                    </button>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Jawaban</label>
                                    </div>

                                    <div class="col-md-6" id="pilihan">
                                        @if(count($choices) < 1)
                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="radio" value="0" name="jawaban">
                                                    </div>
                                                </div>
                                                <input type="text" name="pilihan[0]" class="form-control">
                                            </div>
                                        </div>
                                        @elseif(count($choices) > 0)
                                        @php $no = 0; @endphp

                                        @foreach($choices as $key=>$pil)
                                            @php $no++; @endphp
                                            <div class="row mb-2" id="pilihan{{$no}}">
                                                <div class="input-group col-md-11">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="{{$pil->id}}" {{ $answer != null && $answer->choice_id == $pil->id ? 'checked' : ''}} name="jawaban">
                                                        </div>
                                                    </div>
                                                    <input type="text" name="pilihan[{{$pil->id}}]" value="{{$pil->detail}}" class="form-control">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger" onclick="deletePilihan({{$no}})">
                                                        <i class="fas fa-trash mr-1" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
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
    var soal = {{ count($choices) }};
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
