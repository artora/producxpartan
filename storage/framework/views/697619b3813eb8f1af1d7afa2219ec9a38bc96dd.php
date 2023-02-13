<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(__('Messages')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()->user_type != 'admin'): ?>
<?php if($additional->conversation_mode == 1): ?>
<div class="container py-5 mt-md-2 mb-2">
      <div class="row">
        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">
                    <?php $__currentLoopData = $other_user['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="javascript:void(0);" data-id="<?php echo e($user->username); ?>" <?php if($slug == $user->username): ?> class="list-group-item list-group-item-action border-0 active userlink" <?php else: ?> class="list-group-item list-group-item-action border-0 userlink" <?php endif; ?>>
						<div class="d-flex align-items-start">
							<?php if($user->user_photo!=''): ?>
                              <img class="lazy rounded-circle mr-1" width="40" height="40" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>"  alt="<?php echo e($user->username); ?>">
                              <?php else: ?>
                              <img class="lazy rounded-circle mr-1" width="40" height="40" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($user->username); ?>"/>
                              <?php endif; ?>
							<div class="flex-grow-1 ml-3">
								<?php echo e($user->username); ?>

                                <?php if($user->user_type == 'vendor'): ?>
								<div class="small"><span class="badge badge-success"><?php echo e(__('Vendor')); ?></span></div>
                                <?php endif; ?>
                                <?php if($user->user_type == 'customer'): ?>
								<div class="small"><span class="badge badge-warning"><?php echo e(__('Customer')); ?></span></div>
                                <?php endif; ?>
							</div>
						</div>
					</a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="position-relative">
                      <div id='loader' style='display: none;' align="center">
                          <img width='60' height='60' class="lazy sloader" src='<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_loader_image); ?>'>
                      </div>
                      <div id="display_message">
                      </div>
                      <div class="chat-messages p-4" id="hide_message">
                       <?php if($chck != 0): ?>   
						<?php $__currentLoopData = $chat['message']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="chat-message-left pb-4">
							 <div align="center">
							  <?php if($chat->user_photo!=''): ?>
                              <img class="lazy rounded-circle mr-1" width="60" height="60" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($chat->user_photo); ?>"   alt="<?php echo e($chat->username); ?>">
                              <?php else: ?>
                              <img class="lazy rounded-circle mr-1" width="60" height="60" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($chat->username); ?>"/>
                              <?php endif; ?>
							  <div class="text-muted small text-nowrap mt-2"><?php echo e(Helper::timeAgo(strtotime($chat->conver_date))); ?></div>
                              </div>
							  <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1"><?php echo e($chat->username); ?></div>
									<?php echo \App::make('ChristofferOK\LaravelEmojiOne\LaravelEmojiOne')->toImage($chat->conver_text); ?><br/>
                                </div>
                            </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
						</div>
					</div>
                    <form method="post" id="checkout_form" enctype="multipart/form-data" action=""  class="media-body needs-validation ml-3 messageform">
                    <?php echo csrf_field(); ?>
                    <div class="flex-grow-0 py-3 px-4 border-top emoji">
						<div class="input-group">
                            <input type="hidden" name="conver_user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="conver_seller_id" id="conver_seller_id" value="<?php echo e($last_user); ?>">
                            <input type="hidden" name="conver_url" value="<?php echo e(url('/messages')); ?>">
		<input type="text" class="form-control" name="conver_text" id="conver_text" placeholder="<?php echo e(__('Type your message')); ?>" data-emojiable="true"data-emoji-input="unicode" required>
							<button class="btn btn-primary btn-submit" type="submit"><?php echo e(__('Send')); ?></button>
                        </div>
					</div>
                   </form> 
				</div>
			</div>
		</div>
       </div>
      </div>
    </div>
    <?php else: ?>
    <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php else: ?>
        <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(URL::to('resources/views/theme/emojione/emojione.picker.js')); ?>"></script>
<script  type="text/javascript">
$( "#conver_text" ).emojionePicker();
</script>
<script type="text/javascript">
$(document).ready(function() {
       $('.userlink').click(function(e) {
	      e.preventDefault();
		  var id = $(this).data("id");
    	  var token = $("meta[name='csrf-token']").attr("content");
            $('.userlink').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
			$.ajax(
			{
				
				url: '<?php echo e(url("messages")); ?>/'+id,
				type: 'GET',
				data: {
					"id": id,
					"_token": token,
				},
				beforeSend: function()
				{
					$("#loader").show();
					
				},
				success: function (data){
				    
					$('#hide_message').hide();
					/*$('.messageform').hide();*/
					$('#display_message').html(data.record);
					$("#conver_seller_id").val(data.last_user);
				},
				complete:function(data)
				{
					$("#loader").hide();
					
				}
			});
		  
       });
    });
   $(document).ready(function() {
   $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var conver_user_id = $("input[name=conver_user_id]").val();
		var conver_seller_id = $("input[name=conver_seller_id]").val();
		var conver_url = $("input[name=conver_url]").val();
		var conver_text = $("input[name=conver_text]").val();
        var _token = $("input[name='_token']").val();
		if($('#conver_text').val() == '')
		{
           $('#conver_text').css("border", "1px solid #FE696A");
        }
		else
		{
		$.ajax({
                url: '<?php echo e(url("messages")); ?>',
                type:'POST',
				dataType: 'json',
                data:{_token:_token, conver_user_id:conver_user_id, conver_seller_id:conver_seller_id, conver_url:conver_url, conver_text:conver_text},
                success: function(data) {
				
                    if($.isEmptyObject(data.error)){
					   if (data.success == undefined)
					   {
                        alert("Invalid Data");
					    }
						else
						{
						$('.emoji-wysiwyg-editor img').hide();
						$('.emoji-wysiwyg-editor').val("");
						$('#conver_text').val("");
						$('#hide_message').hide();
						$('#display_message').html(data.record);
						
						
					
						}
                    }else{
					    
                        printErrorMsg(data.error);
						
                    }
                }
            });
		}	
		
        });
  
    });
</script>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\resources\views/messages.blade.php ENDPATH**/ ?>