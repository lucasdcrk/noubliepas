@extends('layouts.app')

@section('title', 'Réviser')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Choisissez une matière à réviser</div>
                    <div class="card-body">
                        @isset($_GET['vide'])
                            <div class="alert alert-success" role="alert">
                                Il n'y aucune carte à réviser dans cette matière.
                            </div>
                        @endisset
                        <a class="btn btn-primary" href="{{ route('reviser.tout') }}">Toutes matières confondues</a>
                        @foreach($matieres as $matiere)
                            <a class="btn btn-primary my-1" href="{{ route('reviser.matiere', ['id' => $matiere->id]) }}">{{ $matiere->nom }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

