 <style>
    button#font_awesomeUploadButton {
        width: 100px;
        height: 34px;
    }
    .update-button-setting .input-group {
    display: flex;
    align-items: center;
}
.update-button-setting .input-group button {
    color: #6c757d;
    border-color: #6c757d;
    padding: 3px 8px !important;
    background: #fff;
    height: 40px;
    width: 40px;
}
.update-button-setting .col-sm-4 {
    padding-bottom: 25px;
}
.update-button-setting .col-sm-4 label {
    font-size: 15px;
    text-transform: capitalize;
    padding-bottom: 10px;
    font-family: 'Roboto';
    letter-spacing: 0.5px;
    font-weight: 500;
}
.row.icon-upload button.btn-info {
    width: 100%;
    height: 46px;
    max-width: 230px;
    margin-top: 10px;
    font-family: 'Roboto';
    font-size: 16px;
}
.update-button-setting .input-group button.btn-minus {
    border-bottom-right-radius: 0px;
    border-top-right-radius: 0px;
}
.update-button-setting .input-group button.btn-plus {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}
.update-button-setting .input-group button:hover {
color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}
.update-button-setting .input-group input[type="text"] {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    font-size: 14px;
    font-family: 'Roboto';
    max-width: 160px;
    height: 40px;
}
.fo-num span {
    font-weight: 700;
}
.fo-num {
    display: flex;
    align-items: center;
    grid-gap: 10px;
}
 </style>
 
 
    <div class="update-button-setting">
        
        <div class="row">
            <div class="col-sm-4">
                <label> View 3D button Height </label>
                <div class="buttonheight360 fo-num">
                 <input type="number"  step="0.1"  data-decimals="2" min="0" name="buttonHeight360" class="form-control form-control-sm" id="buttonHeight360" value="<?php  if(isset($get_setting->buttonHeight360)) { echo $get_setting->buttonHeight360; } ?>">
                    <span>PX</span>
                </div>
            </div>
            
             <div class="col-sm-4">
                <label>  View 3D button Width </label>
                <div class="buttonwidth360 fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="buttonwidth360" class="form-control form-control-sm" name="buttonwidth360" value="<?php  if(isset($get_setting->buttonwidth360)) { echo $get_setting->buttonwidth360; } ?>">
                     <span>PX</span>
                       
                </div>
            </div>
            
            <div class="col-sm-4">
                <label> View 3D button Border radius </label>
                <div class="button_borderradius360 fo-num">
                    
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="button_borderradius360" class="form-control form-control-sm" name="button_borderradius360" value="<?php  if(isset($get_setting->button_borderradius360)) { echo $get_setting->button_borderradius360; } ?>">
                     <span>PX</span>
                </div>
            </div>
            
       </div>
       
       
        <div class="row">
            <div class="col-sm-4">
                <label> In home Button Height </label>
                <div class="buttonheight360 fo-num">
                    <input type="number"  step="0.1"  data-decimals="2" min="0" name="Inhomebuttonheight" class="form-control form-control-sm" id="Inhomebuttonheight" value="<?php  if(isset($get_setting->Inhomebuttonheight)) { echo $get_setting->Inhomebuttonheight; } ?>">
                    <span>PX</span>
                </div>
            </div>
            
             <div class="col-sm-4">
                <label>  In home Button Width </label>
                <div class="Inhomebuttonwidth fo-num">
                    <input type="number"  step="0.1"  data-decimals="2" min="0" id="Inhomebuttonwidth" class="form-control form-control-sm" name="Inhomebuttonwidth" value="<?php  if(isset($get_setting->Inhomebuttonwidth)) { echo $get_setting->Inhomebuttonwidth; } ?>">
                     <span>PX</span>
                       
                </div>
            </div>
            
            <div class="col-sm-4">
                <label> In home Button Border radius </label>
                <div class="button_borderradius360 fo-num">
                    
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="Inhomebutton_borderradius" class="form-control form-control-sm" name="Inhomebutton_borderradius" value="<?php  if(isset($get_setting->Inhomebutton_borderradius)) { echo $get_setting->Inhomebutton_borderradius; } ?>">
                     <span>PX</span>
                </div>
            </div>
            
       </div>
       
       
       
         <div class="row">
            <div class="col-sm-4">
                <label> Add to collection  Button Height </label>
                <div class="whishlistButtonheight fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" name="whishlistButtonheight" class="form-control form-control-sm" id="whishlistButtonheight" value="<?php  if(isset($get_setting->whishlistButtonheight)) { echo $get_setting->whishlistButtonheight; } ?>">
                    <span>PX</span>
                </div>
            </div>
            
             <div class="col-sm-4">
                <label>  Add to collection Button  Width </label>
                <div class="whishlistButtonwidth fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="whishlistButtonwidth" class="form-control form-control-sm" name="whishlistButtonwidth" value="<?php  if(isset($get_setting->whishlistButtonwidth)) { echo $get_setting->whishlistButtonwidth; } ?>">
                     <span>PX</span>
                       
                </div>
            </div>
            
            <div class="col-sm-4">
                <label> Add to collection Button Border radius </label>
                <div class="whishlistButton_borderRadius fo-num">
                    
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="whishlistButton_borderRadius" class="form-control form-control-sm" name="whishlistButton_borderRadius" value="<?php  if(isset($get_setting->whishlistButton_borderRadius)) { echo $get_setting->whishlistButton_borderRadius; } ?>">
                     <span>PX</span>
                </div>
            </div>
            
       </div>
       
       
       <div class="row">
            <div class="col-sm-4">
                <label> Open collection Button Height </label>
                <div class="previewbuttonheight fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" name="previewbuttonheight" class="form-control form-control-sm" id="previewbuttonheight" value="<?php  if(isset($get_setting->previewbuttonheight)) { echo $get_setting->previewbuttonheight; } ?>">
                    <span>PX</span>
                </div>
            </div>
            
             <div class="col-sm-4">
                <label>  Open collection Button Width </label>
                <div class="previewbuttonwidth fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="previewbuttonwidth" class="form-control form-control-sm" name="previewbuttonwidth" value="<?php  if(isset($get_setting->previewbuttonwidth)) { echo $get_setting->previewbuttonwidth; } ?>">
                     <span>PX</span>
                       
                </div>
            </div>
            
            <div class="col-sm-4">
                <label> Open collection Button Border radius </label>
                <div class="previewButton_borderadius fo-num">
                    
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="previewButton_borderadius" class="form-control form-control-sm" name="previewButton_borderadius" value="<?php  if(isset($get_setting->previewButton_borderadius)) { echo $get_setting->previewButton_borderadius; } ?>">
                     <span>PX</span>
                </div>
            </div>
            
       </div>
       
       
       <div class="row">
            <div class="col-sm-4">
                <label> Remove from collection button height </label>
                <div class="whishlist_remove_iconbuttonheight fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" name="whishlist_remove_icon_buttonheight" class="form-control form-control-sm" id="whishlist_remove_icon_buttonheight" value="<?php  if(isset($get_setting->whishlist_remove_icon_buttonheight)) { echo $get_setting->whishlist_remove_icon_buttonheight; } ?>">
                    <span>PX</span>
                </div>
            </div>
            
             <div class="col-sm-4">
                <label> Remove from collection  Button Width </label>
                <div class="previewbuttonwidth fo-num">
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="whishlist_remove_icon_buttonwidth" class="form-control form-control-sm" name="whishlist_remove_icon_buttonwidth" value="<?php  if(isset($get_setting->whishlist_remove_icon_buttonwidth)) { echo $get_setting->whishlist_remove_icon_buttonwidth; } ?>">
                     <span>PX</span>
                       
                </div>
            </div>
            
            <div class="col-sm-4">
                <label> Remove from collection button Border radius </label>
                <div class="whishlist_remove_icon_borderadius fo-num">
                    
                    <input type="number" step="0.1"  data-decimals="2" min="0" id="whishlist_remove_icon_borderadius" class="form-control form-control-sm" name="whishlist_remove_icon_borderadius" value="<?php  if(isset($get_setting->whishlist_remove_icon_borderadius)) { echo $get_setting->whishlist_remove_icon_borderadius; } ?>">
                     <span>PX</span>
                </div>
            </div>
            
       </div>
       
       
       <div class="row icon-upload">
           <div class="col-sm-6">
                <button type="button"  class="btn btn-info" id="buttonSetting">Submit</button>
           </div>
       </div>
    </div>

    
 