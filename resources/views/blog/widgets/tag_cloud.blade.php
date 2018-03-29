<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Tag Cloud</a></h2>
    </div>
    <div class="tagcloud01">
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ route('blog.getArticlesOfTag', $tag) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>