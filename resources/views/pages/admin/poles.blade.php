@extends('templates.admin')

@section('admin.title', 'Pôles')

@section('admin.content.header.options')
    <a href="{{route('admin.poles.create')}}" class="btn btn-secondary d-table">Créer un pôle</a>
@endsection

@section('admin.description', 'Créer et modifier tous les pôles du site.')

@section('admin.content')
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Titre</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($poles as $pole)
            <tr>
                <td class="align-middle">{{$pole->title}}</td>
                <td class="text-right">
                    <a href="{{route('admin.poles.edit', ['pole' => $pole])}}" class="btn btn-outline-secondary">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
