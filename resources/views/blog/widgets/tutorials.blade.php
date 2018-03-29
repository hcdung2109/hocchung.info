@if (isset($tutorials) && $tutorials->isNotEmpty())
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Tutorials</a></h2>
    </div>
    <ul class="list-group">
        @foreach( $tutorials as $tutorial)
            <li class="list-group-item"><a href="{{ route('blog.tutorial', $tutorial) }}">{{ $tutorial->name }}</a></li>
        @endforeach
    </ul>
</div>

@endif