<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @includeIf('layouts.inc.head')

    @yield("css")
</head>
<body data-sidebar="dark">
     <!-- Loader -->
     <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <div id="layout-wrapper">
        @includeIf('layouts.inc.header')
        @includeIf('layouts.inc.menu')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('PageContent')
                    @includeIf('layouts.inc.footer')
                </div>
            </div>
        </div>
    </div>
    @includeIf('layouts.inc.footer')
    @includeIf('layouts.inc.right-bar')
    @includeIf('layouts.inc.scripts')
</body>
</html>
