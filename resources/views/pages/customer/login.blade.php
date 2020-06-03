@extends('templates.public')

@section('page.content')

    @include('components.alerts.errors')

    <div class="row">
        <div class="col-12">
            <form action="{{route('customer_area.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpEmail">
                    <small id="helpEmail" class="form-text text-muted">
                        <a href="{{route('customer_area.register')}}">Vous souhaitez créer un compte ?</a>
                    </small>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpPassword">
                    <small id="helpPassword" class="form-text text-muted">Mot de passe oublié ?</small>
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>

@endsection
