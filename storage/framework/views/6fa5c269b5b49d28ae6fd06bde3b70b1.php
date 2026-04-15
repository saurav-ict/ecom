<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> | Admin Panel</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

<!-- Sidebar Overlay (mobile) -->
<div id="sidebar-overlay"></div>

<!-- ── Sidebar ── -->
<aside id="sidebar">
    <a href="#" class="sidebar-brand">
        <div class="brand-icon"><i class="bi bi-bag-heart-fill"></i></div>
        <span>EcomAdmin</span>
    </a>

    <nav class="sidebar-nav">
        <div class="nav-label">Main</div>
        <div class="nav-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
        </div>

        <div class="nav-label">Catalog</div>
        <div class="nav-item">
            <a href="<?php echo e(route('admin.categories.index')); ?>"
               class="<?php echo e(request()->is('admin/categories*') ? 'active' : ''); ?>">
                <i class="bi bi-tags-fill"></i> Categories
            </a>
        </div>
        <div class="nav-item">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="<?php echo e(request()->is('admin/products*') ? 'active' : ''); ?>">
                <i class="bi bi-box-seam-fill"></i> Products
            </a>
        </div>
        <div class="nav-item">
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="<?php echo e(request()->is('admin/brands*') ? 'active' : ''); ?>">
                <i class="bi bi-award-fill"></i> Brands
            </a>
        </div>
        <div class="nav-item">
            <a href="<?php echo e(route('admin.properties.index')); ?>" class="<?php echo e(request()->is('admin/properties*') ? 'active' : ''); ?>">
                <i class="bi bi-sliders"></i> Properties
            </a>
        </div>

        <div class="nav-label">Sales</div>
        <div class="nav-item">
            <a href="#">
                <i class="bi bi-cart-fill"></i> Orders
                <span class="nav-badge">12</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="#">
                <i class="bi bi-people-fill"></i> Customers
            </a>
        </div>

        <div class="nav-label">System</div>
        <div class="nav-item">
            <a href="#">
                <i class="bi bi-gear-fill"></i> Settings
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></div>
            <div class="info">
                <div class="name"><?php echo e(auth()->user()->name); ?></div>
                <div class="role"><?php echo e(ucfirst(auth()->user()->role)); ?></div>
            </div>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="ms-1">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background:none;border:none;padding:0;cursor:pointer;">
                    <i class="bi bi-box-arrow-right" style="color:rgba(255,255,255,.3);font-size:16px"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- ── Topbar ── -->
<header id="topbar">
    <button class="topbar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="topbar-breadcrumb">
        <p class="page-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none" style="color:var(--primary)">Home</a></li>
                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ol>
        </nav>
    </div>

    <div class="topbar-actions">
        <a href="#" class="topbar-btn">
            <i class="bi bi-search"></i>
        </a>
        <a href="#" class="topbar-btn">
            <i class="bi bi-bell"></i>
            <span class="badge-dot"></span>
        </a>
        <a href="#" class="topbar-btn">
            <i class="bi bi-envelope"></i>
        </a>
        <div class="dropdown ms-1">
            <button class="topbar-avatar dropdown-toggle" data-bs-toggle="dropdown" style="border:none;"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="border-radius:10px; font-size:14px; min-width:180px;">
                <li><a class="dropdown-item py-2" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item py-2 text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- ── Main ── -->
<main id="main">
    <div class="content-wrapper">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('js/admin/app.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/ecom/resources/views/admin/layout.blade.php ENDPATH**/ ?>