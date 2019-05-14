@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Noublypa</h1>
                    <p>Noublypa permet d'apprendre rapidement vos cours.</p>

                    Bonjour {{ auth()->user()->name }}, vous êtes connecté !
                    <hr>
                    <a class="btn btn-primary" href="{{ route('cartes.index') }}">Gérer mes cartes</a>
                    <a class="float-right" href="{{ url('supprimer_compte') }}">Supprimer votre compte</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
