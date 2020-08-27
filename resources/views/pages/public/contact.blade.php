@extends('templates.public')

@section('page.title', 'Contact')

@section('page.content')
    <div class="row justify-content-center py-3">
        <div class="col-lg-6">
            @include('components.alerts.errors')
            @include('components.alerts.success')

            <div class="bg-light shadow-sm p-3 border">
                <h1>Contactez-nous</h1>

                <h2 class="h5 mb-0">Par email :</h2>
                <a href="mailto:actypoles@actypoles-thiers.fr">actypoles@actypoles-thiers.fr</a>
                <h2 class="h5 mb-0">Par téléphone :</h2>
                <a href="tel:0473802660">04 73 80 26 60</a>
                <h2 class="h5 mb-0">Par courrier :</h2>
                <p>
                    ACTYPOLES<br>
                    Rue du 19 mars 1962,<br>
                    63000, Thiers<br>
                </p>

                <form action="{{route('contact')}}" method="POST" class="mt-3">
                    <h2 class="h5 mb-0">Avec notre formulaire de contact :</h2>
                    @csrf
                    <div class="form-group">
                        <label for="name">Votre nom</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Votre email</label>
                        <input class="form-control" type="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="message">Votre message</label>
                        <textarea id="message" class="form-control" name="message" rows="4"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection