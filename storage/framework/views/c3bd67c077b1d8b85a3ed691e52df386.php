<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
             
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        
        <label for="status_pekerjaan">Status Pekerjaan:</label>
        <select id="status_pekerjaan" name="status_pekerjaan" required>
            <option value="Superadmin">Superadmin</option>
            <option value="Kasir">Kasir</option>
        </select>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
<?php /**PATH D:\laragon\www\Bengkel-Niken-Power-Streeng\resources\views/register.blade.php ENDPATH**/ ?>