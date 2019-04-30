@extends('layouts.app')

@section('title', 'Réviser')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Carte #{{ $carte->id }} ({{ $carte->matiere->nom }})</div>
                    <div class="card-body">
                        <h6>Question (en {{ $carte->matiere->nom }}) :</h6>
                        <h3>{{ $carte->recto }} ?</h3>
                        <hr>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Afficher la réponse
                        </button>
                        <div class="collapse mt-3" id="collapseExample">
                            <div class="card card-body mb-3">
                                <h6>Réponse :</h6>
                                <h3>{{ $carte->verso }}</h3>
                            </div>
                            <a class="btn btn-success" href="">Je le savais</a>
                            <a class="btn btn-danger" href="">J'ai oublié</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
