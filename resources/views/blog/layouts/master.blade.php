<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechNews - HTML and CSS Template</title>

    <base href="{{asset('')}}public/">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link href="img/favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="blog/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link href="blog/fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- Mobile Menu Style -->
    <link href="blog/css/mobile-menu.css" rel="stylesheet">

    <!-- Owl carousel -->
    <link href="blog/css/owl.carousel.css" rel="stylesheet">
    <link href="blog/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Theme Style -->
    <link href="blog/css/style.css" rel="stylesheet">

    <link href="blog/css/blog.css" rel="stylesheet">

    <link href="blog/css/responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
    <!-- Page Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- preloader -->

    <div class="uc-mobile-menu-pusher">
        <div class="content-wrapper">

            <!-- Header -->
            @include('blog.layouts._header')


            <section id="category_section" class="category_section">
                <!-- Breadcrumb -->
                @yield('breadcrumb')

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            <!-- Content -->
                            @yield('content')

                        </div>
                        <!-- Left Section -->

                        <div class="col-md-4">

                            @include('blog.widgets.articles-of-tutorial')

                            @include('blog.widgets.tutorials')

                            <!-- -->
                            @include('blog.widgets.categories')

                            <!-- Tag Cloud -->
                            @include('blog.widgets.tag_cloud')

                            <!--Advertisement-->
                        </div>
                        <!-- Right Section -->

                    </div>
                    <!-- Row -->

                </div>
                <!-- Container -->

            </section>

            <!-- Footer -->
            @include('blog.layouts._footer')

        </div>
        <!-- #content-wrapper -->

    </div>
    <!-- .offcanvas-pusher -->

    <a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

    @include('blog.widgets.menumobile')
    <!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->

<!-- jquery Core-->
<script src="blog/js/jquery-2.1.4.min.js"></script>

<!-- Bootstrap -->
<script src="blog/js/bootstrap.min.js"></script>

<!-- Theme Menu -->
<script src="blog/js/mobile-menu.js"></script>

<!-- Owl carousel -->
<script src="blog/js/owl.carousel.min.js"></script>

<!-- Theme Script -->
<script src="blog/js/script.js"></script>

<script src="blog/js/blog.js"></script>

@yield('script')

</body>
</html>
