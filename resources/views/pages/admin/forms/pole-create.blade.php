@extends('templates.admin')

@section('admin.title', 'Créer un nouveau pôle')

@section('admin.content')
    <form action="{{route('admin.poles.create')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input id="title" class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
@endsection
