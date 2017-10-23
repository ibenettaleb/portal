@extends('layouts.master')

@section('content')

    <body class="index-page" style="margin-top: 60px;" id="style-11">
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
                    <a class="navbar-brand" href="#" rel="tooltip" title="University Mohammed VI Polytechnique"
                       data-placement="bottom">
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
                        <div id="app">
                            <li class="dropdown hidden-sm-down" style="padding: 0px 20px;">
                                <div class="dropdown-toggle" data-toggle="dropdown"
                                     id="dropdownlist">
                                    <i class="fa fa-bell-o badge1" data-badge="@{{ countNotify }}" id="notification"
                                       aria-hidden="true"></i>
                                </div>
                                <ul class="dropdown-menu"
                                    style="padding-top: 0px; padding-bottom:0px; margin-left: 20px;">
                                    <div class="row"
                                         style="margin-right:0px; margin-left:0px; background-color: #00B2A3; box-shadow: 0 -4px 20px 0 rgba(0, 0, 0, 0.1), 1px -4px 20px 0 rgba(0, 0, 0, 0.1
                                         );">
                                        <button class="btn btn-neutral float-left"
                                                style="color: #FFF; cursor: text; background-color: #00B2A3; font-size: 11.5px;">
                                            You Have @{{allNotifications.length}} Notifications :
                                        </button>
                                        <div v-if="allNotifications.length != 0">
                                            <div class="float-right mark"
                                                 onclick="markNotificationAsRead(@{{allNotifications.length}})"><i
                                                        class="fa fa-thumb-tack" aria-hidden="true"></i><span
                                                        style="border-bottom: 2px solid #F25F5C"> Mark all as read</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tse-scrollable wrapper">
                                        <div style="overflow-y: auto; max-height: 450px;" id="style-11">
                                            <div v-for="notify in allNotifications">
                                                <li class="dropdown-item"><b>@{{notify.data['user']['name']}}</b> <span
                                                            style="color: #18ce0f;">Creat</span> New APP : <br/>@{{notify.data['newProject']['title']}}<br/><span
                                                            class="float-right" style="font-size: 80%; color: #636c72;"><i
                                                                class="fa fa-clock-o" aria-hidden="true"></i> @{{notify.created_at | myOwnTime}}</span>
                                                </li>
                                                <div v-if="$index !== (allNotifications.length - 1)"
                                                     class="dropdown-divider" style="margin-top: 15px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="allNotifications.length ==0">
                                        <li class="dropdown-item">No unread Notifications</li>
                                    </div>
                                </ul>
                            </li>
                        </div>
                        <li class="hidden-sm-down">
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
                <!--  Made With IT Services  -->
                <div class="text-center">
                    <a href="http://10.13.27.187/it-team-um6p/" target="_blank" class="made-with-mk">
                        <div class="brand">IT</div>
                        <div class="made-with">Powered by <strong>IT-Services</strong></div>
                    </a>
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
                            <h3 class="text-center h3-seo"><b>MOHAMMED VI POLYTECHNIC UNIVERSITY<br><u>PORTAL</u></b>
                            </h3>
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
                                                <i class="fa fa-search" aria-hidden="true"
                                                   style="padding-left: 7px;"></i>
                                          </span>
                                            <input type="text" name="search" class="form-control"
                                                   placeholder="Search here ... (Title, Description, Department)"
                                                   id="jquery-search-sample">
                                        </div>
                                    </div>
                                    <!-- Start End Search-->
                                    @if($user->ldap->inGroup('Admin-Portal'))
                                        <div class="col-lg-4 col-sm-12">
                                            <a href="{{ url('app/create') }}"
                                               class="btn btn-success btn-round float-right">
                                                <i class="fa fa-plus" style="padding-right: 10px;"
                                                   aria-hidden="true"></i> Add New APP
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr/>
                        </div>
                        <div class="space-20"></div>
                        <div class="row font-style">
                            @if(!$user->ldap->inGroup('Admin-Portal'))
                                @foreach($projects->sortByDesc('created_at') as $project)
                                    @foreach($project->find($project->id)->departments as $department)
                                        @if($department->name == $myGroup || $department->id === 1)
                                            <div class="col-md-4 jsearch-row">
                                                <article class="card">
                                                    <header class="card__thumb">
                                                        <img src="uploads/images/{{ $project -> image }}"
                                                             alt="{{ $project -> image }}">
                                                    </header>
                                                    <div class="card__date">
                                                        <span class="card__date__day">{{ $project -> created_at -> day }}</span>
                                                        <span class="card__date__month">{{date('M', strtotime($project -> created_at))}}</span>
                                                    </div>
                                                    <div class="card__body">
                                                        <div class="card__category">{{ $project -> email }}</div>
                                                        <h2 class="card__title jsearch-field"><a
                                                                    href="{{ $project -> link }}"
                                                                    target="_blank">{{ $project -> title }}</a>
                                                        </h2>
                                                        <p class="card__description"
                                                           id="style-11 jsearch-field">{{ $project -> description }}</p>
                                                    </div>
                                                    <footer class="card__footer">
                                                        <a class="btn btn-neutral float-right"
                                                           href="{{ $project -> link }}" target="_blank">
                                                            <h6 style="margin-top: 6px;">Open
                                                                <span style="display:inline-block; width: YOURWIDTH;"></span>
                                                                <i class="fa fa-external-link-square"
                                                                   aria-hidden="true"></i>
                                                            </h6>
                                                        </a>
                                                    </footer>
                                                </article>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @elseif($user->ldap->inGroup('Admin-Portal'))
                                @foreach($projects->sortByDesc('created_at') as $project)
                                    <div class="col-md-4 jsearch-row">
                                        <article class="card">
                                            <header class="card__thumb">
                                                <img src="uploads/images/{{ $project -> image }}"
                                                     alt="{{ $project -> image }}">
                                            </header>
                                            <div class="card__date">
                                                <span class="card__date__day">{{ $project -> created_at -> day }}</span>
                                                <span class="card__date__month">{{date('M', strtotime($project -> created_at))}}</span>
                                            </div>
                                            <div class="card__body">
                                                <div class="card__category">{{ $project -> email }}</div>
                                                <h2 class="card__title jsearch-field"><a href="{{ $project -> link }}"
                                                                                         target="_blank">{{ $project -> title }}</a>
                                                </h2>
                                                <p class="card__description jsearch-field"
                                                   id="style-11">{{ $project -> description }}</p>
                                            </div>
                                            <footer class="card__footer">
                                                <form class="form" id="deletePortal"
                                                      action="{{ url('app/'.$project -> id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a href="{{ url('app/'.$project -> id.'/edit') }}"
                                                   class="btn btn-primary btn-icon  btn-icon-mini btn-round"
                                                   data-toggle="tooltip" data-placement="right" title="Edit APP">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"
                                                       style="color: #fff; padding-top: 5px;"></i>
                                                </a>
                                                <a class="btn btn-neutral"
                                                   style="margin: auto; padding: 10px; width: 70%;"
                                                   href="{{ $project -> link }}" target="_blank">
                                                    <h6 style="margin-top: 6px;">Open
                                                        <span style="display:inline-block; width: YOURWIDTH;"></span>
                                                        <i class="fa fa-external-link-square" aria-hidden="true"></i>
                                                    </h6>
                                                </a>
                                                <button id="delete" type="button" data-id="{{$project->id}}"
                                                        class="btn btn-danger btn-icon  btn-icon-mini btn-round float-right"
                                                        data-toggle="tooltip" data-placement="left" title="Delete APP">
                                                    <i class="fa fa-trash-o" aria-hidden="true"
                                                       style="color: #fff;"></i>
                                                </button>
                                            </footer>
                                        </article>
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
        </div>
    @include('footervarview')
    <!-- content end -->
    </div>
@endsection
