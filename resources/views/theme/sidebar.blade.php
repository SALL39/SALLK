<ul>
    <?php

    function isActive($url)
    {
        $browserUrl = request()->getRequestUri();
        if (strpos($browserUrl, $url)) {
            return 'active';
        }
    }
    $fileName = App\Models\User::getSidebarFileName();
    $path = base_path() . "/resources/views/layouts/menu/" . $fileName;
    $menu = json_decode(file_get_contents($path), true);

    ?>
    @foreach($menu as $item)
    <li>
        @if(isset($item['children']))
        <a class="dropdown"><i class="{{ $item['icon'] }}"></i><span class="title">{{ $item['title'] }}</span></a>
        <ul class="submenu collapse">
            @foreach($item['children'] as $children)
            <li class="{{ isActive($children['url']) }}"><a href="{{ '/'.$children['url'] }}"><i></i><i class="{{ $children['icon'] }}"></i> <span>{{ $children['title'] }}</span> </a></li>
            @endforeach
        </ul>
        @else
        <a href="{{ '/'.$item['url'] }}" class="{{ (Request::is($item['url'],$item['url'].'/edit/*') ? 'main-active' : '')}} single-item"><i class="{{ $item['icon'] }}"></i><span class="title">{{ $item['title'] }}</span></a>
        @endif
    </li>
    @endforeach

</ul>
