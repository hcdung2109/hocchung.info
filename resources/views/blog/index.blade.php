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
            by: <a href="#">Admin</a>
        </div>


        <div class="entity_content">
            <p>{{ substr($article->summary,0,255) }}</p>
        </div>
        <!-- entity_content -->

    </div>
    @endforeach

    <nav aria-label="Page navigation" class="pagination_section">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </nav>

@endsection


