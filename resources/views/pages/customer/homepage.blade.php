@extends('templates.customer')

@section('customer_area.content')

    {{-- Personal informations --}}
    <div class="row pb-3 border-bottom">
        <div id="user-personal-informations" class="col-lg-9 col-xxxl-6">
            <div class="infos">
                <h2 class="h4">{{__('Personal informations')}}</h2>
                <p>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
                <p>{{Auth::user()->email}}</p>
            </div>
            <form action="{{route('customer_area.update.personal-informations', ['user' => Auth::user()])}}" class="hidden-form" method="POST">
                @csrf
                <h2 class="h4">{{__('Update your informations')}}</h2>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control @if($errors->has('firstname')) is-invalid @endif" name="firstname" id="firstname"
                        placeholder="{{Auth::user()->firstname}}" value="{{old('firstname', Auth::user()->firstname)}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom de famille</label>
                    <input type="text" class="form-control @if($errors->has('lastname')) is-invalid @endif" name="lastname" id="lastname"
                        placeholder="{{Auth::user()->lastname}}" value="{{old('firstname', Auth::user()->lastname)}}">
                </div>
                <button type="submit" class="btn btn-secondary">Sauvegarder</button>
            </form>
        </div>
        <div class="col-lg-3 col-xxxl-6">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary edit-button">
                    {{__('Edit')}}</button>
                <button type="button" class="btn btn-outline-secondary cancel-button">
                    {{__('Cancel')}}</button>
            </div>
        </div>
    </div>

    {{-- Password --}}
    <div class="row pt-3">
        <div id="user-password" class="col-lg-9  col-xxxl-6">
            <div class="infos">
                <h2 class="h4">{{__('Password')}}</h2>
                <p>{{__('You could change your password at any moment.')}}</p>
            </div>
            <form action="{{route('customer_area.update.password', ['user' => Auth::user()])}}" class="hidden-form" method="POST">
                @csrf
                <h2 class="h4">{{__('Update your password')}}</h2>
                <div class="form-group">
                    <label for="password">Mot de passe actuel</label>
                    <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" class="form-control @if($errors->has('new_password')) is-invalid @endif" name="new_password" id="new_password" disabled>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirmation du nouveau mot de passe</label>
                    <input type="password" class="form-control @if($errors->has('new_password_confirmation')) is-invalid @endif" name="new_password_confirmation" id="new_password_confirmation" aria-describedby="helpNewPasswordConfirmation" disabled>
                    <small id="helpNewPasswordConfirmation" class="form-text text-muted">Retapez le nouveau mot de passe pour être certain.</small>
                </div>
                <button type="submit" class="btn btn-secondary">Sauvegarder</button>
            </form>
        </div>
        <div class="col-lg-3 col-xxxl-6">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary edit-button">
                    {{__('Edit')}}</button>
                <button type="button" class="btn btn-outline-secondary cancel-button">
                    {{__('Cancel')}}</button>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('.hidden-form').hide();
            $('.cancel-button').hide();
            var blankStringRegex = /^\s*$/;

            $('.edit-button').on('click', function () {
                let editButton = $(this);
                let cancelButton = editButton.siblings('.cancel-button');
                let wrapper = editButton.parent().parent().parent();
                let form = wrapper.find('.hidden-form');
                let infos = wrapper.find('.infos');

                form.show();
                infos.hide();
                cancelButton.show();
                editButton.hide();
            });

            $('.cancel-button').on('click', function () {
                let cancelButton = $(this);
                let editButton = cancelButton.siblings('.edit-button');
                let wrapper = cancelButton.parent().parent().parent();
                let form = wrapper.find('.hidden-form');
                let infos = wrapper.find('.infos');

                form.hide();
                infos.show();
                cancelButton.hide();
                editButton.show();
            });

            // Password specifications
            $('#password').on('change', function () {
                let password = $(this).val();
                if (null === password || blankStringRegex.test(password) ) {
                    $('#new_password').attr('disabled', 'disabled');
                    $('#new_password_confirmation').attr('disabled', 'disabled');
                } else {
                    $('#new_password').removeAttr('disabled');
                    $('#new_password_confirmation').removeAttr('disabled');
                }
            });
        });
    </script>

@endsection
