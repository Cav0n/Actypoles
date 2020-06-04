@extends('templates.public')

@section('page.content')

    <div class="row justify-content-center py-5">
        <div class="col-xxxl-3">
            @include('components.alerts.errors')

            <form action="{{route('customer_area.register')}}" method="POST" class="p-3 bg-light shadow-sm border">
                @csrf

                <h1>{{__('Register')}}</h1>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control @if($errors->has('firstname')) is-invalid @endif" name="firstname" id="firstname" value="{{old('firstname')}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom de famille</label>
                    <input type="text" class="form-control @if($errors->has('lastname')) is-invalid @endif" name="lastname" id="lastname" value="{{old('lastname')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" aria-describedby="helpEmail" value="{{old('email')}}">
                    <small id="helpEmail" class="form-text text-muted">Votre adresse email (elle vous servira a vous connecter)</small>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" id="password" aria-describedby="helpPassword">
                    <small id="helpPassword" class="form-text text-muted">Votre mot de passe doit comporter au moins 8 caractères dont 1 majuscule, 1 chiffre et un caractère spécial.</small>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input type="text" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation" id="password_confirmation" aria-describedby="helpPasswordConfirmation">
                    <small id="helpPasswordConfirmation" class="form-text text-muted">Nous voulons nous assurer que vous écrivez le bon mot de passe.</small>
                </div>

                <button type="submit" class="btn btn-primary">Créer mon compte</button>
            </form>
        </div>
    </div>

@endsection
