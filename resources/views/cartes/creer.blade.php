@extends('layouts.app')

@section('title', 'Créer une carte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                	<form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="matiere" class="col-md-4 col-form-label text-md-right">Matière</label>
                            <div class="col-md-6">
                                <select class="form-control" id="matiere" name="matiere">
                                    @foreach($matieres as $matiere)
                                        <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="recto" class="col-md-4 col-form-label text-md-right">Recto de la carte</label>
                            <div class="col-md-6">
                                <textarea id="recto" class="form-control" name="recto" value="{{ old('recto') }}" required autofocus></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="verso" class="col-md-4 col-form-label text-md-right">Verso de la carte</label>
                            <div class="col-md-6">
                                <textarea id="verso" class="form-control" name="verso" value="{{ old('verso') }}" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group form-check row">
                            <div class="col-md-6 offset-md-4">
                                <input id="verso" type="checkbox" class="form-check-input" name="public" value="1">
                                <label for="public" class="form-check-label">Recto verso interchangeables ?</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sauvegarder
                                </button>
                                <a class="btn btn-secondary" href="{{ route('cartes.index') }}">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
