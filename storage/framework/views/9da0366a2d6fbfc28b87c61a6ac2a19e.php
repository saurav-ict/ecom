<?php $__env->startSection('title', 'Brands'); ?>
<?php $__env->startSection('page-title', 'Brands'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Brands</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-award-fill me-2" style="color:var(--primary)"></i>All Brands</span>
            <a href="<?php echo e(route('admin.brands.create')); ?>" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Brand
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($brand->id); ?></td>
                            <td>
                                <?php if($brand->logo): ?>
                                    <img src="<?php echo e(asset('storage/' . $brand->logo)); ?>"
                                         alt="<?php echo e($brand->name); ?>"
                                         style="width:40px;height:40px;object-fit:contain;border-radius:6px;border:1px solid #eee;padding:3px;">
                                <?php else: ?>
                                    <div style="width:40px;height:40px;background:#f4f6fb;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-500"><?php echo e($brand->name); ?></td>
                            <td>
                                <?php if($brand->is_active): ?>
                                    <span class="badge-active">Active</span>
                                <?php else: ?>
                                    <span class="badge-inactive">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted" style="font-size:13px"><?php echo e($brand->created_at->format('d M Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.brands.edit', $brand)); ?>"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.brands.destroy', $brand)); ?>" method="POST" class="d-inline"
                                    data-confirm="Delete this brand?">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No brands found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($brands->hasPages()): ?>
            <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                <?php echo e($brands->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/brands/index.blade.php ENDPATH**/ ?>