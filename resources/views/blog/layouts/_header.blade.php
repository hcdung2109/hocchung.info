<section id="header_section_wrapper" class="header_section_wrapper" >
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                        <span class="date" style="text-transform: uppercase !important;">{{ date('d.m.Y') }}</span>
                        <!-- Time -->
                        <div class="social">
                            <a target="_blank" href="https://www.facebook.com/hcdung2109" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="/"><img src="blog/img/logo.png" alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <li><a>Login</a></li>
                            <li><a>Register</a></li>
                        </ul>
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default" style="margin-top: 0px !important;">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav" style="width: 100%">
                            <li><a href="/">Trang chủ</a></li>
                            {{ App\Helpers\Helper::createMenuBlog($categories) }}

                            <li><a href="{{ route('blog.contact') }}">Liên hệ</a></li>

                            <li style="width: 250px; float: right">
                                <div class="form-group" style="margin-bottom: 0px">
                                    <input type="text" class="form-control" id="usr" placeholder="Nhập từ khóa tìm kiếm">
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
