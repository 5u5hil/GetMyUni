<?php $this->load->view(ADMIN_HEADER);?>
<script type="text/javascript" src="<?php echo ADMIN_MODULES?>admin_college_module_js.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_PLUGINS?>plupload.full.min.js"></script>
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
		
			<div class="row">
		<div class="col-md-12">
          
					
            
                    <form  id="college_form" >
						<?php
							
							if($this->uri->segment(4))
							{
								$ans = $get_college;
								//display($ans);
								//display(json_decode($ans->college_logo));
							}
						
						?>
					
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
					
                  <div class="form-group">
                    <label class="control-label">Name Of School <span class="asterisk">*</span></label>
                    <input type="text" name="school_name" class="form-control" value="<?php echo isset($ans->school_name)  ? $ans->school_name : ''?>"/>
                    <label for="name" class="error" id="school_name_err">This field is required.</label>
                  </div>
                </div>
			
				 <div class="col-sm-6">
					
                  <div class="form-group">
                    <label class="control-label">Email Domain<span class="asterisk"></span></label>
                    <input type="text" name="email_domain" class="form-control" value="<?php echo isset($ans->email_domain)  ? $ans->email_domain : ''?>"/>
                    <label for="name" class="error" id="email_domain_err">This field is required.</label>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Degree <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="degree">
							<option value="">Select Degree</option>
							<?php 

									
										$fans = $get_degree;
										
										if(is_array($fans))
											{
												foreach($fans as $val)
												{
													$selected       = '';
														if( isset($ans->degree))
														{
															
																
																if($ans->degree == $val['id'])
																	$selected       = 'selected';
																	
															
														}
														echo '<option '.$selected.' value="'.$val['id'].'" >'.$val['degree_name'].'</option>';
												}
											}
							
							?>
						</select>
					  </div>
                    <label for="degree" class="error" id="degree_err">This field is required.</label>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Field Of Study <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="field_of_study">
							<option value="">Select Field</option>
							<?php 

								
									$fans = $get_field;
							
									if(is_array($fans))
											{
												foreach($fans as $val)
												{
													$selected       = '';
														if( isset($ans->field_study))
														{
															
																
																if($ans->field_study == $val['id'])
																	$selected       = 'selected';
																	
															
														}
														echo '<option '.$selected.' value="'.$val['id'].'" >'.$val['field_name'].'</option>';
												}
											}
									
									
								
							?>
						</select>
					  </div>
                    <label for="fieldofstudy" class="error" id="field_of_study_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
              </div><!-- row -->
              </div>
            </div> 
            <?php if(isset($ans->domain)){$domain = $ans->domain; $array_domain=explode(",",$domain);}?>
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Domain <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
                        <select id="element"  multiple name="domains[]" size="10">
                          <?php		
											$fans = $get_domain;
									
											foreach($fans as $val) {
												echo "<option" ;
												$found = false;
												if(isset($ans->domain))
												{
												foreach($array_domain as $val_domain) {
													if ($val_domain == $val['id'])
													{
														
														$found == true;
														echo " selected=\"selected\"";
														break;
													}
												}
												}
												if (!$found) echo " value=$val[id]>";
												echo $val['domains_name'] . "</option>";
											}
										
										?>
                        </select>
					  </div>
                    <label for="domain" class="error" id="domains_err">This field is required.</label>
                  </div>
                </div>
				
				  <div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">College Images <span class="asterisk">*</span></label>
						
						  <div class='controls'><div id='filelist' ></div>
										<div style='clear:both;'></div>
										<div id='container'>
										<?php if(isset($ans->college_logo)){ if(is_array(json_decode($ans->college_logo))){ foreach ((json_decode($ans->college_logo)) as $key=>$val ) {echo "<div class='display_image' id='main-$key'><image src='$val'  height='100px' width='100px'><br><input type='hidden' id='college_logo' value='$val' name='college_logo[]' id='filename'> <a class='remove_logo' id='$key' href='javascript:;'>Remove</a></div>";}}}?>
										<br>
										<div style="clear:both;"></div>
										<a id='collegelogo' href='javascript:;'><button><b>Choose File</b></button></a>
											
										</div>
										<span id="image1_err"  class="error"></span> <span id="imgerror" class="error"></span>
						</div>
						
					</div>
				  </div>
                
              </div><!-- row -->
              </div>
            </div>
             
             <div class="panel panel-default"> 
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Address <span class="asterisk">*</span></label>
                    <input type="address" name="address" class="form-control" value="<?php echo isset($ans->address)  ? $ans->address : ''?>"/>
                    <label for="address" class="error" id="address_err">This field is required.</label>

                  </div>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Zipcode <span class="asterisk">*</span></label>
                    <input type="zipcode" name="zipcode" class="form-control" value="<?php echo isset($ans->address)  ? $ans->zipcode : ''?>"/>
                    <label for="zipcode" class="error" id="zipcode_err">This field is required.</label>

                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Country <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="country">
						<option value="">Select Country</option>
							 <?php 

									$fans = $get_country;
									if(is_array($fans))
									{
										foreach($fans as $val)
										{
												
							 ?>
												
											<option value="<?php echo $val['country_id'];?>"><?php echo $val['country_name'];?></option>
							<?php
										}
									}
								
									if($this->uri->segment(4))
										{
											if(is_array($fans))
											{
												foreach($fans as $val)
												{
													
												if($val['country_id']== $ans->country )
													{
													?>
													
													<option value="<?php echo $val['country_id'];?>" selected=selected><?php echo $val['country_name'];?></option>
											<?php
													}
												}
											}
										
										}
							?>
							
						</select>
					  </div>
                    <label for="country" class="error" id="country_err">This field is required.</label>

                  </div>
                </div>
              
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Website </label>
                    <input type="website" name="website" class="form-control" value="<?php echo isset($ans->website)  ? $ans->website : ''?>"/>
                  </div>
                </div>
                
              </div><!-- row -->
			</div><!-- panel-body -->
            </div>
            
            
            <div class="panel panel-default"> 
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Average Tution (per year) <span class="asterisk">*</span></label>
                    <input type="avgtution" name="avg_tution" class="form-control" value="<?php echo isset($ans->avg_tution)  ? $ans->avg_tution : ''?>"/>
                    <label for="avgtution" class="error" id="avg_tution_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Rank <span class="asterisk">*</span></label>
                    <input type="rank" name="rank" class="form-control" value="<?php echo isset($ans->rank)  ? $ans->rank : ''?>"/>
                    <label for="rank" class="error" id="rank_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Acceptance Rate/ Selectivity <span class="asterisk">*</span></label>
                    <input type="text" name="acceptance_rate" class="form-control" value="<?php echo isset($ans->acc_rate)  ? $ans->acc_rate : ''?>"/>
                    <label for="acceptancerate" class="error" id="acceptance_rate_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Test Scores <span class="asterisk">*</span></label>
                    <input type="text" name="test_score" class="form-control" value="<?php echo isset($ans->test_score)  ? $ans->test_score : ''?>"/>
                    <label for="testscore" class="error" id="test_score_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Avg Test Scores  </label>
                    <input type="text" name="avg_test_score" class="form-control" value="<?php echo isset($ans->avg_test_score)  ? $ans->avg_test_score : ''?>"/>
                  </div>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Average Work Experience  (months) <span class="asterisk">*</span></label>
                    <input type="text" name="avg_work_exp" class="form-control" value="<?php echo isset($ans->work_exp)  ? $ans->work_exp : ''?>"/>
                    <label for="avgworkexp" class="error" id="avg_work_exp_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">International Students   </label>
                    <input type="text" name="int_student" class="form-control" value="<?php echo isset($ans->inter_stud)  ? $ans->inter_stud : ''?>"/>
                  </div>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Gender Distribution (F:M) %  </label>
                    <input type="text" name="gender_distribution" class="form-control" value="<?php echo isset($ans->gender_dist)  ? $ans->gender_dist : ''?>"/>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Accomodation <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="accomodation">
							
							<option value="1" <?php	if(isset($ans->acco_mod)){ if( $ans->acco_mod == 1){ echo "selected=selected";}}?>>Yes </option>
							<option value="2" <?php	if(isset($ans->acco_mod)){ if( $ans->acco_mod == 2){ echo "selected=selected";}}?>>No</option>
							
						</select>
					  </div>
						<label for="name" class="error" id="avg_work_exp_err">This field is required.</label>
                  </div>
                </div>
				  <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">% with job within 3 month<span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default">
						 <input type="text" name="percentage_job" class="form-control" value="<?php echo isset($ans->percentage_job)  ? $ans->percentage_job : ''?>"/>
					  </div>
						<label for="name" class="error" id="percentage_job_err">This field is required.</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Average Salary<span class="asterisk">*</span></label>
                    <input type="text" name="avg_salary" class="form-control" value="<?php echo isset($ans->avg_salary)  ? $ans->avg_salary : ''?> "/>
                    <label for="avgsalary" class="error" id="avg_salary_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
				      <?php if(isset($ans->topsector)){$topsector = $ans->topsector; $array_topsector=explode(",",$topsector);}?>
                    <label class="control-label">Top sectors (~70% students placed)<span class="asterisk">*</span></label>
		                <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="top_sectors[]" multiple="multiple" size="5">
							<option value="">Select Top Sectors</option>
							<?php 

									
										$fans = $get_topsectors;
									
									if(is_array($fans))
											{
												foreach($fans as $val)
												{
													$selected       = '';
														if( isset($ans->topsector))
														{
															foreach($array_topsector as $k1 => $v1)
															{
																echo $v1;
																if($v1 == $val['id'])
																	$selected       = 'selected';
																	
															}
														}
														echo '<option '.$selected.' value="'.$val['id'].'" >'.$val['top_sectors'].'</option>';
												}
											}
							?>
						</select>
					  </div>
                    <label for="topsectors" class="error" id="top_sectors_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                
              </div><!-- row -->
			</div><!-- panel-body -->
            </div>
            
		<div class="panel panel-default">
            <div class="panel-body">
			
				
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="control-label">Program Name <span class="asterisk">*</span></label>
                     <div class="ckbox ckbox-default" id="ckbox-program-name">
						<div class="program-name" id="program-name-1">
						  <select type="select" class="form-control select_pro_1" name="program_name[]">
						  <option value="">Select Program Name</option>
								<?php 

										$fans = $get_program_name;
										if(is_array($fans))
										{
											foreach($fans as $val)
											{
												
												?>
													
												<option value="<?php echo $val['id'];?>"><?php echo $val['program_name'];?></option>
										<?php
											}
										}
									
								?>
							</select>
						</div>
					  </div>
                    <label for="programname" class="error" id="program_name_err">This field is required.</label>
                  </div>
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="control-label">Program length </label>
					 <div class="ckbox ckbox-default" id="ckbox-program-length">
						<div class="program-length" id="program-length-1">
							<input type="text" name="program_length[]" class="form-control prog_length_1"  value=""/>
						</div>
					</div>
                  </div>
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="control-label">Program Type <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default" id="ckbox-program-type">
                            <div class="program-name" id="program-type-1">
                                    <select type="select" class="form-control select_type_1" name="program_type[]">
									<option value="">Select Program Type</option>
                                            <?php 
												$fans = $get_program_type;
												if(is_array($fans))
												{
													foreach($fans as $val)
													{
														
														?>
															
														<option value="<?php echo $val['id'];?>"><?php echo $val['program_type'];?></option>
												<?php
													}
												}
									
                                            ?>
                                    </select>
                            </div>
                    </div>
                    <label for="programtype" class="error" id="program_type_err">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="control-label">Program size </label>
					<div class="ckbox ckbox-default" id="ckbox-program-size">
						<div class="program-length" id="program-size-1">
							<input type="text" name="program_size[]" class="form-control prog_size_1" />
						</div>
					</div>
                  </div>
                </div>
                <div class="col-sm-1 btn btn-primary mt27 add_prog">
                  Add
                </div>
				
				 <div id="remove">
					
				 </div>
				
				
              </div>
			  
			  <!-- row -->
              </div>
            </div>   
            
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Key Criteria 1- GMAT Scores <span class="asterisk"></span></label>
                     <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="gmat_scores">
							<option value="1" <?php	if(isset($ans->gmat_score)){ if( $ans->gmat_score == 1){ echo "selected=selected";}}?>> N/A  </option>
							<option value="2" <?php	if(isset($ans->gmat_score)){ if( $ans->gmat_score == 2){ echo "selected=selected";}}?>>Very Important </option>
							<option value="3" <?php	if(isset($ans->gmat_score)){ if( $ans->gmat_score == 3){ echo "selected=selected";}}?>>Important  </option>
							<option value="4" <?php	if(isset($ans->gmat_score)){ if( $ans->gmat_score == 4){ echo "selected=selected";}}?>>Not Important  </option>
						</select>
					  </div>
                    <label for="kcgmat" class="error">This field is required.</label>
                  </div>
                </div>
                
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Key Criteria 2 - Resume/work ex <span class="asterisk"></span></label>
                     <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="work_exp">
							<option value="1" <?php	if(isset($ans->resume)){ if( $ans->resume == 1){ echo "selected=selected";}}?>> N/A  </option>
							<option value="2" <?php	if(isset($ans->resume)){ if( $ans->resume == 2){ echo "selected=selected";}}?>>Very Important </option>
							<option value="3" <?php	if(isset($ans->resume)){ if( $ans->resume == 3){ echo "selected=selected";}}?>>Important  </option>
							<option value="4" <?php	if(isset($ans->resume)){ if( $ans->resume == 4){ echo "selected=selected";}}?>>Not Important  </option>
						</select>
					  </div>
                    <label for="kcresume" class="error">This field is required.</label>
                  </div>
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Key Criteria 3 - Application essay <span class="asterisk"></span></label>
                     <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="application_essay">
							<option value="1" <?php	if(isset($ans->app_essay)){ if( $ans->app_essay == 1){ echo "selected=selected";}}?>> N/A  </option>
							<option value="2" <?php	if(isset($ans->app_essay)){ if( $ans->app_essay == 2){ echo "selected=selected";}}?>>Very Important </option>
							<option value="3" <?php	if(isset($ans->app_essay)){ if( $ans->app_essay == 3){ echo "selected=selected";}}?>>Important  </option>
							<option value="4" <?php	if(isset($ans->app_essay)){ if( $ans->app_essay == 4){ echo "selected=selected";}}?>>Not Important  </option>
						</select>
					  </div>
                    <label for="kcapplication" class="error">This field is required.</label>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Key Criteria 4 -Interviews <span class="asterisk"></span></label>
                     <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="interviews">
							<option value="1" <?php	if(isset($ans->interview)){ if( $ans->interview == 1){ echo "selected=selected";}}?>> N/A  </option>
							<option value="2" <?php	if(isset($ans->interview)){ if( $ans->interview == 2){ echo "selected=selected";}}?>>Very Important </option>
							<option value="3" <?php	if(isset($ans->interview)){ if( $ans->interview == 3){ echo "selected=selected";}}?>>Important  </option>
							<option value="4" <?php	if(isset($ans->interview)){ if( $ans->interview == 4){ echo "selected=selected";}}?>>Not Important  </option>
						</select>
					  </div>
                    <label for="kcinterview" class="error">This field is required.</label>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Key Criteria 5 - Transcripts <span class="asterisk"></span></label>
                     <div class="ckbox ckbox-default">
						<select type="select" class="form-control" name="transcripts">
							<option value="1" <?php	if(isset($ans->transcript)){ if( $ans->transcript == 1){ echo "selected=selected";}}?>> N/A  </option>
							<option value="2" <?php	if(isset($ans->transcript)){ if( $ans->transcript == 2){ echo "selected=selected";}}?>>Very Important </option>
							<option value="3" <?php	if(isset($ans->transcript)){ if( $ans->transcript == 3){ echo "selected=selected";}}?>>Important  </option>
							<option value="4" <?php	if(isset($ans->transcript)){ if( $ans->transcript == 4){ echo "selected=selected";}}?>>Not Important  </option>
						</select>
					  </div>
                    <label for="kctransaction" class="error">This field is required.</label>
                  </div>
                </div>
                

              </div><!-- row -->
              </div>
            </div>         
            <div class="panel-footer">
                <input type="hidden" name="hidden_college_id" id="hidden_college_id" value="<?php echo $this->uri->segment(4);?>">
                <button class="btn btn-primary" id="school_btn" type="submit">Submit</button>
            </div>
              </form>
              
        </div>
        
      </div>
		
		</div><!-- contentpanel -->
    
	</div><!-- mainpanel -->
  
	<!--<div class="rightpanel">
		<?php //include('rightpanel.php') ?>
	</div>--><!-- rightpanel -->
  
	
	
