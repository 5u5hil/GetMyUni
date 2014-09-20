<?php $this->load->view(ADMIN_HEADER);?>
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i>Master Degree<!--span>All elements to manage your School...</span--></h2>
		  <!--div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
			  <li><a href="index.php">GetMyUni</a></li>
			  <li class="active">Manage College</li>
			</ol>
		  </div-->
		</div>
			<div class="row">
		<div class="col-md-12">
          <?php
							
                if($this->uri->segment(4))
                {
                        $ans = $get_master_degree;
                        //display($ans);
                        //display(json_decode($ans->college_logo));
                }
          ?>
            <form action="#" method="post" id="degree_form">
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Master Degree <span class="asterisk">*</span></label>
                    <input type="text" name="master_degree" class="form-control" value="<?php echo isset($ans->degree_name)  ? $ans->degree_name : ''?>"/>
                    <label for="name" id="master_degree_err" class="error">This field is required.</label>
                  </div>
                </div>
                  <input type="hidden" name="hidden_master_deree_id" id="hidden_master_deree_id" value="<?php echo $this->uri->segment(4);?>">
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <!--div class="form-group">
                    <label class="control-label">Status <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control">
							<option value="selected">Status- Enabled</option>
							<option value="1">Status- Disabled</option>
							
						</select>
					  </div>
                    <label for="degree" class="error">This field is required.</label>
                  </div-->
                </div>
                	 <div class="clearfix"></div>
                   <div class="col-sm-4"><input type="reset" class="btn btn-danger btn-block" value="Cancel"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-primary btn-block" value="Submit" id="submit_degree"></div>
            
              </div><!-- row -->
              </div>
            </div> 
            
           </form>
        </div>
        
      </div>
			
			
		</div><!-- contentpanel -->
    
	</div><!-- mainpanel -->
  
	
	
</section>
<?php $this->load->view(ADMIN_FOOTER);?>
