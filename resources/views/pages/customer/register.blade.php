@extends('templates.customer')

@section('page.content')

    @include('components.alerts.errors')

    <div class="row">
        <div class="col-12">
            <form action="{{route('customer_area.register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom de famille</label>
                    <input type="text" class="form-control" name="lastname" id="lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="helpEmail">
                    <small id="helpEmail" class="form-text text-muted">Votre adresse email (elle vous servira a vous connecter)</small>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpPassword">
                    <small id="helpPassword" class="form-text text-muted">Votre mot de passe doit comporter au moins 8 caractères dont 1 majuscule, 1 chiffre et un caractère spécial.</small>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input type="text" class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="helpPasswordConfirmation">
                    <small id="helpPasswordConfirmation" class="form-text text-muted">Nous voulons nous assurer que vous écrivez le bon mot de passe.</small>
                </div>

                <button type="submit" class="btn btn-primary">Créer mon compte</button>
            </form>
        </div>
    </div>

@endsection
