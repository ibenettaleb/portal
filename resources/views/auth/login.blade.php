@extends('layouts.master')

@section('content')
</head>
<body class="login-page" style="margin-bottom: auto">
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset('assets/img/login.jpg') }})"></div>
        <div class="container">
            <div class="col-md-4 content-center float-right">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <div class="logo-container" style="width:150px;">
                                <img src="{{ asset('assets/img/logo-UM6P.png') }}" alt="logo UM6P">
                            </div>
                            <h3 class="title" style="margin-top:-27px;">Portal</h3>
                        </div>
                        <div>
                            <div class="input-group form-group-no-border input-lg{{ $errors->has('username') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </span>
                                <input id="username" type="text" class="form-control" placeholder="E-mail Address..." name="username" value="{{ old('username') }}" required autofocus />

                            </div>
                            <div class="input-group form-group-no-border input-lg{{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input id="password" type="password" placeholder="Password..." class="form-control" name="password" required />

                            </div>
                            @if ($errors->has('username') || $errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div>
                                        {{ $errors->first('username') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <footer>
            <div class="container">
                <nav>
                   
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Designed by
                    Abdeljalil BENETTALEB.
                </div>
            </div>
        </footer>
    </div>

@endsection