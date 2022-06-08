@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
    
     <!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Dashboard</title>  
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
      <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}">

      <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}" />

          <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}" />
    <!-- Highlight Syntax -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/highlight.js/styles/github.css') }}" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet.css') }}" />


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
      
      
   </head>
   <body>
      
        <div class="demo">
            <div role="tabpanel" class="main-content">
                <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-tabs-dropdown" role="tablist">
                       <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Instructions</a></li>
                       <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Settings</a></li>
                       <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Appearance</a></li>
                    </ul>
                    
                <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            
                            @include('store.instruction')
                            
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                           @include('store.setting')
                        
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <ul class="nav nav-tabs nav-justified nav-tabs-dropdown" role="tablist1">
                            <li role="presentation" class="active"><a href="#color" aria-controls="home" role="tab" data-toggle="tab">Buttons Color</a></li>
                            <li role="presentation"><a href="#color1" aria-controls="home" role="tab" data-toggle="tab"> SVG Upload </a></li>
                            <li role="presentation"><a href="#button_setting" aria-controls="settings" role="tab" data-toggle="tab"> Button Setting </a></li>
                            </ul>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="color">
                                 @include('store.appearance')
                                </div>
                                <div role="tabpanel" class="tab-pane" id="color1">
                                    @include('store.font-awesome')
                                </div>
                                <div role="tabpanel" class="tab-pane" id="button_setting">
                                    @include('store.button-settings')
                                </div>
                            </div>
                        </div>
                        
                    </div>
                
            </div>
            
               
        </div>
        
          
    
@endsection


