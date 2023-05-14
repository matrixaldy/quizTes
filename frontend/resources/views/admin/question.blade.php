@extends('layout')

@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">List Soal</h1>
        </div><!-- /.col -->
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Question</li>
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

  </script>
  @endsection
