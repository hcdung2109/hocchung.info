@extends('blog.layouts.master')

@section('breadcrumb')
    <section class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                </ol>
            </div>
        </div>
    </section>
@endsection

@section('content')

    @foreach($articles as $article)
    <div class="entity_wrapper">
        <div class="entity_title">
            <h1><a href="{{ route('blog.getArticle', $article) }}" target="_self">{{ $article->title }}</a>
            </h1>
        </div>
        <!-- entity_title -->

        <div class="entity_meta">
            <a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
        </div>
        <!-- entity_meta -->

        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-full"></i>
        </div>
        <!-- rating -->

        <div class="entity_social">
            <a href="#" class="icons-sm sh-ic"><i class="fa fa-share-alt"></i><b>424</b>
                <span class="share_ic">Shares</span>
            </a>
            <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
            <!--Twitter-->
            <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
            <!--Google +-->
            <a href="#" class="icons-sm inst-ic"><i class="fa fa-google-plus"> </i></a>
            <!--Linkedin-->
            <a href="#" class="icons-sm tmb-ic"><i class="fa fa-ge"> </i></a>
            <!--Pinterest-->
            <a href="#" class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
            <span class="arrow">&raquo;</span>
        </div>
        <!-- entity_social -->


        <div class="entity_content">
            <p>{{ substr($article->summary,0,255) }}</p>
        </div>
        <!-- entity_content -->

    </div>
    @endforeach

@endsection
