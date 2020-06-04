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

    <title>{{ config('app.name')}} | Administration - @yield('admin.title', __('Admin backoffice'))</title>
    <meta name="description" content="@yield('admin.description')">
</head>
<body id="admin" class="bg-light d-flex flex-column justify-content-center">

    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-md-8 col-lg-6 col-xxxl-3">
                @include('components.alerts.errors')
                @include('components.alerts.success')

                <div class="p-3 bg-white shadow-sm border">
                    @yield('admin.content')
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS & jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- App JS --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
