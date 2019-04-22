@extends('layouts.app')

@section('title', 'Réviser')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Carte #{{ $carte->id }} ({{ $carte->matiere->nom }})</div>
                    <div class="card-body">
                        {{ $carte }}
                        <a class="btn btn-success" href="">J'ai réusssi</a>
                        <a class="btn btn-danger" href="">J'ai éprouvé des difficultés</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
