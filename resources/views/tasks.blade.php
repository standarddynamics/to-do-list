@extends('layouts.app')

@section('content')
    <div class="container p-3 mt-2">
        <div class="row">
            <section class="col-4">
                <div>
                    <form method="post" action="{{ route('tasks') }}" class="row g-3">
                        @csrf
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control form-control-sm" 
                            placeholder="Insert task name" 
                            aria-label="Task name" 
                            required 
                            autofocus />
                        <button type="submit" class="btn btn-primary mb-3 btn-sm">Add</button>
                    </form>
                </div>
            </section>
            <section class="col-8">
                <div class="rounded bg-white p-3 border">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="row justify-content-evenly">
                                            <div class="col-9">
                                                <span @class([
                                                    'text-decoration-line-through' => $task['is_completed']
                                                ])>
                                                    {{ $task['name'] }}
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                @if (! $task['is_completed'])
                                                    <div class="d-flex justify-content-end">
                                                        <div class="mx-1">
                                                            <form method="post" action="{{ route('tasks.complete', $task) }}">
                                                                @csrf
                                                                <button 
                                                                    type="submit" 
                                                                    class="btn btn-success" 
                                                                    title="Mark As Complete">
                                                                    <i class="bi bi-check-lg"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="mx-1">
                                                            <form method="post" action="{{ route('tasks.delete', $task) }}">
                                                                @csrf
                                                                <button 
                                                                    type="submit" 
                                                                    class="btn btn-danger" 
                                                                    title="Delete Task">
                                                                    <i class="bi bi-x-lg"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection