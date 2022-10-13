<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .product-box .product-price {
            justify-content: unset;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
    <?php if($storethemesetting['enable_header_img'] == 'on'): ?>
        <section class="contain-product container mt-7" >
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="banner-contain">
                        <h1><?php echo e(!empty($storethemesetting['header_title'])?$storethemesetting['header_title']:'Home Accessories'); ?></h1>
                        <p><?php echo e(!empty($storethemesetting['header_desc'])?$storethemesetting['header_desc']:'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?>

                        </p>
                        <a href="#" class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3" id="pro_scroll">
                            <span class="btn-inner--text"><?php echo e(!empty($storethemesetting['button_text'])?$storethemesetting['button_text']:__('Start shopping')); ?></span>
                            <span class="btn-inner--icon">
                                <i class="fas fa-shopping-basket"></i>
                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-product">
                        <?php if(!empty($storethemesetting['header_img']) && \Storage::exists('uploads/store_logo/'.$storethemesetting['header_img'])): ?>
                            <img width="350" height="433" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$storethemesetting['header_img']))); ?>" alt="image"/>
                        <?php else: ?>
                            <img width="350" height="433" src="<?php echo e(asset(Storage::url('uploads/store_logo/home-banner1.png'))); ?>" alt="image"/>

                        <?php endif; ?>
                    </div>
                </div>
                <?php if($theme3_product != null): ?>
                    <div class="col-lg-4 col-md-6">
                    <div class="product-box">
                        <div class="card card-product">
                            <div class="box-rate">
                                <div class="static-rating static-rating-sm">
                                    <?php if($store->enable_rating == 'on'): ?>
                                        <?php for($i =1;$i<=5;$i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = ($i-0.5);
                                                if($theme3_product->product_rating() < $i && $theme3_product->product_rating() >= $newVal1)
                                                {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if($theme3_product->product_rating() >= $newVal1)
                                                {
                                                    $color = 'text-primary';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="card-product-actions">
                                <?php if(Auth::guard('customers')->check()): ?>
                                    <?php if($theme3_product['enable_product_variant'] != 'on'): ?>
                                        <?php if(!empty($wishlist) && isset($wishlist[$theme3_product->id]['product_id'])): ?>
                                            <?php if($wishlist[$theme3_product->id]['product_id'] != $theme3_product->id): ?>
                                                <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($theme3_product->id); ?>" data-id="<?php echo e($theme3_product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($theme3_product->id); ?>" disabled>
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($theme3_product->id); ?>" data-id="<?php echo e($theme3_product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($theme3_product->id); ?>" data-id="<?php echo e($theme3_product->id); ?>">
                                        <i class="far fa-heart"></i>
                                    </button>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-image">
                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>">
                                    <?php if($theme3_product_image->count() > 0 && \Storage::exists('uploads/product_image/'.$theme3_product_image[0]['product_images'])): ?>
                                        <img class="img-center img-fluid" width="135" height="167" src="<?php echo e(asset(Storage::url('uploads/product_image/'.$theme3_product_image[0]['product_images']))); ?>" alt="New collection" title="New collection">
                                    <?php else: ?>
                                        <img class="img-center img-fluid" width="135" height="167" src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" alt="New collection" title="New collection">

                                    <?php endif; ?>
                                </a>

                            </div>
                            <div class="card-body pt-0">
                                <h6><a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product->id])); ?>" class="t-black13"><?php echo e($theme3_product->name); ?></a></h6>
                                <?php if($theme3_product['enable_product_variant'] != 'on'): ?>
                                    <div class="product-price mt-3">
                                        <span class="card-price t-black15 mb-2"><?php echo e(\App\Models\Utility::priceFormat($theme3_product->price)); ?></span>
                                    </div>
                                    <div class="p-button">
                                        <button type="button" class="action-item pcart-icon bg-primary">
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-white btn-icon add_to_cart" data-id="<?php echo e($theme3_product['id']); ?>">
                                        <span class="btn-inner--text text-primary">
                                            <?php echo e(__('Add to cart')); ?>

                                        </span>
                                            <span class="btn-inner--icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </span>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="product-price mt-3">
                                        <span class="card-price t-black15 mb-2"><?php echo e(__('In Variant')); ?></span>
                                    </div>
                                    <div class="p-button">
                                        <button type="button" class="action-item pcart-icon bg-primary">
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$theme3_product['id']])); ?>" class="btn btn-sm btn-white btn-icon">
                                        <span class="btn-inner--text text-primary">
                                            <?php echo e(__('Add to cart')); ?>

                                        </span>
                                            <span class="btn-inner--icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo']=='on'): ?>
        <div class="client-logo">
            <div class="container">
                <div class="row">
                    <?php if(!empty($storethemesetting['brand_logo'])): ?>
                        <?php $__currentLoopData = explode(',',$storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <a href="#">
                                    <?php if(!empty($value) && \Storage::exists('uploads/store_logo/'.$value)): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/').(!empty($value)?$value:'storego-image.png'))); ?>" alt="Brand logo">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>" alt="Brand logo">
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) && $storethemesetting['enable_categories'] == 'on' && !empty($pro_categories)): ?>
        <section class="electronic-access-section">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product_count[$key] > 0): ?>
                            <div class="col-lg-6 mt-2">
                                <div class="small-product small_product_custom">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/'.$pro_categorie->categorie_img)): ?>
                                                <img width="178" height="209" src="<?php echo e(asset(Storage::url('uploads/product_image/'.$pro_categorie->categorie_img))); ?>" class="small-img" alt="image"/>
                                            <?php else: ?>
                                                <img width="178" height="209" src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" class="small-img" alt="image"/>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="small-pro-detail">
                                                <h2><?php echo e($pro_categorie->name); ?></h2>
                                                <p><?php echo e(__('Products')); ?>: <?php echo e(!empty($product_count[$key])?$product_count[$key]:'0'); ?></p>
                                                <a href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>" class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                                    <span class="btn-inner--text"><?php echo e(__('Start shopping')); ?></span>
                                                    <span class="btn-inner--icon">
                                                  <i class="fas fa-shopping-basket"></i>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="bestsellers-section" id="pro_items">
            <div class="container">
                <div class="row">
                    <div class="pr-title mb-4">
                        <div class="">
                            <h3 class="mt-4 store-title text-primary"><?php echo e(__('Products')); ?></h3>
                            <div class="p-tablist">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link  <?php echo e(($category=='Start shopping')?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
                                                <?php echo e(__($category)); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <a href="<?php echo e(route('store.categorie.product',[$store->slug,'Start shopping'])); ?>" class="btn btn-sm btn-primary btn-icon shadow hover-shadow-lg hover-translate-y-n3">
                                <span class="btn-inner--text"><?php echo e(__('Start shopping')); ?></span>
                                <span class="btn-inner--icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content bestsellers-tabs" id="myTabContent">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e(($key=='Start shopping')?'active show':''); ?>" id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="card card-product card-fluid">
                                                            <div class="box-rate">
                                                                <div class="static-rating static-rating-sm">
                                                                    <?php if($store->enable_rating == 'on'): ?>
                                                                        <?php for($i =1;$i<=5;$i++): ?>
                                                                            <?php
                                                                                $icon = 'fa-star';
                                                                                $color = '';
                                                                                $newVal1 = ($i-0.5);
                                                                                if($product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                                                {
                                                                                    $icon = 'fa-star-half-alt';
                                                                                }
                                                                                if($product->product_rating() >= $newVal1)
                                                                                {
                                                                                    $color = 'text-primary';
                                                                                }
                                                                            ?>
                                                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="card-product-actions">
                                                                <?php if(Auth::guard('customers')->check()): ?>
                                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                            <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                                <i class="far fa-heart"></i>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                                                <i class="fas fa-heart"></i>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                            <i class="far fa-heart"></i>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-image py-3">
                                                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                    <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                        <img class="img-center img-fluid" style="width:135px; height:167px" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" alt="New collection" title="New collection">
                                                                    <?php else: ?>
                                                                        <img class="img-center img-fluid" style="width:135px; height:167px" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" alt="New collection" title="New collection">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <h6><a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>" class="t-black13"><?php echo e($product->name); ?></a></h6>
                                                                <?php if($product['enable_product_variant'] != 'on'): ?>
                                                                    <div class="product-price mt-3">
                                                                        <span class="card-price t-black15 mb-2"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                                                                    </div>
                                                                    <div class="p-button">
                                                                        <button type="button" class="action-item pcart-icon bg-primary">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </button>
                                                                        <a href="#" class="btn btn-sm btn-white btn-icon add_to_cart" data-id="<?php echo e($product['id']); ?>">
                                                                        <span class="btn-inner--text text-primary">
                                                                            <?php echo e(__('Add to cart')); ?>

                                                                        </span>
                                                                            <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                        </a>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="product-price mt-3">
                                                                        <span class="card-price t-black15 mb-2"><?php echo e(__('In Variant')); ?></span>
                                                                    </div>
                                                                    <div class="p-button">
                                                                        <button type="button" class="action-item pcart-icon bg-primary">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </button>
                                                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['id']])); ?>" class="btn btn-sm btn-white btn-icon">
                                                                        <span class="btn-inner--text text-primary">
                                                                            <?php echo e(__('Add to cart')); ?>

                                                                        </span>
                                                                            <span class="btn-inner--icon">
                                                                            <i class="fas fa-shopping-basket"></i>
                                                                        </span>
                                                                        </a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="col-12 product-box">
                                                <div class="card card-product">
                                                    <h6 class="m-0 text-center no_record"><i class="fas fa-ban"></i> <?php echo e(__('No Record Found')); ?></h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <div class="container mt-10 mb-5">
            <?php echo e(__('No data found')); ?>

        </div>
    <?php endif; ?>

    
    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber']=='on'): ?>
        <section class="alwase-on-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-lg-12 col-xl-7 text-center">
                        <div class="mb-5">
                            <h1 class="store-title text-primary"><?php echo e($storethemesetting['subscriber_title']); ?></h1>
                            <p class="lead mt-2 store-dcs"><?php echo e($storethemesetting['subscriber_sub_title']); ?></p>
                        </div>
                        <?php echo e(Form::open(array('route' => array('subscriptions.store_email', $store->id),'method' => 'POST'))); ?>

                        <div class="form-group form-subscribe">
                            <div class="input-group input-group-lg input-group-merge">
                                <?php echo e(Form::email('email',null,array('class'=>'form-control form-control-flush','aria-label'=>'Enter your email address','placeholder'=>__('Enter Your Email Address')))); ?>

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-icon scroll-me">
                                        <span class="btn-inner--text"><?php echo e(__('Subscribe')); ?></span>
                                        <span class="far fa-paper-plane"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Top Rated Products -->
    <?php if(count($topRatedProducts)>0): ?>
        <section class="top-product mt-5">
            <div class="container">
                <div class="row">
                    <div class="pr-title">
                        <h3 class=" mt-4 store-title text-primary"><?php echo e(__('Top rated products')); ?></h3>
                        <a href="<?php echo e(route('store.categorie.product',[$store->slug,'Start shopping'])); ?>" class="btn btn-sm btn-primary rounded-pill btn-icon">
                            <span class="btn-inner--text"><?php echo e(__('Show more products')); ?></span>
                            <span class="btn-inner--icon">
                          <i class="fas fa-shopping-basket"></i>
                        </span>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-box">
                                <div class="card card-product">
                                    
                                    <div class="box-rate">
                                        <div class="static-rating static-rating-sm">
                                            <?php if($store->enable_rating == 'on'): ?>
                                                <?php for($i =1;$i<=5;$i++): ?>
                                                    <?php
                                                        $icon = 'fa-star';
                                                        $color = '';
                                                        $newVal1 = ($i-0.5);
                                                        if($topRatedProduct->product->product_rating() < $i && $topRatedProduct->product->product_rating() >= $newVal1)
                                                        {
                                                            $icon = 'fa-star-half-alt';
                                                        }
                                                        if($topRatedProduct->product->product_rating() >= $newVal1)
                                                        {
                                                            $color = 'text-primary';
                                                        }
                                                    ?>
                                                    <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-product-actions">
                                        <?php if(Auth::guard('customers')->check()): ?>
                                            <?php if(!empty($wishlist) && isset($wishlist[$topRatedProduct->product->id]['product_id'])): ?>
                                                <?php if($wishlist[$topRatedProduct->product->id]['product_id'] != $topRatedProduct->product->id): ?>
                                                    <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($topRatedProduct->product->id); ?>" disabled>
                                                        <i class="fas fa-heart"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="card-image py-3">
                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>">
                                            <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/is_cover_image/'.$topRatedProduct->product->is_cover)): ?>
                                                <img class="img-center img-fluid" style="width:135px; height:167px" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$topRatedProduct->product->is_cover))); ?>" alt="New collection" title="New collection">
                                            <?php else: ?>
                                                <img class="img-center img-fluid" style="width:135px; height:167px" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" alt="New collection" title="New collection">
                                            <?php endif; ?>

                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <h6><a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>" class="t-black13"><?php echo e($topRatedProduct->product->name); ?></a></h6>
                                        <?php if($topRatedProduct->product->enable_product_variant != 'on'): ?>
                                            <div class="product-price mt-3">
                                                <span class="card-price t-black15 mb-2"><?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price)); ?></span>
                                            </div>
                                            <div class="p-button">
                                                <button type="button" class="action-item pcart-icon bg-primary">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </button>
                                                <a href="#" class="btn btn-sm btn-white btn-icon add_to_cart" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                <span class="btn-inner--text text-primary">
                    <?php echo e(__('Add to cart')); ?>

                </span>
                                                    <span class="btn-inner--icon">
                    <i class="fas fa-shopping-basket"></i>
                </span>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="product-price mt-3">
                                                <span class="card-price t-black15 mb-2"><?php echo e(__('In Variant')); ?></span>
                                            </div>
                                            <div class="p-button">
                                                <button type="button" class="action-item pcart-icon bg-primary">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </button>
                                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>" class="btn btn-sm btn-white btn-icon">
                <span class="btn-inner--text text-primary">
                    <?php echo e(__('Add to cart')); ?>

                </span>
                                                    <span class="btn-inner--icon">
                    <i class="fas fa-shopping-basket"></i>
                </span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial']=='on'): ?>
        <section class="slice testimonial-section ">
            <div class="container-fulid">
                <div class="row testimonial-slider">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="mb-5">
                            <h3 class=" mt-4 store-title text-primary"><?php echo e($storethemesetting['testimonial_main_heading']); ?></h3>
                            <div class="mt-3">
                                <p class="lead lh-180 store-dcs"><?php echo e($storethemesetting['testimonial_main_heading_title']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="swiper-js-container overflow-hidden">
                            <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="2"
                                 data-swiper-xl-items="2">
                                <div class="swiper-wrapper">
                                    <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1']=='on'): ?>
                                        <div class="swiper-slide p-3">
                                            <div class="card bg-transparent">
                                                <div class="card-body">
                                                    <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$storethemesetting['testimonial_img1']))); ?>" class="avatar  rounded-circle">
                                                        </div>
                                                        <div class="pl-3">
                                                            <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name1']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us1']); ?></small>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2']=='on'): ?>
                                        <div class="swiper-slide p-3">
                                            <div class="card bg-transparent">
                                                <div class="card-body">
                                                    <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$storethemesetting['testimonial_img2']))); ?>" class="avatar  rounded-circle">
                                                        </div>
                                                        <div class="pl-3">
                                                            <h5 class="t-author t-black24"><?php echo e($storethemesetting['testimonial_name2']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us2']); ?></small>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3']=='on'): ?>
                                        <div class="swiper-slide p-3">
                                            <div class="card bg-transparent">
                                                <div class="card-body">
                                                    <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$storethemesetting['testimonial_img3']))); ?>" class="avatar  rounded-circle">
                                                        </div>
                                                        <div class="pl-3">
                                                            <h5 class="t-author t-black34"><?php echo e($storethemesetting['testimonial_name3']); ?></h5>
                                                            <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us3']); ?></small>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <!-- Add Pagination -->
                                <!-- <div class="swiper-pagination w-100 mt-4 d-flex align-items-center justify-content-center"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Top Enable Features -->
    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <section class="store-promotions common-space70">
            <div class="container">
                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) &&$storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="store-box">
                                    <div class="icon text-primary mr-3">
                                        <?php echo $storethemesetting['features_icon1']; ?>

                                    </div>
                                    <div class="s-data">
                                        <strong class="text-primary"><?php echo e($storethemesetting['features_title1']); ?></strong>
                                        <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description1']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) &&$storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="store-box">
                                    <div class="icon text-primary mr-3">
                                        <?php echo $storethemesetting['features_icon2']; ?>

                                    </div>
                                    <div class="s-data">
                                        <strong class="text-primary"><?php echo e($storethemesetting['features_title2']); ?></strong>
                                        <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description2']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) &&$storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="store-box">
                                    <div class="icon text-primary mr-3">
                                        <?php echo $storethemesetting['features_icon3']; ?>

                                    </div>
                                    <div class="s-data">
                                        <strong class="text-primary"><?php echo e($storethemesetting['features_title3']); ?></strong>
                                        <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description3']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqfccupd0b8g/public_html/saas.mxc.com.pk/resources/views/storefront/theme5/index.blade.php ENDPATH**/ ?>