@extends('blog.layouts.master')

@section('content')

    @foreach($categories as $index => $cate)

        @if ($articles[$index]->isNotEmpty())
        <div class="category_section mobile">
            <div class="article_title header_purple">
                <h2><a href="{{ route('blog.getArticlesOfCategory', $cate) }}">{{ $cate->name }}</a></h2>
            </div>

            <div class="category_article_wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="top_article_img">
                            <a href="{{ route('blog.getArticle', $articles[$index][0]) }}" target="_self">
                                <img class="img-responsive" src="{{ asset('storage/app/'.$articles[$index][0]->image) }}" alt="feature-top">
                            </a>
                        </div>
                        <!----top_article_img------>
                    </div>
                    <div class="col-md-8">
                        <div class="category_article_title">
                            <h2><a href="{{ route('blog.getArticle', $articles[$index][0]) }}" target="_self">{{ $articles[$index][0]->title }}</a></h2>
                        </div>
                        <!----date------>
                        {{--<div class="category_article_date"><a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a></div>--}}

                        <div class="category_article_content">
                            {{ substr($articles[$index][0]->summary,0,220) }}
                        </div>

                    </div>
                </div>
            </div>

            <?php unset($articles[$index][0]); ?>

            <div class="category_article_wrapper">
                <div class="row">
                    @foreach($articles[$index] as $num => $row)
                        @if ($num % 2 == 1 )
                            <div class="col-md-6">
                        @endif

                        <div class="media">
                            <div class="media-body">
                                <h3 class="media-heading"><a href="{{ route('blog.getArticle', $row) }}" target="_self">{{ $row->title }}</a></h3>
                                {{--<span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>--}}
                                <div class="category_article_content">{{ str_limit($row->summary,100) }}</div>
                                {{--<div class="media_social">--}}
                                    {{--<span><a href="#"><i class="fa fa-comments-o"></i></a> {{ $row->comments_count }} Bình luận</span>--}}
                                {{--</div>--}}
                            </div>
                        </div>

                        @if ($num %2 == 0 || $row == $articles[$index]->last() )
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <p class="divider"><a href="{{ route('blog.getArticlesOfCategory', $cate) }}">More News&nbsp;&raquo;</a></p>
         </div>
        @endif
    @endforeach
    <div>Logo made with <a href="https://
www.designevo.com/" title="Free Online Logo Maker">DesignEvo</a></div>

@endsection
