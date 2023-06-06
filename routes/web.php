<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;


Route::get('/', [UserController::class, 'create']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/task/{id}', function ($id) {
    return view('task', [
        "task" => Task::find($id)
    ]);
});

Route::get('/users', function () {
    return view('users', [
        'heading' => "Users",
        'users' => User::orderBy('name')->get()
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
        'projects' => Project::orderBy('title')->get()
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

Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::post('tasks/{task}', [TaskController::class, 'update'])->name('tasks.edit');

Route::put('tasks/{task}/archive', [TaskController::class, 'archive'])->name('tasks.archive');

Route::put('tasks/{task}/unarchive', [TaskController::class, 'unarchive'])->name('tasks.unarchive');

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');

Route::post('/users/logout', [UserController::class, 'logout'])->name('users.logout');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::put('/users/{user}/suspend', [UserController::class, 'suspend'])->name('users.suspend');

Route::put('/users/{user}/unsuspend', [UserController::class, 'unsuspend'])->name('users.unsuspend');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::put('/projects/{project}/archive', [ProjectController::class, 'archive'])->name('projects.archive');

Route::put('/projects/{project}/unarchive', [ProjectController::class, 'unarchive'])->name('projects.unarchive');

Route::put('/tasks/{user}/add', [ProjectController::class, 'addUserToTask'])->name('tasks.addUserToTask');
