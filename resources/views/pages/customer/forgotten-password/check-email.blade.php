@extends('templates.public')

@section('page.content')

    <div class="row justify-content-center py-3">
        <div class="col-md-8 col-lg-6 col-xxxl-3">
            <a class="btn btn-outline-primary mb-3" href="{{route('customer_area.login')}}" role="button">< {{__('Login')}}</a>

            @include('components.alerts.errors')
            @include('components.alerts.success')

            <form action="{{route('customer_area.password-forgotten')}}" method="POST" class="p-3 bg-light shadow-sm border">
                @csrf

                <h1>{{__('Forgotten password')}}</h1>
                <p>Nous allons vous envoyer un lien de réinitialisation par email. Veuillez donc indiquer votre email :</p>

                <div class="form-group">
                    <label for="email"></label>
                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" value="{{old('email')}}">
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer le lien</button>
            </form>
        </div>
    </div>
@endsection
