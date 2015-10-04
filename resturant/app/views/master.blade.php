<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	
	<link type="text/css" href="{{ secure_url('assets/css/local.css') }}" rel="stylesheet">
	<link type="text/css" href="{{ secure_url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <script type="text/javascript" src="{{ secure_url('assets/script/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('assets/script/bootstrap.min.js') }}"></script>
</head>
<body>
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ secure_url('order') }}">Resturant</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ secure_url('order') }}">Order</a>
                    </li>
                    <li>
                        <a href="{{ secure_url('order/view') }}">View Orders</a>
                    </li>
                    <li>
                        <a href="{{ secure_url('menu') }}">Menu</a>
                    </li>
                    <li>
                        <a href="{{ secure_url('daily_intake') }}">Daily Intake</a>
                    </li>
                    <li>
                        <a href="{{ secure_url('customer') }}">Customer</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div style="padding-top:50px"></div>
    @section('content')
    @show
</body>
</html>
