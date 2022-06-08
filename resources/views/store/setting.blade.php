
<style>
/*    .toggle.btn {*/
/*    min-width: 85px !important;*/
/*    min-height: 34px !important;*/
/*}*/
/*div#profile .tab-text {*/
/*    justify-content: space-between;*/
/*}*/
/*div#profile .tab-text .margin-bottom-10 {*/
/*    margin-top: 0px;*/
/*}*/
/*button#script_added_button {*/
/*    width: 100px;*/
/*    height: 35px;*/
/*}*/
/*h1.step {*/
/*    font-size: 25px;*/
/*    text-transform: capitalize;*/
/*    margin-top: 0px;*/
/*    margin-bottom: 5px;*/
/*}*/
/*.tab-text span.label {*/
/*    font-weight: 400;*/
/*    padding: 12px;*/
/*    font-size: 14px;*/
/*}*/
</style>



<div class="tab-text">
    <p>Status of 3D and AR functionality </p>
		<div class="margin-bottom-10">

              <?php  if(!empty($get_status->status)) { if($get_status->status==1) { ?><span class="label label-success">Active</span><?php  } else { ?><span class="label label-dangerr">InActive</span><?php } } else {
              ?><span class="label label-warning">Script is Not Added Yet!</span></span><?php }?>
		    <!--<input type="checkbox" class="make-switch" id="price_check" name="pricing" data-on-color="primary" data-off-color="info" value="">-->
        </div>
</div>

 <div class="form-group">
    <label for="script_added">Paste Your Script</label>
    <textarea class="form-control" id="script_added_text"  rows="10" placeholder="<?php  if(isset($get_status->script_added_text)) { if($get_status->script_added_text!='0') { echo ""; } else { echo "Your Script Has Been Removed";} } else { echo "Your Script Is Not Added Yet!";} ?>"><?php  if(isset($get_status->script_added_text)) { if($get_status->script_added_text!='0') { echo htmlentities($get_status->script_added_text); } else { echo "";} } else { echo "";} ?></textarea>
  </div>
  
   <div class="form-group">
        <button type="button" id="script_added_button" class="btn btn-success">Submit</button>
  </div>



