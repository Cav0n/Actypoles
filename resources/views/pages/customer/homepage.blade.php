@extends('templates.customer')

@section('customer_area.content')

    <div class="row pb-3 border-bottom">
        <div class="col-lg-9 col-xxxl-10">
            <h2 class="h4">{{__('Personal informations')}}</h2>
            <p>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
            <p>{{Auth::user()->email}}</p>
        </div>
        <div class="col-lg-3 col-xxxl-2">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary">{{__('Edit')}}</button>
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-9 col-xxxl-10">
            <h2 class="h4">{{__('Password')}}</h2>
            <p>{{__('You could change your password at any moment.')}}</p>
        </div>
        <div class="col-lg-3 col-xxxl-2">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary">{{__('Edit')}}</button>
            </div>
        </div>
    </div>

@endsection
