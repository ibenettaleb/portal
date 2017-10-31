<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>UM6P Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-duallistbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/now-ui-kit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-notifications.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')  }}">
</head>
@yield('content')

<script type="text/javascript" src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.bootstrap-duallistbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/now-ui-kit.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jQuery.succinct.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/validation.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/vue.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/vue-resource.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/vue-truncate.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/select2.min.js') }}"></script>
<script type="application/javascript"
        src="{{ asset('assets/js/core/moment.min.js') }}"></script>
</body>
</html>
