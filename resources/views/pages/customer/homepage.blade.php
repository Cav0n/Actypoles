@extends('templates.customer')

@section('page.content')

    <div class="row">
        <div class="col-12">
            <h1>{{ucfirst(__('customer area'))}}</h1>
            <a class="btn btn-danger" href="{{route('customer_area.logout')}}" role="button">Se deconnecter</a>
        </div>
    </div>

@endsection
