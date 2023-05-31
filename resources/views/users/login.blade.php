<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <h1>Login Page</h1>
  <div>
    <form action={{route("users.authenticate")}} method="POST">
      @csrf
      <div>
        <label for="email">
        </label>
        <input class="border border-gray-200 rounded p-2 " type="text" name="email" placeholder="Email" />
        @error('email')
        <p>{{ $message}}</p>
        @enderror
      </div>
      <div>
        <label for="password">
        </label>
        <input class="border border-gray-200 rounded p-2 " type="text" name="password" placeholder="Password" />
        @error('password')
        <p>{{ $message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <button type="submit" class="bg-laravel rounded py-2 px-4">
          Login
        </button>
      </div>
        </form>
    </div>
</body>
</html>
