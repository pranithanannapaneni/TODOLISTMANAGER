<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskHandler;
use App\TaskBuilder;
use App\Models\Task ;

class TaskController extends Controller
{
    private $tasks = [];

    public function index()
    {
        // Retrieve tasks from the database
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'due_date' => 'nullable|date',
        ]);

        $task = (new TaskBuilder())
            ->setDescription($request->input('description'))
            ->setDueDate($request->input('due_date'))
            ->build();

        // Assuming Task model is used and you have a tasks table
        Task::create([
            'description' => $task->getDescription(),
            'due_date' => $task->getDueDate(),
            'completed' => $task->isCompleted(),
        ]);

        return redirect()->route('tasks.index');
    }

    public function complete(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update(['completed' => true]);
        return redirect()->route('tasks.index');
    }
    
    public function undo()
    {
        if (!empty($this->tasks)) {
            $lastTaskId = end($this->tasks)->id;
            array_pop($this->tasks);
            return redirect()->route('tasks.index')->with('last_undo_task_id', $lastTaskId);
        }
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('tasks.index');
    }

}

