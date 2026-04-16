<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('name', $brand->name ?? '')); ?>">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label class="form-label">Logo</label>

    <?php if(isset($brand) && $brand->logo): ?>
        <div class="mb-2">
            <img src="<?php echo e(asset('storage/' . $brand->logo)); ?>" alt="Current Logo"
                 style="height:60px;object-fit:contain;border-radius:8px;border:1px solid #eee;padding:4px;">
        </div>
    <?php endif; ?>

    <input type="file" name="logo" accept="image/*"
           class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           data-preview="#logoPreview">
    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <img id="logoPreview" src="#" alt="Preview"
         style="display:none;margin-top:10px;height:60px;object-fit:contain;border-radius:8px;border:1px solid #eee;padding:4px;">
</div>

<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
        <?php echo e(old('is_active', $brand->is_active ?? true) ? 'checked' : ''); ?>>
    <label class="form-check-label" for="is_active">Active</label>
</div>
<?php /**PATH /var/www/html/ecom/resources/views/admin/brands/_form.blade.php ENDPATH**/ ?>