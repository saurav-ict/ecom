<?php $__env->startSection('title', 'Properties'); ?>
<?php $__env->startSection('page-title', 'Properties'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Properties</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-sliders me-2" style="color:var(--primary)"></i>All Properties</span>
            <a href="<?php echo e(route('admin.properties.create')); ?>" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Property
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Options</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($property->id); ?></td>
                            <td class="fw-500"><?php echo e($property->name); ?></td>
                            <td>
                                <span class="badge bg-light text-dark border"><?php echo e($property->options_count); ?></span>
                            </td>
                            <td>
                                <?php if($property->is_active): ?>
                                    <span class="badge-active">Active</span>
                                <?php else: ?>
                                    <span class="badge-inactive">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted" style="font-size:13px"><?php echo e($property->created_at->format('d M Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.properties.edit', $property)); ?>"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.properties.destroy', $property)); ?>" method="POST"
                                      class="d-inline" data-confirm="Delete this property and all its options?">
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
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No properties found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($properties->hasPages()): ?>
            <div class="card-footer">
                <?php echo e($properties->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/properties/index.blade.php ENDPATH**/ ?>