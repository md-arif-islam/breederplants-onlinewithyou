<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('backend.layouts.partials.head')
</head>
<body>
@include('backend.layouts.partials.sidebar')
<main class="main-wrap">
    @include('backend.layouts.partials.top-header')
    @yield('content')
    @include('backend.layouts.partials.footer')
</main>
@include('backend.layouts.partials.scripts')
</body>

</html>
