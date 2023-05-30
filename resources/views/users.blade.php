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

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified At</th>
        </tr>
    </thead>
    <tbody>        
        @foreach ($users as $user)
            <tr>
                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>

