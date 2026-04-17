@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Crear post</h1>
		<a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
	</div>

	@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Revisa los campos:</strong>
			<ul class="mb-0">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="card">
		<div class="card-body">
			<form action="{{ route('posts.store') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label">Titulo</label>
					<input
						type="text"
						class="form-control"
						id="title"
						name="title"
						value="{{ old('title') }}"
						required
					>
				</div>

				<div class="mb-3">
					<label for="content" class="form-label">Contenido</label>
					<textarea
						class="form-control"
						id="content"
						name="content"
						rows="5"
						required
					>{{ old('content') }}</textarea>
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</div>
@endsection
