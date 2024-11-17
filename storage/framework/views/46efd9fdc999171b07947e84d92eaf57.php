
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
        <?php if(session('success')): ?>
            <div class="message success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Pesan error jika login gagal -->
        <?php if($errors->has('error')): ?>
            <div class="message error"><?php echo e($errors->first('error')); ?></div>
        <?php endif; ?>

        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required autocomplete="email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            
            <button type="submit">Login</button>
        </form>
        
    </div>
</body>
</html>
<?php /**PATH D:\laragon\www\Bengkel-Niken-Power-Streeng\resources\views/login.blade.php ENDPATH**/ ?>