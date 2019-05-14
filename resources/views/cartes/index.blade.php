@extends('layouts.app')

@section('title', 'Vos cartes')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">@yield('title') <a class="float-right" href="{{ route('cartes.creer') }}">Nouvelle carte</a></div>

		<div class="card-body">
			@isset($_GET['sauvegardé'])
			<div class="alert alert-success" role="alert">
			  Vos modifications ont bien étés enregistrées !
			</div>
			@endisset
			@isset($_GET['supprimé'])
			<div class="alert alert-warning" role="alert">
			  Cette carte a bien été supprimée !
			</div>
			@endisset
		  @if(count($cartes) > 0)
			<table class="table">
				<thead>
					<tr>
						<th>Matière</th>
						<th>Recto</th>
						<th>Verso</th>
						<th>Dernière révision</th>
						<th>Crée le</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cartes as $carte)
						<tr>
							<td>{{ $carte->matiere->nom }}</td>
							<td>{{ $carte->recto }}</td>
							<td>{{ $carte->verso }}</td>
							<td>{{ $carte->derniere_revision->diffForHumans() }}</td>
							<td>{{ $carte->created_at->format('d/m/Y à H:i') }}</td>
							<td>
								<div class="btn-group btn-group-sm">
								  <a href="{{ route('cartes.afficher', $carte->id) }}" class="btn btn-primary">Afficher</a>
								  <a class="btn btn-warning" href="{{ route('cartes.editer', $carte->id) }}">Editer</a>
									<a class="btn btn-danger" href="{{ route('cartes.supprimer', $carte->id) }}">Supprimer</a>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		  @else
			<div class="alert alert-info" role="alert">
			  <h3>Aucune carte trouvée</h3>
			  Vous n'avez aucune carte pour le moment, créez une carte et elle apparaitra ici.
			  <hr>
			  <a class="btn btn-primary" href="{{ route('cartes.creer') }}">Créer une carte</a>
			</div>
		  @endif
		</div>
	</div>
</div>
@endsection
