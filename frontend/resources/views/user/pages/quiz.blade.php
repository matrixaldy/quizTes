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
        <div class="col-md-7" id="questions">
            <form action="{{route('quiz.finish')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                            {!! $response->question !!}

                            <div>
                            @foreach ($response->choices as $choice)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="jawaban{{$choice->id}}" onclick="sendAnswer()"
                                    name="jawaban[{{$response->id}}]" value="{{$choice->id}}" autocomplete="off">
                                <label class="form-check-label" for="jawaban{{$choice->id}}">
                                {{$choice->detail}}
                                </label>
                            </div>
                            @endforeach
                            </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="float-right ">
                            @if($sisa > 0)
                            <button type="button" class="btn btn-info" onClick="window.location.reload();">NEXT</button>
                            @else
                            <button class="btn btn-info">FINISH</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body text-center">
                    <span>Timer</span><br>
                    <h4 class="timer">00:00:00</h4>
                </div>
            </div>
        </div>
    </div>
  </section>

  @endsection

@section('js')
<script>
    function requestTime() {
        $.ajax({
            url: "{{ route('quiz.time') }}",
            type: "get",
            dataType: "json",
            success : function (data) {
                if(data.status == false) {
                    location.reload();
                }
                // var hours = Math.floor(data.time / 3600);

                // var minutes = Math.floor(data.time / 60);
                // var seconds = data.time - minutes * 60;
                // if(hours < 1) {
                //     hours = 0;
                // }
                var leftover = data.time;
                var days = Math.floor(leftover / 86400);
                leftover = leftover - (days * 86400);
                var hours = Math.floor(leftover / 3600);
                leftover = leftover - (hours * 3600);
                var minutes = Math.floor(leftover / 60);

                //how many seconds are left
                leftover = leftover - (minutes * 60);
                // document.write(days + ':' + hours + ':' + minutes + ':' + leftover);

                $('.timer').text(String(hours).padStart(2, '0')+':'+String(minutes).padStart(2, '0')+
                    ':'+String(leftover).padStart(2, '0'));
            }
        });
    }

    $(function() {
        requestTime();
        setInterval(function() {
            requestTime();
        }, 1000);
    });

    function sendAnswer() {
        $.ajax({
            url: "{{ route('quiz.sendAnswer') }}",
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            data: new FormData($("#questions form")[0])
        });
    }
</script>
@endsection
