<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devices-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
    <meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
    <title>Mobile Shop</title>


    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('')}}//admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('')}}//admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('')}}//admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    @if(direction() == 'ltr')
        <link rel="stylesheet" href="{{url('')}}//admin/dist/css/AdminLTE.min.css">
    @else
        <link rel="stylesheet" href="{{url('')}}//admin/dist/css/rtl/AdminLTE.min.css">
        <link rel="stylesheet" href="{{url('')}}//admin/dist/css/rtl/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('')}}//admin/dist/css/rtl/rtl.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap;subset=arabic,latin-ext" rel="stylesheet">
        <style type="text/css">
            html,body,.alert{
                font-family: 'cario', Sans-Serif;
            }
        </style>
        @endif
                <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{url('')}}//admin/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{url('')}}//admin/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{url('')}}//admin/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{url('')}}//admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{url('')}}//admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{url('')}}//admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{url('')}}//admin/dist/js/myfunctions.js"></script>
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!--Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{url('')}}//user/layout/css/master.css">
</head>
<body>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i>Shopping Cart
            </h3>
        </a>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Languages
                <i class="fa fa-globe"></i>
                <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{ aurl('lang/en/') }}" class="btn btn-default btn-flat"><i class="fa fa-flag"></i> English</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ aurl('lang/ar/') }}" class="btn btn-default btn-flat"><i class="fa fa-flag"></i>  عربى</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ aurl('lang/sp/') }}" class="btn btn-default btn-flat"><i class="fa fa-flag"></i>Spanish</a>
                    </div>
                </li>
            </ul>
        </li>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggle-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </h5>
                </a>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="row text-center py-5">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="#" method="post">
                    <div class="card shadow">
                        <a href="{{url('product').'/' . $product->id}}" class="thumb-overlay">
                            <img src="{{asset('images')}}/{{ $product->img }}" alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <h5>
                                <small><s class="text-secondary">{{ $product->price }}</s></small>
                                <span class="price">149</span>
                            </h5>
                            <button class="btn btn-warning my-3" type="submit" name="add">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                            <input type="hidden" name="product_id" value="2">
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha512-5WvZa4N7Jq3TVNCp4rjcBMlc6pT3lZ7gVxjtI6IkKW+uItSa+rFgtFljvZnCxQGj8SUX5DHraKE6Mn/4smK1Cg==" crossorigin="anonymous"></script>
<script src="{{url('')}}//user/layout/js/jquery-3.3.1.min.js"></script>
<script src="{{url('')}}//user/layout/js/bootstrap.min.js"></script>
</body>
</html>