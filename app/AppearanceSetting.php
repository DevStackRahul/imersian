<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppearanceSetting extends Model
{
    protected $table = 'appearance_setting';
   
    protected $fillable = [
        'id','user_id', 'button360Color','text_changed360view','image360_backgroundColor','home_buttonColor','homebuttontextColor','Inhomeimg_backgroundColor','whishlistColorIcon','whishlistColor','tracking_button_backgroundColor','textSize360','textSizeHomeButton','textSizewishlistButton','tracking_button_fontsize','peview_button_background_color','upload_font_awesome360','inhome_upload_fontAwesome','whishlist_font_awesome','preview_font_awesome','buttonHeight360','buttonwidth360','button_borderradius360','Inhomebuttonheight','Inhomebuttonwidth','Inhomebutton_borderradius','whishlistButtonheight','whishlistButtonwidth','whishlistButton_borderRadius','previewbuttonheight','previewbuttonwidth','previewButton_borderadius','remove_whishlist_font_icon','whishlist_remove_icon_text_color','whishlist_remove_icon_background_color','whishlist_remove_icon_font_size',
    ];
}
