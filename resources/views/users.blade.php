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
        padding: 8px;
        text-align: left;
        border: 1px solid black;
    }
</style>
</head>

<body>
    <x-navbar />


<h1>{{ $heading }}</h1>
@include('users.modals.create')

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Last login</th>
            <th>Suspended</th>
            <th></th>
        </tr>
    </thead>
    <tbody>        
        @foreach ($users as $user)
            <tr>
                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->last_login}}</td>
                <td>{{ $user->is_suspended ? 'Suspended' : 'Active' }}</td>
                <td>
                    <button><a href="/user/{{ $user->id }}/edit">Edit</a></button>
                    <form action="{{ route('users.suspend', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Suspend</button></form>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </form>
                 </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>

