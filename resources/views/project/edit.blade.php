@extends('layouts.master')

@section('content')
</head>
<body class="index-page" id="edit">
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
                            <h5 style="margin-bottom: -3px; margin-top:7px;">Edit APP</h5>
                            <div class="space-10"></div>
                            <form class="form" id="createForm" action="{{ url('app/'.$project -> id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT" >
                                <div>
                                    <div class="input-group">
                                        <span style="padding-left: 15px;" class="input-group-addon">
                                            <i class="fa fa-align-center" aria-hidden="true"></i>
                                        </span>
                                        <input name="title" id="title" type="text" class="form-control" placeholder="Title..." value="{{ $project -> title }}" required="required" />
                                    </div>
                                    <div class="space-10"></div>
                                    <div class="input-group">
                                        <span style="padding-left: 15px;" class="input-group-addon">
                                            <i class="fa fa-link" aria-hidden="true"></i>
                                        </span>
                                        <input name="link" id="link" type="url" class="form-control" placeholder="https://link..." value="{{ $project -> link }}" required="required" />
                                    </div>
                                    <div class="space-10"></div>
                                    <div>
                                        <div class="textarea-container">
                                            <textarea name="description" id="description" class="form-control" name="name" rows="4" cols="80" placeholder="Type a description..." required="required">{{ $project -> description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="space-10"></div>
                                    <div>
                                    <span>Select Category<br /></span>
                                    <select class="form-control m-bot15" name="category_name">
                                        @if ($listcategory->count())
                                            @foreach($listcategory as $category)
                                                <option value="{{ $category->category }}" {{ $selectedCategory == $category->category ? 'selected="selected"' : '' }}>{{ $category->category }}</option>    
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                    <div class="space-10"></div>
				                    <br id="selectspace2" class="space-20" style="display: none"></div>
                                    <div>
                                        <span>Select Department<br /></span>
                                        <select class="form-control m-bot15 js-example-basic-multiple" id="data" name="selectedDepartment[]" multiple="multiple" style="width: 338px;">
                                            @if ($listdepartment->count())
                                                @foreach($listdepartment as $department)
                                                    <option :disabled="{{$department->id}} == 1 ? true : false" value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span>(By default : All Department)</span>
                                    </div>
                                    <div class="space-10"></div>
                                    <div> 
                                        <label class="custom-file">
                                          <input type="file" id="project_image" name="project_image" class="custom-file-input" aria-describedby="fileHelp">
                                          <span class="custom-file-control form-control-file"></span>
                                        </label>
                                    </div> 
                                    <hr />
				    <small class="text-danger">Please Enter all required field <img src="http://portal.um6p.ma/assets/img/required.png" alt="required"></small>
                                    <div class="space-10"></div>
                                    <div class="send-button">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button class="btn btn-primary btn-round btn-simple btn-block btn-lg button-create" id="update" type="submit" >Update Project</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{ url('app') }}" class="btn btn-primary btn-round btn-simple btn-danger btn-block btn-lg button-cancel">Cancel</a>
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
                    <div class="row justify-content-md-center">
                        <h3>You don't have <strong>permission</strong> to this page</h3>
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
    @include('footervarview')
    </div>
</body>

@endsection

