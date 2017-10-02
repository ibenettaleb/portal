@extends('layouts.master')

@section('content')
</head>
<body class="index-page" style="margin-top: 60px;">
    <!-- Start Loading -->
    <div class="preloader">
        <img src="{{ asset('assets/img/loading.gif') }}" width="350" alt="Loading...">
    </div>
    <!-- End Loading -->

    <!-- content start -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="#" rel="tooltip" title="University Mohammed VI Polytechnique" data-placement="bottom">
                        <img src="{{ asset('assets/img/logo-Banner.png') }}" width="164" height="35" alt="logo UM6P">
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                       style="padding-top: 15px; display: none;"
                       class="float-right logout-button">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Logout
                    </a>
                </div>
                <div class="navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="hidden-sm-down">
                            <a href="#" role="button" aria-expanded="false">
                                Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                        <li class="hidden-sm-down" style="padding: 0px 20px;">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="wrapper">
            <div class="main">
                <div>
                    <div class="space-40"></div>
                    <div class="container">
                        <div class="col-md-12 col-sm-12 content-center brand">
                            <div class="space-20"></div>
                            <h3 class="text-center h3-seo"><b>MOHAMMED VI POLYTECHNIC UNIVERSITY<br><u>PORTAL</u></b></h3>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <!-- Start Search-->
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="input-group col-xs-4">
                                          <span class="input-group-addon">
                                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round btn-sm"
                                                style="margin-left: -0.1px" >
                                                <i class="fa fa-search" aria-hidden="true"></i> 
                                            </button>
                                          </span>
                                             <input type="text" name="search" class="form-control" placeholder="Search here ... (Title, Description, Department)" id="jquery-search-sample">
                                        </div> 
                                    </div>
                                    <!-- Start End Search-->
                                    @if($user->ldap->inGroup('Admin-Portal'))
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{ url('project/create') }}" class="btn btn-success btn-round float-right">
                                            <i class="fa fa-plus" style="padding-right: 10px;" aria-hidden="true"></i> Add New APP
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="space-20"></div>
                        <div class="row font-style">
                            @if(!$user->ldap->inGroup('Admin-Portal'))
                            @foreach($projects->sortByDesc('created_at') as $project)
                                @foreach($project->find($project->id)->departments as $department)
                                    @if($department->name == $search[0] || $department->id === 1)
                                        <div class="col-lg-4 col-md-6 col-sm-12 jsearch-row">
                                            <div class="card">
                                                <img class="card-img-top" src="uploads/images/{{ $project -> image }}" alt="{{ $project -> image }}" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                                                <div id="card" class="card-block margin-card fixed-card">
                                                    <h4 class="card-title truncate-title jsearch-field">{{ $project -> title }}</h4>
                                                    <p class="card-text truncate-description jsearch-field text-center" >{{ $project -> description }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <hr />
                                                    <a class="btn btn-neutral float-right" href="{{ $project -> link }}" target="_blank">
                                                        <h6>Open
                                                            <span style="display:inline-block; width: YOURWIDTH;"></span>
                                                            <i class="fa fa-external-link" aria-hidden="true"></i>
                                                        </h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            @elseif($user->ldap->inGroup('Admin-Portal'))
                                @foreach($projects->sortByDesc('created_at') as $project)
                                    <div class="col-lg-4 col-md-6 col-sm-12 jsearch-row">
                                        <div class="card">
                                            <img class="card-img-top" src="uploads/images/{{ $project -> image }}" alt="{{ $project -> image }}">
                                            <div id="card" class="card-block margin-card fixed-card">
                                                <h4 class="card-title truncate-title jsearch-field">{{ $project -> title }}</h4>
                                                <p class="card-text truncate-description jsearch-field text-center" >{{ $project -> description }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <hr />
                                                <form class="form" id="deletePortal" action="{{ url('project/'.$project -> id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a href="{{ url('project/'.$project -> id.'/edit') }}" class="btn btn-primary btn-icon  btn-icon-mini btn-round" data-toggle="tooltip" data-placement="top" title="Edit APP">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <button id="delete" type="button" data-id="{{$project->id}}" class="btn btn-danger btn-icon  btn-icon-mini btn-round" data-toggle="tooltip" data-placement="top" title="Delete APP">
                                                    <i class="fa fa-trash-o" aria-hidden="true" style="color: #fff;"></i>
                                                </button>
                                                <a class="btn btn-neutral float-right" href="{{ $project -> link }}" target="_blank">
                                                    <h6>Open
                                                        <span style="display:inline-block; width: YOURWIDTH;"></span>
                                                        <i class="fa fa-external-link" aria-hidden="true"></i>
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="no-apps-found">
                                  <div class="alert alert-danger" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div>
                                        <strong>Oh Wrong!</strong> No Results Found.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer hidden-sm-down" data-background-color="black">
                <div class="container">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Powered by
                        <a href="http://10.13.27.187/it-team-um6p/" target="_blank">UM6P IT-Services</a>.
                    </div>
                </div>
            </footer>
        </div>
        @include('footervarview')
        <!-- content end -->
    </div>
@endsection
