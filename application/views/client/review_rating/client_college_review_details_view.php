
  <?php $this->load->view(CLIENT_HEADER);?>
  <div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="page_title search_replace_title"><?php echo (ucwords(str_replace("-"," ",$this->uri->segment(4)))); ?> Reviews</h1>
        </div>
      </div>
      <div class="row mt30">
		
			<?php $this->load->view(CLIENT_REVIEW_RATING_SIDE_BAR)?>
			 <div id="ajax_college_review_list">
						<?php $this->load->view(CLIENT_AJAX_REVIEW_LISTING_VIEW)?>
                         </div>
      </div>
     
    </div>
    <div class="col-sm-2 sidebar">
			 <?php  $this->load->view(CLIENT_TICKER_VIEW);?>
			 <?php $this->load->view(CLIENT_ADS_VIEW); ?>
     </div>
  </div>
  <footer>
    <?php $this->load->view(CLIENT_FOOTER);?>
  </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo CLIENT_SCRIPTS ;?>jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap.min.js"></script>
<script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>
 <script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap-multiselect.js"></script>
 
	 
	<script>
		$(document).ready(function() {
		
		$('.multiselect').multiselect({
		 buttonWidth: '100%',
		 maxHeight: 300,
		 enableFiltering: true,
		 enableCaseInsensitiveFiltering: true,
		 filterBehavior: 'both'
	   });
	   
		
		});
	</script>
</body>
</html>

