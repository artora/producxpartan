<?php

namespace Fickrr\Helpers;
use Cookie;
use Illuminate\Support\Facades\Crypt;
use Fickrr\Models\Languages;
use Fickrr\Models\Items;
use Fickrr\Models\Settings;
use Fickrr\Models\Members;
use URL;
use File;
use Storage;
use Fickrr\Models\Chat;
use Fickrr\Models\EmailTemplate;
use Auth;

class Helper {


    public static function Image_Path($image_name,$empty_name) 
    {
	  
	   $allsettings = Settings::allSettings();
	   $url = URL::to("/");
	   if($allsettings->site_s3_storage == 1)
	   {
	      $image_path = Storage::disk('s3')->url($image_name);
		  
	   }
	   else if($allsettings->site_s3_storage == 2)
	   {
	      $image_path = Storage::disk('wasabi')->url($image_name);
		  
		  
	   }
	   else if($allsettings->site_s3_storage == 3)
	   {
	      $image_path = Storage::disk('dropbox')->url($image_name);
	      
	      
	   }
	   else if($allsettings->site_s3_storage == 4)
	   {
	      /*$filename = $image_name;
          $dir = '/';
          $recursive = false; 
          $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
          $file = $contents
                  ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
                  ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
                  ->first();*/
				  
		
		  		
          $image_path = Storage::disk('google')->url(Helper::GetPath($image_name));
		  
		  //$image_path = "https://drive.google.com/uc?id=".."&export=media";
		  
	      
	   }
	   else
	   {
	      $image_path = $url.'/public/storage/items/'.$image_name;
	   }
	   return $image_path;
	   
	
	}
	
	public static function GetPath($filename)
	{
	   
          $dir = '/';
          $recursive = false; 
          $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
          $file = $contents
                  ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
                  ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
                  ->first();
				  
		  $filepath = $file['path'];
		  
		  
		  return $filepath;
		  		
          
	
	
	}
    
    public static function Current_Version()
	{
	    $version = 'Version 2.9';
		return $version;
	}
	
	public static function MsgCount($from,$to)
	{
	    $chck = Chat::ConvCount($from,$to);
		return $chck;
	}
	
	public static function timeAgo($time_ago)
	{
		$cur_time 	= time();
		$time_elapsed 	= $cur_time - $time_ago;
		$seconds 	= $time_elapsed ;
		$minutes 	= round($time_elapsed / 60 );
		$hours 		= round($time_elapsed / 3600);
		$days 		= round($time_elapsed / 86400 );
		$weeks 		= round($time_elapsed / 604800);
		$months 	= round($time_elapsed / 2600640 );
		$years 		= round($time_elapsed / 31207680 );
		// Seconds
		if($seconds <= 60){
			echo "$seconds seconds ago";
		}
		//Minutes
		else if($minutes <=60){
			if($minutes==1){
				echo "one minute ago";
			}
			else{
				echo "$minutes minutes ago";
			}
		}
		//Hours
		else if($hours <=24){
			if($hours==1){
				echo "an hour ago";
			}else{
				echo "$hours hours ago";
			}
		}
		//Days
		else if($days <= 7){
			if($days==1){
				echo "yesterday";
			}else{
				echo "$days days ago";
			}
		}
		//Weeks
		else if($weeks <= 4.3){
			if($weeks==1){
				echo "a week ago";
			}else{
				echo "$weeks weeks ago";
			}
		}
		//Months
		else if($months <=12){
			if($months==1){
				echo "a month ago";
			}else{
				echo "$months months ago";
			}
		}
		//Years
		else{
			if($years==1){
				echo "one year ago";
			}else{
				echo "$years years ago";
			}
		}
	}

	
	public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
	
	public static function uploaded_item($user_id)
	{
	   $check_user_count = Items::checkItemUser($user_id);
	   return $check_user_count;
	}
	
