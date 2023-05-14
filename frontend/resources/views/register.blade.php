<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Back End Quiz</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css?v=3.2.0">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="index2.html"><b>Quiz</b> Admin</a>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{route('auth.register.store')}}" method="post">
                        @if(session('message'))
                            <div class="alert alert-card alert-{{ session('alert-class') }}" role="alert">{{ session('message') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-card alert-warning" role="alert">{{ $errors->first() }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input name="name" class="form-control" placeholder="Nama Lengkap" value="{{old('name')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password!">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>


        <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>

        <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('assets') }}/dist/js/adminlte.min.js?v=3.2.0"></script>
    </body>
</html>
