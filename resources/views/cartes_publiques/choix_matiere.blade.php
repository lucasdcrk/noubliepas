@extends('layouts.app')

@section('title', 'Choix matière')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Matière</div>
                    <div class="card-body">
                        @isset($_GET['vide'])
                            <div class="alert alert-primary" role="alert">
                                Il n'y aucune carte dans cette matière.
                            </div>
                        @endisset
                        @foreach($matieres as $matiere)
                            <a class="btn btn-primary my-1" href="{{ route('cartes-publiques.matiere', ['id' => $matiere->id]) }}">{{ $matiere->nom }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

