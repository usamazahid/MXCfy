<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Store')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Store')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Store')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="pr-2">
    <a href="<?php echo e(route('store.subDomain')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
        title="<?php echo e(__('Sub Domain')); ?>" ><?php echo e(__('Sub Domain')); ?></a>

    <a href="<?php echo e(route('store.customDomain')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
        title="<?php echo e(__('Custom Domain')); ?>" ><?php echo e(__('Custom Domain')); ?></a>

    <a href="<?php echo e(route('store-resource.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        data-bs-placement="top" title="<?php echo e(__('List View')); ?>"><i class="fas fa-list"></i></a>

    <a href="#"  data-size="md" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Store')); ?>"  class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        data-bs-placement="top" title="<?php echo e(__('Create New Store')); ?>"><i class="ti ti-plus"></i></a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('store.subDomain')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Sub Domain')); ?>

    </a>
    <a href="<?php echo e(route('store.customDomain')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Custom Domain')); ?>

    </a>
    <a href="<?php echo e(route('store-resource.index')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('List View')); ?>

    </a>
    <a href="#" data-size="lg" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New User')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="ti ti-plus"></i></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(\Auth::user()->type = 'super admin'): ?>
        <div class="row">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-xxl-3">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="#" data-size="md" data-url="<?php echo e(route('user.edit',$user->id)); ?>" data-ajax-popup="true"  class="dropdown-item"><i
                                            class="ti ti-edit"></i>
                                        <span><?php echo e(__('Edit')); ?></span></a>

                                    <a href="#" data-size="md" data-url="<?php echo e(route('plan.upgrade',$user->id)); ?>" data-ajax-popup="true"  class="dropdown-item"><i class="ti ti-trophy"></i>
                                        <span><?php echo e(__('Upgrade Plan')); ?></span></a>

                                    <a class="bs-pass-para dropdown-item trigger--fire-modal-1" href="#"
                                        data-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                        data-confirm-yes="delete-form-<?php echo e($user->id); ?>">
                                        <i class="ti ti-trash"></i><span class="ms-1"><?php echo e(__('Delete')); ?> </span>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'id' => 'delete-form-' . $user->id]); ?>

                                    <?php echo Form::close(); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar-parent-child">
                            <img alt="" src="<?php echo e(asset(Storage::url("uploads/profile/")).'/'); ?><?php echo e(!empty($user->avatar)?$user->avatar:'avatar.png'); ?>" class="img-fluid rounded-circle card-avatar">
                        </div>

                        <h5 class="h6 mt-4 mb-0"> <?php echo e($user->name); ?></h5>
                        <a href="#" class="d-block text-sm text-muted my-4"> <?php echo e($user->email); ?></a>
                        <div class="card mb-0 mt-3">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="mb-0"><?php echo e($user->countProducts($user->id)); ?></h6>
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Products')); ?></p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h6 class="mb-0"><?php echo e($user->countStores($user->id)); ?></h6>
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Stores')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                            <div class="actions d-flex justify-content-between">
                                <span class="d-block text-sm text-muted"> <?php echo e(__('Plan')); ?> : <?php echo e(!empty($user->currentPlan->name ) ? $user->currentPlan->name : ""); ?></span>
                            </div>
                            <div class="actions d-flex justify-content-between mt-1">
                                <span class="d-block text-sm text-muted"><?php echo e(__('Plan Expired')); ?> : <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date):'Unlimited'); ?></span>
                            </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">

                <a data-url="<?php echo e(route('store-resource.create')); ?>" data-size="md" class="btn-addnew-project" data-ajax-popup="true" data-title="<?php echo e(__('Create New Store')); ?>"  ><i class="ti ti-plus text-white"></i>
                    <div class="bg-primary proj-add-icon">
                        <i class="ti ti-plus"></i>
                    </div>
                    <h6 class="mt-4 mb-2">New User</h6>
                    <p class="text-muted text-center">Click here to add New User</p>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqfccupd0b8g/public_html/saas.mxc.com.pk/resources/views/user/grid.blade.php ENDPATH**/ ?>