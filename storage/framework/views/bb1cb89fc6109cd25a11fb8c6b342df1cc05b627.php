<?php $no = 1; ?>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$price = Helper::price_info($featured->item_flash,$featured->regular_price);
$count_rating = Helper::count_rating($featured->ratings);
?>
<div class="col-lg-6 col-md-6 col-sm-6 px-2 mb-grid-gutter prod-item" data-aos="fade-up" data-aos-delay="200">
          <!-- Product-->
          <div class="card product-card-alt">
            <div class="product-thumb">
              <?php if(Auth::guest()): ?> 
              <a class="btn-wishlist btn-sm" href="<?php echo e(url('/')); ?>/login"><i class="dwg-heart"></i></a>
              <?php endif; ?>
              <?php if(Auth::check()): ?>
              <?php if($featured->user_id != Auth::user()->id): ?>
              <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i class="dwg-heart"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-eye"></i></a>
              <?php
              $checkif_purchased = Helper::if_purchased($featured->item_token);
              ?>
              <?php if($checkif_purchased == 0): ?>
              <?php if($featured->free_download == 0): ?>
              <?php if(Auth::check()): ?>
              <?php if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id): ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-cart"></i></a>
              <?php endif; ?>
              <?php else: ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-cart"></i></a>
              <?php endif; ?>
              <?php else: ?>
              <?php if(Auth::guest()): ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-download"></i></a>
              <?php else: ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i class="dwg-download"></i></a>
              <?php endif; ?>
              <?php endif; ?> 
              <?php endif; ?>  
              </div><a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>
                            <?php if($featured->item_preview!=''): ?>
                            <img class="lazy" width="300" height="200" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"  alt="<?php echo e($featured->item_name); ?>">
                            <?php else: ?>
                            <img class="lazy" width="300" height="200" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                            <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a></div>
                <div class="star-rating">
                    <?php if($count_rating == 0): ?>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 1): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 2): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 3): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 4): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 5): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <?php endif; ?>
                </div>
               </div>
              <h3 class="product-title font-size-sm mb-2"><a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
			  <?php if($addition_settings->item_name_limit != 0): ?>
			  <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

		      <?php else: ?>
			  <?php echo e($featured->item_name); ?>	  
			  <?php endif; ?>
			  </a></h3>
              <div class="card-footer d-flex align-items-center font-size-xs">
              <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>">
                    <div class="blog-entry-author-ava">
                    <?php if($featured->user_photo!=''): ?>
                    <img class="lazy" width="26" height="26" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($featured->user_photo); ?>"  alt="<?php echo e($featured->username); ?>">
                    <?php else: ?>
                    <img class="lazy" width="26" height="26" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($featured->username); ?>">
                    <?php endif; ?>
                    </div>
					<?php if($addition_settings->author_name_limit != 0): ?>
					<?php echo e(mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

				    <?php else: ?>
				    <?php echo e($featured->username); ?>	  
				    <?php endif; ?> 
					<?php if($addition_settings->subscription_mode == 1): ?> <?php if($featured->user_document_verified == 1): ?> <span class="badges-success"><i class="dwg-check-circle danger"></i> <?php echo e(__('verified')); ?></span><?php endif; ?> <?php endif; ?></a>
                  <div class="ml-auto text-nowrap"><i class="dwg-time"></i> <?php echo e(date('d M Y',strtotime($featured->updated_item))); ?></div>
                </div>
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <?php if($featured->file_type == 'serial'): ?> 
                <?php
                if($featured->item_delimiter == 'comma')
                {
                $result_count = substr_count($featured->item_serials_list, ",");
                }
                else
                {
                $result_count = substr_count($featured->item_serials_list, "\n");
                }
                ?>
                <div class="font-size-sm mr-2"><i class="dwg-cart text-muted mr-1"></i><?php echo e($result_count); ?><span class="font-size-xs ml-1"><?php echo e(__('Stock')); ?></span>
                </div>
                <?php else: ?>
                <div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span class="font-size-xs ml-1"><?php echo e(__('Sales')); ?></span>
                </div>
                <?php endif; ?>
                <div>
                <?php if($featured->free_download == 0): ?>
                <?php if($featured->item_flash == 1): ?><del class="price-old"><?php echo e(Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol")); ?></del><?php endif; ?> <span class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span>
                <?php else: ?>
                <span class="price-badge rounded-sm py-1 px-2"><?php echo e(__('Free')); ?></span> 
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php $no++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        <?php /**PATH C:\xampp\htdocs\Script\resources\views/user-data.blade.php ENDPATH**/ ?>