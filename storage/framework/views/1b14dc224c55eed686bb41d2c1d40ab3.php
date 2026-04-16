<?php $__env->startSection('title', 'Customers'); ?>
<?php $__env->startSection('page-title', 'Customers'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Customers</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-award-fill me-2" style="color:var(--primary)"></i>All Customers</span>
            <a href="<?php echo e(route('admin.customers.create')); ?>" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Customers
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
                    <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($customer->id); ?></td>
                            <td>
                                <?php if($customer->logo): ?>
                                    <img src="<?php echo e(asset('storage/' . $customer->logo)); ?>"
                                         alt="<?php echo e($customer->name); ?>"
                                         style="width:40px;height:40px;object-fit:contain;border-radius:6px;border:1px solid #eee;padding:3px;">
                                <?php else: ?>
                                    <div style="width:40px;height:40px;background:#f4f6fb;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-500"><?php echo e($customer->name); ?></td>
                            <td>
                                <?php if($customer->is_active): ?>
                                    <span class="badge-active">Active</span>
                                <?php else: ?>
                                    <span class="badge-inactive">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted" style="font-size:13px"><?php echo e($customer->created_at->format('d M Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.customers.edit', $customer)); ?>"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.customers.destroy', $customer)); ?>" method="POST" class="d-inline"
                                    data-confirm="Delete this customer?">
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
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No customers found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($customers->hasPages()): ?>
            <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                <?php echo e($customers->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/customers/index.blade.php ENDPATH**/ ?>