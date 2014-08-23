	<!----------header------------->
	<?php $this->load->view(ADMIN_HEADER);?>
	<!----------header------------->
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i> Manage College <!--span>All elements to manage your School...</span--></h2>
		  <!--div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
			  <li><a href="index.php">GetMyUni</a></li>
			  <li class="active">Manage College</li>
			</ol>
		  </div-->
		</div>
		<div class="contentpanel"><!-- Content Panel -->
		
			<div class="row mb10"><!-- Exhibitor Row -->
				
				<div class="col-sm-12 col-md-12">
					<a class="btn btn-primary btn-block" href="<?php echo ADMIN_SITE_URL?>college/add_edit">Add College</a>
				</div>
				
			</div>
			
			<div class="row mb10"><!-- Add Exhibitor Row -->
				
				<div class="col-sm-12 col-md-12">
				<ul class="filemanager-options">
					<li>
					  <div class="ckbox ckbox-default">
						<input type="checkbox" id="selectall" value="1" />
						<label for="selectall">Select All</label>
					  </div>
					</li>
					
					<li>
					  <a href="#" class="itemopt disabled"><i class="fa fa-trash-o"></i> Delete</a>
					</li>
					<li>
					  <div class="ckbox ckbox-default">
						<select type="select" class="form-control">
							<option value="selected">Associate to Event</option>
							<option value="Event 1">Event 1</option>
							<option value="Event 2">Event 2</option>
						</select>
					  </div>
					</li>
					
					<li>
						<div class="ckbox ckbox-default">
							<input type="text" placeholder="search" class="form-control">
						</div>
					</li>
					<li>
					  <div class="ckbox ckbox-default">
						<select type="select" class="form-control">
							<option value="selected">A to Z</option>
							<option value="A">A</option>
							<option value="B">BZ</option>
						</select>
					  </div>
					</li>
				</ul>	
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="table-responsive">
          <table class="table" id="table1">
              <thead>
                 <tr>
                    <th class="text-center" style="background-image:none"></th>
                    <th>School Names</th>
                    <th style="background-image:none">Actions</th>
                   
                 </tr>
              </thead>
              <tbody>
			  
				<?php 

									
					$fans = $get_college_name;
					if(is_array($fans))
					{
						foreach($fans as $val)
						{
						
				?>
						
							 <tr class="odd gradeX">
								<td class="text-center"><input type="checkbox"></td>
								<td><?php echo $val['school_name'];?></td>
								<td class="center">
									<a href="#"><i class="fa fa-bar-chart-o"></i></a>
									<a href="<?php echo ADMIN_SITE_URL?>college/add_edit/<?php echo $val['id']?>"><i class="fa fa-pencil"></i></a>
									<a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							 </tr>
                 <?php
						}
					}
									
								
				?>
                 
              </tbody>
           </table>
          </div><!-- table-responsive -->
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

<?php $this->load->view(ADMIN_FOOTER)?>


