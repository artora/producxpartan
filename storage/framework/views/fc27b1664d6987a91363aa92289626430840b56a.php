<div id="demo">
<div class="row mx-n2">
<div class="col-lg-4"></div>
<div class="col-lg-8 jplist-panel">
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4 mb-2">
<div class="widget cz-filter">
                <div class="input-group-overlay input-group-sm mb-2">
                  <select 
                  class="cz-filter-search form-control form-control-sm appended-form-control" 
                  data-control-type="sort-select" 
						   data-control-name="sort" 
						   data-control-action="sort">
                  <option data-path=".like" data-order="asc" data-type="number"><?php echo e(__('Price : Low to High')); ?></option>
                  <option data-path=".like" data-order="desc" data-type="number"><?php echo e(__('Price : High to low')); ?></option>
                 </select>            
                </div>
              </div>
              </div>
<div class="col-lg-4 mb-2">              
              <div class="widget cz-filter">
                <div class="input-group-overlay input-group-sm mb-2">
                  <select 
                  class="cz-filter-search form-control form-control-sm appended-form-control" 
                  data-control-type="sort-select" 
						   data-control-name="sort" 
						   data-control-action="sort">
                  <option data-path=".popular-items" data-order="desc" data-type="number"><?php echo e(__('Popular Items')); ?></option>
                  <option data-path=".new-items" data-order="desc" data-type="number"><?php echo e(__('New Items')); ?></option>
				  <option data-path=".free-items" data-order="desc" data-type="number"><?php echo e(__('Free Items')); ?></option>
                 </select>            
                </div>
              </div>
              </div>
    </div>          
