@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Tasks</h1>
		<a href="{{ route('tasks.create') }}" class="btn btn-primary">Nueva task</a>
	</div>

	@if (session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
	@endif

	@if (isset($tasks) && $tasks->count())
		<div class="table-responsive">
			<table class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th>ID</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tasks as $task)
						<tr>
							<td>{{ $task->id }}</td>
							<td>{{ $task->title }}</td>
							<td>{{ \Illuminate\Support\Str::limit($task->description, 80) }}</td>
							<td class="text-center">
								<a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info text-white">Ver</a>
								<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Editar</a>

								<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar esta task?')">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="alert alert-secondary" role="alert">
			No hay tasks todavia.
		</div>
	@endif
</div>
@endsection
