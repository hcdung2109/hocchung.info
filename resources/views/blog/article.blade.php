@extends('blog.layouts.master')

@section('breadcrumb')
    <section class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="{{ route('blog.getArticlesOfCategory', $article->category) }}">{{ $article->category->name }}</a></li>
                    <li class="active">{{ $article->slug }}</li>
                </ol>
            </div>
        </div>
    </section>
@endsection

@section('content')

    <div class="entity_wrapper">
        <div class="entity_title">
            <h1><a href="#">{{ $article->title }}</a></h1>
        </div>

        {{--<div class="entity_meta"><a href="#" target="_self">10Aug- 2015</a>, by: <a href="#" target="_self">Eric joan</a></div>--}}

        <div class="entity_social">
            <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
            <!--Twitter-->
            <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
            <!--Google +-->
            <a href="#" class="icons-sm inst-ic"><i class="fa fa-google-plus"> </i></a>
            <!--Linkedin-->
            <a href="#" class="icons-sm tmb-ic"><i class="fa fa-ge"> </i></a>
            <!--Pinterest-->
            <a href="#" class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
        </div>
        <!-- entity_social -->

        <div class="entity_content">
            {!! $article->desc !!}
        </div>
        <!-- entity_content -->

        <div class="entity_footer">
            <div class="entity_tag">
                @foreach($article->tags as $tag)
                    <span class="blank"><a href="{{ route('blog.getArticlesOfTag', $tag) }}">{{ $tag->name }}</a></span>
                @endforeach
            </div>
            <!-- entity_tag -->

            <div class="entity_social">
                <span><i class="fa fa-comments-o"></i>{{ $article->comments()->count() }} <a href="#">Bình luận </a> </span>
            </div>
            <!-- entity_social -->

        </div>
        <!-- entity_footer -->

    </div>


    <div class="related_news">
        <div class="entity_inner__title header_purple">
            <h2><a href="#">Bài viết quan tâm</a></h2>
        </div>
        <!-- entity_title -->

        <div class="row">
            @foreach($relatedArticles as $key => $row)
                @if ($key == 0 || $key % 2 == 0 )
                    <div class="col-md-6">
                @endif

                <div class="media">
                    <div class="media-left">
                        <a href="{{ route('blog.getArticle', $row) }}"><img class="media-object" src="{{ asset('storage/app/'.$row->image) }}" alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="{{ route('blog.getArticle', $row) }}" target="_self">{{ $row->title }}</a></h3>
                        {{--<span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>--}}
                        <div class="category_article_content">{{ str_limit($row->summary,75) }}</div>
                        <div class="media_social">
                            <span><a href="#"><i class="fa fa-comments-o"></i></a> {{ $row->comments_count }} Bình luận</span>
                        </div>
                    </div>
                </div>

                @if ($key %2 == 1 || $row === $relatedArticles->last() )
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
