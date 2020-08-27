@extends('templates.admin')

@section('admin.title', isset($pole) ? $pole->title : 'Créer un nouveau pôle')

@section('admin.content')
    <a href="{{route('admin.poles')}}" class="btn btn-outline-secondary mb-3">< Retour</a>

    @include('components.alerts.errors')
    @include('components.alerts.success')

    <form action="{{route('admin.poles.store')}}" method="POST">
        @csrf
        @include('components.forms.input', ['name' => 'title', 'label' => 'Titre', 'value' => isset($pole) ? $pole->title : null])
        @include('components.forms.textarea', ['name' => 'description', 'label' => 'Description', 'rows' => 5, 'value' => isset($pole) ? $pole->description : null])

        @include('components.forms.submit', ['title' => 'Sauvegarder'])
    </form>
@endsection
