<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,.08);
            padding: 40px;
        }

        .login-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
        }

        .login-brand .icon {
            width: 40px;
            height: 40px;
            background: #4f46e5;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
        }

        .login-brand .title {
            font-size: 20px;
            font-weight: 700;
            color: #1e1e2d;
        }

        .login-brand .subtitle {
            font-size: 12px;
            color: #888;
        }

        h4 {
            font-size: 18px;
            font-weight: 600;
            color: #1e1e2d;
            margin-bottom: 4px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #444;
        }

        .form-control {
            border-radius: 8px;
            border-color: #e0e0ea;
            font-size: 14px;
            padding: 10px 14px;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        }

        .input-group-text {
            border-radius: 8px 0 0 8px;
            border-color: #e0e0ea;
            background: #f8f8fc;
            color: #888;
        }

        .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }

        .btn-login {
            background: #4f46e5;
            border: none;
            border-radius: 8px;
            padding: 11px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .3px;
            transition: background .2s;
        }

        .btn-login:hover {
            background: #4338ca;
        }

        .form-check-input:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-brand">
            <div class="icon"><i class="bi bi-bag-heart-fill"></i></div>
            <div>
                <div class="title">EcomAdmin</div>
                <div class="subtitle">Administration Panel</div>
            </div>
        </div>

        <h4>Welcome back</h4>
        <p class="text-muted mb-4" style="font-size:13px">Sign in to your admin account</p>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2 mb-3" style="font-size:13px;border-radius:8px;border:none">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e(old('email')); ?>" placeholder="admin@example.com" autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••••">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember" style="font-size:13px">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login btn-primary w-100 text-white">
                Sign In <i class="bi bi-arrow-right ms-1"></i>
            </button>
        </form>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/ecom/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>