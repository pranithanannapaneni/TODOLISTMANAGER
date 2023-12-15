@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="{{ route('tasks.create') }}" style="background-color: #3498db; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px;">Add Task</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{ $task->getInfo() }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->isCompleted() ? 'Completed' : 'Pending' }}</td>
                    <td>
                        @unless($task->isCompleted())
                            <form method="POST" action="{{ route('tasks.complete', $task) }}">
                                @csrf
                                <button type="submit">Complete</button>
                            </form>
                        @endunless
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @if (count($tasks) > 0)
                            <form method="POST" action="{{ route('tasks.undo') }}">
                                @csrf
                                <button type="submit">Undo</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


