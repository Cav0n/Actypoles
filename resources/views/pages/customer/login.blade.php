@extends('templates.customer')

@section('customer_area.content')

    <form action="{{route('customer_area.login')}}" method="POST">
        @csrf

        <h1>{{__('Login')}}</h1>
        <div class="form-group">
            <label for="email">{{__('Email')}}</label>
            <input type="email" class="form-control @if($errors->has('login')) is-invalid @endif" name="email" id="email" aria-describedby="helpEmail">
            <small id="helpEmail" class="form-text text-muted">
                <a href="{{route('customer_area.register')}}">{{__('You want to register ?')}}</a>
            </small>
        </div>

        <div class="form-group">
            <label for="password">{{__('Password')}}</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpPassword">
            <small id="helpPassword" class="form-text text-muted">
                <a href="{{route('customer_area.password-forgotten')}}">{{__('Password forgotten ?')}}</a>
            </small>
        </div>

        <button type="submit" class="btn btn-secondary">{{__('Login')}}</button>
    </form>

@endsection
