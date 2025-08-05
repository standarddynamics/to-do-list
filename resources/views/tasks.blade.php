<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" >
</head>
<body class="bg-light">
    <header class="container p-3">
        <img src="{{ Vite::asset('assets/logo.png') }}" alt="MLP" />
    </header>
    <main class="container p-3 mt-2">
        <div class="row">
            <section class="col-4">
                <form method="post" action="{{ route('tasks') }}" class="row g-3">
                    @csrf
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Insert task name" aria-label="Task name" required />
                    <button type="submit" class="btn btn-primary mb-3 btn-sm">Add</button>
                </form>
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
                                                                <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                                                            </form>
                                                        </div>
                                                        <div class="mx-1">
                                                            <form method="post" action="{{ route('tasks.delete', $task) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button></div>
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
    </main>
    <footer class="container mt-5">
        <div class="row">
            <div class="col text-center"><small>Copyright &copy; {{ date('Y') }} All rights reserved.</small></div>
        </div>
    </footer>
</body>
</html>
