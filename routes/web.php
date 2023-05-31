<?php

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'create']);


Route::get('/tasks', function () {
    return view('tasks', [
        'heading' => "Tasks",
        'tasks' => Task::all()
    ]);
});

Route::get('/task/{id}', function ($id) {
    return view('task', [
        "task" => Task::find($id)
    ]);
});

Route::get('/users', function () {
    return view('users', [
        'heading' => "Users",
        'users' => User::all()
    ]);
});

Route::get('/user/{id}', function ($id) {
    return view('user', [
        'user' => User::find($id)
    ]);
});

Route::get('/projects', function () {
    return view('projects', [
        'heading' => "Projects",
        'projects' => Project::all()
    ]);
});

Route::get('/project/{id}', function ($id) {
    return view('project', [
        'project' => Project::find($id)
    ]);
});

Route::get('/login', function () {
    return view('/users/login');
});



Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');

Route::post('/users/logout', [UserController::class, 'logout'])->name('users.logout');
