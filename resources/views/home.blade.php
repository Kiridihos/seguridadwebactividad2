@extends('layouts.app')

@section('content')'
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ver tareas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection