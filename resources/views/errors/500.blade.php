<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Valuation') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">

    <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/font-awesome/css/font-awesome.min.css')!!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/bootstrap/css/bootstrap.min.css') !!}" />    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="{!! asset('public/css/themes/style1/pink-blue.css')!!}" class="default-style"/>
    <link type="text/css" rel="stylesheet" href="{!! asset('public/css/style-responsive.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!! asset('public/css/style.css')!!}"/>
    <link rel="shortcut icon" href="images/favicon.html">
</head>
<body id="error-page" class="animated bounceInLeft signinpage">
<div id="error-page-content" style="color:white;">
    <h1>500!</h1>
    <h4>Internal Server Error</h4>
    <p>The website cannot display the page.</p>
    <p><a href="{{ url('/') }}">Return home</a> or please come back in a while.</p>
</div>
</body>
<script src="{!! asset('public/js/jquery-1.10.2.min.js') !!}"></script>
<script src="{!! asset('public/js/jquery-migrate-1.2.1.min.js ') !!}"></script>
<script src="{!! asset('public/js/jquery-ui.js ') !!}"></script><!--loading bootstrap js-->
<script src="{!! asset('public/vendors/bootstrap/js/bootstrap.min.js ') !!}"></script>

</html>