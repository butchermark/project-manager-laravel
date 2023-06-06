<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
    }

    th, td {
        padding: 8px;        text-align: left;
        border: 1px solid black;
    }
</style>
</head>

<body>
    <x-navbar />
<h1>{{ $heading }}</h1>
@include ('tasks.modals.create')
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Archived</th>
            <th>User</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @unless(count($tasks) == 0)
        @foreach ($tasks as $task)
        <tr>
            <td><a href="/task/{{$task->id}}">{{$task->title}}</a></td>
            <td>{{$task->description}}</td>
            <td>{{$task->status}}</td>
            <td>{{$task->is_archived}}</td>
            <td>{{$task->user_id}}</td>
            <td>
                <form action="{{ route('tasks.addUserToTask', $task->id) }}" method="PUT">
                    <label for="user">Add User</label>
                    <select name="user" id="user">
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Add" />
                </form>
                <form action="{{ route('tasks.edit', $task->id) }}" method="POST">
                    <button type="submit">Edit</button>
                </form>
                @if($task->is_archived)
                <form action="{{ route('tasks.unarchive', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Unarchive</button>
                </form>
                @else
                <form action="{{ route('tasks.archive', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Archive</button>
                </form>
                @endif
                
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="2"><p>No listings found</p></td>
        </tr>
        @endunless
    </tbody>
</table>
</body>

</html>



