<?php

namespace Fickrr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Auth;
use Fickrr\Models\Import;
use Fickrr\Models\Items;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
	
   public function model(array $row)
    {
	     
	    
           $data = Items::findProduct($row[2]);
		   if($row[10] == ""){ $item_file = ""; } else { $item_file = $row[10]; }
		   if($row[16] == ""){ $item_category_parent = ""; } else { $item_category_parent = $row[16]; }
		   if($row[24] == ""){ $seller_money_back = 0; } else { $seller_money_back = $row[24]; }
		   if($row[25] == ""){ $seller_money_back_days = 0; } else { $seller_money_back_days = $row[25]; }
		   if($row[43] == ""){ $item_views = 0; } else { $item_views = $row[43]; }
		   if($row[44] == ""){ $free_download = 0; } else { $free_download = $row[44]; }
		   if($row[47] == ""){ $future_update = 0; } else { $future_update = $row[47]; }
		   if($row[48] == ""){ $item_support = 0; } else { $item_support = $row[48]; }
		   if($row[51] == ""){ $download_count = 0; } else { $download_count = $row[51]; }
		   if($row[52] == ""){ $item_flash = 0; } else { $item_flash = $row[52]; }
		   if($row[53] == ""){ $item_flash_request = 0; } else { $item_flash_request = $row[53]; }
		   if($row[59] == ""){ $item_status = 0; } else { $item_status = $row[59]; }
		   
		   
          if (empty($data)) {
          
					  return new Import([
					   'user_id'    => $row[1], 
					   'item_token' => $row[2],
					   'subscription_item' => $row[3],
					   'item_name' => $row[4],
					   'item_slug' => $row[5],
					   'item_desc' => $row[6],
					   'item_shortdesc' => $row[7],
					   'item_thumbnail' => $row[8],
					   'item_preview' => $row[9],
					   'item_file' => $item_file,
					   'file_type' => $row[11],
					   'item_file_link' => $row[12],
					   'item_delimiter' => $row[13],
					   'item_serials_list' => $row[14],
					   'item_category' => $row[15],
					   'item_category_parent' => $item_category_parent,
					   'item_category_type' => $row[17],
					   'item_type_cat_id' => $row[18],
					   'item_type' => $row[19],
					   'item_type_id' => $row[20],
					   'regular_price' => $row[21],
					   'extended_price' => $row[22],
					   'seller_refund_term' => $row[23],
					   'seller_money_back' => $seller_money_back,
					   'seller_money_back_days' => $seller_money_back_days,
					   'compatible_browsers' => $row[26],
					   'package_includes' => $row[27],
					   'package_includes_two' => $row[28],
					   'columns' => $row[29],
					   'layout' => $row[30],
					   'package_includes_three' => $row[31],
					   'layered' => $row[32],
					   'cs_version' => $row[33],
					   'print_dimensions' => $row[34],
					   'pixel_dimensions' => $row[35],
					   'package_includes_four' => $row[36],
					   'demo_url' => $row[37],
					   'video_preview_type' => $row[38],
					   'video_file' => $row[39],
					   'video_url' => $row[40],
					   'item_tags' => $row[41],
					   'item_liked' => $row[42],
					   'item_views' => $item_views,
					   'free_download' => $free_download,
					   'item_featured' => $row[45],
					   'item_sold' => $row[46],
					   'future_update' => $future_update,
					   'item_support' => $item_support,
					   'created_item' => $row[49],
					   'updated_item' => $row[50],
					   'download_count' => $download_count,
					   'item_flash' => $item_flash,
					   'item_flash_request' => $item_flash_request,
					   'item_allow_seo' => $row[54],
					   'item_seo_keyword' => $row[55],
					   'item_seo_desc' => $row[56],
					   'audio_file' => $row[57],
					   'drop_status' => $row[58],
					   'item_status' => $item_status,
					   
					]);
		  
		  
              } 
     
	    
	
        
    }
   
   
  
  
}
