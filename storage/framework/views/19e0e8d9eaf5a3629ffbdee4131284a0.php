<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $stats = [
            ['label' => 'Products',   'value' => App\Models\Product::count(),  'icon' => 'bi-box-seam-fill',  'bg' => 'linear-gradient(135deg,#4f46e5,#7c3aed)'],
            ['label' => 'Categories', 'value' => App\Models\Category::count(), 'icon' => 'bi-tags-fill',       'bg' => 'linear-gradient(135deg,#0ea5e9,#0284c7)'],
            ['label' => 'Brands',     'value' => App\Models\Brand::count(),    'icon' => 'bi-award-fill',      'bg' => 'linear-gradient(135deg,#f59e0b,#d97706)'],
            ['label' => 'Properties', 'value' => App\Models\Property::count(), 'icon' => 'bi-sliders',         'bg' => 'linear-gradient(135deg,#10b981,#059669)'],
        ];
    ?>

    <div class="row g-4 mb-4">
        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card" style="background: <?php echo e($stat['bg']); ?>">
                    <i class="bi <?php echo e($stat['icon']); ?> stat-icon"></i>
                    <div class="stat-value"><?php echo e($stat['value']); ?></div>
                    <div class="stat-label"><?php echo e($stat['label']); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-box-seam-fill me-2" style="color:var(--primary)"></i>Recent Products</span>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = App\Models\Product::with('brand')->latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($product->name); ?></td>
                                    <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                                    <td><?php echo e($product->stock); ?></td>
                                    <td>
                                        <?php if($product->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="text-center text-muted py-3">No products yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-tags-fill me-2" style="color:var(--primary)"></i>Recent Categories</span>
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = App\Models\Category::with('parent')->latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($category->name); ?></td>
                                    <td class="text-muted"><?php echo e($category->parent?->name ?? '—'); ?></td>
                                    <td>
                                        <?php if($category->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="3" class="text-center text-muted py-3">No categories yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>