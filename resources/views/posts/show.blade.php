@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Detalle del post</h1>
		<a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
	</div>

	@if (empty($post))
		<div class="alert alert-warning" role="alert">
			No se encontro el post.
		</div>
	@else
		<div class="card">
			<div class="card-body">
				<h2 class="h5">{{ $post->title }}</h2>
				<p class="text-muted mb-2">ID: {{ $post->id }}</p>
				<hr>
				<p class="mb-0">{{ $post->content }}</p>
			</div>
			<div class="card-footer d-flex gap-2">
				<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>

				<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger" onclick="return confirm('Eliminar este post?')">Eliminar</button>
				</form>
			</div>
		</div>
	@endif
</div>
@endsection
