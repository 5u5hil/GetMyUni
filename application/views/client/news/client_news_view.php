<?php $this->load->view(CLIENT_HEADER); ?>
<script  type="text/javascript" language="javascript">
$(document).ready(function(){
$( "#country" ).change(function() {
var country_name =$(this).val();
 //alert(country_name);
var form_data = {
			country_name :country_name,
			ajax : '1'
			};
			$.ajax({
url: "<?php echo base_url(); ?>client/client_news/ajax_get_country_news_paper",
type: 'POST',
async : false,
data: form_data,
success: function(msg) {
var news =msg.split('<span>-</span>');
 $('.country_news_paper').html(news[0]);
 $('.all_news').html(news[1]);
}
});
return false;
});
});
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
$("body").on("change",".newscheck",function() {
var country_name = $('#country').val();

var chkId = '';
$('.newscheck:checked').each(function() {
  chkId += $(this).val() + ",";
});
chkId = chkId.slice(0,-1); // to remove last comma - bahvana

//if($(this).is(':checked') == true) {
var form_data = {
			paper_name :chkId,
			country_name:country_name,
			ajax : '1'
			};
			$.ajax({
url: "<?php echo base_url(); ?>client/client_news/ajax_get_news_paper_topic",
type: 'POST',
async : false,
data: form_data,
success: function(msg) {
$('.all_news').html(msg);

} 
});
//}
return false;
});
});
</script>



<?php
//display($this->session->all_userdata());
//display($user_data);
?>

<div class="row container-fluid">
  <div class="col-sm-10 col-md-10 col-xs-12">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page_title">News feed</h1>
      </div>
    </div>
   
    <hr />
    <div class="row"> 
      <div class="col-sm-3 col-md-3">
      	<div class="news_filter"> 
        	<div class="tcol_darkblue f_18 mb20">Filter by Country</div>
            <form>
            	<select class="form-control new-select mb20 " id="country">
				<option value="All">All Country</option>
				<?php  foreach($country as $countries) {?>
                	<option value="<?php echo $countries['country']; ?> "><?php echo $countries['country']; ?> </option>
                	
					<?php }?>
                </select>
				<div class="country_news_paper">
                <div class="tcol_darkblue f_18 mb10 ">Choose your news</div>
				<?php  foreach($news_paper as $newspaper) { ?>
                <div class="checkbox"> <label> <input type="checkbox" class="newscheck" id="<?php echo $newspaper['source']; ?>"  value="<?php echo $newspaper['source']; ?>"/><?php echo $newspaper['source']; ?></label> </div>
                <?php } ?>
				</div>
            </form>
        </div>
      </div>
      <div class="col-sm-9 col-md-9" >
	   <div class="all_news">
	  <?php foreach($news as $get_news) {?>
	 
      	<div class="row mb20">
      <div class="col-sm-3 col-md-3"> 
        <img src="<?php echo CLIENT_IMAGES; ?>news.jpg" class="img-responsive">
      </div>
      <div >
      <div class="col-sm-9 col-md-9"> 
          <div class="row">
            <h3 class="tcol_darkblue mt0"><a href="<?php echo $get_news['link']; ?>" target="_blank"  style="display:inline;text-decoration:none" ><?php echo $get_news['title']; ?></a> </h3>
            <div class="news_source"><?php echo $get_news['source']; ?>  <span> <?php echo $get_news['date_time']; ?></span></div>
            <div class="news_desc "> <?php echo $get_news['desc']; ?></div>
            
            </div>
      </div>
	   </div>
      </div>
	  
      <hr/>
	  <?php }?>
   
      </div>
      
      </div>
      <!-- Ad --> 
    </div>
  </div>
  <div class="col-sm-2 sidebar"> <img src="<?php echo CLIENT_IMAGES; ?>ticker.jpg" class="mt20 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace2.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace4.jpg" class="mt10 img-responsive"> </div>
</div>
</div>
<footer>
  <?php $this->load->view(CLIENT_FOOTER); ?>
</footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
<link href="<?php echo CLIENT_CSS; ?>bootstrap_hexagone.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script> 
<script>
                $(function() {
                    $("#inbox_tab").tabs();
                });
            </script>
</body></html><script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>