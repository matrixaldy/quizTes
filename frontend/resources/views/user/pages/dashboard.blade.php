@extends('user.layout')
@section('content')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">Quiz</h1>
        </div><!-- /.col -->
        <div class="col-sm-8">
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if($response->detail != null && $response->detail->end_time)
                <div class="card-header pb-2">
                    <h5><i class="fa fa-check-square air__menuLeft__icon text-success"></i>
                      Quiz Selesai!</h5>
                    <p>Terima kasih telah mengikuti quiz.!</p>
                </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('quiz.start')}}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 20%;">ID</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ session()->get('user')->id }}</b></td>
                                    </tr>

                                    <tr>
                                        <td >Email</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->user->email }}</b></td>
                                    </tr>

                                    <tr>
                                        <td >Waktu Ujian</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->setting->quiz_time }} Minute</b></td>
                                    </tr>

                                    <tr>
                                        <td >Total Soal</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->total_question }} </b></td>
                                    </tr>

                                    @if($response->detail != null && $response->detail->end_time)
                                    <tr>
                                        <td >Total Score</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->my_score ?? 0 }} / {{$response->max_score}}</b></td>
                                    </tr>
                                    @endif

                                    {{-- <tr>
                                        <td >Soal Terjawab</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $answer_count }} / {{ $quest_count }} Soal</b></td>
                                    </tr> --}}

                                    <tr>
                                        <td >Waktu Mulai</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->detail->start_time ?? '' }}</b></td>
                                    </tr>

                                    <tr>
                                        <td >Waktu Selesai</td>
                                        <td style="width: 5%">:</td>
                                        <td><b>{{ $response->detail->end_time ?? '' }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            @if($response->detail != null && $response->detail->end_time)
                                {{-- <button type="button" disabled class="btn btn-primary btn-lg" >Mulai</button> --}}
                            @else
                                @if($response->detail != null && $response->detail->start_time)
                                    <button type="submit" class="btn btn-primary btn-lg" >Lanjutkan</button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-lg" >Mulai</button>
                                @endif
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
  </section>

  @endsection
