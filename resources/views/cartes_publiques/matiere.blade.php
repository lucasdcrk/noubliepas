@extends('layouts.app')

@section('title', $matiere->nom)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $matiere->nom }}</div>
                    <div class="card-body">
                        <p>Il y a {{ count($matiere->cartes) }} cartes publiques dans cette matière</p>
                        @foreach($matiere->cartes as $carte)
                            <a class="btn btn-primary my-1" href="{{ route('cartes-publiques.afficher', ['id' => $carte->id]) }}">{{ $carte->recto }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