</section>

<?php $this->load->view(ADMIN_FOOTER);?>

<script type="text/javascript">

$(document).ready(function(){
 
    var counter = 2;
 
	var counter = 2;
 
    $(".add_prog").click(function (e) {
 
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-name-' + counter);
 
	newTextBoxDiv.after().html('<br><select type="select" class="form-control select_pro_'+counter+'" name="program_name[]"> <option value="">Select Program Name</option><?php $fans = $get_program_name;if(is_array($fans)){foreach($fans as $val){?><option value="<?php echo $val['id'];?>"><?php echo $val['program_name'];?></option><?php }}?></select>');
 
	newTextBoxDiv.appendTo("#ckbox-program-name");
	
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-type-' + counter);
 
	newTextBoxDiv.after().html('<br><select type="select" class="form-control select_type_'+counter+'" name="program_type[]"><option value="">Select Program Type</option><?php $fans = $get_program_type;if(is_array($fans)){foreach($fans as $val){?><option value="<?php echo $val['id'];?>"><?php echo $val['program_type'];?></option><?php } }?></select>');
		
	newTextBoxDiv.appendTo("#ckbox-program-type");
	
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-legnth-' + counter);
 
	newTextBoxDiv.after().html('<br><input type="text" name="program_length[]" class="form-control prog_length_'+counter+'" />');
 
	newTextBoxDiv.appendTo("#ckbox-program-length");
	
	
		var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-size-' + counter);
 
	newTextBoxDiv.after().html('<br>	<input type="text" name="program_size[]" class="form-control prog_size_'+counter+'" />');
 
	newTextBoxDiv.appendTo("#ckbox-program-size");
	
	
		var newTextBoxDiv = $(document.createElement('div'))
	     .attr("class",'col-sm-1 btn btn-primary mt27 remove-btn-'+ counter);
	newTextBoxDiv.id = 'remove-btn'+counter;
	newTextBoxDiv.after().html('Remove');
	newTextBoxDiv.appendTo("#remove");

	counter++;
     });
 
     $("#remove").live('click',function () {
		var idq = $(this).children('div').attr('class');
		var fid = idq.slice(-1);
		
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	
        $(".remove-btn-" + fid).remove();
		$("#program-legnth-" + fid).remove();
		$("#program-type-" + fid).remove();
		$("#program-name-" + fid).remove();
		$("#program-size-" + fid).remove();
 
     });
	 });


