<?php
function isActive($url)
{
    $currentPath = request()->path(); // Gets the current path (e.g., '', 'about', 'gallery')

    // Check for home page ('' or '/')
    if (($currentPath === '' || $currentPath === '/') && ($url === '/' || $url === '')) {
        return 'active';
    }

    // Check for other paths
    if (Request::is(ltrim($url, '/'))) {
        return 'active';
    }

    return '';
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($navbar['items'] as $item)
                    <li class="nav-item">
                        <a class="nav-link @if (isActive($item['url'])) active font-weight-bold @endif"
                            aria-current="page" href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</nav>
