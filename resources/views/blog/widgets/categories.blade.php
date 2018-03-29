<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Chuyên mục</a></h2>
    </div>
    <ul class="list-group">
        @foreach($categories as $cate)
            @if($cate->parent_id != 0)
                <li class="list-group-item"><a href="{{ route('blog.getArticlesOfCategory', $cate) }}">{{ $cate->name }}</a></li>
            @endif
        @endforeach
    </ul>
</div>