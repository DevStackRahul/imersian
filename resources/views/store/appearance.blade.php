        
        <style>
/*            .color_optopn{*/
/*    background: #fff !important;*/
/*    padding: 10px!important;*/
/*    margin-bottom: 25px!important;*/
/*    border-radius: 24px!important;*/
/*    box-shadow: 0 0 15px #ccc!important;*/
/*}*/

        </style>
            <!-- 1 -->
                  <div class="color-col  color_optopn">
                     <div class="left-col">
                        <ul class="color-list list-1">
                           <div class="tab-text">
                              <p>View 3D button Background Color
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->button360Color) ? $get_setting->button360Color : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->button360Color) ? $get_setting->button360Color : '#c0c0c0' }}" id="hexcolor1" placeholder="{{ isset($get_setting->button360Color) ? $get_setting->button360Color : '#c0c0c0' }}"></input>
                           </div>
                        </ul>
                        
                        <ul class="color-list list-1">
                           <div class="tab-text">
                              <p>3D Text Color Changed
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="text_changed360view" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->text_changed360view) ? $get_setting->text_changed360view : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->text_changed360view) ? $get_setting->text_changed360view : '#c0c0c0' }}" id="hex_text_changed360view"></input>
                           </div>
                        </ul>
                        
                          <ul class="color-list list-1">
                           <div class="tab-text">
                              <p>3D Image Background Color
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="image360_backgroundColor" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->image360_backgroundColor) ? $get_setting->image360_backgroundColor : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->image360_backgroundColor) ? $get_setting->image360_backgroundColor : '#c0c0c0' }}" id="hex_image360_backgroundColor"></input>
                           </div>
                        </ul>
                        </div>
                        <div class="right-col">
                            <ul class="font-size">
                               <li>
                                 <div class="font-size">
                                     <p>Text size:</p>
                                     <output for="fader" id="fontsize"> {{ isset($get_setting-> textSize360 ) ? $get_setting-> textSize360  : '0' }} </output>
                                  </div>
    							  <div class="resize-text">
                                  <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting->textSize360) ? $get_setting->textSize360 : '0' }}" id="fader" step="1" >
                                  <text id="v-28" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">Text size</text>
                                 </div>                         
    						 </li>
                            </ul>
                         </div>  
                    </div>
                    <!-- /1 -->
                    
                    <!-- 2 -->
                    <div class="color-col color_optopn">
                     <div class="left-col">
                        <ul class="color-list list-2">
                           <div class="tab-text">
                              <p>In Home Button Background Color
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="colorpicker1" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->home_buttonColor) ? $get_setting->home_buttonColor : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->home_buttonColor) ? $get_setting->home_buttonColor : '#c0c0c0' }}" id="hexcolor2"></input>
                           </div>
                        </ul>
                        
                        <ul class="color-list list-2">
                           <div class="tab-text">
                              <p>In Home Button Text Color Changed
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="homebuttontextColor" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->homebuttontextColor) ? $get_setting->homebuttontextColor : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->homebuttontextColor) ? $get_setting->homebuttontextColor : '#c0c0c0' }}" id="hex_homebuttontextColor"></input>
                           </div>
                        </ul>
                        
                        <ul class="color-list list-2">
                           <div class="tab-text">
                              <p>In Home Image Background Color
                              </p>
                           </div>
                           <div class="color-wrapper">
                              <input type="color" id="Inhomeimg_backgroundColor" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->Inhomeimg_backgroundColor) ? $get_setting->Inhomeimg_backgroundColor : '#c0c0c0' }}"> 
                              <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->Inhomeimg_backgroundColor) ? $get_setting->Inhomeimg_backgroundColor : '#c0c0c0' }}" id="hex_Inhomeimg_backgroundColor"></input>
                           </div>
                        </ul>
                        </div>
                         <div class="right-col">
                             <ul class="font-size">
                               <li>
                                 <div class="font-size">
                                     <p>Text size:</p>
                                     <output for="fader" id="fontsize1">{{ isset($get_setting-> textSizeHomeButton ) ? $get_setting-> textSizeHomeButton  : '0' }}</output>
                                  </div>
    							  <div class="resize-text">
                                  <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting->textSizeHomeButton) ? $get_setting->textSizeHomeButton : '0' }}" id="fader1" step="1" >
                                  <text id="v-281" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">Text size</text>
                                 </div>                         
    						 </li>
                            </ul>
                        </div>
                        
                    </div>
                        <!-- /2 -->
                        
                        <!-- 3 -->
                        
                   <div class="color-col color_optopn">
                       
                        <div class="left-col">
                           <ul class="color-list list-3">
                             <p class="tab-text">Add to collection Button  color icon
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="whishlistColorIcon" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->whishlistColorIcon) ? $get_setting->whishlistColorIcon : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->whishlistColorIcon) ? $get_setting->whishlistColorIcon : '#c0c0c0' }}" id="hexwhishlistColorIcon"></input>
                            </div>
                           </ul>
                        
                        
                      
                           <ul class="color-list list-3">
                             <p class="tab-text">Add to collection  Button Background Color
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="colorpicker2" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->whishlistColor) ? $get_setting->whishlistColor : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->whishlistColor) ? $get_setting->whishlistColor : '#c0c0c0' }}" id="hexcolor3"></input>
                            </div>
                           </ul>
                      
                    </div>
                     <div class="right-col">
                         <ul class="font-size">
                           <li>
                             <div class="font-size">
                                 <p>Text size:</p>
                                 <output for="fader" id="fontsize2">{{ isset($get_setting-> textSizewishlistButton ) ? $get_setting-> textSizewishlistButton  : '0' }}</output>
                             </div>
							 <div class="resize-text">
                               <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting-> textSizewishlistButton ) ? $get_setting-> textSizewishlistButton  : '0' }}" id="fader2" step="1" >
                               <text id="v-282" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">Text size</text>
                             </div>                         
						    </li>
                        </ul>
                         
                    </div>
                    </div>
        <!-- /3 -->
        
        
               <!-- 4 -->         
                    
                     <div class="color-col color_optopn">
                       <div class="left-col">
                            <ul class="color-list list-3">
                             <p class="tab-text"> Open collection Button color icon
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="tracking_button_backgroundColor" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->tracking_button_backgroundColor) ? $get_setting->tracking_button_backgroundColor : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->tracking_button_backgroundColor) ? $get_setting->tracking_button_backgroundColor : '#c0c0c0' }}" id="hextracking_button_backgroundColor"></input>
                            </div>
                           </ul>
                           <ul class="color-list list-5">
                             <p class="tab-text"> Open collection Button background color
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="peview_button_background_color" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->peview_button_background_color) ? $get_setting->peview_button_background_color : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->peview_button_background_color) ? $get_setting->peview_button_background_color : '#c0c0c0' }}" id="hextpeview_button_background_color"></input>
                            </div>
                           </ul>
                        </div>
                         <div class="right-col">
                             <ul class="font-size">
                               <li>
                                 <div class="font-size">
                                     <p>Text size:</p>
                                     <output for="fader3" id="fontsize3">{{ isset($get_setting-> tracking_button_fontsize ) ? $get_setting-> tracking_button_fontsize  : '0' }}</output>
                                 </div>
    							 <div class="resize-text">
                                   <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting-> tracking_button_fontsize ) ? $get_setting-> tracking_button_fontsize  : '0' }}" id="fader3" step="1" >
                                   <text id="v-283" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">Text size</text>
                                 </div>                         
    						    </li>
                            </ul>
                             
                        </div>
                    </div>
                    
                     <!-- 5 -->         
                    
                     <div class="color-col color_optopn">
                       <div class="left-col">
                            <ul class="color-list list-3">
                             <p class="tab-text"> Remove from collection Button  Background Color
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="whishlist_remove_icon_text_color" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->whishlist_remove_icon_text_color) ? $get_setting->whishlist_remove_icon_text_color : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->whishlist_remove_icon_text_color) ? $get_setting->whishlist_remove_icon_text_color : '#c0c0c0' }}" id="hextracking_whishlist_remove_icon_text_color"></input>
                            </div>
                           </ul>
                           <ul class="color-list list-5">
                             <p class="tab-text"> Remove from collection Button Icon Color
                           </p>
                       
                            <div class="color-wrapper">
                             <input type="color" id="whishlist_remove_icon_background_color" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ isset($get_setting->whishlist_remove_icon_background_color) ? $get_setting->whishlist_remove_icon_background_color : '#c0c0c0' }}"> 
                             <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" placeholder="{{ isset($get_setting->whishlist_remove_icon_background_color) ? $get_setting->whishlist_remove_icon_background_color : '#c0c0c0' }}" id="hex_whishlist_remove_icon_background_color"></input>
                            </div>
                           </ul>
                        </div>
                         <div class="right-col">
                             <ul class="font-size">
                               <li>
                                 <div class="font-size">
                                     <p>Text size:</p>
                                     <output for="fader4" id="fontsize4">{{ isset($get_setting-> whishlist_remove_icon_font_size ) ? $get_setting-> whishlist_remove_icon_font_size  : '0' }}</output>
                                 </div>
    							 <div class="resize-text">
                                   <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting-> whishlist_remove_icon_font_size ) ? $get_setting-> whishlist_remove_icon_font_size  : '0' }}" id="fader4" step="1" >
                                   <text id="v-284" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">Text size</text>
                                 </div>                         
    						    </li>
                            </ul>
                             
                        </div>
                    </div>
                    
                           
                <!--/4-->
       <!--              <div class="right-col">-->
       <!--                 <ul class="font-size">-->
       <!--                    <li>-->
       <!--                      <div class="font-size">-->
       <!--                          <p>Text size:</p>-->
       <!--                          <output for="fader" id="fontsize"> {{ isset($get_setting-> textSize360 ) ? $get_setting-> textSize360  : '0' }} </output>-->
       <!--                       </div>-->
							<!--  <div class="resize-text">-->
       <!--                       <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting->textSize360) ? $get_setting->textSize360 : '0' }}" id="fader" step="1" >-->
       <!--                       <text id="v-28" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">This is the text you want to change the font size</text>-->
       <!--                      </div>                         -->
						 <!--</li>-->
       <!--                 </ul>-->

       <!--                <ul class="font-size">-->
       <!--                    <li>-->
       <!--                      <div class="font-size">-->
       <!--                          <p>Text size:</p>-->
       <!--                          <output for="fader" id="fontsize1">{{ isset($get_setting-> textSizeHomeButton ) ? $get_setting-> textSizeHomeButton  : '0' }}</output>-->
       <!--                       </div>-->
							<!--  <div class="resize-text">-->
       <!--                       <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting->textSizeHomeButton) ? $get_setting->textSizeHomeButton : '0' }}" id="fader1" step="1" >-->
       <!--                       <text id="v-281" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">This is the text you want to change the font size</text>-->
       <!--                      </div>                         -->
						 <!--</li>-->
       <!--                 </ul>-->

       <!--                <ul class="font-size">-->
       <!--                    <li>-->
       <!--                      <div class="font-size">-->
       <!--                          <p>Text size:</p>-->
       <!--                          <output for="fader" id="fontsize2">{{ isset($get_setting-> textSizewishlistButton ) ? $get_setting-> textSizewishlistButton  : '0' }}</output>-->
       <!--                       </div>-->
							<!--  <div class="resize-text">-->
       <!--                       <input class="none" type="range" min="0" max="100" value="{{ isset($get_setting-> textSizewishlistButton ) ? $get_setting-> textSizewishlistButton  : '0' }}" id="fader2" step="1" >-->
       <!--                       <text id="v-282" class="changeMe" y="0.8em" fill="white" stroke="black" stroke-width="0" transform="translate(35,20.5) ">This is the text you want to change the font size</text>-->
       <!--                      </div>                         -->
						 <!--</li>-->
       <!--                 </ul>-->
       <!--              </div>-->
       <!--           </div>-->
				  
				  
			  <div class="submit_btn">
			      <input type="submit" value="Save" name="submit_appearance" id="submit_appearance">
			  </div>
    