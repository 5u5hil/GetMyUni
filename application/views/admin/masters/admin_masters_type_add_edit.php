<?php $this->load->view(ADMIN_HEADER);?>
		
			<div class="row">
		<div class="col-md-12">
          
            <form action="#" method="post" >
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Master Program Type <span class="asterisk">*</span></label>
                    <input type="text" name="schoolname" class="form-control" />
                    <label for="name" class="error">This field is required.</label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Status <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control">
							<option value="selected">Status- Enabled</option>
							<option value="1">Status- Disabled</option>
							
						</select>
					  </div>
                    <label for="degree" class="error">This field is required.</label>
                  </div>
                </div>
                	 <div class="clearfix"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-danger btn-block" value="Cancel"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
            
                
              </div><!-- row -->
              </div>
            </div> 
            
           </form>
        </div>
        
      </div>
			
			
			
			
		
		</div><!-- contentpanel -->
    
	</div><!-- mainpanel -->
  
	<!--<div class="rightpanel">
		<?php //include('rightpanel.php') ?>
	</div>--><!-- rightpanel -->
  
	<!-- Import xls/csv -->
	
</section>
<?php $this->load->view(ADMIN_FOOTER);?>
