<aside id="sidebar" class="sidebar">

    @php
      $sidebarLinks = config('site.sidebarLinks');
    @endphp
    <ul class="sidebar-nav" id="sidebar-nav">
        @foreach($sidebarLinks as $key => $link)
            @php
                $hasChild = count($link['child']) > 0;
            @endphp
            @if($hasChild)
                @php
                    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
                    $matchingLinks = [];
                    foreach ($link['child'] as $childLink) {
                        if ($currentRoute == $childLink['route']) {
                            $matchingLinks[] = $childLink;
                        }
                    }
                @endphp
            @endif
        @php
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            $currentParentLinkActivity = $link['route']
               ? $currentRoute === $link['route']
               ? '' : 'collapsed'
               : 'collapsed'
           ;
        @endphp
            <li class="nav-item">
                <a
                    class="nav-link
                    {{ $hasChild ? 'collapse' : '' }} {{ $hasChild ? count($matchingLinks) ? '' : 'collapsed' : $currentParentLinkActivity}}"
                    data-bs-target="{{ $hasChild ? '#'.Str::slug($link['name']) : '' }}"
                    data-bs-toggle="{{ $hasChild ? 'collapse' : '' }}"
                    href="{{ !$link['route'] ? '#' : route($link['route']) }}">
                    <i class="{{ $link['icon'] }}"></i>
                    <span>{{ $link['name'] }}</span>
                    @if($hasChild)
                        <i class="bi bi-chevron-down ms-auto"></i>
                    @endif
                </a>
                @if($hasChild)
                    <ul
                        id="{{ Str::slug($link['name']) }}"
                        class="nav-content collapse {{ count($matchingLinks) ? 'show' : '' }}"
                        data-bs-parent="#sidebar-nav">
                        @foreach($link['child'] as $index => $childLink)
                            <li>
                                <a
                                    class="{{ $childLink['route'] ? url()->full() === route($childLink['route']) ? 'active' : '' : '' }}"
                                    href="{{ !$childLink['route'] ? '#' : route($childLink['route']) }}">
                                    <i class="bi bi-circle"></i>
                                    <span>{{ $childLink['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>

</aside>
