<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #0D1B2A, #1B263B);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-login {
            background: #0D1B2A;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>

</body>
</html><?php /**PATH D:\website_sekolah\resources\views/layouts/auth.blade.php ENDPATH**/ ?>