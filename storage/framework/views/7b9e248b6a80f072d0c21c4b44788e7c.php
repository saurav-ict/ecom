<?php $__env->startSection('title', 'Edit Customer'); ?>
<?php $__env->startSection('page-title', 'Edit Customer'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.customers.index')); ?>" class="text-decoration-none" style="color:var(--primary)">Customer</a></li>
    <li class="breadcrumb-item active">Edit</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2" style="color:var(--primary)"></i>Edit Customer
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.customers.update', $customer)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <?php echo $__env->make('admin.customers._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Update</button>
                            <a href="<?php echo e(route('admin.customers.index')); ?>" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/customers/edit.blade.php ENDPATH**/ ?>