	public static function available_space($user_id)
	{
	    $check_user_count = Items::checkItemUser($user_id);
		if($check_user_count != 0)
		{
			$allsettings = Settings::allSettings();
			$item['display'] = Items::getItemStorage($user_id);
			$occupy_size = 0;
			if($allsettings->site_s3_storage == 1)
			{
			   foreach($item['display'] as $item)
			   {   
			       
			       if(!empty($item->item_file))
				   {
					   if (Storage::disk('s3')->exists($item->item_file)) 
					   {
						   $occupy_size += Storage::disk('s3')->size($item->item_file);
						   
					   }
					   else
					   {
						  $occupy_size += 0;
					   }
				   }
				   else
				   {
				      $occupy_size += 0;
				   }
				   if(!empty($item->video_file))
				   {
					   if (Storage::disk('s3')->exists($item->video_file)) 
					   {
						   
						   $occupy_size += Storage::disk('s3')->size($item->video_file);
						   
					   } 
					   else
					   {
						   $occupy_size += 0;
					   } 
				   } 
				   else
				   {
				      $occupy_size += 0;
				   }
			   }
			}
			else if($allsettings->site_s3_storage == 2)
			{
			   foreach($item['display'] as $item)
			   {   
			       
			       if(!empty($item->item_file))
				   {
					   if (Storage::disk('wasabi')->exists($item->item_file)) 
					   {
						   $occupy_size += Storage::disk('wasabi')->size($item->item_file);
						   
					   }
					   else
					   {
						  $occupy_size += 0;
					   }
				   }
				   else
				   {
				      $occupy_size += 0;
				   }
				   if(!empty($item->video_file))
				   {
					   if (Storage::disk('wasabi')->exists($item->video_file)) 
					   {
						   
						   $occupy_size += Storage::disk('wasabi')->size($item->video_file);
						   
					   } 
					   else
					   {
						   $occupy_size += 0;
					   } 
				   } 
				   else
				   {
				      $occupy_size += 0;
				   }
			   }
			}
			else
			{
			   foreach($item['display'] as $item)
			   {
			        $filepath = public_path('storage/items/'.$item->item_file);
					$videopath =  public_path('storage/items/'.$item->video_file);
					if(!empty($item->item_file))
				    {
						if (file_exists($filepath)) 
						{
						   $occupy_size += File::size(public_path('storage/items/'.$item->item_file));
						}
						else
						{
						   $occupy_size += 0;
						}
					}
					else
					{
					   $occupy_size += 0;
					}	
					if(!empty($item->video_file))
				    {
					   if (file_exists($videopath)) 
						{
						   $occupy_size += File::size(public_path('storage/items/'.$item->video_file));
						}
						else
						{
						   $occupy_size += 0;
						}
					  
					}
					else
					{
					   $occupy_size += 0;
					}
			   }
			   		
			}
	    }
		else
		{
		  $occupy_size = 0;  
		} 
		return $occupy_size;
		
	}
	
	public static function count_rating($rate_var) 
    {
	   
	    if(count($rate_var) != 0)
        {
           $top = 0;
           $bottom = 0;
           foreach($rate_var as $view)
           { 
              if($view->rating == 1){ $value1 = $view->rating*1; } else { $value1 = 0; }
              if($view->rating == 2){ $value2 = $view->rating*2; } else { $value2 = 0; }
              if($view->rating == 3){ $value3 = $view->rating*3; } else { $value3 = 0; }
              if($view->rating == 4){ $value4 = $view->rating*4; } else { $value4 = 0; }
              if($view->rating == 5){ $value5 = $view->rating*5; } else { $value5 = 0; }
              $top += $value1 + $value2 + $value3 + $value4 + $value5;
              $bottom += $view->rating;
           }
           if(!empty(round($top/$bottom)))
           {
             $count_rating = round($top/$bottom);
           }
           else
           {
              $count_rating = 0;
            }
        }
        else
        {
            $count_rating = 0;
        }  
	    
	    
		return $count_rating;
        
    }
	
	public static function price_info($flash_var,$price_var) 
    {
	    if($flash_var == 1)
        {
        $price = round($price_var/2);
        }
        else
        {
        $price = $price_var;
        }
		return $price;
	}
	
	
	public static function price_format($position,$price,$type) 
    {
	    $allsettings = Settings::allSettings();
		if($type == "symbol") { $pre = $allsettings->site_currency_symbol; } else { $pre = $allsettings->site_currency; }
	    if($position == "left")
        {
        $price_info = $pre.$price;
        }
        else
        {
        $price_info = $price.$pre;
        }
		return $price_info;
	}
	
	
	public static function Email_Subject($id)
	{
	   $checktemp = EmailTemplate::checkTemplate($id);
	   if($checktemp != 0)
	   { 
	      $template_view = EmailTemplate::viewTemplate($id);
		  return $template_view->et_subject;
	   } 
	   
	}
	
	public static function Email_Content($id,$search,$replace)
	{
	   $checktemp = EmailTemplate::checkTemplate($id);
	   if($checktemp != 0)
	   { 
	      $template_view = EmailTemplate::viewTemplate($id);
		  return str_replace($search,$replace,$template_view->et_content);
	   } 
	   
	}
	
	public static function if_purchased($token)
	{
	   if (Auth::check()) 
	   {
		  $checkif_purchased = Items::ifpurchaseCount($token);
	   }
	   else
	   {
			$checkif_purchased = 0;
	   }
	  return $checkif_purchased;
	   
	}
	
	
	public static function member_count()
	{
	   $member_count = Members::footermemberData();
	   return $member_count;
	}
	
}