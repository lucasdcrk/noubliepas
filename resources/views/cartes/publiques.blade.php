@extends('layouts.app')

@section('title', 'Cartes publiques')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
					<div class="accordion" id="accordionExample">
						@foreach($matieres as $matiere)
						  <div class="card">
						    <div class="card-header" id="header-{{ $matiere->id }}">
						      <h2 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#a{{ $matiere->id }}">
						          {{ $matiere->nom }}
						        </button>
						      </h2>
						    </div>
						
						    <div id="a{{ $matiere->id }}" class="collapse" data-parent="#accordionExample">
						      <div class="card-body">
						        @foreach($matiere->cartes()->where('public', true)->get() as $carte)
						        {{ $carte->recto }}
						        @endforeach
						      </div>
						    </div>
						  </div>
					  	@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
