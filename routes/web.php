<?php

use Illuminate\Support\Facades\Route;
use App\Snippet;
use App\User;

use App\AppearanceSetting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


      // check Add the snippets
      $shop =  auth()->user();

        // end 
      //   $theme_id = $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
                  
      //   for($i=0;$i<count($theme_id);$i++) {
                  
      //     $main_role   = $theme_id[$i]["role"];
      //     $main_role_id  = $theme_id[$i]["id"];
            
      //     if($main_role =='main') {
      //         $active_theme_id  =$main_role_id;
      //         $active_theme = $main_role;
      //     }
      //   }    


      // /******* include script in theme ***************************/
        
      //   $html = $shop->api()->rest('GET','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'layout/theme.liquid'])['body']['asset']['value'];
       
      //   $app_include = "test";
       
      //       if(strpos($html, '{% comment %}//btnhider start {% endcomment %}')==true):
      //           $pos = strpos($html,'</body>');

      //              print_r($pos);
               
      //           $newhtml = substr($html, 0, $pos).$app_include.substr($html,$pos);


      //           // $toupdate = [
      //           //   "asset"  => [
      //           //         "key" =>"layout/theme.liquid",
      //           //         "value" =>$newhtml
      //           //     ]  
      //           // ];

      //         $toupdate =  array('asset'=> array('key' =>'layout/theme.liquid','value'=>$newhtml  ));
                  

      //        $test = $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',$toupdate);
               
      //        print_r($test);
      //        die; 
      //   endif;
        
      //   die;
      /******* include script end in theme ***************************/

    

    // $theme_id = $shop->api()->rest('GET','/admin/api/2022-01/webhooks.json');
    //   echo "<pre>";

    //   print_r($theme_id);
    //   die;
     // $url = "https://29264df408b3f310dc688d636f0d01a4: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@imersianz.myshopify.com/admin/api/2021-10/themes.json";
     //    $curl = curl_init($url);
     //    curl_setopt($curl, CURLOPT_URL, $url);
     //    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
     //    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
     //    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
     //    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
     //    $resp = curl_exec($curl);
     //    curl_close($curl);

       
     //    $theme_id = json_decode($resp, JSON_PRETTY_PRINT)['themes'];
        

     //         for($i=0;$i<count($theme_id);$i++) {
                    
     //            $main_role   = $theme_id[$i]["role"];
     //            $main_role_id  = $theme_id[$i]["id"];
                  
     //            if($main_role =='main') {
     //                $active_theme_id  =$main_role_id;
     //                $active_theme = $main_role;
                      
     //            }
     //        }
     //         echo "<pre>";
     //     print_r($active_theme_id);

     //    die;

                
                // $get_userDatadf  = User::where('name','imersianz.myshopify.com')->first();
                // echo "<pre>";
                // info($get_userDatadf );
                // die;

                // $theme_id = $get_userDatadf->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];

                // echo "<pre>";
                // print_r($theme_id);
                // die;
        
        
       // $script_deleted  = Snippet::where('user_id',$get_userData->id)->first();

    //$theme_id = $get_userDatadf->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];

     //             $get_userData  = User::where('name','imersianz.myshopify.com')->first();
     // $theme_id = $get_userData->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];

     //      for($i=0;$i<count($theme_id);$i++) {
                    
     //            $main_role   = $theme_id[$i]["role"];
     //            $main_role_id  = $theme_id[$i]["id"];
                  
     //            if($main_role =='main') {
     //                $active_theme_id  =$main_role_id;
     //                $active_theme = $main_role;
                      
     //            }
     //        }

     //        $test= $get_userData->api()->rest('DELETE','/admin/api/2021-10/themes/'.$active_theme_id.'/assets.json',['asset[key]'=>'snippets/imersian.liquid']);

            // echo "<pre>";
            // print_r($test);
            // die;
             

            // $contents = $files = Storage::disk('s3')->files('imersian.myshopify.com');
            // echo "<pre>";
            // print_r($contents);
            // die;


     $get_status_toggle  = Snippet::where('user_id',auth()->user()->id)->first();
     $get_appearanceSetting  = AppearanceSetting::where('user_id',auth()->user()->id)->first();
     
   return view('welcome',['get_status'=>$get_status_toggle,'get_setting'=>$get_appearanceSetting]);
})->middleware(['verify.shopify','billable'])->name('home');

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::post('/enable-snippet', 'UserController@index')->middleware(['verify.shopify'])->name('btn.toggler');

Route::post('/enable-button', 'UserController@apperanceSetting')->middleware(['verify.shopify'])->name('appearance-setting');

//Route::post('/icon-upload', 'UserController@icon_upload')->middleware(['verify.shopify'])->name('icon-upload');

Route::post('/font-awesome', 'UserController@font_awesome')->middleware(['verify.shopify'])->name('font-awesome');

Route::post('/button-settings', 'UserController@button_settings')->middleware(['verify.shopify'])->name('button-settings');

Route::post('/script-added', 'UserController@script_added')->middleware(['verify.shopify'])->name('script-added');

Route::post('/svg-upload-img', 'UserController@svg_upload_img')->middleware(['verify.shopify'])->name('svg-upload-img');

Route::get('/test', 'UserController@test1')->name('test');










