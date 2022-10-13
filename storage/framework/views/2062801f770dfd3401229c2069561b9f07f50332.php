<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shipping')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2"><?php echo e(__('Shipping')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .btn-sm {
            padding: 0.5rem 0.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Shipping')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Import')); ?>" data-ajax-popup="true" data-size="md"
            data-title="<?php echo e(__('Import Shipping CSV File')); ?>" data-url="<?php echo e(route('shipping.file.import')); ?>"><i   class="ti ti-file-import"></i></a>

        <a href="<?php echo e(route('shipping.export')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Export')); ?>"><i class="ti ti-file-export"></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- [ sample-page ] start -->
    <div class="col-sm-4 col-md-4 col-xxl-3">
        <div class="p-2 card mt-2">
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-user-tab-1" data-bs-toggle="pill"
                        data-bs-target="#pills-user-1" type="button"> <i
                            class="fas fa-location-arrow mx-2"></i><?php echo e(__('Location')); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                        data-bs-target="#pills-user-2" type="button"> <i class="fas fa-shipping-fast mx-2"></i>
                        <?php echo e(__('Shipping')); ?></button>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-user-1" role="tabpanel"
                        aria-labelledby="pills-user-tab-1">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-0"><?php echo e(__('Location')); ?></h3>
                            <div class="pr-2">
                                <a href="#" data-size="md" data-url="<?php echo e(route('location.create')); ?>"
                                    data-ajax-popup="true" data-title="<?php echo e(__('Create New Location')); ?>"
                                    class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="<?php echo e(__('Create New Location')); ?>"><i
                                        class="ti ti-plus"></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                                <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table mb-0 dataTable ">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Name')); ?></th>
                                                <th><?php echo e(__('Created At')); ?></th>
                                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-name="<?php echo e($location->name); ?>">
                                                    <td><?php echo e($location->name); ?></td>
                                                    <td><?php echo e(\App\Models\Utility::dateFormat($location->created_at)); ?></td>
                                                    <td class="Action">
                                                        <span>
                                                            <div class="action-btn  bg-info ms-2">
                                                                <a href="#"
                                                                    data-url="<?php echo e(route('location.edit', $location->id)); ?>"
                                                                    data-size="md"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Edit Shipping')); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="<?php echo e(__('Edit')); ?>" data-tooltip="<?php echo e(__('Edit')); ?>"><i
                                                                        class="ti ti-pencil text-white"></i></a>
                                                            </div>

                                                            <div class="action-btn bg-danger ms-2">
                                                                <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                                    href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                    data-confirm-yes="delete-form-<?php echo e($location->id); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="<?php echo e(__('Delete')); ?>">
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['location.destroy', $location->id], 'id' => 'delete-form-' . $location->id]); ?>

                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-user-2" role="tabpanel" aria-labelledby="pills-user-tab-2">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-0"> <?php echo e(__('Shipping')); ?></h3>
                            <div class="pr-2">
                                <a href="#" data-size="md" data-url="<?php echo e(route('shipping.create')); ?>"
                                    data-ajax-popup="true" data-title="<?php echo e(__('Create New Shipping')); ?>"
                                    class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="<?php echo e(__('Create New Shipping')); ?>"><i
                                        class="ti ti-plus"></i></a>
                            </div>
                        </div>

                        <div class="row mt-3">
                                <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table mb-0 dataTable1 ">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Name')); ?></th>
                                                <th><?php echo e(__('Price')); ?></th>
                                                <th><?php echo e(__('Location')); ?></th>
                                                <th><?php echo e(__('Created At')); ?></th>
                                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-name="<?php echo e($shipping->name); ?>">
                                                    <td><?php echo e($shipping->name); ?></td>
                                                    <td><?php echo e(\App\Models\Utility::priceFormat($shipping->price)); ?></td>
                                                    <td><?php echo e(!empty($shipping->locationName()) ? $shipping->locationName() : '-'); ?>

                                                    </td>
                                                    <td><?php echo e(\App\Models\Utility::dateFormat($shipping->created_at)); ?></td>
                                                    <td class="Action">
                                                        <span>
                                                            <div class="action-btn  bg-info ms-2">
                                                                <a href="#"
                                                                data-url="<?php echo e(route('shipping.edit',$shipping->id)); ?>"
                                                                    data-size="md"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Edit Shipping')); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="<?php echo e(__('Edit')); ?>"><i
                                                                        class="ti ti-pencil text-white"></i></a>
                                                            </div>

                                                            <div class="action-btn bg-danger ms-2">
                                                                <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                                    href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                    data-confirm-yes="delete-form-<?php echo e($shipping->id); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="<?php echo e(__('Delete')); ?>">
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['shipping.destroy', $shipping->id], 'id' => 'delete-form-' . $shipping->id]); ?>

                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>
<script>

</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/nr6grat3/saas.mxclogistics.com/resources/views/shipping/index.blade.php ENDPATH**/ ?>