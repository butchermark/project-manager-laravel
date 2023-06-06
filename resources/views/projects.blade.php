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
@include('projects.modals.create')
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Archived</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @unless(count($projects) == 0)
        @foreach ($projects as $project)
        <tr>
            <td><a href="/project/{{$project->id}}">{{$project->title}}</a></td>
            <td>{{$project->description}}</td>
            <td>{{$project->status}}</td>
            <td>{{$project->is_archived}}</td>
            <td>
                <form>
                    <button><a href="/project/{{$project->id}}/edit">Edit</a></button>
                </form>
                @if($project->is_archived)
                <form action="{{ route('projects.unarchive', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Unarchive</button>
                </form>
                @else
                <form action="{{ route('projects.archive', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Archive</button>
                </form>
                @endif
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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



