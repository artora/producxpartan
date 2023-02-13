<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php if($check_if_item != 0): ?>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e($item['item']->item_name); ?></title>
<?php if($item_slug != ''): ?>
<?php if($item['item']->item_allow_seo == 1): ?>
<meta name="Description" content="<?php echo e($item['item']->item_seo_desc); ?>">
<meta name="Keywords" content="<?php echo e($item['item']->item_seo_keyword); ?>">
<?php else: ?>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php else: ?>
<title><?php echo e(__('404 Not Found')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta property="og:image" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>"/>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>"/>
<meta name="twitter:image:src" content="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>">
<meta name="twitter:image:width" content= "280" />
<meta name="twitter:image:height" content= "480" />
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($check_if_item != 0): ?>
<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e($item['item']->item_name); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e($item['item']->item_name); ?></h1>
        </div>
      </div>
    </div>
<section class="container mb-3 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Content-->
          <section class="col-lg-8 pt-2 pt-lg-4 pb-4 mb-lg-3">
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <?php if(in_array('item-details',$top_ads)): ?>
          	  <div class="mt-2 mb-4" align="center">
              <?php echo html_entity_decode($addition_settings->top_ads); ?>
          	  </div>
         	  <?php endif; ?>
              <!-- Product gallery-->
              <div class="cz-gallery">
                      <?php if($item['item']->video_preview_type!=''): ?>
                      <?php if($item['item']->video_preview_type == 'youtube'): ?>
                      <?php if($item['item']->video_url != ''): ?>
                      <?php
                      $url = $item['item']->video_url;
                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                      $video_id = $match[1];
                      ?>
                      <iframe width="100%" height="430" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&loop=1&playlist=<?php echo e($video_id); ?>" frameborder="3" class="frame-border" allow="autoplay" scrolling="no"></iframe> 
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png"  alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($item['item']->video_preview_type == 'mp4'): ?>
                      <?php if($item['item']->video_file != ''): ?>
					  <video width="100%" height="auto" src="<?php echo e(Helper::Image_Path($item['item']->video_file,'no-video.png')); ?>" controls><?php echo e(__('Your browser does not support the video tag.')); ?></video>	  
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png"  alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($item['item']->video_preview_type == 'mp3'): ?>
                      <?php if($item['item']->audio_file != ''): ?>
					  <audio controls="controls"><source src="<?php echo e(Helper::Image_Path($item['item']->audio_file,'no-audio.png')); ?>" type="audio/mpeg" /></audio>	  
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/resources/views/assets/no-audio.png"  alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php else: ?>  
                      <?php if($item['item']->item_preview!=''): ?>
                      <a class="gallery-item rounded-lg mb-grid-gutter" href="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>" data-sub-html="<?php echo e($item['item']->item_name); ?>">
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(Helper::Image_Path($item['item']->item_preview,'no-image.png')); ?>"  alt="<?php echo e($item['item']->item_name); ?>">
                      <span class="gallery-item-caption"><?php echo e($item['item']->item_name); ?></span>
                      </a>
                      <?php else: ?>
                      <img class="lazy single-thumbnail" width="762" height="430" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($item['item']->item_name); ?>">
                      <?php endif; ?>
                      <?php endif; ?>
              <?php if($getcount != 0): ?>
                <div class="row">
                  <?php $__currentLoopData = $item_allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-2"><a class="gallery-item rounded-lg mb-grid-gutter thumber" href="<?php echo e(Helper::Image_Path($image->item_image,'no-image.png')); ?>" data-sub-html="<?php echo e($item['item']->item_name); ?>"><img class="lazy" width="762" height="430" src="<?php echo e(Helper::Image_Path($image->item_image,'no-image.png')); ?>"  alt="<?php echo e($image->item_image); ?>"/><span class="gallery-item-caption"><?php echo e($item['item']->item_name); ?></span></a></div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
                <?php endif; ?>
              </div>
              <!-- Wishlist + Sharing-->
              <div class="d-flex flex-wrap justify-content-between align-items-center border-top pt-3">
                <div class="py-2 mr-2">
                  <?php if($item['item']->demo_url != ''): ?> 
                  <a class="btn btn-outline-accent btn-sm" href="<?php echo e(url('/preview')); ?>/<?php echo e($item['item']->item_slug); ?>" target="_blank"><i class="dwg-eye font-size-sm mr-2"></i><?php echo e(__('Live Preview')); ?></a>
                  <?php endif; ?>
                  <?php if(Auth::guest()): ?>
                  <a class="btn btn-outline-accent btn-sm" href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-heart font-size-lg mr-2"></i><?php echo e(__('Add To Favorites')); ?></a>
                  <?php endif; ?>
                  <?php if(Auth::check()): ?>
                  <?php if($item['item']->user_id != Auth::user()->id): ?>
                  <a class="btn btn-outline-accent btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item['item']->item_id)); ?>/favorite/<?php echo e(base64_encode($item['item']->item_liked)); ?>"><i class="dwg-heart font-size-lg mr-2"></i><?php echo e(__('Add To Favorites')); ?></a>
                  <?php endif; ?>
                  <?php endif; ?>
                  </div>
                <div class="py-2"><i class="dwg-share-alt font-size-lg align-middle text-muted mr-2"></i>
                <a class="social-btn sb-outline sb-facebook sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="facebook" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-facebook"></i></a>
                <a class="social-btn sb-outline sb-twitter sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="twitter" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-twitter"></i></a>
                <a class="social-btn sb-outline sb-pinterest sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="pinterest" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-pinterest"></i></a>
                <a class="social-btn sb-outline sb-linkedin sb-sm ml-2 share-button" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>" data-share-network="linkedin" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(Helper::Image_Path($item['item']->item_thumbnail,'no-image.png')); ?>" href="javascript:void(0)"><i class="dwg-linkedin"></i></a>
                </div>
              </div>
              <div class="mt-4 mb-4 mb-lg-5">
      <!-- Nav tabs-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link p-4 active" href="#details" data-toggle="tab" role="tab"><?php echo e(__('Item Details')); ?></a></li>
        <li class="nav-item"><a class="nav-link p-4" href="#comments" data-toggle="tab" role="tab"><?php echo e(__('Comments')); ?> <span>(<?php echo e($comment_count); ?>)</span></a></li>
        <li class="nav-item"><a class="nav-link p-4" href="#reviews" data-toggle="tab" role="tab"><?php echo e(__('Reviews')); ?><span>(<?php echo e($getreview); ?>)</span></a></li>
        <?php if(Auth::guest()): ?>
        <li class="nav-item"><a class="nav-link p-4" href="#suppport" data-toggle="tab" role="tab"><?php echo e(__('Support')); ?></a></li>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
        <?php if($item['item']->user_id != Auth::user()->id): ?>
        <li class="nav-item"><a class="nav-link p-4" href="#suppport" data-toggle="tab" role="tab"><?php echo e(__('Support')); ?></a></li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($addition_settings->show_refund_term == 1): ?>
        <li class="nav-item"><a class="nav-link p-4" href="#terms" data-toggle="tab" role="tab"><?php echo e(__('Terms')); ?></a></li>
        <?php endif; ?>
      </ul>
      <div class="tab-content pt-2">
        <div class="tab-pane fade" id="suppport" role="tabpanel">
           <div class="row">
            <div class="col-lg-12">
               <h4><?php echo e(__('Contact the Author')); ?></h4>
               <?php if(Auth::guest()): ?>
                    <p><?php echo e(__('Please')); ?>

                    <a href="<?php echo e(URL::to('/login')); ?>" class="theme-color"><?php echo e(__('Sign In')); ?></a> <?php echo e(__('to contact this author.')); ?></p>
                    <?php endif; ?>
                    <?php if(Auth::check()): ?>
                    <form action="<?php echo e(route('support')); ?>" class="support_form media-body needs-validation" id="support_form" method="post" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                    <label for="subj"><?php echo e(__('Subject')); ?></label>
                                                    <input type="text" id="support_subject" name="support_subject" class="form-control" placeholder="Enter your subject" data-bvalidator="required">                                            </div>
                                                <div class="form-group">
                                                    <label for="supmsg"><?php echo e(__('Message')); ?> </label>
                                                    <textarea class="form-control" id="support_msg" name="support_msg" rows="5" placeholder="Enter your message" data-bvalidator="required"></textarea>                                            </div>
                                                <input type="hidden" name="to_address" value="<?php echo e($item['item']->email); ?>">
                                                <input type="hidden" name="to_id" value="<?php echo e($item['item']->id); ?>">
                                                <input type="hidden" name="to_name" value="<?php echo e($item['item']->username); ?>">
                                                <input type="hidden" name="from_address" value="<?php echo e(Auth::user()->email); ?>">
                                                <input type="hidden" name="from_name" value="<?php echo e(Auth::user()->username); ?>">
                                                <input type="hidden" name="item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>">
                              <button type="submit" class="btn btn-primary btn-sm"><?php echo e(__('Submit Now')); ?></button>
                      </form>
                <?php endif; ?>
            </div>
           </div> 
        </div>
        <!-- Product details tab-->
        <div class="tab-pane fade" id="terms" role="tabpanel">
          <div class="row">
            <div class="col-lg-12 term_text">
              <p class="font-size-md mb-1">
              <?php if($addition_settings->show_moneyback == 1): ?>
              <?php if($item['item']->seller_money_back == 1): ?>
              <?php if(!empty($item['item']->seller_money_back_days)): ?>
              <h1><?php echo e($item['item']->seller_money_back_days); ?> <?php echo e(__('DAYS MONEY BACK GUARANTEE')); ?></h1>
              <?php endif; ?>
              <?php else: ?>
              <h1><?php echo e(__('THIS PRODUCT DO NOT OFFER MONEY BACK GUARANTEE')); ?></h1>
              <?php endif; ?>
              <br/>
              <?php endif; ?>
              <?php if($addition_settings->show_refund_term == 1): ?>
              <?php echo $item['item']->seller_refund_term; ?>
              <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade show active" id="details" role="tabpanel">
          <div class="row">
            <div class="col-lg-12">
              <p class="font-size-md mb-1"><?php echo html_entity_decode($item['item']->item_desc); ?></p>
            </div>
          </div>
        </div>
        <!-- Reviews tab-->
        <div class="tab-pane fade" id="reviews" role="tabpanel">
         <?php if($getreview != 0): ?>
         <div class="row pb-4">
            <!-- Reviews list-->
            <div class="col-md-12">
              <!-- Review-->
              <?php $__currentLoopData = $getreviewdata['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="product-review pb-4 mb-4 border-bottom review-item">
                <div class="d-flex mb-3">
                  <div class="media media-ie-fix align-items-center mr-4 pr-2">
                  <?php if($rating->user_photo!=''): ?>
                  <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($rating->user_photo); ?>"  alt="<?php echo e($rating->username); ?>"/>
                  <?php else: ?>
                  <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($rating->username); ?>"/>
                  <?php endif; ?>
                    <div class="media-body pl-3">
                      <h6 class="font-size-sm mb-0"><?php echo e($rating->username); ?></h6><span class="font-size-ms text-muted"><?php echo e(date('d F Y H:i:s', strtotime($rating->rating_date))); ?></span></div>
                  </div>
                  <div>
                    <div class="star-rating">
                    <?php if($rating->rating == 0): ?>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($rating->rating == 1): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($rating->rating == 2): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($rating->rating == 3): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($rating->rating == 4): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($rating->rating == 5): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <?php endif; ?>
                    </div>
                    <div class="review_tag"><?php echo e($rating->rating_reason); ?></div>
                  </div>
                </div>
                <p class="font-size-md mb-2"><?php echo e($rating->rating_comment); ?></p>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="float-right">
                 <div class="pagination-area">
                    <div class="turn-page" id="reviewpager"></div>
                    </div> 
              </div>
            </div>
            <!-- Leave review form-->
         </div>
         <?php endif; ?>
        </div>
        <!-- Comments tab-->
        <div class="tab-pane fade" id="comments" role="tabpanel">
          <div class="row thread">
            <div class="col-lg-12">
              <div class="media-list thread-list" id="listShow">
                                    <?php $__currentLoopData = $comment['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-thread commli-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <?php if($parent->user_photo!=''): ?>
                                                    <img  class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($parent->user_photo); ?>"  alt="<?php echo e($parent->username); ?>">                                                    <?php else: ?>
                                                    <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($parent->username); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <h6 class="font-size-md mb-0"><?php echo e($parent->username); ?></h6>
                                                        </div>
                                                        <?php if($parent->id == $item['item']->user_id): ?>
                                                        <span class="comment-tag buyer"><?php echo e(__('Author')); ?></span>
                                                        <?php endif; ?>
                                                        <?php if(Auth::check()): ?>
                                                        <?php if($item['item']->user_id == Auth::user()->id): ?>
                                                        <a href="javascript:void(0);" class="nav-link-style font-size-sm font-weight-medium reply-link"><i class="dwg-reply mr-2">
                                                        </i><?php echo e(__('Reply')); ?></a>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="font-size-md mb-1"><?php echo e($parent->comm_text); ?></p>
                                                    <span class="font-size-ms text-muted"><i class="dwg-time align-middle mr-2"></i><?php echo e(date('d F Y, H:i:s', strtotime($parent->comm_date))); ?></span>
                                                </div>
                                            </div>
                                            <div class="children">
                                            <?php $__currentLoopData = $parent->replycomment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                    <?php if($child->user_photo!=''): ?>
                                                    <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($child->user_photo); ?>"  alt="<?php echo e($child->username); ?>">                                                    <?php else: ?>
                                                    <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($child->username); ?>">
                                                    <?php endif; ?>
                                                    </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h6 class="font-size-md mb-0"><?php echo e($child->username); ?></h6>
                                                             </div>
                                                            <?php if($child->id == $item['item']->user_id): ?>
                                                            <span class="comment-tag buyer"><?php echo e(__('Author')); ?></span>
                                                            <?php endif; ?>
                                                            <p class="font-size-md mb-1"><?php echo e($child->comm_text); ?></p>
                                                            <span class="font-size-ms text-muted"><i class="dwg-time align-middle mr-2"></i><?php echo e(date('d F Y, H:i:s', strtotime($child->comm_date))); ?></span>                                                        </div>
                                                    </div>
                                                  </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <!-- comment reply -->
                                            <?php if(Auth::check()): ?>
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <?php if(Auth::user()->user_photo!=''): ?>
                                           <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>"  alt="<?php echo e(Auth::user()->username); ?>">                                                <?php else: ?>
                                           <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e(Auth::user()->username); ?>">
                                           <?php endif; ?>
                                            </div>
                                                <div class="media-body">
                                                    <form action="<?php echo e(route('reply-post-comment')); ?>" class="comment-reply-form media-body needs-validation" method="post" enctype="multipart/form-data">                                                    <?php echo e(csrf_field()); ?>

                                                    <textarea name="comm_text" class="form-control" placeholder="<?php echo e(__('Write your comment...')); ?>" required></textarea>
                                                    <input type="hidden" name="comm_user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                    <input type="hidden" name="comm_item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                                                    <input type="hidden" name="comm_item_id" value="<?php echo e($item['item']->item_id); ?>">
                                                    <input type="hidden" name="comm_id" value="<?php echo e($parent->comm_id); ?>">
                                                    <input type="hidden" name="comm_item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>">
                                                   <button class="btn btn-primary btn-sm"><?php echo e(__('Post Comment')); ?></button>
                                                </form>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <!-- comment reply -->
                                        </div>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                   <?php if($comment_count != 0): ?>
                                   <div class="float-right">
                                        <div class="pagination-area">
                                                <div class="turn-page" id="commpager"></div>
                                        </div> 
                                   </div>
                                   <?php endif; ?>
                  <div class="clearfix"></div>
                  <?php if(Auth::check()): ?>
                  <?php if($item['item']->user_id != Auth::user()->id): ?>
                   <div class="card border-0 box-shadow my-2">
                   <h4 class="mt-4 ml-4"><?php echo e(__('Leave a comment')); ?></h4>
                    <div class="card-body">
                      <div class="media">
                      <?php if(Auth::user()->user_photo != ''): ?>
                      <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>"  alt="<?php echo e(Auth::user()->name); ?>"/>
                      <?php else: ?>
                      <img class="lazy rounded-circle" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e(Auth::user()->name); ?>"/>
                      <?php endif; ?>
                      <form action="<?php echo e(route('post-comment')); ?>" class="comment-reply-form media-body needs-validation ml-3" id="item_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                          <div class="form-group">
                            <textarea class="form-control" rows="4" name="comm_text" placeholder="<?php echo e(__('Write your comment...')); ?>" data-bvalidator="required"></textarea>
                            <input type="hidden" name="comm_user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="comm_item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                            <input type="hidden" name="comm_item_id" value="<?php echo e($item['item']->item_id); ?>">
                            <input type="hidden" name="comm_item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>">
                            <div class="invalid-feedback"><?php echo e(__('Please write your comment')); ?></div>
                          </div>
                          <button class="btn btn-primary btn-sm" type="submit"><?php echo e(__('Post Comment')); ?></button>
                        </form>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
         </div>
        </div>
            <?php if(in_array('item-details',$bottom_ads)): ?>
             <div class="mt-3 mb-2" align="center">
             <?php echo html_entity_decode($addition_settings->bottom_ads); ?>
             </div>
             <?php endif; ?>
            </div>
          </section>
          
          <!-- Sidebar-->
          <aside class="col-lg-4">
            <hr class="d-lg-none">
            <form action="<?php echo e(route('cart')); ?>" class="setting_form" method="post" id="contact_form" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?> 
            <div class="cz-sidebar-static h-100 ml-auto border-left">
               <?php if($item['item']->free_download == 1): ?>
               <div class="bg-secondary rounded p-3 mb-4">
               <p><?php echo e(__('This item is one of the')); ?> <strong><?php echo e(__('Free Files')); ?></strong>. <?php echo e(__('You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.')); ?></p>
               <?php if($item['item']->download_count == "") { $dcount = 0; } else { $dcount = $item['item']->download_count; } ?>
               <div align="center">
                   <?php if(Auth::check()): ?>
                   <?php /*?>@if($addition_settings->subscription_mode == 0)<?php */?>
                   <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($item['item']->item_token)); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> <?php echo e(__('Download this file for free')); ?> (<?php echo e($dcount); ?>)</a>
                   <?php /*?>@else
                   @if(Auth::user()->user_type == 'vendor')
                   @if(Auth::user()->user_subscr_date >= date('Y-m-d'))
                   <a href="{{ URL::to('/item') }}/download/{{ base64_encode($item['item']->item_token) }}" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @else
                   <a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Your subscription has been expired. Please renewal your subscription')"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @endif
                   @else<?php */?>
                   <?php /*?><a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Subscription user only')"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @endif
                   @endif<?php */?>
                   <?php endif; ?>
                   <?php if(Auth::guest()): ?>
                   <a href="<?php echo e(URL::to('/login')); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> <?php echo e(__('Download this file for free')); ?> (<?php echo e($dcount); ?>)</a>
                   <?php endif; ?>
                </div>
               </div>
               <?php else: ?>
               <?php if($addition_settings->subscription_mode == 1): ?>
               <?php if($item['item']->subscription_item == 1): ?>
               <div class="bg-secondary rounded p-3 mb-4">
               <?php if(Auth::guest()): ?>
               <p><?php echo e(__('This item is one of the')); ?> <strong><?php echo e(__('Free Files')); ?></strong>. <?php echo e(__('You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.')); ?></p>
               
               <?php endif; ?>
               <?php if($item['item']->download_count == "") { $dcount = 0; } else { $dcount = $item['item']->download_count; } ?>
               <div>
                   <?php if(Auth::check()): ?>
                   <?php if(Auth::user()->user_subscr_date >= date('Y-m-d') && Auth::user()->user_subscr_payment_status == 'completed'): ?>
                   <p><?php echo e(__('This item is one of the Subscribe Users Free Download Files. You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.')); ?></p>
                   <div align="center">
                   <a href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($item['item']->item_token)); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> <?php echo e(__('Download this file for free')); ?> (<?php echo e($dcount); ?>)</a>
                   </div>
                   <?php else: ?>
                   <p><?php echo e(__('Subscribe to unlock this item, plus millions of creative assets with unlimited downloads.')); ?></p>
                   <div align="center">
                   <a href="<?php echo e(URL::to('/subscription')); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> <?php echo e(__('Subscribe to download')); ?> (<?php echo e($dcount); ?>)</a>
                   </div>
                   <?php endif; ?>
                   <?php /*?>@if($addition_settings->subscription_mode == 0)<?php */?>
                   
                   <?php /*?>@else
                   @if(Auth::user()->user_type == 'vendor')
                   @if(Auth::user()->user_subscr_date >= date('Y-m-d'))
                   <a href="{{ URL::to('/item') }}/download/{{ base64_encode($item['item']->item_token) }}" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @else
                   <a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Your subscription has been expired. Please renewal your subscription')"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @endif
                   @else<?php */?>
                   <?php /*?><a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="alert('Subscription user only')"> <i class="fa fa-download"></i> {{ __('Download this file for free') }} ({{ $dcount }})</a>
                   @endif
                   @endif<?php */?>
                   <?php endif; ?>
                   <?php if(Auth::guest()): ?>
                   <div align="center">
                   <a href="<?php echo e(URL::to('/login')); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> <?php echo e(__('Download this file for free')); ?> (<?php echo e($dcount); ?>)</a>
                   </div>
                   <?php endif; ?>
                </div>
               </div>
               <?php endif; ?>
               <?php endif; ?>
               <?php endif; ?> 
               
               <?php if($item['item']->free_download == 1): ?>
               <?php else: ?>
                <?php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                ?>
              <div class="accordion" id="licenses">
                <div class="card border-top-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" value="<?php echo e(base64_encode($item_price)); ?>_regular" id="license-std" checked>
                      <label class="custom-control-label font-weight-medium text-dark" for="license-std" data-toggle="collapse" data-target="#standard-license"><?php echo e(__('Regular License')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal" id="regular_price"><?php echo e(Helper::price_format($allsettings->site_currency_position,$item_price,"symbol")); ?></h5>
                  </div>
                  <div class="collapse show" id="standard-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e(__('Quality checked by')); ?> <?php echo e($allsettings->site_title); ?></span></li>
                        <?php if($item['item']->future_update == 1): ?> 
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e(__('Future updates')); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms"><?php echo e(__('Future updates')); ?></span></li>
                        <?php endif; ?>
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e($additional->regular_license); ?> <?php echo e(__('support from')); ?> <?php echo e($item['item']->username); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms"><?php echo e($additional->regular_license); ?> <?php echo e(__('not support from')); ?> <?php echo e($item['item']->username); ?></span></li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php if($item['item']->extended_price != 0): ?>
                <div class="card border-bottom-0 border-left-0 border-right-0">
                  <div class="card-header d-flex justify-content-between align-items-center py-3 border-0">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="<?php echo e(base64_encode($extend_item_price)); ?>_extended">
                      <label class="custom-control-label font-weight-medium text-dark" for="license-ext" data-toggle="collapse" data-target="#extended-license"><?php echo e(__('Extended License')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal" id="extend_price"><?php echo e(Helper::price_format($allsettings->site_currency_position,$extend_item_price,"symbol")); ?></h5>
                  </div>
                  <div class="collapse" id="extended-license" data-parent="#licenses">
                    <div class="card-body py-0 pb-2">
                      <ul class="list-unstyled font-size-sm">
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e(__('Quality checked by')); ?> <?php echo e($allsettings->site_title); ?></span></li>
                        <?php if($item['item']->future_update == 1): ?> 
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e(__('Future updates')); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms"><?php echo e(__('Future updates')); ?></span></li>
                        <?php endif; ?>
                        <?php if($item['item']->item_support == 1): ?>
                        <li class="d-flex align-items-center"><i class="dwg-check-circle text-success mr-1"></i><span class="font-size-ms"><?php echo e($additional->extended_license); ?> <?php echo e(__('support from')); ?> <?php echo e($item['item']->username); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center"><i class="dwg-close-circle text-danger mr-1"></i><span class="font-size-ms"><?php echo e($additional->extended_license); ?> <?php echo e(__('not support from')); ?> <?php echo e($item['item']->username); ?></span></li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
              <hr>
              <?php if($item['item']->file_type == 'serial'): ?>
              <?php
              if($item['item']->item_delimiter == 'comma')
              {
                $result_count = substr_count($item['item']->item_serials_list, ","); 
              }
              else
              {
                $result_count = substr_count($item['item']->item_serials_list, "\n");
              }
              ?>
              <div class="d-flex justify-content-between align-items-center py-3 border-0 stockqty">
                    <div class="float-left">
                      <label class="font-weight-medium text-dark"><?php echo e(__('Stock')); ?></label>
                    </div>
                    <h5 class="mb-0 text-accent font-weight-normal" style="max-width: 5rem;">
                    <input class="form-control qty" type="number"  name="qty" id="qty" value="1" min="1" data-bvalidator="required,digit,max[<?php echo e($result_count); ?>]">
                    </h5>
                  </div>
              <hr> 
              <?php else: ?>
              <input class="qty" type="hidden"  name="qty" id="qty" value="1" min="1">
              <?php endif; ?> 
              <?php if($allsettings->item_support_link !=''): ?>
              <?php if($item['item']->free_download == 1): ?>
              <?php else: ?>
              <p class="mt-2 mb-3"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs"><?php echo e($page['view']->page_title); ?></a></p>
              <?php endif; ?>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                         <div class="modal-header">
                          <h4 class="modal-title"><?php echo e($page['view']->page_title); ?></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                         <?php echo html_entity_decode($page['view']->page_desc); ?>
                        </div>
                       </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php /*?><input type="hidden" name="user_id" value="{{ Auth::user()->id }}"><?php */?>
                <input type="hidden" name="item_id" value="<?php echo e($item['item']->item_id); ?>">
                <input type="hidden" name="item_name" value="<?php echo e($item['item']->item_name); ?>">
                <input type="hidden" name="item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                <input type="hidden" name="item_token" value="<?php echo e($item['item']->item_token); ?>">
                <input type="hidden" name="file_type" value="<?php echo e($item['item']->file_type); ?>">
                <input type="hidden" name="item_delimiter" value="<?php echo e($item['item']->item_delimiter); ?>">
                <?php if($item['item']->free_download == 1): ?>
                <?php else: ?>
                <?php if(Auth::guest()): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(__('Buy Now')); ?></button>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <?php if($item['item']->user_id == Auth::user()->id): ?>
                <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($item['item']->item_token); ?>" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(__('Edit Item')); ?></a>
                <?php else: ?>
                
                <?php if($checkif_purchased == 0): ?>
                <?php if(Auth::user()->id != 1): ?>
                <button type="submit" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(__('Buy Now')); ?></button>
                <?php endif; ?>
                <?php else: ?>
                <a class="btn btn-primary btn-shadow btn-block mt-4" href="<?php echo e(URL::to('/purchases')); ?>"><i class="dwg-cart font-size-lg mr-2"></i><?php echo e(__('Purchased Item')); ?></a> 
                <?php endif; ?>    
                <?php endif; ?>
                <?php endif; ?> 
                <?php endif; ?>
                <?php if($item['item']->file_type == 'serial'): ?>
                <?php
                if($item['item']->item_delimiter == 'comma')
                {
                $result_count = substr_count($item['item']->item_serials_list, ","); 
                }
                else
                {
                $result_count = substr_count($item['item']->item_serials_list, "\n");
                }
                ?>
                <div class="bg-secondary rounded p-3 mt-4"><i class="dwg-cart h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($result_count); ?></span><span class="font-size-sm"><?php echo e(__('Stock')); ?></span></div>
                <?php endif; ?>
                <?php if($item['item']->item_featured == 'yes'): ?>
                <div class="bg-secondary rounded p-3 mt-4">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>"  border="0" title="<?php echo e(__('Featured Item')); ?>"> <?php echo e(__('This item was featured on')); ?> <?php echo e($allsettings->site_title); ?></span>
                </div>
                <?php endif; ?>
                <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                <div class="bg-secondary rounded p-3 mt-4">
                <span class="d-inline-block font-size-sm mb-0 mr-1"><img class="lazy single-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"  border="0" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : <?php echo e(__('Sold more than')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>"> <?php echo e($badges['setting']->author_sold_level_six_label); ?></span>
                </div>
                <?php endif; ?>
                <div class="bg-secondary rounded p-3 mt-4 mb-2">
                <a class="media" href="<?php echo e(url('/user')); ?>/<?php echo e($item['item']->username); ?>">
                <?php if($item['item']->user_photo != ''): ?>
                <img class="lazy rounded-circle vertical-img" width="80" height="80" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item['item']->user_photo); ?>"  alt="<?php echo e($item['item']->name); ?>">
                <?php else: ?>
                <img class="lazy rounded-circle vertical-img" width="80" height="80" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($item['item']->name); ?>">
                <?php endif; ?>
                <div class="media-body pl-2 item-details">
                    <h6 class="font-size-sm mb-0"><?php echo e($item['item']->username); ?></h6>
                    <span class="font-size-ms text-muted"><?php echo e(__('Member since')); ?> <?php echo e(date("F Y", strtotime($item['item']->created_at))); ?></span>
                    <div class="mb-3"><?php if($addition_settings->subscription_mode == 1): ?> <?php if($item['item']->user_document_verified == 1): ?> <span class="badges-success"><i class="dwg-check-circle danger"></i> <?php echo e(__('verified')); ?></span> <?php endif; ?> <?php endif; ?></div>
                    <ul>
                                        <?php if($item['item']->country_badge == 1): ?>
                                        <?php if($country['view']->country_badges != ""): ?>
                                        <li>
                                          <img class="lazy icon-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($country['view']->country_badges); ?>"  border="0" title="<?php echo e(__('Located in')); ?> <?php echo e($country['view']->country_name); ?>">  
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($item['item']->exclusive_author == 1): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->exclusive_author_icon); ?>"  border="0" title="<?php echo e(__('Exclusive Author: Sells items exclusively on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($trends != 0): ?>
                                         <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->trends_icon); ?>"  border="0" title="<?php echo e(__('Trendsetter: Had an item that was trending')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($item['item']->item_featured == 'yes'): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>" border="0"  title="<?php echo e(__('Featured Item: Had an item featured on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($item['item']->free_download == 1): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->free_item_icon); ?>"  border="0" title="<?php echo e(__('Free Item : Contributed a free file of this item')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 1): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->one_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 2): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->two_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 3): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->three_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>

                                        <?php endif; ?>
                                        <?php if($year == 4): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->four_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 5): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->five_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?> 
                                        <?php if($year == 6): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->six_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 7): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->seven_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 8): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->eight_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 9): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->nine_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php echo e($year); ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year >= 10): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->ten_year_icon); ?>"  border="0" title="<?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> <?php echo e(__('Years of Membership: Has been part of the')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(__('Community for over')); ?> <?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> <?php echo e(__('years')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_one_icon); ?>"  border="0" title="<?php echo e(__('Author Level')); ?> 1: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_one); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_two &&  $badges['setting']->author_sold_level_three > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_two_icon); ?>"  border="0" title="<?php echo e(__('Author Level')); ?> 2: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_two); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_three &&  $badges['setting']->author_sold_level_four > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->	author_sold_level_three_icon); ?>"  border="0"  title="<?php echo e(__('Author Level')); ?> 3: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_three); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_four &&  $badges['setting']->author_sold_level_five > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_four_icon); ?>"  border="0" title="<?php echo e(__('Author Level')); ?> 4: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_four); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_five &&  $badges['setting']->author_sold_level_six > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_five_icon); ?>"  border="0" title="<?php echo e(__('Author Level')); ?> 5: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_five); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_six_icon); ?>"  border="0" title="<?php echo e(__('Author Level')); ?> 6: <?php echo e(__('Has sold')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"  border="0" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(__('ON')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_one_icon); ?>"  border="0" title="<?php echo e(__('Collector Level')); ?> 1: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_one); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_two_icon); ?>"  border="0" title="<?php echo e(__('Collector Level')); ?> 2: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_two); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_three_icon); ?>"  border="0"  title="<?php echo e(__('Collector Level')); ?> 3: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_three); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_four_icon); ?>"  border="0"  title="<?php echo e(__('Collector Level')); ?> 4: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_four); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_five_icon); ?>"  border="0"  title="<?php echo e(__('Collector Level')); ?> 5: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_five); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_six_icon); ?>"  border="0" title="<?php echo e(__('Collector Level')); ?> 6: <?php echo e(__('Has collected')); ?> <?php echo e($badges['setting']->author_collect_level_six); ?>+ <?php echo e(__('items on')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_one_icon); ?>"  border="0" title="<?php echo e(__('Affiliate Level')); ?> 1: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_one); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_two_icon); ?>"  border="0" title="<?php echo e(__('Affiliate Level')); ?> 2: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_two); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_three_icon); ?>"  border="0"  title="<?php echo e(__('Affiliate Level')); ?> 3: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_three); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_four_icon); ?>"  border="0"  title="<?php echo e(__('Affiliate Level')); ?> 4: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_four); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_five_icon); ?>"  border="0"  title="<?php echo e(__('Affiliate Level')); ?> 5: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_five); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_six_icon); ?>"  border="0"  title="<?php echo e(__('Affiliate Level')); ?> 6: <?php echo e(__('Has referred')); ?> <?php echo e($badges['setting']->author_referral_level_six); ?>+ <?php echo e(__('Members')); ?>">
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                </div></a>
                <a class="btn btn-outline-accent btn-sm btn-block" href="<?php echo e(url('/user')); ?>/<?php echo e($item['item']->username); ?>"><i class="dwg-briefcase font-size-sm mr-2"></i><?php echo e(__('View Profile')); ?></a>
                </div>
              <div class="bg-secondary rounded p-3 mt-2 mb-2"><i class="dwg-download h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($item['item']->item_sold); ?></span><span class="font-size-sm"><?php echo e(__('Sales')); ?></span></div>
              <div class="bg-secondary rounded p-3 mb-2">
                <div class="star-rating">
                <?php if($getreview == 0): ?>
                <i class="sr-star dwg-star"></i>
                <i class="sr-star dwg-star"></i>
                <i class="sr-star dwg-star"></i>
                <i class="sr-star dwg-star"></i>
                <i class="sr-star dwg-star"></i>
                <?php else: ?>
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
                <?php endif; ?>
                </div>
                <div class="font-size-ms text-muted"><?php echo e($getreview); ?> <?php echo e(__('Ratings')); ?></div>
              </div>
              <div class="bg-secondary rounded p-3 mt-2 mb-2"><i class="dwg-heart h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($item['item']->item_liked); ?></span><span class="font-size-sm"><?php echo e(__('Favourites')); ?></span></div>
              <div class="bg-secondary rounded p-3 mb-4"><i class="dwg-chat h5 text-muted align-middle mb-0 mt-n1 mr-2"></i><span class="d-inline-block h6 mb-0 mr-1"><?php echo e($comment_count); ?></span><span class="font-size-sm"><?php echo e(__('Comments')); ?></span></div>
              <ul class="list-unstyled font-size-sm">
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(__('Released')); ?></span><span class="text-muted"><?php echo e(date("d F Y", strtotime($item['item']->created_item))); ?></span></li>
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(__('Updated')); ?></span><span class="text-muted"><?php echo e(date("d F Y", strtotime($item['item']->updated_item))); ?></span></li>
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(__('Category')); ?></span><span class="text-muted"><?php echo e($category_name); ?></span></li>
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(__('Item Type')); ?></span><span class="text-muted"><?php echo e(str_replace('-',' ',$item['item']->item_type)); ?></span></li>
                <?php if(count($viewattribute['details']) != 0): ?>
                <?php $__currentLoopData = $viewattribute['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e($view_attribute->item_attribute_label); ?></span><span class="text-muted"><?php echo str_replace(',', ',<br />', $view_attribute->item_attribute_values); ?> </span></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($item['item']->item_tags != ''): ?>
                 <li class="justify-content-between pb-3 border-bottom"><span class="text-dark font-weight-medium"><?php echo e(__('Tags')); ?></span><br/>
                 <?php $item_tags = explode(',',$item['item']->item_tags); ?>
                 <?php $__currentLoopData = $item_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <span class="text-right"><a href="<?php echo e(url('/tag')); ?>/item/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>" class="link-color"><?php echo e($tags.','); ?></a></span>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </li>
                 <?php endif; ?>
              </ul>
              <?php if(in_array('item-details',$sidebar_ads)): ?>
          	<div class="mt-3 mb-2" align="center">
            <?php echo html_entity_decode($addition_settings->sidebar_ads); ?>
          	</div>
         	<?php endif; ?>
            </div>
            </form>
          </aside>
        </div>
      </div>
    </section>
    
    <section class="container mb-5 pb-lg-3">
      <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-2"><?php echo e(__('More Related Items')); ?> <?php echo e(__('by')); ?> <?php echo e($item['item']->username); ?></h2>
      </div>
      <div class="row pt-2 mx-n2">
        <!-- Product-->
        <?php $no = 1; ?>
        <?php $__currentLoopData = $related['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $price = Helper::price_info($featured->item_flash,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter prod-item">
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
                <div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span class="font-size-xs ml-1"><?php echo e(__('Sales')); ?></span>
                </div>
                <div><?php if($featured->item_flash == 1): ?><del class="price-old"><?php echo e(Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol")); ?></del><?php endif; ?> <span class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Product-->
        <?php $no++; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
   </section>
   <?php else: ?>
   <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($item['item']->free_download == 0): ?>
<script type="text/javascript">
$("#qty").change(function(){ 
   var item_price = "<?php echo e($item_price); ?>";
   var extend_item_price = "<?php echo e($extend_item_price); ?>";
   var qtyVal = $("#qty").val();
   var first_price = item_price * qtyVal;
   var second_price = extend_item_price * qtyVal;
   var types = "<?php echo e($allsettings->site_currency_position); ?>";
   if(types == "left")
   {
   $("#regular_price").html("<?php echo e($allsettings->site_currency_symbol); ?>"+first_price);
   $("#extend_price").html("<?php echo e($allsettings->site_currency_symbol); ?>"+second_price); 
   }
   else
   {
   $("#regular_price").html(first_price+"<?php echo e($allsettings->site_currency_symbol); ?>");
   $("#extend_price").html(second_price+"<?php echo e($allsettings->site_currency_symbol); ?>"); 
   }
});
</script>
<?php endif; ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\resources\views/item.blade.php ENDPATH**/ ?>