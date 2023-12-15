@extends('layouts.app')

@section('content')
    <h1>Add Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}" style="max-width: 400px; margin: 20px auto; position: relative;">
        @csrf
        <div>
        <label for="description" style="display: block; margin-bottom: 8px;">Description:</label>
        <input type="text" name="description" required style="width: 50%; padding: 8px; margin-bottom: 12px; box-sizing: border-box;">

        <label for="due_date" style="display: block; margin-bottom: 8px;">Due Date:</label>
        <input type="date" name="due_date" style="width: 50%; padding: 8px; margin-bottom: 12px; box-sizing: border-box;">
        </div>
        <button type="submit" style="background-color: #3498db; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; position: absolute; left: 5px;">Add Task</button>

        <div style="position: absolute; right: 50%;">
            <a href="{{ route('tasks.index') }}" style="text-decoration: none; color: #3498db;">Back to Tasks</a>
        </div>
    </form>
@endsection

