<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Profile Settings')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Profile Settings')); ?></h1>
        </div>
      </div>
    </div>
<div class="container pb-5 mb-2 mb-md-3">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
            <h6 class="font-size-base text-light mb-0"><?php echo e(__('Update you profile details below')); ?></h6><a class="btn btn-primary btn-sm" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out mr-2"></i><?php echo e(__('Logout')); ?></a>
          </div>
          <?php if($addition_settings->subscription_mode == 1): ?>
          <?php if(Auth::user()->user_type == 'vendor'): ?> 
          <?php if(Auth::user()->user_subscr_type != ''): ?>
          <h4 class="h4 py-2 text-center text-sm-left"><?php echo e(Auth::user()->user_subscr_type); ?> <?php echo e(__('Membership')); ?></h4>
          <div class="row mx-n2 pt-2">
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Item Limit')); ?></h3>
                    <?php if(Auth::user()->user_subscr_item_level == 'limited'): ?>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_subscr_item); ?></p>
                    <?php else: ?>
                    <p class="h3 mb-2"><?php echo e(__('Unlimited')); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Storage Space')); ?></h3>
                    <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_subscr_space); ?> <?php echo e(Auth::user()->user_subscr_space_type); ?></p>
                    <?php else: ?>
                    <p class="h3 mb-2"><?php echo e(__('Unlimited')); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Expire On')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(date('d M Y',strtotime(Auth::user()->user_subscr_date))); ?></p>
                  </div>
                </div>
                <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>
                <?php /*?><div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted">{{ __('Used Storage Space') }}</h3>
                    <p class="h3 mb-2">{{ Helper::formatSizeUnits(Helper::available_space(Auth::user()->id)) }}</p>
                  </div>
                </div><?php */?>
                <?php endif; ?>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Uploaded Items')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Helper::uploaded_item(Auth::user()->id)); ?></p>
                  </div>
                </div>
                <?php if(Auth::user()->user_subscr_item_level == 'limited'): ?>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Available Items Limit')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_subscr_item - Helper::uploaded_item(Auth::user()->id)); ?></p>
                  </div>
                </div>
                <?php endif; ?>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Download items per day')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_subscr_download_item); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Today download items limit')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_today_download_limit); ?></p>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php else: ?>
            <div class="row mx-n2 pt-2">
            <div class="col-md-6 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Download items per day')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_subscr_download_item); ?></p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Today download items limit')); ?></h3>
                    <p class="h3 mb-2"><?php echo e(Auth::user()->user_today_download_limit); ?></p>
                  </div>
                </div>
            </div>    
            <?php endif; ?> 
            <?php endif; ?> 
          <!-- Profile form-->
          <form action="<?php echo e(route('profile-settings')); ?>" class="needs-validation" id="profile_form" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="col-sm-12 mb-1">
              <h4><?php echo e(__('Profile Information')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Name')); ?> <span class="require">*</span></label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(Auth::user()->name); ?>" data-bvalidator="required" readonly="readonly">
                  <small class="red"><?php echo e(__('To change your Name please contact our')); ?> <a href="<?php echo e(URL::to('/contact')); ?>" class="text-decord"><?php echo e(__('Support')); ?></a></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-ln"><?php echo e(__('Username')); ?> <span class="require">*</span></label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="<?php echo e(__('Username')); ?>" value="<?php echo e(Auth::user()->username); ?>" data-bvalidator="required" readonly="readonly">
                  <small><?php echo e(__('Your Marketplace URL')); ?>: <?php echo e(URL::to('/')); ?>/user/<span><?php echo e(Auth::user()->username); ?></span></small><br/>
                  <small class="red"><?php echo e(__('To change your Username please contact our')); ?> <a href="<?php echo e(URL::to('/contact')); ?>" class="text-decord"><?php echo e(__('Support')); ?></a></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Email Address')); ?> <span class="require">*</span></label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e(Auth::user()->email); ?>" data-bvalidator="required,email" readonly="readonly">      <small class="red"><?php echo e(__('To change your E-mail address please contact our')); ?> <a href="<?php echo e(URL::to('/contact')); ?>" class="text-decord"><?php echo e(__('Support')); ?></a></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-pass"><?php echo e(__('Password')); ?></label>
                  <div class="password-toggle">
                    <input id="password" name="password" type="password" class="form-control">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(__('Show password')); ?></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-pass"><?php echo e(__('Confirm Password')); ?></label>
                  <div class="password-toggle">
                  <input type="password" name="password_confirmation" id="password-confirm" class="form-control" data-bvalidator="equal[password]" placeholder="">
                   <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="dwg-eye password-toggle-indicator"></i><span class="sr-only"><?php echo e(__('Show password')); ?></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Website')); ?></label>
                  <input type="text" id="website" name="website" class="form-control" placeholder="" value="<?php echo e(Auth::user()->website); ?>">
                </div>
              </div>
              <?php if(Auth::user()->user_type == 'customer'): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Become a vendor?')); ?></label><br/>
                  <input  type="checkbox" name="become-vendor" id="ch2" value="1">
                  <span class="become_vendor"><small>(<?php echo e(__('if checked you will change to vendor account')); ?>)</small></span>
                </div>
              </div>
              <?php endif; ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Country')); ?> <span class="require">*</span></label>
                  <select name="country" id="country" class="form-control" data-bvalidator="required">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $country['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_id); ?>" <?php if(Auth::user()->country == $country->country_id ): ?> selected="selected" <?php endif; ?>><?php echo e($country->country_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>       
                </div>
              </div>
              <?php if(Auth::user()->user_type == 'vendor'): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Available Freelance Work?')); ?> <span class="require">*</span></label>
                  <select name="user_freelance" id="user_freelance" class="form-control" data-bvalidator="required">
                       <option value=""></option>
                       <option value="1" <?php if(Auth::user()->user_freelance == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                       <option value="0" <?php if(Auth::user()->user_freelance == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                  </select>       
                </div>
              </div>
              <?php endif; ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Display Country Badge?')); ?> <span class="require">*</span></label>
                  <select name="country_badge" id="country_badge" class="form-control" data-bvalidator="required">
                     <option value=""></option>
                     <option value="1" <?php if(Auth::user()->country_badge == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                     <option value="0" <?php if(Auth::user()->country_badge == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                  </select>       
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Exclusive Author?')); ?> <span class="require">*</span></label>
                  <select name="exclusive_author" id="exclusive_author" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->exclusive_author == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                      <option value="0" <?php if(Auth::user()->exclusive_author == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                  </select>    
                  <small>(<?php echo e(__('if selected')); ?> <strong>"<?php echo e(__('Yes')); ?>"</strong> <?php echo e(__('you will get high earning')); ?>)</small>   
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Profile Heading')); ?></label>
                  <input type="text" id="profile_heading" class="form-control" name="profile_heading" placeholder="<?php echo e(__('Ex: Web Development Service')); ?>" value="<?php echo e(Auth::user()->profile_heading); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('About')); ?></label>
                  <textarea name="about" id="about" class="form-control" placeholder="<?php echo e(__('Short brief about yourself or your account...')); ?>"><?php echo e(Auth::user()->about); ?></textarea>
                </div>
              </div>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Profile Image & Cover Image')); ?></h4>
              </div>
              <div class="col-sm-6">
              <div class="form-group pb-2">
                  <label for="account-confirm-pass"><?php echo e(__('Profile Image')); ?> (100x100 px)</label>
                  <div class="custom-file">
                  <input class="custom-file-input" type="file" id="unp-product-files" name="user_photo" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="<?php echo e(__('Please select file of type .jpg, .png or .jpeg')); ?>">
                  <label class="custom-file-label" for="unp-product-files"></label>
                  <?php if(Auth::user()->user_photo != ''): ?>
                  <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>"  alt="<?php echo e(Auth::user()->name); ?>">
                  <?php else: ?>
                  <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e(Auth::user()->name); ?>">
                  <?php endif; ?>
                  </div>
                </div>
              </div> 
              <div class="col-sm-6">
              <div class="form-group pb-2">
                  <label for="account-confirm-pass"><?php echo e(__('Cover Image')); ?> (750x370 px)</label>
                  <div class="custom-file">
                  <input class="custom-file-input" type="file" id="unp-product-files" name="user_banner" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="<?php echo e(__('Please select file of type .jpg, .png or .jpeg')); ?>">
                  <label class="custom-file-label" for="unp-product-files"></label>
                  <?php if(Auth::user()->user_banner != ''): ?>
                  <img class="lazy" width="100" height="100" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_banner); ?>"  alt="<?php echo e(Auth::user()->name); ?>">
                  <?php else: ?>
                  <img class="lazy" width="100" height="100" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e(Auth::user()->name); ?>">
                  <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Social Profiles')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Facebook Url')); ?></label>
                  <input type="text" class="form-control" name="facebook_url" value="<?php echo e(Auth::user()->facebook_url); ?>" placeholder="ex: https://www.facebook.com">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Twitter Url')); ?></label>
                  <input type="text" class="form-control" name="twitter_url" value="<?php echo e(Auth::user()->twitter_url); ?>" placeholder="ex: https://www.twitter.com">
                </div>
              </div>
              <input type="hidden" name="gplus_url" value="<?php echo e(Auth::user()->gplus_url); ?>" />
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Instagram Url')); ?></label>
                  <input type="text" class="form-control" name="instagram_url" value="<?php echo e(Auth::user()->instagram_url); ?>" placeholder="ex: https://www.instagram.com">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Linkedin Url')); ?></label>
                  <input type="text" class="form-control" name="linkedin_url" value="<?php echo e(Auth::user()->linkedin_url); ?>" placeholder="ex: https://www.linkedin.com">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Pinterest Url')); ?></label>
                  <input type="text" class="form-control" name="pinterest_url" value="<?php echo e(Auth::user()->pinterest_url); ?>" placeholder="ex: https://www.pinterest.com">
                </div>
              </div>
              <div class="col-sm-6">
              </div>
              <?php if(Auth::user()->user_type == 'vendor'): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Email Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Item Update Notifications')); ?></label><br/>
                  <input type="checkbox" id="opt2" class="" name="item_update_email" value="1" <?php if(Auth::user()->item_update_email == 1): ?> checked <?php endif; ?>>
                  <span class="become_vendor"><small><?php echo e(__("Send an email when an item I've purchased is updated")); ?></small></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Item Comment Notifications')); ?></label><br/>
                  <input type="checkbox" id="opt3" class="" name="item_comment_email" value="1" <?php if(Auth::user()->item_comment_email == 1): ?> checked <?php endif; ?>>
                  <span class="become_vendor"><small><?php echo e(__('Send me an email when someone comments on one of my items')); ?></small></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Item Review Notifications')); ?></label><br/>
                  <input type="checkbox" id="opt4" class="" name="item_review_email" value="1" <?php if(Auth::user()->item_review_email == 1): ?> checked <?php endif; ?>>
                  <span class="become_vendor"><small><?php echo e(__('Send me an email when my items are approved or rejected')); ?></small></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Buyer Review Notifications')); ?></label><br/>
                  <input type="checkbox" id="opt5" class="" name="buyer_review_email" value="1" <?php if(Auth::user()->buyer_review_email == 1): ?> checked <?php endif; ?>>
                  <span class="become_vendor"><small><?php echo e(__('Send me an email when someone leaves a review with their rating')); ?></small></span>
                </div>
              </div>
              <?php endif; ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Message Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Message Permission')); ?></label><br/>
                  <input type="checkbox" id="opt2" class="" name="user_message_permission" value="1" <?php if(Auth::user()->user_message_permission == 1): ?> checked <?php endif; ?>>
                  <span class="become_vendor"><small><?php echo e(__('Send me messages for customer / vendor')); ?></small></span>
                </div>
              </div>
              <?php if($addition_settings->subscription_mode == 1): ?>
              <?php if($count_mode == 1): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Payment Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payment Methods')); ?> <span class="require">*</span></label><br/>
                  <?php $__currentLoopData = $payment_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <input type="checkbox" id="opt2" class="" name="user_payment_option[]" value="<?php echo e($payment); ?>" <?php if(in_array($payment,$get_payment)): ?> checked <?php endif; ?> data-bvalidator="required">
                  <span class="become_vendor"><?php echo e($payment); ?></span><br/>
                  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <?php if(in_array('paypal',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Paypal Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Paypal Email ID')); ?></label>
                  <input type="text" class="form-control" name="user_paypal_email" value="<?php echo e(Auth::user()->user_paypal_email); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Paypal Mode')); ?> <span class="require">*</span></label>
                  <select name="user_paypal_mode" id="user_paypal_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_paypal_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_paypal_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('2checkout',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('2checkout Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('2checkout Mode')); ?> <span class="require">*</span></label>
                  <select name="user_two_checkout_mode" id="user_two_checkout_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_two_checkout_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_two_checkout_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('2Checkout Account Number')); ?></label>
                  <input type="text" class="form-control" name="user_two_checkout_account" value="<?php echo e(Auth::user()->user_two_checkout_account); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('2Checkout Publishable Key')); ?></label>
                  <input type="text" class="form-control" name="user_two_checkout_publishable" value="<?php echo e(Auth::user()->user_two_checkout_publishable); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('2Checkout Private Key')); ?></label>
                  <input type="text" class="form-control" name="user_two_checkout_private" value="<?php echo e(Auth::user()->user_two_checkout_private); ?>">
                </div>
              </div>
              <?php endif; ?>
              <input type="hidden" name="user_paystack_public_key" value="<?php echo e(Auth::user()->user_paystack_public_key); ?>" />
              <input type="hidden" name="user_paystack_secret_key" value="<?php echo e(Auth::user()->user_paystack_secret_key); ?>" />
              <input type="hidden" name="user_paystack_merchant_email" value="<?php echo e(Auth::user()->user_paystack_merchant_email); ?>" />
              <?php /*?><div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4">{{ __('Paystack Settings') }}</h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Paystack Public Key') }}</label>
                  <input type="text" class="form-control" name="user_paystack_public_key" value="{{ Auth::user()->user_paystack_public_key }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Paystack Secret Key') }}</label>
                  <input type="text" class="form-control" name="user_paystack_secret_key" value="{{ Auth::user()->user_paystack_secret_key }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Paystack Merchant Email') }}</label>
                  <input type="text" class="form-control" name="user_paystack_merchant_email" value="{{ Auth::user()->user_paystack_merchant_email }}">
                </div>
              </div><?php */?>
              <?php if(in_array('razorpay',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Razorpay Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Razorpay Key Id')); ?></label>
                  <input type="text" class="form-control" name="user_razorpay_key" value="<?php echo e(Auth::user()->user_razorpay_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Razorpay Secret Key')); ?></label>
                  <input type="text" class="form-control" name="user_razorpay_secret" value="<?php echo e(Auth::user()->user_razorpay_secret); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('payhere',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Payhere Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payhere Mode')); ?> <span class="require">*</span></label>
                  <select name="user_payhere_mode" id="user_payhere_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_payhere_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_payhere_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payhere Merchant Id')); ?></label>
                  <input type="text" class="form-control" name="user_payhere_merchant_id" value="<?php echo e(Auth::user()->user_payhere_merchant_id); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('payumoney',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Payumoney Settings')); ?></h4>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payumoney Mode')); ?> <span class="require">*</span></label>
                  <select name="user_payumoney_mode" id="user_payumoney_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_payumoney_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_payumoney_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payumoney Merchant Key')); ?></label>
                  <input type="text" class="form-control" name="user_payu_merchant_key" value="<?php echo e(Auth::user()->user_payu_merchant_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Payumoney Salt Key')); ?></label>
                  <input type="text" class="form-control" name="user_payu_salt_key" value="<?php echo e(Auth::user()->user_payu_salt_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('iyzico',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Iyzico Settings')); ?></h4>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Iyzico Mode')); ?> <span class="require">*</span></label>
                  <select name="user_iyzico_mode" id="user_iyzico_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_iyzico_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_iyzico_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Iyzico API Key')); ?></label>
                  <input type="text" class="form-control" name="user_iyzico_api_key" value="<?php echo e(Auth::user()->user_iyzico_api_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Iyzico Secret Key')); ?></label>
                  <input type="text" class="form-control" name="user_iyzico_secret_key" value="<?php echo e(Auth::user()->user_iyzico_secret_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('flutterwave',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Flutterwave Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Flutterwave Public Key')); ?></label>
                  <input type="text" class="form-control" name="user_flutterwave_public_key" value="<?php echo e(Auth::user()->user_flutterwave_public_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Flutterwave Secret Key')); ?></label>
                  <input type="text" class="form-control" name="user_flutterwave_secret_key" value="<?php echo e(Auth::user()->user_flutterwave_secret_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('coingate',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Coingate Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Coingate Mode')); ?> <span class="require">*</span></label>
                  <select name="user_coingate_mode" id="user_coingate_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_coingate_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_coingate_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Coingate Auth Token')); ?></label>
                  <input type="text" class="form-control" name="user_coingate_auth_token" value="<?php echo e(Auth::user()->user_coingate_auth_token); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('ipay',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('iPay Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('iPay Mode')); ?> <span class="require">*</span></label>
                  <select name="user_ipay_mode" id="user_ipay_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_ipay_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_ipay_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Vendor ID')); ?></label>
                  <input type="text" class="form-control" name="user_ipay_vendor_id" value="<?php echo e(Auth::user()->user_ipay_vendor_id); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('iPay API / Hash Key')); ?></label>
                  <input type="text" class="form-control" name="user_ipay_hash_key" value="<?php echo e(Auth::user()->user_ipay_hash_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('payfast',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('PayFast Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('PayFast Mode')); ?> <span class="require">*</span></label>
                  <select name="user_payfast_mode" id="user_payfast_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_payfast_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_payfast_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('PayFast Merchant Id')); ?></label>
                  <input type="text" class="form-control" name="user_payfast_merchant_id" value="<?php echo e(Auth::user()->user_payfast_merchant_id); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('PayFast Merchant Key')); ?></label>
                  <input type="text" class="form-control" name="user_payfast_merchant_key" value="<?php echo e(Auth::user()->user_payfast_merchant_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('coinpayments',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('CoinPayments')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('CoinPayments Merchant ID')); ?></label>
                  <input type="text" class="form-control" name="user_coinpayments_merchant_id" value="<?php echo e(Auth::user()->user_coinpayments_merchant_id); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('mercadopago',$get_payment)): ?>
              <?php /*?><div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4">{{ __('Mercadopago Settings') }}</h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Mercadopago Mode') }} <span class="require">*</span></label>
                  <select name="user_mercadopago_mode" id="user_mercadopago_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" @if(Auth::user()->user_mercadopago_mode == 1 ) selected="selected" @endif>{{ __('Live') }}</option>
                      <option value="0" @if(Auth::user()->user_mercadopago_mode == 0 ) selected="selected" @endif>{{ __('Demo') }}</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Client Id') }}</label>
                  <input type="text" class="form-control" name="user_mercadopago_client_id" value="{{ Auth::user()->user_mercadopago_client_id }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ __('Client Secret') }}</label>
                  <input type="text" class="form-control" name="user_mercadopago_client_secret" value="{{ Auth::user()->user_mercadopago_client_secret }}">
                </div>
              </div><?php */?>
              <?php endif; ?>
              <?php if(in_array('instamojo',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Instamojo Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Instamojo Mode')); ?> <span class="require">*</span></label>
                  <select name="user_instamojo_mode" id="user_instamojo_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_instamojo_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_instamojo_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Instamojo API Key')); ?></label>
                  <input type="text" class="form-control" name="user_instamojo_api_key" value="<?php echo e(Auth::user()->user_instamojo_api_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Instamojo Auth Token')); ?></label>
                  <input type="text" class="form-control" name="user_instamojo_auth_token" value="<?php echo e(Auth::user()->user_instamojo_auth_token); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('aamarpay',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Aamarpay Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Aamarpay Mode')); ?> <span class="require">*</span></label>
                  <select name="user_aamarpay_mode" id="user_aamarpay_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_aamarpay_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_aamarpay_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Store ID')); ?></label>
                  <input type="text" class="form-control" name="user_aamarpay_store_id" value="<?php echo e(Auth::user()->user_aamarpay_store_id); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Signature Key')); ?></label>
                  <input type="text" class="form-control" name="user_aamarpay_signature_key" value="<?php echo e(Auth::user()->user_aamarpay_signature_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php if(in_array('stripe',$get_payment)): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Stripe Settings')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Stripe Mode')); ?> <span class="require">*</span></label>
                  <select name="user_stripe_mode" id="user_stripe_mode" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="1" <?php if(Auth::user()->user_stripe_mode == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Live')); ?></option>
                      <option value="0" <?php if(Auth::user()->user_stripe_mode == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Demo')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Stripe Payment Type')); ?> <span class="require">*</span></label>
                  <select name="user_stripe_type" id="user_stripe_type" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <option value="charges" <?php if(Auth::user()->user_stripe_type == "charges" ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Charges API')); ?></option>
                      <option value="intents" <?php if(Auth::user()->user_stripe_type == "intents" ): ?> selected="selected" <?php endif; ?>><?php echo e(__('Intents API')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Test Publishable Key')); ?></label>
                  <input type="text" class="form-control" name="user_test_publish_key" value="<?php echo e(Auth::user()->user_test_publish_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Test Secret Key')); ?></label>
                  <input type="text" class="form-control" name="user_test_secret_key" value="<?php echo e(Auth::user()->user_test_secret_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Live Publishable Key')); ?></label>
                  <input type="text" class="form-control" name="user_live_publish_key" value="<?php echo e(Auth::user()->user_live_publish_key); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Live Secret Key')); ?></label>
                  <input type="text" class="form-control" name="user_live_secret_key" value="<?php echo e(Auth::user()->user_live_secret_key); ?>">
                </div>
              </div>
              <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
              <input type="hidden" name="user_token" value="<?php echo e(Auth::user()->user_token); ?>">
              <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
              <input type="hidden" name="save_earnings" value="<?php echo e(Auth::user()->earnings); ?>">
              <input type="hidden" name="save_photo" value="<?php echo e(Auth::user()->user_photo); ?>">
              <input type="hidden" name="save_banner" value="<?php echo e(Auth::user()->user_banner); ?>">
              <input type="hidden" name="save_password" value="<?php echo e(Auth::user()->password); ?>">
              <input type="hidden" name="save_auth_token" value="<?php echo e(Auth::user()->user_auth_token); ?>">
              <div class="col-12">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                  <button class="btn btn-primary mt-3 mt-sm-0" type="submit"><?php echo e(__('Update')); ?></button>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/profile.blade.php ENDPATH**/ ?>