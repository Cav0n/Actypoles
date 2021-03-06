@extends('templates.customer')

@section('customer_area.content')

    <form action="{{route('customer_area.reset-password')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <input type="hidden" name="token" value="{{$token}}">

        <h1>{{__('Password reset')}}</h1>
        <p>
            Vous pouvez mettre à jour votre mot de passe. Il doit comporter 8 caractères
            (dont au moins 1 majuscule, 1 caractère spécial et 1 chiffre) :
        </p>

        <div class="form-group">
            <label for="new_password">{{__('New password')}}</label>
            <input type="text" class="form-control" name="new_password" id="new_password">
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">{{__('New password confirmation')}}</label>
            <input type="text" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
        </div>

        <button type="submit" class="btn btn-secondary">{{__('Update password')}}</button>
    </form>

@endsection
