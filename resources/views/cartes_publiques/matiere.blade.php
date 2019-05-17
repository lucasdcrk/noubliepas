@extends('layouts.app')

@section('title', $matiere->nom)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $matiere->nom }}</div>
                    <div class="card-body">
                        <p>Il y a {{ count($matiere->cartes_publiques) }} carte(s) publique(s) dans cette matière</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Recto</th>
                                <th>Verso</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matiere->cartes_publiques as $carte)
                                <tr>
                                    <td>{{ $carte->recto }}</td>
                                    <td>{{ $carte->verso }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-primary" href="{{ route('cartes-publiques.afficher', ['id' => $carte->id]) }}">Copier</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

