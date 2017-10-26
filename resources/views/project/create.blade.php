@extends('layouts.master')

@section('content')

    <body class="index-page style-11" id="app">
    <!-- Start Loading -->
    <div class="preloader">
        <img src="{{ asset('assets/img/loading.gif') }}" width="350" alt="Loading...">
    </div>
    <!-- End Loading -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('app') }}">
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
                <div class="collapse navbar-collapse justify-content-end">
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
                <!--  Made With IT Services  -->
                <div class="text-center">
                    <a href="http://10.13.27.187/it-team-um6p/" target="_blank" class="made-with-mk">
                        <div class="brand">IT</div>
                        <div class="made-with">Powered by <strong>IT-Services</strong></div>
                    </a>
                </div>
            </div>
        </nav>
        @if($user->ldap->inGroup('Admin-Portal'))
            <div class="wrapper">
                <div class="main">
                    <div class="section section-examples">
                        <div class="space-30"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ url('app') }}" class="btn btn-primary btn-round float-left">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5 style="margin-bottom: -3px; margin-top:7px;">Create New APP</h5>
                                    <div class="space-10"></div>
                                    <form class="form" id="createForm" action="{{ url('app') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div>
                                            <div class="input-group">
                                        <span style="padding-left: 15px;" class="input-group-addon">
                                            <i class="fa fa-align-center" aria-hidden="true"></i>
                                        </span>
                                                <input name="title" id="title" type="text" class="form-control"
                                                       placeholder="Type a Title..." required="required"/>
                                            </div>
                                            <div class="space-10"></div>
                                            <div class="input-group">
                                        <span style="padding-left: 15px;" class="input-group-addon">
                                            <i class="fa fa-link" aria-hidden="true"></i>
                                        </span>
                                                <input name="link" id="link" type="url" class="form-control"
                                                       placeholder="https://link..." required="required"/>
                                            </div>
                                            <div class="space-10"></div>
                                            <div>
                                                <div class="textarea-container">
                                                    <textarea name="description" id="description" class="form-control"
                                                              name="name" rows="4" cols="80"
                                                              placeholder="Type a description..."
                                                              required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="space-10"></div>
                                            <div id="selectspace" class="space-20" style="display: none;"></div>
                                            <div class="form-group">
                                                <label for="category">Select Category</label><br/>
                                                <select class="form-control m-bot15" name="category_name"
                                                        style="width: 338px; display: inline;" id="category">
                                                    @if ($listcategory->count())
                                                        @foreach($listcategory as $category)
                                                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="space-10"></div>
                                            <div class="form-group">
                                                <label for="department">Select Department</label><br/>
                                                <select id="department"
                                                        class="form-control m-bot15 js-example-basic-multiple"
                                                        name="selectedDepartment[]" multiple="multiple"
                                                        style="width: 338px;">
                                                    @if ($listdepartment->count())
                                                        @foreach($listdepartment as $department)
                                                            <option :disabled="{{$department->id}} == 1 ? true : false"
                                                                    value="{{ $department->id }}">{{ $department->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="text-muted"><br>(By default : All Department)</span>
                                            </div>
                                            <div class="space-10"></div>
                                            <div>
                                                <label class="custom-file">
                                                    <input type="file" id="project_image"
                                                           accept=".jpg,.jpeg,.bmp,.gif,.png" name="project_image"
                                                           class="custom-file-input" aria-describedby="fileHelp">
                                                    <span class="custom-file-control form-control-file"></span>
                                                </label>
                                            </div>
                                            <hr/>
                                            <small class="text-danger">Please Enter all required field <img
                                                        src="{{asset('assets/img/required.png')}}" alt="required">
                                            </small>
                                            <div class="space-10"></div>
                                            <div class="send-button">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-primary btn-round btn-simple btn-block btn-lg button-create"
                                                                id="create" type="submit">Create Project
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="{{ url('app') }}"
                                                           class="btn btn-primary btn-round btn-simple btn-danger btn-block btn-lg button-cancel">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="wrapper">
                <div class="main">
                    <div class="section section-examples">
                        <div class="space-30"></div>
                        <div class="container">
                            <div class="row justify-content-md-center col align-self-center">
                                <h3 class="text-center">You don't have <strong>permission</strong> to this page</h3>
                                <div class="col-sm-12 text-center">
                                    <a href="{{ url('project') }}" class="btn btn-primary btn-round">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i> Back to home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @include('footervarview')

@endsection

