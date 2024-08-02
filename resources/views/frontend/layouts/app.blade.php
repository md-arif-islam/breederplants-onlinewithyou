<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('frontend.layouts.partials.head')
</head>
<body class="@yield('body-class')">
@yield('content')
@include('frontend.layouts.partials.scripts')
</body>

</html>
