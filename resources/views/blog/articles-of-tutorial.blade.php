@extends('blog.layouts.master')

@section('breadcrumb')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active"><a href="#">{{ $tutorial->name }}</a></li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')

    <div class="category_section camera list-article">
        <div class="article_title">
            <h2><a target="_self">{{ $tutorial->name }}</a></h2>
        </div>

        @if ($articles->isNotEmpty())
        <div class="category_article_wrapper">
            @foreach($articles as $article)
                <div class="row">
                    <div class="col-md-12">
                        <div class="category_article_title">
                            <h2><a href="{{ route('blog.getArticle', $article) }}" target="_self">{{ $article->title }}</a></h2>
                        </div>
                        {{--<div class="article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a></div>--}}

                        <div class="category_article_content">{{ str_limit($article->summary,255) }}</div>
                        <!-- category_article_content -->

                        <div class="media_social">
                            <span><i class="fa fa-comments-o"></i>{{ $article->comments->count() }} Bình luận</span>
                        </div>
                        <!-- media_social -->

                    </div>
                    <!-- col-md-7 -->
                </div>
                <hr>
            @endforeach
            <!-- row -->
        </div>
        @endif

    </div>

    <nav aria-label="Page navigation" class="pagination_section">
        <ul class="pagination">
            {!! $articles->links()  !!}
        </ul>
    </nav>



@endsection
