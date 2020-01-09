<html>


<head>
    @include('includes.head')
    @include('includes.styles')
</head>

<body class="layout-body">

    <nav class="navbar no-mg navbar-expand-lg bg-dark navbar-dark">
    
        <a class="navbar-brand mr-auto header-title" href="/home">ВБлоге</a>
        
        <a class="navbar-brand header-link">Roles</a>
        <a class="navbar-brand header-link">Categories</a>
        <a class="navbar-brand header-link">Users</a>

    </nav>
      

    <div class="col-sm-3 sidebar">
        @yield('links')
    </div>
    
    <div class="col-sm-9">
        @yield('content')
    </div>
</body>


</html>
