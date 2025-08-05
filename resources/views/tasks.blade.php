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
    <main class="container p-3">
        <div class="row">
            <section class="col-4">
                <form method="post" action="/tasks/add" class="row g-3">
                    <input type="text" name="task-name" class="form-control form-control-sm" placeholder="Insert task name" aria-label="Task name" required />
                    <button type="submit" class="btn btn-primary mb-3 btn-sm">Add</button>
                </form>
            </section>
            <section class="col-8">
                <div class="rounded bg-white p-3 fw-lighter">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="fw-light">#</th>
                                <th class="fw-light">Task</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-light">1</td>
                                <td>Task name</td>
                                <td><button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i></button></td>
                                <td><button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
