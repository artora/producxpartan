<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Purchases')); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Purchases')); ?></h1>
        </div>
      </div>
    </div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <aside class="col-lg-4">
            <!-- Account menu toggler (hidden on screens larger 992px)-->
            <div class="d-block d-lg-none p-4">
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i><?php echo e(__('Account menu')); ?></a></div>
            <!-- Actual menu-->
            <?php if(Auth::user()->id != 1): ?>
            <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </aside>
          <!-- Content-->
          <?php if(count($orderData['item']) != 0): ?>
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <div class="row mx-n2 pt-2">
                <?php if(Auth::user()->user_type == 'customer'): ?>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Purchases')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$purchase_sale,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Withdraw')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$drawal_amount,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Referral Commission')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,Auth::user()->referral_amount,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Referrals')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,Auth::user()->referral_count,"symbol")); ?></p>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php $__currentLoopData = $orderData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="media d-block d-sm-flex align-items-center py-4 border-bottom prod-item">
              <a class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto" href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>" style="width: 12.5rem;">
              <?php if($item->item_thumbnail!=''): ?>
              <img class="lazy rounded-lg purchase-img" width="200" height="155" src="<?php echo e(Helper::Image_Path($item->item_thumbnail,'no-image.png')); ?>"  alt="<?php echo e($item->item_name); ?>">
              <?php else: ?>
              <img class="lazy rounded-lg purchase-img" width="200" height="155" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($item->item_name); ?>">
              <?php endif; ?>
              </a>
                <div class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto">
                  <h3 class="h6 product-title mb-2"><a href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>"><?php echo e($item->item_name); ?></a></h3>
                  <div class="font-size-sm"><strong><?php echo e(__('Price')); ?>:</strong> <?php echo e(Helper::price_format($allsettings->site_currency_position,$item->item_price,"symbol")); ?></div>
                  <div class="d-flex align-items-center justify-content-center justify-content-sm-start">
                   <?php if($item->approval_status != 'payment released to customer'): ?>
                   <?php if($item->approval_status == 'payment released to vendor'): ?>
                    <?php if($item->rating != 0): ?>
                    <a class="d-block text-muted text-center my-2" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_<?php echo e($item->ord_id); ?>">
                      <div class="star-rating">
                      <?php if($item->rating == 1): ?>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <?php endif; ?>
                      <?php if($item->rating == 2): ?>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <?php endif; ?>
                      <?php if($item->rating == 3): ?>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <?php endif; ?>
                      <?php if($item->rating == 4): ?>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star"></i>
                      <?php endif; ?>
                      <?php if($item->rating == 5): ?>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <i class="sr-star dwg-star-filled active"></i>
                      <?php endif; ?>
                      </div>
                      <div class="font-size-xs"><?php echo e(__('Rate this product')); ?></div>
                      </a>
                      <?php else: ?>
                      <a class="d-block text-muted text-center my-2" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_<?php echo e($item->ord_id); ?>">
                      <div class="star-rating">
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      <i class="sr-star dwg-star"></i>
                      </div>
                      <div class="font-size-xs"><?php echo e(__('Rate this product')); ?></div>
                      </a>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php endif; ?>
                  </div>
                  <?php if($item->approval_status != 'payment released to customer'): ?>
                  <div class="d-flex mt-2 pt-2">
                  <?php if($item->item_order_serial_key != ""): ?>
                  <a href="<?php echo e(url('/purchases')); ?>/<?php echo e($item->item_token); ?>/<?php echo e($item->ord_id); ?>" class="btn btn-success btn-sm mr-3"><i class="dwg-download mr-1"></i><?php echo e(__('Download Serial Key')); ?></a>
                  <?php else: ?>
                  <a href="<?php echo e(url('/purchases')); ?>/<?php echo e($item->item_token); ?>/<?php echo e($item->ord_id); ?>" class="btn btn-success btn-sm mr-3"><i class="dwg-download mr-1"></i><?php echo e(__('Download Item')); ?></a>
                  <?php endif; ?>
                  <a href="<?php echo e(url('/invoice')); ?>/<?php echo e($item->item_token); ?>/<?php echo e($item->ord_id); ?>" class="btn btn-primary btn-sm mr-3"><i class="dwg-download mr-1"></i><?php echo e(__('Invoice')); ?></a><br/>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto">
                <div class="font-size-sm mb-1"><strong><?php echo e(__('Order ID')); ?> : </strong> <?php echo e($item->purchase_token); ?></div>
                <?php if($item->item_order_serial_key != ""): ?>
                <div class="font-size-sm mb-1"><strong><?php echo e(__('Purchased Serial Key')); ?> : </strong> <?php echo e($item->item_serial_stock); ?></div>
                <?php endif; ?>
                <?php /*?><div class="font-size-sm mb-1"><strong>{{ __('Purchase Id') }}:</strong> {{ $item->purchase_token }}</div><?php */?>
                <div class="font-size-sm mb-1"><strong><?php echo e(__('Purchase Date')); ?> : </strong> <?php echo e(date("d F Y", strtotime($item->start_date))); ?></div>
                <div class="font-size-sm mb-1"><strong><?php echo e(__('Expiry Date')); ?> : </strong> <?php echo e(date("d F Y", strtotime($item->end_date))); ?></div>
                <div class="font-size-sm mb-1"><strong><?php echo e(__('License')); ?> : </strong> <?php echo e($item->license); ?></div>
                <?php
                $moneyback_days = '+'.$item->seller_money_back_days.' days';
                $getdate = strtotime($item->start_date. $moneyback_days);
                $today_date = date('Y-m-d');
                $todays=strtotime($today_date);
                ?>
                <?php if($addition_settings->refund_mode == 1): ?>
                  <?php if($item->approval_status != 'payment released to customer'): ?>
                  <?php if($item->seller_money_back == 1): ?>
                  <?php if($todays <= $getdate): ?>
                  <div class="font-size-sm mb-1"><strong><?php echo e(__('Refund Request')); ?></strong> <a href="javascript:void(0);" data-toggle="modal" data-target="#refund_<?php echo e($item->ord_id); ?>"> <?php echo e(__('Send Request')); ?></a></div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>  
                  <?php /*?><a href="{{ url('/conversation-to-vendor') }}/{{ $item->username }}/{{ $encrypter->encrypt($item->ord_id) }}" class="btn btn-info btn-sm"><i class="dwg-chat mr-1"></i> {{ __('Start Conversation') }} ({{ $countdata->has($item->ord_id) ? count($countdata[$item->ord_id]) : 0 }})</a><?php */?>
                </div>
              </div>
              <div class="modal fade" id="myModal_<?php echo e($item->ord_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Rating this Item')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo e(route('purchases')); ?>" method="post" id="profile_form" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?> 
      <div class="modal-body">
                    <input type="hidden" name="item_id" value="<?php echo e($item->item_id); ?>">
                    <input type="hidden" name="ord_id" value="<?php echo e($item->ord_id); ?>">
                    <input type="hidden" name="item_token" value="<?php echo e($item->item_token); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" name="item_user_id" value="<?php echo e($item->item_user_id); ?>">
                    <input type="hidden" name="item_url" value="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?php echo e(__('Your Rating')); ?></label>
            <select name="rating" class="form-control" required>
                                        <option value="1" <?php if($item->rating == 1): ?> selected <?php endif; ?>>1</option>
                                        <option value="2" <?php if($item->rating == 2): ?> selected <?php endif; ?>>2</option>
                                        <option value="3" <?php if($item->rating == 3): ?> selected <?php endif; ?>>3</option>
                                        <option value="4" <?php if($item->rating == 4): ?> selected <?php endif; ?>>4</option>
                                        <option value="5" <?php if($item->rating == 5): ?> selected <?php endif; ?>>5</option>
                                    </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><?php echo e(__('Rating Reason')); ?></label>
           <select name="rating_reason" class="form-control" required>
                                            <option value="design" <?php if($item->rating_reason == 'design'): ?> selected <?php endif; ?>><?php echo e(__('Design Quality')); ?></option>
                                            <option value="customization" <?php if($item->rating_reason == 'customization'): ?> selected <?php endif; ?>><?php echo e(__('Customization')); ?></option>
                                            <option value="support" <?php if($item->rating_reason == 'support'): ?> selected <?php endif; ?>><?php echo e(__('Support')); ?></option>
                                            <option value="performance" <?php if($item->rating_reason == 'performance'): ?> selected <?php endif; ?>><?php echo e(__('Performance')); ?></option>
                                            <option value="documentation" <?php if($item->rating_reason == 'documentation'): ?> selected <?php endif; ?>><?php echo e(__('Well Documented')); ?></option>
                                        </select>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label"><?php echo e(__('Comments')); ?></label>
          <textarea name="rating_comment" id="rating_comment" class="form-control" required><?php echo e($item->rating_comment); ?></textarea>
                            <p><?php echo e(__('Your review will be ​publicly visible​ and the vendor may reply to your comments.')); ?></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn btn-primary btn-sm"><?php echo e(__('Submit Rating')); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="refund_<?php echo e($item->ord_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Refund Request')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('refund')); ?>" method="post" id="profile_form" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="modal-body">
          <input type="hidden" name="item_id" value="<?php echo e($item->item_id); ?>">
                    <input type="hidden" name="ord_id" value="<?php echo e($item->ord_id); ?>">
                    <input type="hidden" name="purchased_token" value="<?php echo e($item->purchase_token); ?>">
                    <input type="hidden" name="item_token" value="<?php echo e($item->item_token); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" name="item_user_id" value="<?php echo e($item->item_user_id); ?>">
                    <input type="hidden" name="item_url" value="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?php echo e(__('Refund Reason')); ?></label>
            <select name="refund_reason" class="form-control" required>
                             <option value="<?php echo e(__('Item is not as described or the item does not work the way it should')); ?>"><?php echo e(__('Item is not as described or the item does not work the way it should')); ?></option>
                                            <option value="<?php echo e(__('Item has a security vulnerability')); ?>"><?php echo e(__('Item has a security vulnerability')); ?></option>
                                            <option value="<?php echo e(__('Item support is promised but not provided')); ?>"><?php echo e(__('Item support is promised but not provided')); ?></option>
                                            <option value="<?php echo e(__('Item support extension not used')); ?>"><?php echo e(__('Item support extension not used')); ?></option>
                                            <option value="<?php echo e(__('Items that have not been downloaded')); ?>"><?php echo e(__('Items that have not been downloaded')); ?></option>
                                        </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><?php echo e(__('Comments')); ?></label>
            <textarea name="refund_comment" id="refund_comment" class="form-control" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn btn-primary btn-sm"><?php echo e(__('Submit Request')); ?></button>
      </div>
      </form>
    </div>
  </div>
 </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <!-- Product-->
       </div>
       <div class="pagination-area">
        <div class="turn-page" id="itempager"></div>
         </div>
          </section>
          <?php else: ?>
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
             <div class="pt-2 px-4 pl-lg-0 pr-xl-5" align="center">
             <?php echo e(__('No Data Found!')); ?>

             </div>
             </section>
              <?php endif; ?>
        </div>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\Script\resources\views/my-purchase.blade.php ENDPATH**/ ?>