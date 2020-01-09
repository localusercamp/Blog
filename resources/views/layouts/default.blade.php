<!doctype html>
<html>

<head>
    @include('includes.head')
    
</head>

@include('includes.styles')

<body class="layout-body">

    @include('includes.header')

    <div class="col-sm-3 btstrp-col">

    </div>

    <div class="col-sm-6 btstrp-col">
        @yield('content')
    </div>

    <div class="col-sm-3 btstrp-col">

    </div>

    {{-- @include('includes.footer') Пока что убран --}}

</body>

</html>