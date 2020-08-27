@extends('templates.public')

@section('page.title', config('app.name') . ' | ' . __('Customer area'))

@section('page.content')

    <div class="row justify-content-center py-3">
        @if (Auth::check())
        {{-- Connected --}}
        <div class="col-md-8 col-lg-6 col-xxxl-5">
            @include('components.alerts.errors')
            @include('components.alerts.success')

                <div class="bg-white shadow-sm border">
                    <div id="customer-area-header" class="bg-light">
                        <div class="p-3">
                            <h1 class="mb-0">{{__('Your customer area')}}</h1>
                            <p>{{__('Welcome :firstname :lastname', ['firstname' => Auth::user()->firstname, 'lastname' => Auth::user()->lastname])}}</p>
                        </div>

                        <ul class="nav nav-tabs px-3">
                            <li class="nav-item">
                                <a href="{{route('customer_area.homepage')}}" class="nav-link noselect  active ">
                                    Profil</a>
                            </li>
                        </ul>
                    </div>

                    <div id="customer-area-content" class="bg-white p-3">
                        @yield('customer_area.content')
                    </div>

                    <div id="customer-area-header" class="bg-light border-top p-3">
                        <a class="btn btn-danger" href="{{route('customer_area.logout')}}" role="button">Se deconnecter</a>
                    </div>
                </div>
            </div>
        </div>

        @else

        {{-- Not connected --}}
        <div class="col-md-8 col-lg-6 col-xxxl-3">
            @include('components.alerts.errors')
            @include('components.alerts.success')

            <div class="p-3 bg-light shadow-sm border">
                @yield('customer_area.content')
            </div>
        </div>
        @endif
    </div>

@endsection
