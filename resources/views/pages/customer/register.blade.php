@extends('templates.public')

@section('page.content')

    <div class="row justify-content-center py-3">
        <div class="col-md-8 col-lg-6 col-xxxl-3">
            <a class="btn btn-outline-primary mb-3" href="{{route('customer_area.login')}}" role="button">< {{__('Login')}}</a>

            @include('components.alerts.errors')

            <form action="{{route('customer_area.register')}}" method="POST" class="p-3 bg-light shadow-sm border">
                @csrf

                <h1>{{__('Register')}}</h1>
                <div class="form-group">
                    <label for="firstname">{{__('Firstname')}}</label>
                    <input type="text" class="form-control @if($errors->has('firstname')) is-invalid @endif" name="firstname" id="firstname" value="{{old('firstname')}}">
                </div>
                <div class="form-group">
                    <label for="lastname">{{__('Lastname')}}</label>
                    <input type="text" class="form-control @if($errors->has('lastname')) is-invalid @endif" name="lastname" id="lastname" value="{{old('lastname')}}">
                </div>
                <div class="form-group">
                    <label for="email">{{__('Email')}}</label>
                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" aria-describedby="helpEmail" value="{{old('email')}}">
                    <small id="helpEmail" class="form-text text-muted">{{__('We use your email address to login you and send you notifications about your account.')}}</small>
                </div>
                <div class="form-group">
                    <label for="password">{{__('Password')}}</label>
                    <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" id="password" aria-describedby="helpPassword">
                    <small id="helpPassword" class="form-text text-muted">{{__('Your password must contain at least 8 characters including 1 capital letter, 1 number and a special character.')}}</small>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{__('Password confirmation')}}</label>
                    <input type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation" id="password_confirmation" aria-describedby="helpPasswordConfirmation">
                    <small id="helpPasswordConfirmation" class="form-text text-muted">{{__('We want you to be sure of the password you typed.')}}</small>
                </div>

                <button type="submit" class="btn btn-secondary">{{__('Create my account')}}</button>
            </form>
        </div>
    </div>

@endsection
