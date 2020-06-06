<!DOCTYPE html>
<html lang="{{App::getLocale()}}" class="bg-light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CDN --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- App CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <title>{{ config('app.name')}} | Administration - @yield('admin.title', __('Homepage'))</title>
    <meta name="description" content="@yield('admin.description')">
</head>
<body id="admin" class="bg-light container-fluid" style="height: 100vh;">

    <div id="admin-wrapper" class="row h-100 justify-content-center">
    @if (\App\Admin::check(request()))
        <div id="sidenav" class="bg-secondary col-xxxl-1 h-100 p-3 d-flex flex-column justify-content-between">
            @include('components.admin.sidenav')
        </div>

        <div id="content" class="col-11 p-3">
            <div id="content-header" class="d-flex justify-content-between">
                <h1>@yield('admin.title')</h1>
                @yield('admin.content.header.options')
            </div>

            @yield('admin.content')
        </div>
    @else
        <div id="login-wrapper" class="col-xxxl-5 h-100 d-flex flex-column justify-content-center">
            @include('components.alerts.errors')
            @include('components.alerts.success')

            <div id="login-container" class="bg-white border shadow-sm p-3">
                @yield('admin.content')
            </div>
        </div>
    @endif
    </div>



    {{-- Bootstrap JS & jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- App JS --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
