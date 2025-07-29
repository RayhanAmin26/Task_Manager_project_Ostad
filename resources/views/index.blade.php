<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold text-center mb-6">Task Manager</h1>

        <!-- Add Task Form -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="flex space-x-2">
                <input type="text" name="title" placeholder="Enter a new task"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required />
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Add Task
                </button>
            </div>
        </form>

        <!-- Task List -->
        @if ($tasks->isEmpty())
            <p class="text-center text-gray-500">No tasks found.</p>
        @else
            <ul class="space-y-2">
                @foreach ($tasks as $task)
                    <li class="flex justify-between items-center bg-gray-200 px-4 py-2 rounded-lg">
                        <span class="text-gray-800">{{ $task->title }}</span>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold cursor-pointer">
                                Delete
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Success Message -->
        @if (session('success'))
            <div class="mt-4 text-green-600 text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>
