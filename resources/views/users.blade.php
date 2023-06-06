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
        @unless(count($users) == 0)     
        @foreach ($users as $user)
            <tr>
                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>{{$user->email}}</td>
                <td>{{ $user->last_login ? $user->last_login : 'Not logged yet' }}</td>
                <td>{{ $user->is_suspended ? 'Suspended' : 'Active' }}</td>
                <td>
                    <button><a href="/user/{{ $user->id }}/edit">Edit</a></button>
                    @if($user->is_suspended)
                    <form action="{{ route('users.unsuspend', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Unsuspend</button>
                    </form>
                         @else 
                            <form action="{{ route('users.suspend', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Suspend</button>
                            </form>
                    @endif
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')  
                        <button type="submit">Delete</button>
                    </form>
                 </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td colspan="2"><p>No users found</p></td>
        </tr>
        @endunless
    </tbody>
</table>
</body>
</html>

