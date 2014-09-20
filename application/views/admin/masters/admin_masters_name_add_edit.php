<?php $this->load->view(ADMIN_HEADER);?>
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i>Program Name<!--span>All elements to manage your School...</span--></h2>
		  <!--div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
			  <li><a href="index.php">GetMyUni</a></li>
			  <li class="active">Manage College</li>
			</ol>
		  </div-->
		</div>
        <?php
							
                if($this->uri->segment(4))
                {
                        $ans = $get_master_program;
                        //display($ans);
                        //display(json_decode($ans->college_logo));
                }
          ?>
			<div class="row">
		<div class="col-md-12">
          
            <form id="master_program_name_form" >
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Master Program Name <span class="asterisk">*</span></label>
                    <input type="text" name="master_program_name" class="form-control" value="<?php echo isset($ans->program_name)  ? $ans->program_name : ''?>"/>
                    <label for="name" id="master_program_name_err" class="error">This field is required.</label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                 <input type="hidden" name="hidden_master_program_name_id" id="hidden_master_program_name_id" value="<?php echo $this->uri->segment(4);?>">
                </div>
                	 <div class="clearfix"></div>
                   <div class="col-sm-4"><input type="reset" class="btn btn-danger btn-block" value="Cancel"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-primary btn-block" value="Submit" id="submit_program_name"></div>
            
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
