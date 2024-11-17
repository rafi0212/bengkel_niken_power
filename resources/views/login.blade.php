
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <!-- Pesan sukses jika registrasi berhasil -->
        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        <!-- Pesan error jika login gagal -->
        @if ($errors->has('error'))
            <div class="message error">{{ $errors->first('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required autocomplete="email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            
            <button type="submit">Login</button>
        </form>
        
    </div>
</body>
</html>
