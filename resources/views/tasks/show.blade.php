@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Detalle de task</h1>
		<a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
	</div>

	@if (empty($task))
		<div class="alert alert-warning" role="alert">
			No se encontro la task.
		</div>
	@else
		<div class="card">
			<div class="card-body">
				<h2 class="h5">{{ $task->title }}</h2>
				<p class="text-muted mb-2">ID: {{ $task->id }}</p>
				<hr>
				<p class="mb-0">{{ $task->description }}</p>
			</div>
			<div class="card-footer d-flex gap-2">
				<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>

				<form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger" onclick="return confirm('Eliminar esta task?')">Eliminar</button>
				</form>
			</div>
		</div>
	@endif
</div>
@endsection