@section('scripts')
    @parent
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Highlight JS -->
    <script src="{{ asset('assets/vendor/highlight.js/highlight.min.js') }}"></script>

    <!-- Custom Script -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@3.1.7/src/bootstrap-input-spinner.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    <script  src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min-1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
    <script src="{{ asset('js/toggle.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    
    <script>
    //     $('.toggle-class').change(function() {
            
    //         var status = $(this).prop('checked') == true ? 1 : 0; 

    //         //var user_id = $(this).data('id'); 
    //       // alert(status);
        
    //         if(status==1) {
    //              $(this).val(1);
                 
    //         } else {
    //              $(this).val(0);
    //         }
            
    //         $.ajax({
    //             type: 'POST',
    //             url: '{{ route("btn.toggler") }}',
    //             data:({ "status":$(this).val() }),
    //             success: function (data) {
    //                   if(data==1) {
    //                       toastr.info('Script is Enabled!');
    //                 } else {
    //                      // $("#script_success").css("display", "none");
    //                      toastr.warning('Script is Disabled!'); 
    //                   }
    //                 console.log(data);
    //             }
    //         });
    
    // });

    </script>
    
    <script>
         $("#fader").on("input",function () {     

				var test =  $(this).val();
                 $('#v-28').css("font-size", $(this).val() + "px");
				 $('#fontsize').text(test);
         });

         $("#fader1").on("input",function () {
				var test =  $(this).val();
                 $('#v-281').css("font-size", $(this).val() + "px");
				 $('#fontsize1').text(test);
         });

          $("#fader2").on("input",function () {
				var test =  $(this).val();
                 $('#v-282').css("font-size", $(this).val() + "px");
				 $('#fontsize2').text(test);
         });
         
          $("#fader3").on("input",function () {
				var test =  $(this).val();
                 $('#v-283').css("font-size", $(this).val() + "px");
				 $('#fontsize3').text(test);
         });
         
         $("#fader4").on("input",function () {
				var test =  $(this).val();
                 $('#v-284').css("font-size", $(this).val() + "px");
				 $('#fontsize4').text(test);
         });
    </script>
    
    <!-- Appearance setting saved-->
    <script>
        $( document ).ready(function() {
            
            $('#colorpicker').on('input', function() {
	$('#hexcolor1').val(this.value);
});

        $('#text_changed360view').on('input', function() {
	$('#hex_text_changed360view').val(this.value);
});

   $('#image360_backgroundColor').on('input', function() {
	$('#hex_image360_backgroundColor').val(this.value);
});

 $('#whishlist_remove_icon_text_color').on('input', function() {
	$('#hextracking_whishlist_remove_icon_text_color').val(this.value);
});

 $('#whishlist_remove_icon_background_color').on('input', function() {
	$('#hex_whishlist_remove_icon_background_color').val(this.value);
});



$('#hexcolor1').on('input', function() {
  $('#colorpicker').val(this.value);
}); 

$('#hex_text_changed360view').on('input', function() {
  $('#text_changed360view').val(this.value);
}); 
    $('#hex_image360_backgroundColor').on('input', function() {
      $('#image360_backgroundColor').val(this.value);
    }); 
    
     $('#hextracking_whishlist_remove_icon_text_color').on('input', function() {
	$('#whishlist_remove_icon_text_color').val(this.value);
});
            
            
             $('#hex_whishlist_remove_icon_background_color').on('input', function() {
	$('#whishlist_remove_icon_background_color').val(this.value);
});
            
            
                        
            $('#colorpicker1').on('input', function() {
    $('#hexcolor2').val(this.value);
    });

     $('#hex_homebuttontextColor').on('input', function() {
	$('#homebuttontextColor').val(this.value);
});

     $('#hex_Inhomeimg_backgroundColor').on('input', function() {
	$('#Inhomeimg_backgroundColor').val(this.value);
});

      $('#homebuttontextColor').on('input', function() {
	$('#hex_homebuttontextColor').val(this.value);
});

 $('#Inhomeimg_backgroundColor').on('input', function() {
	$('#hex_Inhomeimg_backgroundColor').val(this.value);
});




        $('#hexcolor2').on('input', function() {
          $('#colorpicker1').val(this.value);
    }); 
            
                                    
                $('#colorpicker2').on('input', function() {
    	$('#hexcolor3').val(this.value);
    });
    $('#hexcolor3').on('input', function() {
      $('#colorpicker2').val(this.value);
    }); 
    
    
    $('#tracking_button_backgroundColor').on('input', function() {
          $('#hextracking_button_backgroundColor').val(this.value);
        }); 
    
    
     $('#peview_button_background_color').on('input', function() {
          $('#hextpeview_button_background_color').val(this.value);
        }); 
        
        
        $('#whishlistColorIcon').on('input', function() {
          $('#hexwhishlistColorIcon').val(this.value);
        }); 
        
         $('#hexwhishlistColorIcon').on('input', function() {
          $('#whishlistColorIcon').val(this.value);
        }); 
        
         $('#hextracking_button_backgroundColor').on('input', function() {
          $('#tracking_button_backgroundColor').val(this.value);
        });
        
           $('#hextpeview_button_background_color').on('input', function() {
          $('#peview_button_background_color').val(this.value);
        });
        
        
    
    
            
            
            

            $("#submit_appearance").click(function(){
                var button360Color =  $('#colorpicker').val();
                var text_changed360view =  $('#text_changed360view').val();
                var image360_backgroundColor =  $('#image360_backgroundColor').val();
                
                var home_buttonColor =  $('#colorpicker1').val();
                var homebuttontextColor =  $('#homebuttontextColor').val();
                var Inhomeimg_backgroundColor =  $('#Inhomeimg_backgroundColor').val();
                  
                 var whishlistColorIcon =  $('#whishlistColorIcon').val();
               
                var whishlistColor =  $('#colorpicker2').val();
                
                var tracking_button_backgroundColor =  $('#tracking_button_backgroundColor').val();
                
                var textSize360 =  $('#fader').val();
                var textSizeHomeButton =  $('#fader1').val();
                var textSizewishlistButton =  $('#fader2').val();
                
                var tracking_button_fontsize =  $('#fader3').val();
               
                
                var peview_button_background_color =  $('#peview_button_background_color').val();
                
                
                var whishlist_remove_icon_text_color =  $('#whishlist_remove_icon_text_color').val();
                 var whishlist_remove_icon_background_color =  $('#whishlist_remove_icon_background_color').val();
                 var whishlist_remove_icon_font_size =  $('#fader4').val();
              
             
                 $.ajax({
                    type: 'POST',
                    url: "{{ route('appearance-setting') }}",
                   // dataType: "json",
                    data:({"button360Color":button360Color,"text_changed360view":text_changed360view,"image360_backgroundColor":image360_backgroundColor,"home_buttonColor":home_buttonColor,"homebuttontextColor":homebuttontextColor,"Inhomeimg_backgroundColor":Inhomeimg_backgroundColor,"whishlistColorIcon":whishlistColorIcon,"whishlistColor":whishlistColor,"tracking_button_backgroundColor":tracking_button_backgroundColor,"textSize360":textSize360,"textSizeHomeButton":textSizeHomeButton,"textSizewishlistButton":textSizewishlistButton,"tracking_button_fontsize":tracking_button_fontsize,"peview_button_background_color":peview_button_background_color,"whishlist_remove_icon_text_color":whishlist_remove_icon_text_color,"whishlist_remove_icon_background_color":whishlist_remove_icon_background_color,"whishlist_remove_icon_font_size":whishlist_remove_icon_font_size}),
                    success: function (data) {
                        toastr.info('Your Data has been saved!');
                    }
                });
              
            }); 
            
            $("#iconupload_submitButton").click(function() {
                $("#iconupload_submitButton").prop('disabled', true); //disable 
                 var image_upload_360_check = document.getElementById('image_upload_360');
                     var image_upload_360 = image_upload_360_check.files[0];
                     
                 var inhome_upload_img_check= document.getElementById('inhome_upload_img');
                    var inhome_upload_img = inhome_upload_img_check.files[0];
                 var whishlist_upload_img_check = document.getElementById('whishlist_upload_img');
                    var whishlist_upload_img = whishlist_upload_img_check.files[0];
                 var preview_upload_icon_check = document.getElementById('preview_upload_icon');
                    var preview_upload_icon = preview_upload_icon_check.files[0];
                 
                 
                 var postData=new FormData();
                    postData.append('image_upload_360',image_upload_360);
                    postData.append('inhome_upload_img',inhome_upload_img);
                    postData.append('whishlist_upload_img',whishlist_upload_img);
                    postData.append('preview_upload_icon',preview_upload_icon);
                    
                   
                    var url="{{ url('icon-upload') }}";
                    
                    
                    $.ajax({
                    	headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
                    	async:true,
                    	type:"post",
                    	contentType:false,
                    	url:url,
                    	data:postData,
                    	processData:false,
                    	success:function(response){
                    	   toastr.info('Your Data has been Updated successfully!');
                    	   
                            setTimeout(function() {
                                $("#iconupload_submitButton").prop('disabled', false); //disable 
                            }, 2000);
                    
                    	}
                    });
                
            });
            
            // submit value using ajax
             $("#font_awesomeUploadButton").click(function() {
                 
                $("#font_awesomeUploadButton").prop('disabled', true); //disable 
                   var upload_font_icon360 =  document.getElementById('upload-font-icon360');
                        var upload_font_icon360_img = upload_font_icon360.files[0];
                    
                    var inhome_upload_fontAwesome =  document.getElementById('inhome_upload_fontAwesome');
                        var inhome_upload_fontAwesome_img = inhome_upload_fontAwesome.files[0];
                        
                    var whishlist_font_awesome = document.getElementById('whishlist_font_awesome');
                        var whishlist_font_awesome_img = whishlist_font_awesome.files[0];
                        
                     var preview_font_awesome = document.getElementById('preview_font_awesome');
                        var preview_font_awesome_img = preview_font_awesome.files[0];
                        
                    var whishlist_remove_icon = document.getElementById('whishlist_remove_icon');
                        var whishlist_remove_icon_img = whishlist_remove_icon.files[0];
                        
                        
                        var preview_360 =  $('#preview_360').val();
                        //alert(preview_360);
                         var preview_inhome =  $('#preview_inhome').val();
                          var send_whishlist =  $('#send_whishlist').val();
                           var send_preview =  $('#send_preview').val();
                             var send_whishlist_remove_icon =  $('#send_whishlist_remove_icon').val();
                        
                    var postData=new FormData();
                    
                    postData.append('image_upload_360',upload_font_icon360_img);
                    postData.append('inhome_upload_img',inhome_upload_fontAwesome_img);
                    postData.append('whishlist_upload_img',whishlist_font_awesome_img);
                    postData.append('preview_upload_icon',preview_font_awesome_img);
                    postData.append('whishlist_remove_icon_img',whishlist_remove_icon_img);
                    
                    postData.append('preview_360',preview_360);
                    postData.append('preview_inhome',preview_inhome);
                    postData.append('send_whishlist',send_whishlist);
                    postData.append('send_preview',send_preview);
                    postData.append('send_whishlist_remove_icon',send_whishlist_remove_icon);
                    
                    var url="{{ url('svg-upload-img') }}";
                    
                    
                    
                     $.ajax({
                    	headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
                    	async:true,
                    	type:"post",
                    	contentType:false,
                    	url:url,
                    	data:postData,
                    	processData:false,
                    	success:function(response){
                    	   //  alert(response);
                    	   toastr.info('Your Data has been Updated successfully!');
                    	   
                            setTimeout(function() {
                                $("#font_awesomeUploadButton").prop('disabled', false); //disable 
                            }, 2000);
                    
                    	}
                    });
                    
                    
                 
                //   var inhome_upload_fontAwesome =  $('#inhome_upload_fontAwesome').val();
                //   var whishlist_font_awesome =  $('#whishlist_font_awesome').val();
                //   var preview_font_awesome =  $('#preview_font_awesome').val();
                   
                //     var url="{{ url('font-awesome') }}";
                //     $.ajax({
                //     	headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
                //     	type:"post",
                //     	url:url,
                //     	data:({"upload_font_icon360":upload_font_icon360,"inhome_upload_fontAwesome":inhome_upload_fontAwesome,"whishlist_font_awesome":whishlist_font_awesome,"preview_font_awesome":preview_font_awesome}),
               
                //     	success:function(response){
    
                //     	   toastr.info('Your Data has been Updated successfully!');
                    	   
                //             setTimeout(function() {
                //                 $("#font_awesomeUploadButton").prop('disabled', false); //disable 
                //             }, 2000);
                    
                //     	}
                //     });
    
             });
             
            // $("#checkedfontAwesome360").click(function(){
                
            //         //var fileName = e.target.files[0].name; 
            //         var filename = $('#upload-font-icon360').val().replace(/C:\\fakepath\\/i, '')
                    
                 
            //   var $modal = $('#exampleModalCenter');
            // //         var uploadIcon360 = $('#upload-font-icon360').val();
            //         $('#get360fontawesome').html('<img src="'+filename+'">');
            //      $modal.modal("show");
            
            //  });
            
            
                
             
               
            // $("#checkedinhome_uploadFontawesome").click(function(){
                 
            //   var $modal = $('#exampleModalCenter');
            //         var uploadinhomefontawesome = $('#inhome_upload_fontAwesome').val();
            //         $('#get360fontawesome').html(uploadinhomefontawesome);
            //             $modal.modal("show");
            
            //  });
             
            //  $("#checkedwhishlisticon").click(function(){
                 
            //   var $modal = $('#exampleModalCenter');
            //         var uploadinhomefontawesome = $('#whishlist_font_awesome').val();
            //         $('#get360fontawesome').html(uploadinhomefontawesome);
            //             $modal.modal("show");
            
            //  });
             
            //  $("#checkedpreviewFontawesome").click(function(){
                 
            //   var $modal = $('#exampleModalCenter');
            //         var uploadinhomefontawesome = $('#preview_font_awesome').val();
            //         $('#get360fontawesome').html(uploadinhomefontawesome);
            //             $modal.modal("show");
            
            //  });
                
              // button Settings ajax
              $("#buttonSetting").click(function() {
                 
                $("#buttonSetting").prop('disabled', true); //disable 
                   var buttonHeight360 =  $('#buttonHeight360').val();
                   var buttonwidth360 =  $('#buttonwidth360').val();
                   var button_borderradius360 =  $('#button_borderradius360').val();
                   
                   var Inhomebuttonheight =  $('#Inhomebuttonheight').val();
                   var Inhomebuttonwidth =  $('#Inhomebuttonwidth').val();
                   var Inhomebutton_borderradius =  $('#Inhomebutton_borderradius').val();
                   
                   var whishlistButtonheight =  $('#whishlistButtonheight').val();
                   var whishlistButtonwidth =  $('#whishlistButtonwidth').val();
                   var whishlistButton_borderRadius =  $('#whishlistButton_borderRadius').val();
                   
                    var previewbuttonheight =  $('#previewbuttonheight').val();
                    var previewbuttonwidth =  $('#previewbuttonwidth').val();
                    var previewButton_borderadius =  $('#previewButton_borderadius').val();
                    
                    var whishlist_remove_icon_buttonheight =  $('#whishlist_remove_icon_buttonheight').val();
                    var whishlist_remove_icon_buttonwidth =  $('#whishlist_remove_icon_buttonwidth').val();
                    var whishlist_remove_icon_borderadius =  $('#whishlist_remove_icon_borderadius').val();
            
                   
                    var url="{{ url('button-settings') }}";
                    $.ajax({
                    	headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
                    	type:"post",
                    	url:url,
                    	data:({"buttonHeight360":buttonHeight360,"buttonwidth360":buttonwidth360,"button_borderradius360":button_borderradius360,"Inhomebuttonheight":Inhomebuttonheight,"Inhomebuttonwidth":Inhomebuttonwidth,"Inhomebutton_borderradius":Inhomebutton_borderradius,"whishlistButtonheight":whishlistButtonheight,"whishlistButtonwidth":whishlistButtonwidth,"whishlistButton_borderRadius":whishlistButton_borderRadius,"previewbuttonheight":previewbuttonheight,"previewbuttonwidth":previewbuttonwidth,"previewButton_borderadius":previewButton_borderadius,'whishlist_remove_icon_buttonheight':whishlist_remove_icon_buttonheight,'whishlist_remove_icon_buttonwidth':whishlist_remove_icon_buttonwidth,'whishlist_remove_icon_borderadius':whishlist_remove_icon_borderadius}),
               
                    	success:function(response){
    
                    	   toastr.info('Your Data has been Updated successfully!');
                    	   
                            setTimeout(function() {
                                $("#buttonSetting").prop('disabled', false); //disable 
                            }, 2000);
                    
                    	}
                    });
    
             });
             
             
        });
    </script>
    
    
    <script>
        
         $("#script_added_button").click(function(){
                
               var get_script =  $('#script_added_text').val();
               
                       var url="{{ url('script-added') }}";
             
                    $.ajax({
                    	headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
                        type:"post",
                        url:url,
                    	data:({"get_script":get_script}),
    
                    	success:function(response){
                    	
                    	    if(response=="error") {
                    	         
                    	         toastr.warning('Your Script has been removed!'); 
                    	          
                    	         
                    	    }else if(response=="success") {
                    	      toastr.info('Script is Added successfully!');   
                    	        
                    	    }
                    	    
                    	    else {
                    	        
                    	        toastr.info('Script is Added successfully!'); 
                    	    }
                    
                    	}
                    });
                 
         });
        
    </script>
    
    <script>
        $("#upload-font-icon360").change(function () {
               filePreview(this);
                //filePreview(this);
            });
            
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#get360fontawesome + img').remove();
                        $('#get360fontawesome').html('<img src="'+e.target.result+'" width="450" height="300"/>');
                         $('.preview_360').attr("src",e.target.result);
                         var $modal = $('#exampleModalCenter');
                             $modal.modal("show");
                    };
                    reader.readAsDataURL(input.files[0]);
                }
        }
    </script>
    
     <script>
        $("#inhome_upload_fontAwesome").change(function () {
               filePreviewinhome(this);
                //filePreview(this);
            });
            
            function filePreviewinhome(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#get360fontawesome + img').remove();
                        $('#get360fontawesome').html('<img src="'+e.target.result+'" width="450" height="300"/>');
                        $('.preview_inhome').attr("src",e.target.result);
                         var $modal = $('#exampleModalCenter');
                             $modal.modal("show");
                    };
                    reader.readAsDataURL(input.files[0]);
                }
        }
    </script>
    
     <script>
        $("#whishlist_font_awesome").change(function () {
               filePreviewinwhishlist(this);
                //filePreview(this);
            });
            
            function filePreviewinwhishlist(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#get360fontawesome + img').remove();
                        $('#get360fontawesome').html('<img src="'+e.target.result+'" width="450" height="300"/>');
                         $('.preview_whishlist').attr("src",e.target.result);
                         var $modal = $('#exampleModalCenter');
                             $modal.modal("show");
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
    
    <script>
        $("#preview_font_awesome").change(function () {
               filePreviewinpreview(this);
                //filePreview(this);
            });
            
            function filePreviewinpreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#get360fontawesome + img').remove();
                        $('#get360fontawesome').html('<img src="'+e.target.result+'" width="450" height="300"/>');
                       $('.preview_preview').attr("src",e.target.result);
                         var $modal = $('#exampleModalCenter');
                             $modal.modal("show");
                
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
    
    <script>
        $("#whishlist_remove_icon").change(function () {
                filewhishlist_remove_icon(this);
                //filePreview(this);
            });
            
            function filewhishlist_remove_icon(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#get360fontawesome + img').remove();
                        $('#get360fontawesome').html('<img src="'+e.target.result+'" width="450" height="300"/>');
                       $('.whishlist_remove_icon').attr("src",e.target.result);
                         var $modal = $('#exampleModalCenter');
                             $modal.modal("show");
                
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
    
    
<script>
    $("input[type='number']").inputSpinner()
</script>
    
    <!-- end -->
    
    <script>
        actions.TitleBar.create(app, { title: 'Instruction' });
    </script>
@endsection