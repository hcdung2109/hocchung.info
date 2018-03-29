<div class="column-one-third">
    <div class="sidebar">
        <h5 class="line"><span>{{ __('fontend.category') }}</span></h5>
        <div id="accordion">
            @foreach($categories as $cate)
                @if($cate->parent_id != 0)
                <h3>+ <a href="{{ route('blog.getCategory', $cate) }}">{{ $cate->name }}</a></h3>
                @endif
            @endforeach
        </div>
    </div>

    <div class="sidebar">
        <h5 class="line"><span>Facebook.</span></h5>
        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=298&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23BCBCBC&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:298px; height:258px;" allowTransparency="true"></iframe>
    </div>
</div>