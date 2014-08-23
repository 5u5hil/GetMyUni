<?php $this->load->view(ADMIN_HEADER);?>
		
			<div class="row">
		<div class="col-md-12">
          
            
            
            <form action="#" method="post" >
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Master Degree <span class="asterisk">*</span></label>
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
	<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Import Exhibitors - xls/csv</h4>
		  </div>
		  <div class="modal-body">
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
			aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
			enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
			ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
			adipisci velit.</p>
			
			<div class="row mb10">
				<div class="col-sm-6">
					<div class="fileupload fileupload-new" data-provides="fileupload">
					  <div class="input-append">
						<div class="uneditable-input">
						  <i class="glyphicon glyphicon-file fileupload-exists"></i>
						  <span class="fileupload-preview"></span>
						</div>
						<span class="btn btn-default btn-file">
						  <span class="fileupload-new">Browse</span>
						  <span class="fileupload-exists">Change</span>
						  <input type="file" />
						</span>
					  </div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<button type="button" class="btn btn-primary btn-block">Download Sample File</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<button type="button" class="btn btn-primary btn-block">Upload with over-right</button>
				</div>
				<div class="col-sm-6 col-md-6">
					<button type="button" class="btn btn-primary btn-block">Upload</button>
				</div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	
</section>
<?php $this->load->view(ADMIN_FOOTER);?>
