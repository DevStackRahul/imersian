<style>
    button#font_awesomeUploadButton {
        width: 100px;
        height: 34px;
    }
    .modal-dialog.modal-dialog-centered {
    z-index: 99999!important;
}
.btn-primary {
    color: #fff;
    background-color: #5bc0de;
    border-color: #5bc0de;
    width: auto;
    margin: 10px 0;
    display: flex;
    align-items: center;
}
.btn-primary:hover{
        background:#fff;
        color:#000;
    
}
.update-icon .col-sm-4 {
    margin-bottom: 25px;
}
.modal-header .close {
    margin-top: 0;
    position: absolute;
    top: 11px;
    right: 17px;
    font-size: 35px;
}
button.btn.btn-secondary {
    width: auto;
    background: #5bc0de;
    color: #fff;
    border:1px solid #5bc0de;
    display: flex;
    justify-content: flex-end;
    margin-left: auto;
    align-items: center;
    font-size: 16px;
}
button.btn.btn-secondary:hover{
    background:#fff;
    color:#000;
}
button:focus{
        background:none!important;
        outline:none!important;
        color:#000!important;
}
div#color1 .modal-body {
    position: relative;
    padding: 15px;
    text-align: center;
}
div#color1 .modal-body p {
    box-shadow: 4px 4px 16px rgb(0 0 0 / 23%);
    padding: 20px;
    width: 100%;
    max-width: 100%;
    border-radius: 3px;
    object-fit: contain;
}
div#color1 h5.modal-title {
    font-size: 16px;
    font-weight: 600;
}
div#color1 .modal-body p i.fa {
    font-size: 40px;
}
.update-icon .col-sm-4 div > p {
    background: #f9f9f9;
    box-shadow:  0 0 8px #cfcfcf;
    margin-top: 7px;
    padding:10px;
}

 </style>
 
    <div class="update-icon">
        
        <div class="row">
            <div class="col-sm-4">
                <label> Upload 3D View Icon </label>
                <div class="upload-icon-360">
                    <!--<input type='file' onchange="readURL(this);" />-->
                    <!--<a href="#" class="preview" onclick="getPreview();">Preview</a><br/>   -->
                    
                    <input type="hidden" name="preview_360" id="preview_360" value="<?php  if(isset($get_setting->upload_font_awesome360)) { echo  $get_setting->upload_font_awesome360; } ?>">
                    <input   type="file" name="upload-font-icon360" class="form-control form-control-sm" id="upload-font-icon360">
                 <p><img class="preview_360"   height="347px" width="100%" src="<?php  if(isset($get_setting->upload_font_awesome360)) { echo  $get_setting->upload_font_awesome360; } ?>"></p>
                        <!--<button  type="button" class="btn btn-primary preview" id="checkedfontAwesome360"> Preview </button>-->
                </div>
            </div>
            
             <div class="col-sm-4">
                <label> Upload In Home Icon </label>
                <div class="inhome-font-awesome">
                  <input type="hidden" name="send_preview_inhome" id="preview_inhome" value="<?php  if(isset($get_setting->inhome_upload_fontAwesome)) { echo  $get_setting->inhome_upload_fontAwesome; } ?>">

                    <input type="file" id="inhome_upload_fontAwesome" class="form-control form-control-sm" name="inhome_upload_fontAwesome">
                        <p><img  class="preview_inhome" height="347px" width="100%" src="<?php  if(isset($get_setting->inhome_upload_fontAwesome)) { echo  $get_setting->inhome_upload_fontAwesome; } ?>"></p>

                        <!--<button  type="button" class="btn btn-primary previewinhome" id="checkedinhome_uploadFontawesome"> Preview </button>-->
                </div>
            </div>
            
            <div class="col-sm-4">
                <label>  Upload Add to Collection  Icon </label>
                    <div class="whishlist-font-awesome">
                <input type="hidden" name="send_whishlist" id="send_whishlist" value="<?php  if(isset($get_setting->whishlist_font_awesome)) { echo  $get_setting->whishlist_font_awesome; } ?>">
                
                <input  name="whishlist_font_awesome" type="file" id="whishlist_font_awesome" class="form-control form-control-sm"  value=" <?php  if(isset($get_setting->whishlist_font_awesome)) { echo $get_setting->whishlist_font_awesome; } ?>">
                    <p><img  class="preview_whishlist" height="347px" width="100%" src="<?php  if(isset($get_setting->whishlist_font_awesome)) { echo  $get_setting->whishlist_font_awesome; } ?>"></p>                        <!--<button  type="button" class="btn btn-primary" id="checkedwhishlisticon"> Preview </button>-->
                </div>
            </div>
            
              <div class="col-sm-4">
                <label> Upload Open Collection  Icon </label>
                <div class="preview-font-awesome">
         <input type="hidden" name="send_preview" id="send_preview" value="<?php  if(isset($get_setting->preview_font_awesome)) { echo  $get_setting->preview_font_awesome; } ?>">
        <input name="send_preview_preview"   type="file" id="preview_font_awesome" class="form-control form-control-sm" name="preview_font_awesome">
         <p><img class="preview_preview" height="347px" width="100%" src="<?php  if(isset($get_setting->preview_font_awesome)) { echo  $get_setting->preview_font_awesome; } ?>"></p>                        <!--<button  type="button" class="btn btn-primary" id="checkedpreviewFontawesome"> Preview </button>-->
                </div>
            </div>
            
              <div class="col-sm-4">
                <label> Upload Remove from Collection Icon</label>
               <div>
         <input type="hidden" name="send_whishlist_remove_icon" id="send_whishlist_remove_icon" value="<?php  if(isset($get_setting->remove_whishlist_font_icon)) { echo  $get_setting->remove_whishlist_font_icon; } ?>">
        <input name="whishlist_remove_icon"   type="file" id="whishlist_remove_icon" class="form-control form-control-sm">
         <p><img class="whishlist_remove_icon" height="347px" width="100%" src="<?php  if(isset($get_setting->remove_whishlist_font_icon)) { echo  $get_setting->remove_whishlist_font_icon; } ?>"></p>                        <!--<button  type="button" class="btn btn-primary" id="checkedpreviewFontawesome"> Preview </button>-->
             </div>
            </div>
            
       </div>
       
       <div class="row icon-upload">
           <div class="col-sm-6">
                <button type="button" class="btn btn-info" id="font_awesomeUploadButton">Submit</button>
           </div>
       </div>
    </div>
    
        <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">View 3D Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 <p id="get360fontawesome"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          
            
         
            
           
           
            
       
        
        
    
 