</script>
 <script src="<?php echo ADMIN_SCRIPTS ;?>plugins/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
// Custom example logic
$(function() {
        var site_url                                                            = 'http://192.168.2.148/GMU/';//$("#hidden_site_url").val(); 
        var uploader                                                            = new plupload.Uploader({
        runtimes                                                                : 'gears,html5,flash,silverlight,browserplus',
        browse_button                                                           : 'collegelogo',
        container                                                               : 'container',
        max_file_size                                                           : '10mb',
        url                                                                     : '<?php echo ADMIN_SCRIPTS ;?>plugins/upload.php/?image_type=collegelogo',//site_url+'admin/breed/process_image',
        flash_swf_url                                                           : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.flash.swf',
        silverlight_xap_url                                                     : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.silverlight.xap',
        filters : [
                {title : "Image files", extensions : "jpg,gif,png,jpeg"},
                {title : "Zip files", extensions : "zip"},
                //{title : "Video files", extensions : "mp4"}
        ],
        resize                                                          : {width : 768, height : 500, quality : 100}
	});

	uploader.bind('Init', function(up, params) {
		//$('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
	});

	$('#collegelogo').click(function(e) {
		uploader.start();
		e.preventDefault();
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
           
            
                $.each(files, function(i, file) {
                                $('#filelist').append(
                                        '<div class="images temp_class"   id="' + file.id + '" style="float:left;margin-right:10px;">  <b></b>' +
                                '</div>');
                                });
            
            
                                
		uploader.start();
                uploader.refresh();
                //setTimeout(function () { up.start(); });
		//up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('UploadProgress', function(up, file) {
            //alert('test');
		$('#' + file.id + " b").html(file.percent + "%");
           
	});

	uploader.bind('Error', function(up, err) {
		$('#filelist').append("<div>Error: " + err.code +
			", Message: " + err.message +
			(err.file ? ", File: " + err.file.name : "") +
			"</div>"
		);

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('FileUploaded', function(up, file,info) {
                var obj = JSON.parse(info.response);
		$('#' + file.id + " b").html("100%");
		$('#' + file.id ).html('<img src="ui/admin/images/ajax-loader.gif">');
                var image_width                                                         = $("#hidden_image_width").val();
                var image_height                                                        = $("#hidden_image_height").val();
        
                //alert(site_url);
                //alert(image_width+image_height);
                var filename                                                    = obj.result.cleanFileName;              
                $.ajax({
                    type                                                        : 'POST',
                    url                                                         : '<?php echo ADMIN_SCRIPTS ;?>plugins/file_rename_resize.php',
                    data                                                        : {filename:filename,file_id:file.id,filetype:'collegelogo',site_url:'<?php echo SITE_URL;?>'},
                    dataType                                                    : 'json',        
                    success: function(data)
                    {
                        value                                                   = eval(data);
						//alert(value.image);
                        $('#' + file.id ).html('');
                        $('#' + file.id).removeClass("temp_class");
						$('#' + file.id  ).html(value.image);
                        if(value.error == 'success')
                        {
                           
                           $('#' + file.id  ).html(value.image);
                             $('#image_err').html('');
                        }
                        else
                        {
                            $('#image_err').html(value.image);
                        }
                        
                    }
                });
               
	});
        
        
        
});

</script>

 