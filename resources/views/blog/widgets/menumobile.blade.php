<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li><a href="/">Trang chủ</a></li>
                {{ App\Helpers\Helper::createMenuBlog($categories) }}
                <li><a href="{{ route('blog.contact') }}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>