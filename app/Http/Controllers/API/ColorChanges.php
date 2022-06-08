<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AppearanceSetting;
use App\User;
 
class ColorChanges extends Controller
{
    public function index(Request $request) {
        header('Access-Control-Allow-Headers: *');

    
        $shop_name = $request->input('store_name');
        
        $user_name = User::where('name',$shop_name)->first();
        
        $user_script_tag = AppearanceSetting::where('user_id',$user_name->id)->first();
       
        
        //echo $user_script_tag->button360Color;
        
        $jsonstring = json_encode([
            'button360Color' =>$user_script_tag->button360Color,
            'text_changed360view' =>$user_script_tag->text_changed360view,
            'image360_backgroundColor' =>$user_script_tag->image360_backgroundColor,
            'home_buttonColor' =>$user_script_tag->home_buttonColor,
            'homebuttontextColor' =>$user_script_tag->homebuttontextColor,
            'Inhomeimg_backgroundColor' =>$user_script_tag->Inhomeimg_backgroundColor,
            'whishlistColorIcon' =>$user_script_tag->whishlistColorIcon,
            'whishlistColor' =>$user_script_tag->whishlistColor,
            'tracking_button_backgroundColor' =>$user_script_tag->tracking_button_backgroundColor,
            'textSize360' =>$user_script_tag->textSize360,
            'textSizeHomeButton' =>$user_script_tag->textSizeHomeButton,
            'textSizewishlistButton' =>$user_script_tag->textSizewishlistButton,
            'tracking_button_fontsize' =>$user_script_tag->tracking_button_fontsize,
            'peview_button_background_color' =>$user_script_tag->peview_button_background_color,
            'upload_font_awesome360' =>$user_script_tag->upload_font_awesome360,
            'inhome_upload_fontAwesome' =>$user_script_tag->inhome_upload_fontAwesome,
            'whishlist_font_awesome' =>$user_script_tag->whishlist_font_awesome,
            'preview_font_awesome' =>$user_script_tag->preview_font_awesome,
            
            'buttonHeight360' =>$user_script_tag->buttonHeight360,
            'buttonwidth360' =>$user_script_tag->buttonwidth360,
            'button_borderradius360' =>$user_script_tag->button_borderradius360,
            
            'Inhomebuttonheight' =>$user_script_tag->Inhomebuttonheight,
            'Inhomebuttonwidth' =>$user_script_tag->Inhomebuttonwidth,
            'Inhomebutton_borderradius' =>$user_script_tag->Inhomebutton_borderradius,
            
            'whishlistButtonheight' =>$user_script_tag->whishlistButtonheight,
            'whishlistButtonwidth' =>$user_script_tag->whishlistButtonwidth,
            'whishlistButton_borderRadius' =>$user_script_tag->whishlistButton_borderRadius,
            
            'previewbuttonheight' =>$user_script_tag->previewbuttonheight,
            'previewbuttonwidth' =>$user_script_tag->previewbuttonwidth,
            'previewButton_borderadius' =>$user_script_tag->previewButton_borderadius,
            'remove_whishlist_font_icon' =>$user_script_tag->remove_whishlist_font_icon,
            
            
            'whishlist_remove_icon_text_color' =>$user_script_tag->whishlist_remove_icon_text_color,
            'whishlist_remove_icon_background_color' =>$user_script_tag->whishlist_remove_icon_background_color,
            'whishlist_remove_icon_font_size' =>$user_script_tag->whishlist_remove_icon_font_size,
            
              'whishlist_remove_icon_buttonheight' =>$user_script_tag->whishlist_remove_icon_buttonheight,
            'whishlist_remove_icon_buttonwidth' =>$user_script_tag->whishlist_remove_icon_buttonwidth,
            'whishlist_remove_icon_borderadius' =>$user_script_tag->whishlist_remove_icon_borderadius,
        

        ]);
        echo $jsonstring;
    }
}
