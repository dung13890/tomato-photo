<ul class="site-navigation-main{{ $class }}">
    @foreach ($__menus as $menu)
    <li class="menu-item {{ isActiveRoute(array_merge([$menu->url], $menu->children->pluck('url')->toArray())) }} @if (count($menu->children)) has-submenu  @endif">
        <a href="{{ $menu->url }}">{{ $menu->name }}</a>
        @if (count($menu->children))
            <span class="caret"></span>
            <ul class="submenu">
                @foreach ($menu->children as $subMenu)
                <li class="menu-item"><a href="{{ $subMenu->url }}">{{ $subMenu->name }}</a></li>
                @endforeach
            </ul>
        @endif
    </li>
    @endforeach
</ul>
