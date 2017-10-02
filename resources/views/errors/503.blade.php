@extends('layouts.master')

@section('content')
</head>
<body class="index-page" style="margin-top: 60px;">

	<div class="wrapper">
		<div class="text-center">
			<div class="container">
			    <div class="content-center brand">
			    	<h1 style="color: #F06543;">SOMETHING WENT WRONG!</h1>
			    	<h1 class="h1-seo" style="font-size: 220px; color: #F06543;"><b>404</b></h1>
			    	<p style="color: #F06543;">The page you requested could not be found</b></p>
			    	<span class="space-10"></span>
			    	<button class="btn btn-primary btn-round" style="box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);     background-color: #F06543;" onclick="goBack()">
			    		<i class="fa fa-angle-double-left" aria-hidden="true"></i> Go Back
			    	</button>
			    	<a class="btn btn-primary btn-round" style="box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);     background-color: #F06543;" href="{{ url('app') }}">
			    		Go Home <i class="fa fa-angle-double-right" aria-hidden="true"></i>
			    	</a>
			    </div>
		    </div>
	    </div>
    </div>
	<script>
		function goBack() {
		    window.history.back();
		}
	</script>
</body>

@endsection