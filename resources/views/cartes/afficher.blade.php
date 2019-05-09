@extends('layouts.app')

@section('title', 'Afficher une carte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">@yield('title')</div>
                <div class="card-body">
                	<ul class="list-group">
                        <li class="list-group-item"><strong>Matière :</strong> {{ $carte->matiere->nom }}</li>
                        <li class="list-group-item"><strong>Recto :</strong> {{ $carte->recto }}</li>
                        <li class="list-group-item"><strong>Verso :</strong> {{ $carte->verso }}</li>
                        <li class="list-group-item"><strong>Date de création :</strong> {{ $carte->created_at->diffForHumans() }}</li>
                        <li class="list-group-item"><strong>Dernière modification :</strong> {{ $carte->updated_at->diffForHumans() }}</li>
                    </ul>
                    <a href="{{ route('cartes.supprimer', $carte->id) }}" class="btn btn-danger mt-2">Supprimer</a>
                </div>
            </div>
            <a href="{{ route('cartes.index') }}" class="btn btn-primary mt-2">Retour</a>
        </div>
    </div>
</div>
@endsection
