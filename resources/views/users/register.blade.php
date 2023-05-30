<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Registration</h1>
    @csrf
    <div>
    <form method="POST" action="/users">
        <label for="name">
        </label>
        <input type="text" name="name" />
        @error('name')
        <p>{{ $message}}</p>
        @enderror

        <label for="email">
        </label>
        <input type="text" name="email" />
        @error('email')
        <p>{{ $message}}</p>
        @enderror

        <label for="password">
        </label>
        <input type="text" name="password" />
        @error('password')
        <p>{{ $message}}</p>
        @enderror

        <div>
          <p> Already have an account? <a href="/login">Login</a></p>
        </div>
        </form>
    </div>
</body>
</html>