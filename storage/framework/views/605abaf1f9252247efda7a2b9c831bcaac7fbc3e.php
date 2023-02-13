<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Upload Item')); ?></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e($type_name->item_type_name); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Upload Item')); ?> <span class="dwg-arrow-right"></span> <?php echo e($type_name->item_type_name); ?></h1>
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
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <!-- Product-->
            <div class="row">
             <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div> <b><?php echo e(__('Copyright Note')); ?></b><br/><?php echo e(__('You should include details of source files you have used in the Comments for the Reviewer section of the form.')); ?> <?php echo e(__('If your file does not meet these copyright standards, it will be rejected.')); ?>

              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div><b><?php echo e(__('Image Upload')); ?> :</b> jpeg, jpg, png, webp<br/><b><?php echo e(__('File Upload')); ?> :</b> zip, mp3, mp4<?php /*?>@if(Auth::user()->user_subscr_space_level == 'limited') <br/><b>Available Storage Space : </b> {{ Auth::user()->user_subscr_space }} {{ Auth::user()->user_subscr_space_type }} @endif | <?php */?>
                <?php if($addition_settings->subscription_mode == 1): ?>
                <?php /*?>@if(Auth::user()->user_subscr_space_level == 'limited')<br/><span class="red-color"><b>{{ __('Used Storage Space') }} : </b>{{ Helper::formatSizeUnits(Helper::available_space(Auth::user()->id)) }}</span>@endif<?php */?>
                <?php endif; ?>
              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <h4 class="mt-4"><?php echo e(__('Upload Files')); ?> <?php if($demo_mode == 'on'): ?><span class="require">- This is Demo version. So Maximum 1MB Allowed</span><?php endif; ?></h4>
              </div>
             <div class="col-sm-12 mb-1">
             <div class="form-group">
               <form action="<?php echo e(route('fileupload')); ?>" class='dropzone' method="post" enctype="multipart/form-data">
               <input type="hidden" name="item_token" value="">
               </form>
             </div>
             </div>
             </div>
             <form action="<?php echo e(route('upload-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div id="display_message"></div>
              <div class="row" id="hide_message"> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload Thumbnail')); ?> <span class="require">*</span> (<?php echo e(__('Size')); ?> : 80x80px)</label>
                  <div class="custom_upload">
                  <select id="item_thumbnail1" name="item_thumbnail1" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <?php $__currentLoopData = $getdata1['first']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                 </div>
                </div>
              </div> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload Preview')); ?> <span class="require">*</span> (<?php echo e(__('Size')); ?> : 361x230px)</label>
                  <div class="custom_upload">
                     <select name="item_preview1" id="item_preview1" class="form-control" data-bvalidator="required">
                     <option value=""></option>
                     <?php $__currentLoopData = $getdata2['second']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                 </div>
                </div>
              </div>
              
              <?php if($additional->show_screenshots == 1): ?>
              <div class="col-sm-6">
                <div class="form-group upload_wrapper">
                  <label for="account-fn"><?php echo e(__('Upload Screenshots (multiple)')); ?> (<?php echo e(__('Size')); ?> : 750x430px)</label>
                    <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                    <?php $__currentLoopData = $getdata4['four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_video == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Preview Type (optional)')); ?></label>
                  <select name="video_preview_type1" id="video_preview_type1" <?php if($errors->has('video_file')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?>>
                   <option value=""></option>
                   <option value="youtube"><?php echo e(__('Youtube')); ?></option>
                   <option value="mp4"><?php echo e(__('MP4')); ?></option>
                   <option value="mp3"><?php echo e(__('MP3')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="youtube">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Youtube Video URL')); ?> <span class="require">*</span></label>
                  <input type="text" id="video_url1" name="video_url1" class="form-control" data-bvalidator="required">
                  <small>(<?php echo e(__('example')); ?> : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                </div>
              </div>
              <div class="col-sm-6" id="mp4">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload MP4 Video')); ?> <span class="require">*</span> (<?php echo e(__('MP4 - file only')); ?> <?php if($addition_settings->subscription_mode == 1): ?> <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>| Max Size : <?php echo e(Auth::user()->user_subscr_space); ?> <?php echo e(Auth::user()->user_subscr_space_type); ?> <?php endif; ?> <?php endif; ?>)</label>
                    <select id="video_file1" name="video_file1" class="form-control" data-bvalidator="required">
                    <option value=""></option>
                    <?php $__currentLoopData = $getdata5['five']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-6" id="mp3">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload MP3')); ?> <span class="require">*</span></label>
                    <select id="audio_file1" name="audio_file1" class="form-control" data-bvalidator="required">
                    <option value=""></option>
                    <?php $__currentLoopData = $getdata6['six']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>
              <?php endif; ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload Main File Type')); ?> <span class="require">*</span></label>
                  <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="file"><?php echo e(__('File')); ?></option>
                  <option value="link"><?php echo e(__('Link / URL')); ?></option>
                  <option value="serial"><?php echo e(__('License Keys / Serial Numbers')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="main_file">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Upload Main File')); ?> <span class="require">*</span> (<?php echo e(__('ZIP - All files')); ?> <?php if($addition_settings->subscription_mode == 1): ?> <?php if(Auth::user()->user_subscr_space_level == 'limited'): ?>| Max Size : <?php echo e(Auth::user()->user_subscr_space); ?> <?php echo e(Auth::user()->user_subscr_space_type); ?> <?php endif; ?> <?php endif; ?>)</label>
                      <select name="item_file1" id="item_file1" class="form-control" data-bvalidator="required">
                      <option value=""></option>
                      <?php $__currentLoopData = $getdata3['third']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                </div>
              </div>
              <div class="col-sm-6" id="main_link">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Main File Link/URL')); ?> <span class="require">*</span></label>
                  <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url">
                </div>
              </div>
              </div>
              
              <div class="row"> 
              <div class="col-sm-6" id="main_delimiter">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Delimiter')); ?> <span class="require">*</span></label>
                  <select name="item_delimiter" id="item_delimiter1" class="form-control" data-bvalidator="required">
                    <option value=""></option>
                    <option value="comma"><?php echo e(__('Comma')); ?></option>
                    <option value="newline"><?php echo e(__('New Line')); ?></option>
                 </select>
                </div>
              </div>
              <div class="col-sm-6" id="main_serials">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Serials List')); ?> <span class="require">*</span></label>
                  <textarea name="item_serials_list" id="item_serials_list" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                  <small id="hint_line" class="require">(<?php echo e(__('Enter available license / serials keys, one per line')); ?>)<br/></small>
                  <small id="hint_comma" class="require">(<?php echo e(__('Enter available license / serials keys, separated by comma')); ?>)</small>
                </div>
              </div>
              <div class="col-sm-12 mt-4 mb-1">
              <h4><?php echo e(__('Name & Description')); ?></h4>
              </div>
              <input type="hidden" name="item_type" value="<?php echo e($type_name->item_type_slug); ?>">
              <input type="hidden" name="type_id" value="<?php echo e($type_id); ?>"> 
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Item Name')); ?> <span class="require">*</span> (<?php echo e(__('Max 100 characters')); ?>)</label>
                  <input type="text" id="item_name" name="item_name" <?php if($errors->has('item_name')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?> data-bvalidator="required,maxlen[100]">
                  <?php if($errors->has('item_name')): ?>
                  <span class="help-block">
                     <span class="red"><?php echo e($errors->first('item_name')); ?></span>
                  </span>
                 <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Short Description')); ?></label>
                  <textarea name="item_shortdesc" rows="6"  class="form-control"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Description')); ?> <span class="require">*</span></label>
                  <textarea name="item_desc" id="summary-ckeditor" rows="6"  <?php if($errors->has('item_desc')): ?> class="form-control border-color" <?php else: ?> class="form-control" <?php endif; ?> data-bvalidator="required"></textarea>
                  <?php if($errors->has('item_desc')): ?>
                  <span class="help-block">
                     <span class="red"><?php echo e($errors->first('item_desc')); ?></span>
                  </span>
                 <?php endif; ?>
                </div>
              </div>
              
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Category & Attributes')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e(__('Select Category')); ?> <span class="require">*</span></label>
                  <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                  <option value=""><?php echo e(__('Select')); ?></option>
                  <?php $__currentLoopData = $re_categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                  <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <?php $__currentLoopData = $attribute['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                  <?php $field_value=explode(',',$attribute_field->attr_field_value); ?>
                  <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                  <div class="select-wrap select-wrap2">
                  <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>
                  <?php endif; ?>
                  <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                  <div class="select-wrap select-wrap2">
                  <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <span class="lnr lnr-chevron-down"></span>
                  </div>
                  <?php endif; ?>
                  <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                  <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php if($additional->show_moneyback == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Do you offer money back guarantee')); ?>? <span class="require">*</span></label>
                  <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="back_money">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('How many days to money back')); ?>?</label>
                  <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]">
                  <small>(days)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="seller_money_back" value="0" />
              <?php endif; ?>
              <?php if($additional->show_refund_term == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Refund Terms')); ?></label>
                  <textarea name="seller_refund_term"  rows="6"  class="form-control"></textarea>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="seller_refund_term" value="" />
              <?php endif; ?>
              <?php if($additional->show_demo_url == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Demo URL')); ?></label>
                  <input type="text" id="demo_url" name="demo_url" class="form-control" data-bvalidator="url">
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_flash_sale == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Apply for flash sale?')); ?></label>
                  <select name="item_flash_request" id="item_flash_request" class="form-control">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                  <small>(<?php echo e(__("If your item is selected, we will put it on sale for just one week for only 50% of it's original price.")); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="item_flash_request" value="0" />
              <?php endif; ?>
              <?php if($additional->show_tags == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Tags')); ?></label>
                  <textarea name="item_tags" id="item_tags" rows="6" class="form-control"></textarea>
                  <small>(<?php echo e(__('Maximum of 15 keywords. Keywords should all be in lowercase and separated by commas. ex: shopping, blog, forum....ect')); ?>)</small>
                </div>
              </div>
              <?php endif; ?>
              <?php if($additional->show_feature_update == 1 || $additional->show_item_support == 1 || $additional->show_free_download == 1): ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Support & Updates')); ?></h4>
              </div>
              <?php endif; ?>
              <?php if($additional->show_free_download == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Apply For Free Download?')); ?> <span class="require">*</span></label>
                  <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                  <small>(<?php echo e(__("if 'Yes' means all user will allowed free download this product")); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="free_download" value="0" />
              <?php endif; ?>
              <?php if($additional->show_feature_update == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Feature Update')); ?> <span class="require">*</span></label>
                  <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="future_update" value="0" />
              <?php endif; ?>
              <?php if($additional->show_item_support == 1): ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Item Support')); ?> <span class="require">*</span></label>
                  <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                  <small>(<?php echo e(__('If item support "YES" selected Regular license price must be entered')); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="item_support" value="0" />
              <?php endif; ?>
              <?php if($addition_settings->subscription_mode == 1): ?>
              <div class="col-sm-6" id="subscription_box">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Subscription Item')); ?>? <span class="require">*</span></label>
                  <select name="subscription_item" id="subscription_item" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                  <small>(<?php echo e(__("if 'Yes' means subscription user will allowed free download this product")); ?>)</small>
                </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="subscription_item" value="0" />
              <?php endif; ?>
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4"><?php echo e(__('Seo')); ?></h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('Allow Seo')); ?>? <span class="require">*</span></label>
                  <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1"><?php echo e(__('Yes')); ?></option>
                  <option value="0"><?php echo e(__('No')); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6" id="ifseo1">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('SEO Meta Keywords')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                  <textarea name="item_seo_keyword" id="page_seo_keyword" rows="6" class="form-control" data-bvalidator="required"></textarea>
                </div>
              </div>
              <div class="col-sm-6" id="ifseo2">
                <div class="form-group">
                  <label for="account-fn"><?php echo e(__('SEO Meta Description')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                  <textarea name="item_seo_desc" id="page_seo_desc" rows="6" class="form-control" data-bvalidator="required"></textarea>
                </div>
              </div>
              <div class="col-sm-12 mt-4 mb-1" id="pricebox">
              <h4 class="mt-4"><?php echo e(__('Price')); ?></h4>
              </div>
              <div class="col-sm-6 mb-1" id="pricebox_left">
                    <label class="font-weight-medium" for="unp-standard-price"><?php echo e(__('Regular License')); ?> (<?php echo e($additional->regular_license); ?> <?php echo e(__('Support')); ?>) <span class="require">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency); ?></span></div>
                      <input type="text" id="regular_price" name="regular_price" class="form-control" data-bvalidator="digit,min[1],required">
                    </div>
              </div>
              <?php if($additional->show_extended_license == 1): ?>
              <div class="col-sm-6 mb-1" id="pricebox_right">
                    <label class="font-weight-medium" for="unp-standard-price"><?php echo e(__('Extended License')); ?> (<?php echo e($additional->extended_license); ?> <?php echo e(__('Support')); ?>)</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency); ?></span></div>
                      <input type="text" id="extended_price" name="extended_price" class="form-control" data-bvalidator="digit,min[1]">
                    </div>
              </div>
              <?php else: ?>
              <input type="hidden" name="extended_price" value="0">
              <?php endif; ?>
              
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
              <div class="col-12 pt-3 mt-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                <?php if($allsettings->item_approval == 0): ?>
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i><?php echo e(__('Submit Review')); ?></button>
                <?php else: ?>
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i><?php echo e(__('Submit')); ?></button>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </form>  
            </div>
          </section>
        </div>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\Script\resources\views/upload-my-item.blade.php ENDPATH**/ ?>