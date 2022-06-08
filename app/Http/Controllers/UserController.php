<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;

use Osiset\BasicShopifyAPI\Session;
use Osiset\ShopifyApp\Services\ShopSession;
use Auth;
use App\Snippet;
use App\AppearanceSetting;
use File;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /*
     * call the toggle functionality when enalbed or
     *  disabled
    */
   public function index(Request $request) {


        $shop =  auth()->user();
        $user_script_tag = Snippet::where('user_id',$shop->id)->first();

        if(request('status')==1):
              
            /*
             * if script is enabled 
             * Add or inject snitppet code check
            */
            if($user_script_tag===null):

                $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];

                for($i=0;$i<count($theme_id);$i++) {
                        $main_role   = $theme_id[$i]["role"];
                        $main_role_id  = $theme_id[$i]["id"];
                  
                    if($main_role =='main') {
                        $active_theme_id  =$main_role_id;
                        $active_theme = $main_role;
                      
                    }
                }

                $get_scripted_file = File::get(storage_path('inject_file/get_injected_script.txt'));
            
                $data_to_put = [
                        
                    "asset" => [
                        "key" =>"snippets/imersian.liquid",
                        "value" =>$get_scripted_file    
                    ]
                ]; 

                $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$data_to_put);

                Snippet::create([
                    'user_id'=>$shop->id,
                    'status'=>request('status'),
                    'shopify_scripttag_id'=>$active_theme_id
                ]);

                $this->include_snippet($active_theme_id,$shop);
                    return 1;

            else:
                
                $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];

                    for($i=0;$i<count($theme_id);$i++) {
                        $main_role   = $theme_id[$i]["role"];
                        $main_role_id  = $theme_id[$i]["id"];
                  
                        if($main_role =='main') {
                            $active_theme_id  =$main_role_id;
                            $active_theme = $main_role;
                          
                        }
                    }

                $get_scripted_file = File::get(storage_path('inject_file/get_injected_script.txt'));
                
                $updated_data= [
                        
                    "asset" => [
                        "key" =>"snippets/imersian.liquid",
                        "value" =>$get_scripted_file
                    ]
                ]; 

                $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$updated_data);
                
                Snippet::where('user_id',$shop->id)->update([
                    'status'=>request('status'),
                    'shopify_scripttag_id'=>$active_theme_id
                
                ]);

                $this->include_snippet($active_theme_id,$shop);
                return 1;

            endif;
        else:

            if($user_script_tag!=null && $user_script_tag->count() ):
                
                $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
                    
                    for($i=0;$i<count($theme_id);$i++) {

                        $main_role   = $theme_id[$i]["role"];
                        $main_role_id  = $theme_id[$i]["id"];
                  
                        if($main_role =='main') {

                            $active_theme_id  =$main_role_id;
                            $active_theme = $main_role;
                      
                        }
                    }

                Snippet::where('user_id',$shop->id)->update([
                    'status'=>0,
                    'shopify_scripttag_id'=>0
                ]);

            $shop->api()->rest('DELETE','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'snippets/imersian.liquid']);

            $updated_data_test= [
                
                "asset" => [
                    "key" =>"snippets/imersian-3D-AR-buttons.liquid",
                    "value" =>'<style>.test {display:block}</style>'
                ]
            ]; 

            $shop->api()->rest('POST','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$updated_data_test);
                return 0;
            endif;
        endif;
   }
    
    /*
     *
     * include snippet on active theme
    */
   public function include_snippet($active_theme_id,$shop) {
       
        /****** add button snippet app 360 *****/
        $user_script_tag_check = Snippet::where('user_id',$shop->id)->first();
            if(empty($user_script_tag_check->scripted_checked)):
                    $set_snippet_file = File::get(storage_path('inject_file/get360_file_snippet.txt'));
            
                $data_to_put_post = [
                    
                    "asset" => [
                        "key" =>"snippets/imersian-3D-AR-buttons.liquid",
                        "value" =>$set_snippet_file
                        
                    ]
                ];
                $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$data_to_put_post);
                
                Snippet::where('user_id',$shop->id)->update([
                    'scripted_checked'=>1

                ]);
           
            endif;
            
            /************** ******************** end ********/
            $html = $shop->api()->rest('GET','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'layout/theme.liquid'])['body']['asset']['value'];
            $app_include = "{% comment %}//btnhider start {% endcomment %}"."\n {% capture snippet_content %}\n {% include '".'imersian'."'%} \n{% endcapture %} \n{%unless snippet_check contains 'Liquid error' %} \n {{ snippet_content }}\n {% endunless %}\n"."{% comment %}//btnhider end {% endcomment %}";
       
            if(strpos($html, '{% comment %}//btnhider start {% endcomment %}')===false):
                    $pos = strpos($html,'</body>');
                    $newhtml = substr($html, 0, $pos).$app_include.substr($html,$pos);
                
                        $toupdate = [
                          "asset"  => [
                                "key" =>"layout/theme.liquid",
                                "value" =>$newhtml
                            ]  
                        ];
                
                    $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$toupdate);
                
            endif;
      
   }


    /*
     *  Save appearance setting for shop user
     *
    */
   public function apperanceSetting(Request $request) {
         
        $shop =  auth()->user();
        
        $check_user_id = AppearanceSetting::where('user_id',$shop->id)->first();
        
        $button360Color = $request->input('button360Color');
        $text_changed360view = $request->input('text_changed360view');
        $image360_backgroundColor = $request->input('image360_backgroundColor');
        
        $home_buttonColor = $request->input('home_buttonColor');
        $homebuttontextColor = $request->input('homebuttontextColor');
        $Inhomeimg_backgroundColor = $request->input('Inhomeimg_backgroundColor');
        
        $whishlistColorIcon = $request->input('whishlistColorIcon');
        $whishlistColor = $request->input('whishlistColor');
        $tracking_button_backgroundColor = $request->input('tracking_button_backgroundColor');
        
        $textSize360 = $request->input('textSize360');
        $textSizeHomeButton = $request->input('textSizeHomeButton');
        $textSizewishlistButton = $request->input('textSizewishlistButton');
        $tracking_button_fontsize = $request->input('tracking_button_fontsize');
        $peview_button_background_color = $request->input('peview_button_background_color');
        
        $whishlist_remove_icon_text_color = $request->input('whishlist_remove_icon_text_color');
        $whishlist_remove_icon_background_color = $request->input('whishlist_remove_icon_background_color');
        $whishlist_remove_icon_font_size = $request->input('whishlist_remove_icon_font_size');
        
        
       if(empty($check_user_id)) { 
        
        AppearanceSetting::create([
            'user_id'=>$shop->id,
            'button360Color'=>$button360Color,
            'text_changed360view'=>$text_changed360view,
            'image360_backgroundColor'=>$image360_backgroundColor,
            'home_buttonColor'=>$home_buttonColor,
            'homebuttontextColor'=>$homebuttontextColor,
            'Inhomeimg_backgroundColor'=>$Inhomeimg_backgroundColor,
            'whishlistColorIcon'=>$whishlistColorIcon,
            'whishlistColor'=>$whishlistColor,
            'tracking_button_backgroundColor'=>$tracking_button_backgroundColor,
            'textSize360'=>$textSize360,
            'textSizeHomeButton'=>$textSizeHomeButton,
            'textSizewishlistButton'=>$textSizewishlistButton,
            'tracking_button_fontsize'=>$tracking_button_fontsize,
            'peview_button_background_color'=>$peview_button_background_color,
            
            'whishlist_remove_icon_text_color'=>$whishlist_remove_icon_text_color,
            'whishlist_remove_icon_background_color'=>$whishlist_remove_icon_background_color,
            'whishlist_remove_icon_font_size'=>$whishlist_remove_icon_font_size
    
        ]);
        echo 1;
        
        } else {
            
            AppearanceSetting::where('user_id',$shop->id)->update([
                'button360Color'=>$button360Color,
                'text_changed360view'=>$text_changed360view,
                'image360_backgroundColor'=>$image360_backgroundColor,
                'home_buttonColor'=>$home_buttonColor,
                'homebuttontextColor'=>$homebuttontextColor,
                'Inhomeimg_backgroundColor'=>$Inhomeimg_backgroundColor,
                'whishlistColorIcon'=>$whishlistColorIcon,
                'whishlistColor'=>$whishlistColor,
                'tracking_button_backgroundColor'=>$tracking_button_backgroundColor,
                'textSize360'=>$textSize360,
                'textSizeHomeButton'=>$textSizeHomeButton,
                'textSizewishlistButton'=>$textSizewishlistButton,
                'tracking_button_fontsize'=>$tracking_button_fontsize,
                'peview_button_background_color'=>$peview_button_background_color,
                'whishlist_remove_icon_text_color'=>$whishlist_remove_icon_text_color,
            'whishlist_remove_icon_background_color'=>$whishlist_remove_icon_background_color,
            'whishlist_remove_icon_font_size'=>$whishlist_remove_icon_font_size
                
            ]);
            
            echo 0;
        }
        
    }

    public function icon_upload(Request $request) {
        
        $shop =auth()->user();
  
    /**************************************************************************/
        $image_upload_360 = $request->file('image_upload_360');
    
        if(!empty($image_upload_360)) {
            $image_upload_360_extension = $image_upload_360->getClientOriginalExtension(); // getting image extension
            $image_upload_360_extension_name =microtime(true).'.'.$image_upload_360_extension;
            $image_upload_360->move('images/', $image_upload_360_extension_name);  

        } else {
        
            $image_upload_360_extension_name='';
        }
    
        /***************************************************************************/
        $inhome_upload_img = $request->file('inhome_upload_img');
        if(!empty($inhome_upload_img)) { 
            
            $inhome_upload_img_extension = $inhome_upload_img->getClientOriginalExtension(); // getting image extension
            $inhome_upload_img_extension_name =microtime(true).'.'.$inhome_upload_img_extension;
            $inhome_upload_img->move('images/', $inhome_upload_img_extension_name);
    
        /***************************************************************************/
        
        } else {
        
            $inhome_upload_img_extension_name ='';
        
        }
    
        $whishlist_upload_img = $request->file('whishlist_upload_img');
    
        /***************************************************************************/
    
        if(!empty($whishlist_upload_img)) {  
        
        /***************************************************************************/
    
        $whishlist_upload_img_extension = $whishlist_upload_img->getClientOriginalExtension(); // getting image extension
        $whishlist_upload_img_extension_name = microtime(true).'.'.$whishlist_upload_img_extension;
        $whishlist_upload_img->move('images/', $whishlist_upload_img_extension_name);
    
        /***************************************************************************/
    }   else {
        
        $whishlist_upload_img_extension_name=''; 
    }
    
        $preview_upload_icon = $request->file('preview_upload_icon');
        if(!empty($preview_upload_icon)) { 
        
    
        /***************************************************************************/
        
        $preview_upload_icon_extension = $preview_upload_icon->getClientOriginalExtension(); // getting image extension
        $preview_upload_icon_extension_name = microtime(true).'.'.$preview_upload_icon_extension;
        $preview_upload_icon->move('images/', $preview_upload_icon_extension_name);
        
        /***************************************************************************/
    
    }   else  {
        
        $preview_upload_icon_extension_name='';
        
    }
    
    /***************** check data **********/
    
    $check_userID = AppearanceSetting::select("*")
                    ->where('user_id',$shop->id)
                    ->first();
                    
    if(!empty($check_userID)) {
        
        $iconIMG_updated = DB::table('appearance_setting')
            ->where('user_id',$shop->id)
            ->update([
            'image_upload_360_extension_name'=>$image_upload_360_extension_name,
            'inhome_upload_img_extension_name'=>$inhome_upload_img_extension_name,
            'whishlist_upload_img_extension_name'=>$whishlist_upload_img_extension_name,
            'preview_upload_icon_extension_name'=>$preview_upload_icon_extension_name,
        ]);  
    
        return 1;
        
    } else {
        
            echo "insert";
        
        }

    }

     /*
   *   Insert values of font awesome
   *
   */
   public function font_awesome(Request $request) {
       
        $shop =auth()->user();
        
        $upload_font_awesome360 =   $request->input('upload_font_icon360');
        $inhome_upload_fontAwesome = $request->input('inhome_upload_fontAwesome');
        $whishlist_font_awesome = $request->input('whishlist_font_awesome');
        $preview_font_awesome = $request->input('preview_font_awesome');
        
        /********* Add upload font awesome 360 **/
        if(!empty($upload_font_awesome360)) {
            
            $upload_font_icon360_insert = $upload_font_awesome360;
        } else {
            
            $upload_font_icon360_insert='';
        }
        
        /********* Add inhome font awesome **/
        if(!empty($inhome_upload_fontAwesome)) {
            
            $inhome_upload_fontAwesome_insert = $inhome_upload_fontAwesome;
        } else {
            
            $inhome_upload_fontAwesome_insert='';
        }
        
        /********* Add whistlist font awesome  **/
        if(!empty($whishlist_font_awesome)) {
            
            $whishlist_font_awesome_insert = $whishlist_font_awesome;
        } else {
            
            $whishlist_font_awesome_insert='';
        }
        
        /********* Add preview font awesome  **/
        if(!empty($preview_font_awesome)) {
            
            $preview_font_awesome_insert = $preview_font_awesome;
        } else {
            
            $preview_font_awesome_insert='';
        }
        
        
        /***************** check data **********/
        
        $check_userID = AppearanceSetting::select("*")
                        ->where('user_id',$shop->id)
                        ->first();
                        
        if(!empty($check_userID)) {
            
            $iconIMG_updated = DB::table('appearance_setting')
                ->where('user_id',$shop->id)
                ->update([
                'upload_font_awesome360'=>$upload_font_icon360_insert,
                'inhome_upload_fontAwesome'=>$inhome_upload_fontAwesome_insert,
                'whishlist_font_awesome'=>$whishlist_font_awesome_insert,
                'preview_font_awesome'=>$preview_font_awesome_insert,
        ]);  
        
         return 1;
            
        } else {
            
            $appearanceSetting = array(
                'user_id' =>$shop->id,
                'upload_font_awesome360' =>$upload_font_icon360_insert,
                'inhome_upload_fontAwesome' =>$inhome_upload_fontAwesome_insert,
                'whishlist_font_awesome' => $whishlist_font_awesome_insert,
                'preview_font_awesome' => $preview_font_awesome_insert,
                
            );
                DB::table('appearance_setting')->insert($appearanceSetting);
            
        }
   
   }


    /*
     *   Insert values of font awesome
     *
   */
   public function button_settings(Request $request) {
       
        $shop =auth()->user();
        
        $buttonHeight360 =   $request->input('buttonHeight360');
        $buttonwidth360 = $request->input('buttonwidth360');
        $button_borderradius360 = $request->input('button_borderradius360');
        
        $Inhomebuttonheight =   $request->input('Inhomebuttonheight');
        $Inhomebuttonwidth = $request->input('Inhomebuttonwidth');
        $Inhomebutton_borderradius = $request->input('Inhomebutton_borderradius');
        
        $whishlistButtonheight =   $request->input('whishlistButtonheight');
        $whishlistButtonwidth = $request->input('whishlistButtonwidth');
        $whishlistButton_borderRadius = $request->input('whishlistButton_borderRadius');
        
        $previewbuttonheight =   $request->input('previewbuttonheight');
        $previewbuttonwidth = $request->input('previewbuttonwidth');
        $previewButton_borderadius = $request->input('previewButton_borderadius');
        
        $whishlist_remove_icon_buttonheight =   $request->input('whishlist_remove_icon_buttonheight');
        $whishlist_remove_icon_buttonwidth = $request->input('whishlist_remove_icon_buttonwidth');
        $whishlist_remove_icon_borderadius = $request->input('whishlist_remove_icon_borderadius');

        
        /********* Add upload font awesome 360 **/
        if(!empty($buttonHeight360)) {
            
            $buttonHeight_insert = $buttonHeight360;
        } else {
            
            $buttonHeight_insert='';
        }
        
        /********* Add inhome font awesome **/
        if(!empty($buttonwidth360)) {
            
            $buttonwidth_insert = $buttonwidth360;
        } else {
            
            $buttonwidth_insert='';
        }
        
        /********* Add whistlist font awesome  **/
        if(!empty($button_borderradius360)) {
            
            $button_borderradius_insert = $button_borderradius360;
        } else {
            
            $button_borderradius_insert='';
        }
        
          /********* Add Inhomebutton  button  **/
        if(!empty($Inhomebuttonheight)) {
            
            $Inhomebuttonheight_insert = $Inhomebuttonheight;
        } else {
            
            $Inhomebuttonheight_insert='';
        }
        
        if(!empty($Inhomebuttonwidth)) {
            
            $Inhomebuttonwidth_insert = $Inhomebuttonwidth;
        } else {
            
            $Inhomebuttonwidth_insert='';
        }
        
        
         if(!empty($Inhomebutton_borderradius)) {
            
            $Inhomebutton_borderradius_insert = $Inhomebutton_borderradius;
        } else {
            
            $Inhomebutton_borderradius_insert='';
        }
        
        if(!empty($whishlistButtonheight)) {
            
            $whishlistButtonheight_insert = $whishlistButtonheight;
        } else {
            
            $whishlistButtonheight_insert='';
        }
        
        if(!empty($whishlistButtonwidth)) {
            
            $whishlistButtonwidth_insert = $whishlistButtonwidth;
        } else {
            
            $whishlistButtonwidth_insert='';
        }
        
         if(!empty($whishlistButton_borderRadius)) {
            
            $whishlistButton_borderRadius_insert = $whishlistButton_borderRadius;
        } else {
            
            $whishlistButton_borderRadius_insert='';
        }
        
         if(!empty($previewbuttonheight)) {
            
            $previewbuttonheight_insert = $previewbuttonheight;
        } else {
            
            $previewbuttonheight_insert='';
        }
        
         if(!empty($previewbuttonwidth)) {
            
            $previewbuttonwidth_insert = $previewbuttonwidth;
        } else {
            
            $previewbuttonwidth_insert='';
        }
        
        if(!empty($previewButton_borderadius)) {
            
            $previewButton_borderadius_insert = $previewButton_borderadius;
        } else {
            
            $previewButton_borderadius_insert='';
        }
        
         if(!empty($whishlist_remove_icon_buttonheight)) {
            
            $whishlist_remove_icon_buttonheight_insert = $whishlist_remove_icon_buttonheight;
        } else {
            
            $whishlist_remove_icon_buttonheight_insert='';
        }
        
           if(!empty($whishlist_remove_icon_buttonwidth)) {
            
            $whishlist_remove_icon_buttonwidth_insert = $whishlist_remove_icon_buttonwidth;
        } else {
            
            $whishlist_remove_icon_buttonwidth_insert='';
        }
        
        
         if(!empty($whishlist_remove_icon_borderadius)) {
            
            $whishlist_remove_icon_borderadius_insert = $whishlist_remove_icon_borderadius;
        } else {
            
            $whishlist_remove_icon_borderadius_insert='';
        }
        
        
        /***************** check data ***********/
        
        $check_userID = AppearanceSetting::select("*")
                        ->where('user_id',$shop->id)
                        ->first();
                        
        if(!empty($check_userID)) {
            
            $iconIMG_updated = DB::table('appearance_setting')
                ->where('user_id',$shop->id)
                ->update([
                'buttonHeight360'=>$buttonHeight_insert,
                'buttonwidth360'=>$buttonwidth_insert,
                'button_borderradius360'=>$button_borderradius_insert,
                
                'Inhomebuttonheight'=>$Inhomebuttonheight,
                'Inhomebuttonwidth'=>$Inhomebuttonwidth,
                'Inhomebutton_borderradius'=>$Inhomebutton_borderradius,
                
                'whishlistButtonheight'=>$whishlistButtonheight,
                'whishlistButtonwidth'=>$whishlistButtonwidth,
                'whishlistButton_borderRadius'=>$whishlistButton_borderRadius,
                
                
                'previewbuttonheight'=>$previewbuttonheight,
                'previewbuttonwidth'=>$previewbuttonwidth,
                'previewButton_borderadius'=>$previewButton_borderadius,
                
                 'whishlist_remove_icon_buttonheight'=>$whishlist_remove_icon_buttonheight,
                'whishlist_remove_icon_buttonwidth'=>$whishlist_remove_icon_buttonwidth,
                'whishlist_remove_icon_borderadius'=>$whishlist_remove_icon_borderadius,
        ]);  
        
         return 1;
            
        } else {
            
            $appearanceSetting = array(
                'user_id' =>$shop->id,
                'buttonHeight360' =>$buttonHeight_insert,
                'buttonwidth360' =>$buttonwidth_insert,
                'button_borderradius360' => $button_borderradius_insert,
                
                'Inhomebuttonheight' =>$Inhomebuttonheight,
                'Inhomebuttonwidth' =>$Inhomebuttonwidth,
                'Inhomebutton_borderradius' => $Inhomebutton_borderradius,
                
                'whishlistButtonheight' =>$whishlistButtonheight,
                'whishlistButtonwidth' =>$whishlistButtonwidth,
                'whishlistButton_borderRadius' => $whishlistButton_borderRadius,
                
                'previewbuttonheight'=>$previewbuttonheight,
                'previewbuttonwidth'=>$previewbuttonwidth,
                'previewButton_borderadius'=>$previewButton_borderadius,
                
                'whishlist_remove_icon_buttonheight'=>$whishlist_remove_icon_buttonheight,
                'whishlist_remove_icon_buttonwidth'=>$whishlist_remove_icon_buttonwidth,
                'whishlist_remove_icon_borderadius'=>$whishlist_remove_icon_borderadius,
                
            );
            DB::table('appearance_setting')->insert($appearanceSetting);
            
        }
   
    }

    /*
     * script is added on submit button
     *
    */
    public function script_added(Request $request) {
       
        $shop =  auth()->user();
        $post_script_data =   $request->input('get_script');
       
        if(empty($post_script_data)) {
                $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
                    for($i=0;$i<count($theme_id);$i++) {
                        $main_role   = $theme_id[$i]["role"];
                        $main_role_id  = $theme_id[$i]["id"];
              
                    if($main_role =='main') {
                        $active_theme_id  =$main_role_id;
                        $active_theme = $main_role;
                          
                    }
                }
        $shop->api()->rest('DELETE','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'snippets/imersian.liquid']);
    
        $check_snippet_user_id_error = Snippet::where('user_id',$shop->id)->first();
    
        if(!empty($check_snippet_user_id_error)) {

            Snippet::where('user_id',$shop->id)->update([
                'status'=>0,
                'shopify_scripttag_id'=>0,
                'script_added_text'=>0,
            
            ]);
        }
        return "error";
         
           
       }  else  {
           
        $check_script_db = Snippet::where('user_id',$shop->id)->first();
        
        if(empty($check_script_db)) {
             
            /**************************Update script api *******/
            $this->include_script($shop,$post_script_data);
            $this->include_360_script($shop,$post_script_data);
                return "success";
            
            /*****************************end**************/
            
            } else {
             
                 Snippet::where('user_id',$shop->id)->update([
                'script_added_text'=>$post_script_data,
            ]);

                $this->include_script($shop,$post_script_data);
            
            }
           
        }
    }

    /*
     * include script when app is install
     *
    */  

    public function include_script($shop,$post_script_data) {
        
    $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
                
            for($i=0;$i<count($theme_id);$i++) {
                $main_role   = $theme_id[$i]["role"];
                $main_role_id  = $theme_id[$i]["id"];
              
                if($main_role =='main') {
                    $active_theme_id  =$main_role_id;
                    $active_theme = $main_role;
                  
                }
            }
            $data_to_put = [
                "asset" => [
                    "key" =>"snippets/imersian.liquid",
                    "value" =>$post_script_data
                ]
            ];
        
        $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$data_to_put);
        $check_snippet_user_id = Snippet::where('user_id',$shop->id)->first();
           
        if(empty($check_snippet_user_id)) {
     
            Snippet::create([
                'user_id'=>$shop->id,
                'status'=>1,
                'shopify_scripttag_id'=>$active_theme_id,
                'script_added_text'=>$post_script_data

            ]);
                
        } else {
               
            Snippet::where('user_id',$shop->id)->update([
                'status'=>1,
                'shopify_scripttag_id'=>$active_theme_id,
                'script_added_text'=>$post_script_data,
            ]);
        }
        
        return true;
         
    }

    /*
     * include script of 360 file  in shopify store
     *
    */
    public function include_360_script($shop,$post_script_data) {
        
        $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
                    
        for($i=0;$i<count($theme_id);$i++) {
                    
            $main_role   = $theme_id[$i]["role"];
            $main_role_id  = $theme_id[$i]["id"];
              
            if($main_role =='main') {
                $active_theme_id  =$main_role_id;
                $active_theme = $main_role;
            }
        }
        $get_scripted_file = File::get(storage_path('inject_file/get360_file_snippet.txt'));
        
        $data_to_put = [
            "asset" => [
                "key" =>"snippets/imersian-3D-AR-buttons.liquid",
                "value" =>$get_scripted_file
            ]
        ];
            
        $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$data_to_put);
     
        /******* include script in theme ***************************/
        
        $html = $shop->api()->rest('GET','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'layout/theme.liquid'])['body']['asset']['value'];
       
        $app_include = "{% comment %}//btnhider start {% endcomment %}"."\n {% capture snippet_content %}\n {% include '".'imersian'."'%} \n{% endcapture %} \n{%unless snippet_check contains 'Liquid error' %} \n {{ snippet_content }}\n {% endunless %}\n"."{% comment %}//btnhider end {% endcomment %}";
       
            if(strpos($html, '{% comment %}//btnhider start {% endcomment %}')===false):
                $pos = strpos($html,'</body>');
                $newhtml = substr($html, 0, $pos).$app_include.substr($html,$pos);
                
                $toupdate = [
                  "asset"  => [
                        "key" =>"layout/theme.liquid",
                        "value" =>$newhtml
                    ]  
                ];
                
            $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$toupdate);
                
        endif;
        
        /******* include script end in theme ***************************/
        
        return true;     
    }

    /*
     *  include svg file  and save to database
     *
    */
    public function svg_upload_img (Request $request) {
       

       $shop =auth()->user();

       $path = $shop->name;
       $exists = Storage::disk('s3')->exists($path);


       if($exists) {

            $image_upload_360   = $request->file('image_upload_360');
            

            if(!empty($image_upload_360)) {

                $set_path = $request->file('image_upload_360')->store($path, 's3');
                Storage::disk('s3')->setVisibility($set_path, 'private');
                $url_imgupload360  = Storage::disk('s3')->url($set_path);
                //echo $url_imgupload360.'exists';
                  // echo "insert new one 360";
            }  else  {
                //echo "testing";
                  $url_imgupload360 = $request->input('preview_360');


            }

            $inhome_upload_img = $request->file('inhome_upload_img');
            if(!empty($inhome_upload_img)) { 

                $set_path = $request->file('inhome_upload_img')->store($path, 's3');
                Storage::disk('s3')->setVisibility($set_path, 'private');
                $url_imginhome  = Storage::disk('s3')->url($set_path);
                // echo $url_imginhome.'existshome';
                // echo "insert new one inhome";
 
            } else {
               
                 $url_imginhome = $request->input('preview_inhome');
            }

             $whishlist_upload_img = $request->file('whishlist_upload_img');

              if(!empty($whishlist_upload_img)) { 

                $path_whishlist = $request->file('whishlist_upload_img')->store($path, 's3');
                Storage::disk('s3')->setVisibility($path_whishlist, 'private');
                $url_whishlist  = Storage::disk('s3')->url($path_whishlist);
                // echo $url.'existshome';
                // echo "insert new one 360";
 
            } else {

                $url_whishlist = $request->input('send_whishlist');
            }

            $preview_upload_icon = $request->file('preview_upload_icon');

            if(!empty($preview_upload_icon)) { 

                $path_previewIcon = $request->file('preview_upload_icon')->store($path, 's3');
                Storage::disk('s3')->setVisibility($path_previewIcon, 'private');
                $url_previewIcon  = Storage::disk('s3')->url($path_previewIcon);
                // echo $url.'existshome';
                // echo "insert new one 360";

            } else {

                $url_previewIcon = $request->input('send_preview');
            }

             $whistlist_remove_upload_icon = $request->file('whishlist_remove_icon_img');

            if(!empty($whistlist_remove_upload_icon)) { 

            $path_whishlistremoveIcon = $request->file('whishlist_remove_icon_img')->store($path, 's3');
            Storage::disk('s3')->setVisibility($path_whishlistremoveIcon, 'private');
            $url_removepreviewIcon  = Storage::disk('s3')->url($path_whishlistremoveIcon);
            // echo $url.'existshome';
            // echo "insert new one 360";

            } else {

                $url_removepreviewIcon =  $request->input('send_whishlist_remove_icon');
            }


        } else  {

             $directory = $path;
             Storage::disk('s3')->makeDirectory($directory);

             $image_upload_360   = $request->file('image_upload_360');


               if(!empty($image_upload_360)) {

                $set_path_imgupload360 = $request->file('image_upload_360')->store($directory, 's3');
                Storage::disk('s3')->setVisibility($set_path_imgupload360, 'private');
                $url_imgupload360  = Storage::disk('s3')->url($set_path_imgupload360);
                
                } else {

                $url_imgupload360 =  $request->input('preview_360');

            }

             $inhome_upload_img = $request->file('inhome_upload_img');

            if(!empty($inhome_upload_img)) { 

                $path_inhome = $request->file('inhome_upload_img')->store($directory, 's3');
                Storage::disk('s3')->setVisibility($path_inhome, 'private');
                $url_imginhome  = Storage::disk('s3')->url($path_inhome);
             
 
            } else {

                 $url_imginhome =  $request->input('preview_inhome');
            }

              $whishlist_upload_img = $request->file('whishlist_upload_img');
            if(!empty($url_whishlist)) { 

                $path_whishlist = $request->file('whishlist_upload_img')->store($directory, 's3');
                Storage::disk('s3')->setVisibility($path_whishlist, 'private');
                $url_whishlist  = Storage::disk('s3')->url($path_whishlist);
                // echo $url.'existshome';
                // echo "insert new one 360";
 
            } else {

                $url_whishlist = $request->input('send_whishlist');
            }

            $preview_upload_icon = $request->file('preview_upload_icon');

              if(!empty($preview_upload_icon)) { 

                $path_previewIcon = $request->file('preview_upload_icon')->store($directory, 's3');
                Storage::disk('s3')->setVisibility($path_previewIcon, 'private');
                $url_previewIcon  = Storage::disk('s3')->url($path_previewIcon);
                // echo $url.'existshome';
                // echo "insert new one 360";
 
            } else {

                 $url_previewIcon = $request->input('send_preview');
            }

            $whistlist_remove_upload_icon = $request->file('whishlist_remove_icon_img');
            
             if(!empty($url_removepreviewIcon)) { 

                $path_whishlistremoveIcon = $request->file('preview_upload_icon')->store($directory, 's3');
                Storage::disk('s3')->setVisibility($path_whishlistremoveIcon, 'private');
                $url_removepreviewIcon  = Storage::disk('s3')->url($path_whishlistremoveIcon);
              
 
            } else {

                 $url_removepreviewIcon =  $request->input('send_whishlist_remove_icon');
            }

        }

        /***************************************************************************/
        
        
        $check_userID = AppearanceSetting::select("*")
                        ->where('user_id',$shop->id)
                        ->first();
                        
        if(!empty($check_userID)) {
            
            $iconIMG_updated = DB::table('appearance_setting')
                ->where('user_id',$shop->id)
                ->update([
                'upload_font_awesome360'=>$url_imgupload360,
                'inhome_upload_fontAwesome'=>$url_imginhome,
                 'whishlist_font_awesome'=>$url_whishlist,
                 'preview_font_awesome'=>$url_previewIcon,
                  'remove_whishlist_font_icon'=>$url_removepreviewIcon,
        ]);  
        
         return 1;
            
        } else {
                $iconIMG_insert = array(
                    'user_id' =>$shop->id,
                    'upload_font_awesome360'=>$url_imgupload360,
                    'inhome_upload_fontAwesome'=>$url_imginhome,
                    'whishlist_font_awesome'=>$url_whishlist,
                    'preview_font_awesome'=>$url_previewIcon,
                    'remove_whishlist_font_icon'=>$url_removepreviewIcon,

            );
                DB::table('appearance_setting')->insert($iconIMG_insert);
                return 1;
            
        }
    }

    /*
     * route for testing purpose only 
     *
    */
    public function test1(Request $request) {
            
        $url = "https://29264df408b3f310dc688d636f0d01a4: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@imersianx.myshopify.com/admin/api/2021-10/themes/122661208202/assets.json?asset[key]=sections/product-template.liquid";  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec ($curl);
        curl_close ($curl);
        
        $obj = json_decode($response);
        
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
        $shop = User::where('id',11)->first();
        echo "<pre>";
        print_r($shop);
        die;
        $html = $shop->api()->rest('GET','/admin/api/2021-10/themes/122661208202/assets.json',['asset[key]'=>'layout/product-template.liquid'])['body']['asset']['value'];
        
        echo "<pre>";
        print_r($html);
        die;
    }


}

