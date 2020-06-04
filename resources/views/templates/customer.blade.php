@extends('templates.public')

@section('page.title', config('app.name') . ' | ' . __('Customer area'))

@section('page.content')

    <div class="row py-5 justify-content-center">
        <div class="col-xxxl-6">
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

@endsection
