<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('page-title', 'Products'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Products</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-box-seam-fill me-2" style="color:var(--primary)"></i>All Products</span>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Product
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($product->id); ?></td>
                            <td>
                                <?php if($product->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                         style="width:40px;height:40px;object-fit:cover;border-radius:6px;border:1px solid #eee;">
                                <?php else: ?>
                                    <div style="width:40px;height:40px;background:#f4f6fb;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-500"><?php echo e($product->name); ?></td>
                            <td><code style="font-size:12px"><?php echo e($product->sku ?? '—'); ?></code></td>
                            <td class="text-muted"><?php echo e($product->brand?->name ?? '—'); ?></td>
                            <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                            <td><?php echo e($product->stock); ?></td>
                            <td>
                                <?php if($product->is_active): ?>
                                    <span class="badge-active">Active</span>
                                <?php else: ?>
                                    <span class="badge-inactive">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST"
                                      class="d-inline" data-confirm="Delete this product?">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No products found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($products->hasPages()): ?>
            <div class="card-footer">
                <?php echo e($products->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ecom/resources/views/admin/products/index.blade.php ENDPATH**/ ?>