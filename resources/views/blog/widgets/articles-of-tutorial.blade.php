@if (isset($articlesOfTutorial) && $articlesOfTutorial->isNotEmpty())
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">{{ $article->tutorial->name }}</a></h2>
    </div>
    <ul class="list-group">
        @foreach( $articlesOfTutorial as $article)
            <li class="list-group-item"><a href="{{ route('blog.getArticle', $article) }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>
</div>
@endif