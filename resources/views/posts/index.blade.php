@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Posts</h1>
		<a href="{{ route('posts.create') }}" class="btn btn-primary">Nuevo post</a>
	</div>

	@if (session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
	@endif

	@if (isset($posts) && $posts->count())
		<div class="table-responsive">
			<table class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th>ID</th>
						<th>Titulo</th>
						<th>Contenido</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>{{ \Illuminate\Support\Str::limit($post->content, 80) }}</td>
							<td class="text-center">
								<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info text-white">Ver</a>
								<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Editar</a>

								<form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar este post?')">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="alert alert-secondary" role="alert">
			No hay posts todavia.
		</div>
	@endif
</div>
@endsection