</div>
</div>
<div class="row pt-3 mx-n2">
         <div class="col-lg-4 jplist-panel">
          <!-- Sidebar-->
          <div class="cz-sidebar rounded-lg box-shadow-lg" id="shop-sidebar">
            <div class="cz-sidebar-header box-shadow-sm">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle"><?php echo e(__('Close sidebar')); ?></span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body" data-simplebar data-simplebar-auto-hide="true">
              
              <!-- Filter by Brand-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(__('Item Type')); ?></h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="<?php echo e(__('Search')); ?>">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                </div>
                <?php if(count($getWell['type']) != 0): ?>
                <div 
                    class="jplist-group"
                    data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php $__currentLoopData = $getWell['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="cz-filter-item d-flex justify-content-between align-items-center">  
                     <div class="custom-control custom-checkbox">
                      <input id="<?php echo e($value->item_type_slug); ?>" data-path=".<?php echo e($value->item_type_slug); ?>" type="checkbox" class="custom-control-input">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo e($value->item_type_slug); ?>"><?php echo e($value->item_type_name); ?></label>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </ul>
                 </div>
                <?php endif; ?> 
              </div>
			  <!-- Categories-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(__('Categories')); ?></h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="<?php echo e(__('Search')); ?>">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                </div>
                <?php if(count($category['view']) != 0): ?>
                <div 
                    class="jplist-group"
                    data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="categorysearch">
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php $__currentLoopData = $category['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="cz-filter-item d-flex justify-content-between align-items-center">
                      <div class="custom-control custom-checkbox">
                      <input id="<?php echo e('category_'.$cat->cat_id); ?>" data-path=".<?php echo e('category_'.$cat->cat_id); ?>" type="checkbox" class="custom-control-input" >
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo e('category_'.$cat->cat_id); ?>"><?php echo e($cat->category_name); ?></label>
                      <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <br/>
                      <span class="ml-2"><input id="<?php echo e('subcategory_'.$sub_category->subcat_id); ?>" data-path=".<?php echo e('subcategory_'.$sub_category->subcat_id); ?>" type="checkbox" class="custom-control-input" >
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo e('subcategory_'.$sub_category->subcat_id); ?>"><?php echo e($sub_category->subcategory_name); ?></label>
                      </span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </ul>
                </div>
                <?php endif; ?>
              </div>
              
              <!-- Price range-->
              <?php if(count($itemData['item']) != 0): ?>
              <div class="widget mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(__('Price')); ?></h3>
                <div class="cz-range-slider" data-start-min="<?php echo e($minprice['price']->regular_price); ?>" data-start-max="<?php echo e($maxprice['price']->extended_price); ?>" data-min="<?php echo e($allsettings->site_range_min_price); ?>" data-max="<?php echo e($allsettings->site_range_max_price); ?>" data-step="1">
                  <div class="demo">
                      <input type="text" id="amount" class="range-price" />
                       <div id="slider-range"></div>
                        </div>
                  <div id="slider-range-min"></div>
                 </div>
              </div>
              <?php endif; ?>
             <?php if(in_array('shop',$sidebar_ads)): ?>
           <div class="mt-4" align="center">
           <?php echo html_entity_decode($addition_settings->sidebar_ads); ?>
           </div>
           <?php endif; ?>
              <!-- Filter by Brand-->
           </div>
          </div>
        </div>
        <div class="col-lg-8">
         <div class="row pt-2 mx-n2 flash-sale list items box">
         <?php if(in_array('shop',$top_ads)): ?>
          <div class="mt-2 mb-2" align="center">
             <?php echo html_entity_decode($addition_settings->top_ads); ?>
          </div>
          <?php endif; ?>
        <!-- Product-->
        <?php if(count($itemData['item']) != 0): ?>
        <?php $no = 1; ?>
        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        ?>
        <div class="col-lg-4 col-md-4 col-sm-6 px-2 mb-3 list-item box" data-price="<?php echo e($price); ?>">
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
                            <img class="lazy" width="256" height="200" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"  alt="<?php echo e($featured->item_name); ?>">
                            <?php else: ?>
                            <img class="lazy" width="256" height="200" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($featured->item_name); ?>">
                            <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
              <span class="<?php echo e($featured->item_type); ?>" style="display:none;"><?php echo e($featured->item_type); ?></span>
              <span class="<?php echo e($featured->item_type_cat_id); ?>" style="display:none;"><?php echo e($featured->item_type_cat_id); ?></span>
              <span class="popular-items" style="display:none;"><?php echo e($featured->item_liked); ?></span>
              <span class="new-items" style="display:none;"><?php echo e($featured->item_id); ?></span>
              <span class="free-items" style="display:none;"><?php echo e($featured->free_download); ?></span>
              <span class="like" style="display:none;"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span>
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
                    <img class="lazy" width="26" height="26" src="<?php echo e(url('/')); ?>/public/img/no-user.png"   alt="<?php echo e($featured->username); ?>">
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
        <!-- Product-->
        <?php $no++; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
       </div>
       <div class="row">
                <div class="col-md-12" align="right">
                <div class="jplist-panel box panel-top">						
							
						<div 
						   class="jplist-label customlable" 
						   data-type="Page {current} of {pages}" 
						   data-control-type="pagination-info" 
						   data-control-name="paging" 
						   data-control-action="paging">
						</div>	

						<div 
						   class="jplist-pagination" 
						   data-control-type="pagination" 
						   data-control-name="paging" 
						   data-control-action="paging"
						   data-items-per-page="<?php echo e($allsettings->site_item_per_page); ?>">
						</div>			
						
					</div>
                    <!--<div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>-->
                </div>
            </div>
       <?php if(in_array('shop',$bottom_ads)): ?>
       <div class="mt-3 mb-4 pb-4" align="center">
         <?php echo html_entity_decode($addition_settings->bottom_ads); ?>
       </div>
       <?php endif; ?>
       <?php else: ?>
       <div><?php echo e(__('No product found')); ?></div>
       <?php endif; ?>
       </div>
        </div>
      </div>  
      
      <?php /**PATH C:\xampp\htdocs\Script\resources\views/shop-ajax.blade.php ENDPATH**/ ?>