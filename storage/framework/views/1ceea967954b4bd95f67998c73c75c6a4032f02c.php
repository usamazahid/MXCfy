<form method="POST" action="<?php echo e(route('get.product.variants.possibilities')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="variant_name"><?php echo e(__('Variant Name')); ?></label>
        <input class="form-control" name="variant_name" type="text" id="variant_name" placeholder="<?php echo e(__('Variant Name, i.e Size, Color etc')); ?>">
    </div>
    <div class="form-group">
        <label for="variant_options"><?php echo e(__('Variant Options')); ?></label>
        <input class="form-control" name="variant_options" type="text" id="variant_options" placeholder="<?php echo e(__('Variant Options separated by|pipe symbol, i.e Black|Blue|Red')); ?>">
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="button" value="<?php echo e(__('Add Variants')); ?>" class="btn btn-primary add-variants ms-2">
    </div>
</form>
<?php /**PATH /home4/nr6grat3/saas.mxclogistics.com/resources/views/product/variants/create.blade.php ENDPATH**/ ?>