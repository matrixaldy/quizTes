@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">List Soal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <button onclick="resetQuiz()"  class="btn btn-danger btn-xs">Reset</button>
            <a href="{{ $max_score != 0 ? route('quiz.import') : 'javascript:void()'}}" class="btn btn-secondary btn-xs">Import</a>
            <a href="{{ $max_score != 0 ? route('quiz.create') : 'javascript:void()'}}" style="color: white; cursor:pointer"
            data-target="#addUser" class="btn btn-info btn-xs">Add New Question</a>
            Score : {{$score}}
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quiz</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <table id="user-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Score</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($questions) < 1)
                    <td colspan="7" align="center">Data tidak ditemukan!</td>
                    @endif
                    @foreach($questions as $quest)
                    <tr>
                        <td>{{ $quest->id }}</td>
                        <td>{{ $quest->question }}</td>
                        <td>{{ $quest->answer->choice->detail ?? '' }}</td>
                        <td>{{ $quest->score }}</td>
                        <td>
                            <a href="{{route('quiz.edit', ['id' => $quest->id])}}" class="btn btn-info btn-sm" title="Edit"
                                style="color: white; cursor:pointer"><i class="fas fa-edit"></i></a>

                            <button onClick="deleteData({{$quest->id}})" class="btn btn-danger btn-sm" title="Hapus"
                                style="color: white; cursor:pointer"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    {{ $questions->appends(request()->input())->links() }}
                </table>
                </div>
            </div>
        </div>
    </div>
  </section>

  @endsection

  @section('js')
  <script>
    function deleteData(id) {
        Swal.fire({
        title: 'Anda yakin?',
        text: "Anda ingin menghapus soal ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            return location.href="{{route('quiz.index')}}/delete/"+id;
        }
        })
    }

    function resetQuiz() {
        Swal.fire({
        title: 'Anda yakin?',
        text: "Anda ingin mereset seluruh data quiz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            return location.href="{{route('quiz.reset')}}";
        }
        })
    }
  </script>
  @endsection
