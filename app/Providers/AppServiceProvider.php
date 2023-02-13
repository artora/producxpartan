<?php

namespace Fickrr\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Fickrr\Models\Members;
use Fickrr\Models\Settings;
use Fickrr\Models\Category;
use Fickrr\Models\Pages;
use Fickrr\Models\Comment;
use Fickrr\Models\Items; 
use Fickrr\Models\SubCategory;
use Fickrr\Models\Languages;
use Fickrr\Models\Chat;
use Illuminate\Support\Facades\View;
use Auth;
use URL;
use Illuminate\Support\Facades\Config;
use Cookie;
use Illuminate\Support\Facades\Crypt;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	 
	
    public function boot()
    {
	
	    Schema::defaultStringLength(191);
		view()->composer('*', function ($view) {
        $view->with('current_locale', app()->getLocale());
        $view->with('available_locales', config('app.available_locales'));
        });
		
		$total_sale = Items::totalsaleitemCount();
		View::share('total_sale', $total_sale);
		
		$total_files = Items::totalfileItems();
		View::share('total_files', $total_files);
		
		$allsettings = Settings::allSettings();
		View::share('allsettings', $allsettings);
		
		$additional = Settings::editAdditional();
		View::share('additional', $additional);
		
		$addition_settings = Settings::editAdditional();
		View::share('addition_settings', $addition_settings);
		
		if($allsettings->stripe_mode == 0) 
		{ 
		$stripe_publish_key = $allsettings->test_publish_key; 
		//$stripe_secret_key = $allsettings->test_secret_key;
		
		}
		else
		{ 
		$stripe_publish_key = $allsettings->live_publish_key;
		//$stripe_secret_key = $allsettings->live_secret_key;
		}
		View::share('stripe_publish_key', $stripe_publish_key);
		//View::share('stripe_secret_key', $stripe_secret_key);
		
		$allpages['pages'] = Pages::menupageData();
		View::share('allpages', $allpages);
		
		$encrypter = app('Illuminate\Contracts\Encryption\Encrypter');
		View::share('encrypter', $encrypter);
		
		$footerpages['pages'] = Pages::footermenuData();
		View::share('footerpages', $footerpages);
		
		$maincategory = Category::footercategoryData();
		View::share('maincategory', $maincategory);
		
		$categories['menu'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->take($allsettings->site_menu_category)->orderBy('menu_order',$allsettings->menu_categories_order)->get();
		View::share('categories', $categories);
		
		view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
		
		view()->composer('*', function($view)
		{
			if (Auth::check()) {
			    $user['avilable'] = Members::logindataUser(Auth::user()->id);
			   $avilable = explode(',',$user['avilable']->user_permission);
			    $cartcount = Items::getcartCount();
				
				$msgcount = Chat::miniChat(Auth::user()->id);
				$view->with('cartcount', $cartcount);
				$view->with('msgcount', $msgcount);
				$today_date = date('Y-m-d');
				if(Auth::user()->user_today_download_date != $today_date)
				  {
				     
					 $download_limiter = 0;
					 $up_user_download = array('user_today_download_date' => $today_date, 'user_today_download_limit' => $download_limiter);
					 Members::updateReferral(Auth::user()->id,$up_user_download);
					
				  }
				
			}else {
			    $avilable = "";
				$cartcount = Items::getcartCount();
				$view->with('cartcount', $cartcount);
				$view->with('msgcount', 0);
				
			}
			view()->share('avilable', $avilable);
		});
		view()->composer('*', function($viewcart)
		{
			if (Auth::check()) {
			    $cartitem['item'] = Items::getcartData();
				$smsdata['display'] = Chat::miniData(Auth::user()->id);
				$viewcart->with('smsdata', $smsdata);
				$viewcart->with('cartitem', $cartitem);
				
			}else {
				$viewcart->with('smsdata', 0);
				$cartitem['item'] = Items::getcartData();
				$viewcart->with('cartitem', $cartitem);
			}
			
			$item_count_limit = Items::emptycheck();
			if($item_count_limit != 0)
			{
			   $item['records'] = Items::matchRecord();
			   
			   foreach($item['records'] as $full)
			   {
			   $item_type_id = $full->item_type_id;
			   $item_id = $full->item_id;
			   $data = array('item_type_id' => $item_type_id);
			   Items::upModify($item_id,$data);
			   }
			}
		});
		
		
		Config::set('filesystems.disks.s3.key', $allsettings->aws_access_key_id);
		Config::set('filesystems.disks.s3.secret', $allsettings->aws_secret_access_key);
		Config::set('filesystems.disks.s3.region', $allsettings->aws_default_region);
		Config::set('filesystems.disks.s3.bucket', $allsettings->aws_bucket);
		
		Config::set('filesystems.disks.wasabi.key', $allsettings->wasabi_access_key_id);
		Config::set('filesystems.disks.wasabi.secret', $allsettings->wasabi_secret_access_key);
		Config::set('filesystems.disks.wasabi.region', $allsettings->wasabi_default_region);
		Config::set('filesystems.disks.wasabi.bucket', $allsettings->wasabi_bucket);
		
		
		Config::set('paystack.publicKey', $allsettings->paystack_public_key);
		Config::set('paystack.secretKey', $allsettings->paystack_secret_key);
		Config::set('paystack.merchantEmail', $allsettings->paystack_merchant_email);
		Config::set('paystack.paymentUrl', 'https://api.paystack.co');
		
		
		Config::set('mail.driver', $allsettings->mail_driver);
		Config::set('mail.host', $allsettings->mail_host);
		Config::set('mail.port', $allsettings->mail_port);
		Config::set('mail.username', $allsettings->mail_username);
		Config::set('mail.password', $allsettings->mail_password);
		Config::set('mail.encryption', $allsettings->mail_encryption);
		
		Config::set('services.facebook.client_id', $allsettings->facebook_client_id);
		Config::set('services.facebook.client_secret', $allsettings->facebook_client_secret);
		Config::set('services.facebook.redirect', $allsettings->facebook_callback_url);
		Config::set('services.google.client_id', $allsettings->google_client_id);
		Config::set('services.google.client_secret', $allsettings->google_client_secret);
		Config::set('services.google.redirect', $allsettings->google_callback_url);
		
		Config::set('backup.notifications.mail.to', $allsettings->sender_email);
		Config::set('backup.notifications.mail.from.address', $allsettings->sender_email);
		Config::set('backup.notifications.mail.from.name', $allsettings->sender_name);
		
		Config::set('filesystems.disks.dropbox.token', $allsettings->dropbox_token);
		
		Config::set('filesystems.disks.google.clientId', $allsettings->google_drive_client_id);
		Config::set('filesystems.disks.google.clientSecret', $allsettings->google_drive_client_secret);
		Config::set('filesystems.disks.google.refreshToken', $allsettings->google_drive_refresh_token);
		Config::set('filesystems.disks.google.folderId', $allsettings->google_drive_folder_id);
		
		$demo_mode = $additional->demo_mode; // on
		View::share('demo_mode', $demo_mode);
		
		Config::set('sslcommerz.store.id', $additional->sslcommerz_store_id);
		Config::set('sslcommerz.store.password', $additional->sslcommerz_store_password);
		Config::set('sslcommerz.store.localhost', $additional->sslcommerz_mode);
		
		
		Schema::table('additional_settings', function($table) {
		
			if (!Schema::hasColumn('additional_settings', 'aamarpay_store_id')) 
			{
			$table->string("aamarpay_store_id",20)->nullable();
			}
			if (!Schema::hasColumn('additional_settings', 'aamarpay_signature_key')) 
			{
			$table->string("aamarpay_signature_key",50)->nullable();
			}
			if (!Schema::hasColumn('additional_settings', 'aamarpay_mode')) 
			{
			$table->integer("aamarpay_mode")->default(0);
			}
			if (!Schema::hasColumn('additional_settings', 'theme_font_family')) 
			{
			$table->string("theme_font_family",50)->nullable();
			}
			$table->integer('show_item_support')->default(1)->change();
			
		});
		Schema::table('items', function($table)
		{
			$table->string('item_file')->nullable()->change();
		});
		Schema::table('users', function($table)
		{
			if (!Schema::hasColumn('users', 'user_aamarpay_mode')) 
			{
			$table->integer("user_aamarpay_mode")->default(0);
			}
			if (!Schema::hasColumn('users', 'user_aamarpay_signature_key')) 
			{
			$table->string("user_aamarpay_signature_key",50)->nullable();
			}
			if (!Schema::hasColumn('users', 'user_aamarpay_store_id')) 
			{
			$table->string("user_aamarpay_store_id",20)->nullable();
			}
		});
		
		$top_ads = explode(',',$addition_settings->top_ads_pages);
		$sidebar_ads = explode(',',$addition_settings->sidebar_ads_pages);
		$bottom_ads = explode(',',$addition_settings->bottom_ads_pages);
		
		View::share('top_ads', $top_ads);
		View::share('sidebar_ads', $sidebar_ads);
		View::share('bottom_ads', $bottom_ads);
		
		if($additional->shop_search_type == 'ajax')
		{
		$minprice['price'] = Items::minpriceData();
		View::share('minprice', $minprice);
		
		$maxprice['price'] = Items::maxpriceData();
		View::share('maxprice', $maxprice);
		
		
		$minprice_count = Items::minpriceCount();
		View::share('minprice_count', $minprice_count);
		
		$maxprice_count = Items::maxpriceCount();
		View::share('maxprice_count', $maxprice_count);
		}
		
    }
}
