<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

@include('includes.styles')

<body>
    {{-- Настроить навбарыч, он прозрачный если что почему то --}}
    <div class="row" style="height:100px">
        @include('includes.header')
    </div>
    {{--  --}}

    <div class="col-sm-1 layout-borders">

    </div>

    <div class="col-sm-10">
        
        <div id="main" class="row">
            @yield('content')
        </div>
    </div>

    <div class="col-sm-1 layout-borders">

    </div>

    {{-- @include('includes.footer') Пока что убран --}}

</body>

</html>