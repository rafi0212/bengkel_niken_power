<!-- resources/views/superadmin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Superadmin</title>
</head>
<body>
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <h1>Selamat datang di Dashboard Superadmin</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
