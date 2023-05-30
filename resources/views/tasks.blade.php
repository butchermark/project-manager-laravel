
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
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @unless(count($tasks) == 0)
        @foreach ($tasks as $task)
        <tr>
            <td><a href="/task/{{$task->id}}">{{$task->title}}</a></td>
            <td>{{$task->description}}</td>
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



