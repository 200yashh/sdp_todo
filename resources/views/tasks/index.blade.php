<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">To-Do List</h1>

        <form action="/tasks" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="New Task" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>

        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>
                    </form>

                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
