@extends('templates.public')

@section('page.content')

    @if(0 < count(\App\Pole::all()))
    <div class="row pt-4">
        <div class="col-12">
            <h1 class="h4">Nos activité</h1>

            <div class="row">
                @foreach (\App\Pole::all() as $pole)
                    <div class="col-xxxl-3">
                        <p>{{$pole->title}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-center pt-4">
        <div class="col-md-3 col-xxxl-1">
            <img src="{{asset('images/logos/logo-actypoles.png')}}" class="w-100">
        </div>
        <div class="col-md-5 col-xxxl-4 d-flex flex-column justify-content-center">
            <h1 class="h4">Actypoles-Thiers</h1>
            <p class="text-justify">
                Sed vitae lobortis augue. Integer risus est, volutpat in ultricies vel, vehicula vitae diam. Curabitur
                ultrices consectetur augue, a lacinia sapien elementum sit amet. Sed venenatis eros nisi, at tincidunt
                neque auctor ultricies. Ut tincidunt consectetur ipsum vitae bibendum. Nunc ac tellus ac dolor volutpat
                venenatis eu non mauris. Praesent ultricies malesuada maximus.
            </p>
            <a href="">En savoir plus</a>
        </div>
    </div>

    <div class="row justify-content-center py-4">

        <div class="col-md-5 col-xxxl-4 d-flex flex-column justify-content-center">
            <h1 class="h4">Bébés Lutins</h1>
            <p class="text-justify">
                Morbi eu posuere dolor, eu rhoncus libero. Phasellus arcu turpis, mollis in mi sit amet, aliquam mattis
                odio. Morbi ultricies gravida faucibus. Donec semper metus euismod ante laoreet cursus. Fusce posuere
                fermentum auctor. In hac habitasse platea dictumst. Maecenas efficitur ex ut est gravida commodo.
                Mauris consectetur augue id nisi tempor, nec elementum massa convallis.
            </p>
            <div class="d-flex">
                <a href="" class="pr-3">En savoir plus</a>
                <a href="" class="pl-3 border-left">Site internet</a>
            </div>
        </div>
        <div class="col-md-3 col-xxxl-1">
            <img src="{{asset('images/logos/logo-bebes-lutins.png')}}" class="w-100">
        </div>
    </div>

@endsection
