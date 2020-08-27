@extends('templates.admin')

@section('admin.title', 'Connexion')

@section('admin.content')
    <form action="{{route('admin.login')}}" method="POST">
        @csrf
        <h1>Connexion</h1>
        <div class="form-group">
            <label for="login">Identifiant</label>
            <input type="text" class="form-control" name="login" id="login" aria-describedby="helpLogin">
            <small id="helpLogin" class="form-text text-muted">Vous pouvez utiliser votre pseudo ou votre adresse email.</small>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
@endsection
