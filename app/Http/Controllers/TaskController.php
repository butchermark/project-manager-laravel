<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('tasks', compact('users'), [
            'heading' => "Tasks",
            'tasks' => Task::orderBy('title')->get()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', 'min:3'],
            'status' => ['required', 'min:3'],
            'is_archived' => [],
            'user_id' => [],
            'project_id' => [],
            'description' => ['required', 'min:3'],
        ]);

        $formFields['is_archived'] = false;
        Task::create($formFields);
        return redirect('/tasks')->with('message', 'Task created successfully!');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('message', 'Task deleted successfully!');
    }
    public function archive(Task $task)
    {
        $task->is_archived = true;
        $task->save();
        return redirect('/tasks')->with('message', 'Task archived successfully!');
    }
    public function unarchive(Task $task)
    {
        $task->is_archived = false;
        $task->save();
        return redirect('/tasks')->with('message', 'Task unarchived successfully!');
    }

    public function addUserToTask(Task $task, $userid)
    {
        $task->user_id = $userid;
        $task->save();
        return redirect('/tasks')->with('message', 'User added to task successfully!');
    }
}
