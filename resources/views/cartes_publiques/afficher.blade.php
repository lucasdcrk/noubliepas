@extends('layouts.app')

@section('title', 'Afficher une carte publique')

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
					</ul>
					<a href="{{ route('cartes-publiques.copier', $carte->id) }}" class="btn btn-primary mt-2">Copier </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
