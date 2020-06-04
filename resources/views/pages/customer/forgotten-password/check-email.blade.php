@extends('templates.customer')

@section('customer_area.content')

    <form action="{{route('customer_area.password-forgotten')}}" method="POST">
        @csrf

        <h1>{{__('Forgotten password')}}</h1>
        <p>Nous allons vous envoyer un lien de réinitialisation par email. Veuillez donc indiquer votre email :</p>

        <div class="form-group">
            <label for="email"></label>
            <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" value="{{old('email')}}">
        </div>

        <button type="submit" class="btn btn-secondary">Envoyer le lien</button>
    </form>

@endsection
