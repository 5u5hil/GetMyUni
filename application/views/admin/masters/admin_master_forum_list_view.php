	<!----------header------------->
	<?php $this->load->view(ADMIN_HEADER);?>
	<!----------header------------->
	
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i>Master Domain List<!--span>All elements to manage your School...</span--></h2>
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
					<a class="btn btn-primary btn-block" href="<?php echo ADMIN_SITE_URL?>college_master/master_forum_add_edit">Add Forum</a>
				</div>
				
			</div>
			
			<div class="row mb10"><!-- Add Exhibitor Row -->
				
				<div class="col-sm-12 col-md-12">
				<!--ul class="filemanager-options">
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
				</ul-->	
				</div>
			</div>
			
			<div class="row">
                            
                           
                            
				<div class="col-sm-12 col-md-12">
					<div class="table-responsive">
          <table class="table" id="table1">
              <thead>
                 <tr>
                    <th class="text-center" style="background-image:none"></th>
                    <th>Domain Name</th>
                    <th style="background-image:none">Actions</th>
                   
                 </tr>
              </thead>
              <tbody>
			  
		<?php 
                
                    if($get_master_forum_info != "no")
                    {
                        foreach($get_master_forum_info as $forum_name)
                        {
                        
                 ?>
						
                <tr class="odd gradeX" id="master-forum_<?php echo $forum_name['id']; ?>">
                       <td class="text-center"><!--input type="checkbox"--></td>
                       <td><?php echo $forum_name['fname'] ;?></td>
                       <td class="center">
                               <!--a href="#"><i class="fa fa-bar-chart-o"></i></a-->
                               <a href="<?php echo ADMIN_SITE_URL?>college_master/master_forum_add_edit/<?php echo $forum_name['id'];?>"><i class="fa fa-pencil"></i></a>
                               <a id="<?php echo $forum_name['id'];?>" class="delete_master_forum"><i class="fa fa-trash-o"></i></a>
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

	
</section>

<?php $this->load->view(ADMIN_FOOTER)?>


