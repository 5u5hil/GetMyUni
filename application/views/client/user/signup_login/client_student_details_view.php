
			<?php $this->load->view(CLIENT_HEADER);?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>
          <div class="row container-fluid">
           <div class="col-sm-10 col-md-10 col-xs-12">
           		<div class="row">
                	<div class="col-sm-12">
                		<h1 class="page_title">Profile</h1>
                     </div>
                </div>
               <form class="form-horizontal student_profile" id="save_user_profile" onsubmit="return false">
           		<div class="row mt20">
                	<div class="col-sm-3 col-md-3 text-center">
                    	        	<div class="hexagone-3 row-hex-gap" style="background-image: url(http://placekitten.com/g/650/650);">		
				<a href="#"></a>		
				<div class="corner-1"></div>
				<div class="corner-2"></div>		
			</div>

                        
                          <div class='controls'><div id='filelist' ></div>
										<div style='clear:both;'></div>
										<div id='container'>
                                        <div id="hexagon">
										<img src="<?php echo CLIENT_IMAGES ;?>icons/default_profile.png" class="img-responsive" id="hexagon"></div>
                                                                                  
										<br><br>
										<div style="clear:both;"></div>
										<a id='profile_pic' href='javascript:;'><button><b>Choose File</b></button></a>
											
										</div>
										<span id="image1_err"  class="error"></span> <span id="imgerror" class="error"></span>
			</div>
                        
                        <div class="tcol_darkblue f_18 mt20">Your profile is 10% complete</div>
                        <img src="<?php echo CLIENT_IMAGES ;?>profilecomplete.png">
                    </div>
                	<div class="col-sm-8 col-md-8">
                    	<h2 class="tcol_darkblue mb20"> Personal Info </h2>
                        	<div class="form-group">
                                <label for="firstname" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="firstname" value="<?php echo $user_data->name?>">
                                </div>
                              </div>
                              
                        	<div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" disabled="disabled" class="form-control" id="email" >
                                </div>
                              </div>
                              
                        	<div class="form-group">
                                <label for="datepicker" class="col-sm-4 control-label">Date of Birth</label>
                                <div class="col-sm-8">
                                    <input type="text" name="dob"  class="form-control" id="datepicker" >
                                </div>
                              </div>
                              
                        	<div class="form-group">
                                <label for="gender" class="col-sm-4 control-label">Gender</label>
                                <div class="col-sm-8">
                                  <label class="radio-inline">
                                      <?php 
                                        $male_checked = 'checked';
                                        $female_checked = '';
                                        if($user_data->gender == 'M')
                                            $male_checked = 'checked';
                                        if($user_data->gender == 'F')
                                            $female_checked = 'checked';
                                      ?>
                                      <input type="radio" name="gender" id="male" value="M" <?php echo $male_checked?>> Male
                                    </label>
                                  <label class="radio-inline">
                                      <input type="radio" name="gender" id="female" value="F" <?php echo $female_checked?>> Female
                                    </label>
                                </div>
                              </div>
                              
                        	<div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Country of residence</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="country_id">
                                    <option value="">Country name</option>
                                    <?php 
                                        $country    = getMasters('country');
                                        if($country)
                                        {
                                            
                                            foreach($country as $con)
                                            {
                                                $selected  = '';
                                                if($con['country_id'] == $user_data->country_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$con['country_id'].'">'.$con['country_name'].'</option>';
                                            }
                                        }
                                    ?>
                          		</select>   
                                </div>                             
                            </div>
                            
							<div class="form-group mb30">
                                <label for="preferredlocation" class="col-sm-4 control-label">Preferred destination of study</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="preferred_destination">
                                    <option value="">Country name</option>
                                    <?php 
                                        $country    = getMasters('country');
                                        if($country)
                                        {
                                            
                                            foreach($country as $con1)
                                            {
                                                $pre_selected  = '';
                                                if($con1['country_id'] == $user_data->preferred_destination)
                                                    $pre_selected = 'selected';
                                                echo '<option '.$pre_selected.' value="'.$con1['country_id'].'">'.$con1['country_name'].'</option>';
                                            }
                                        }
                                    ?>					
                          		</select>   
                                </div>                             
                            </div>  
                            
                            <hr/>  
                            
                      
                    	<h2 class="tcol_darkblue mb30 mt30"> Educational Info </h2>
                        
                        <div class="form-group">
                        <label for="datepicker" class="col-sm-4 control-label">Last Qualification</label>
                         <div class="col-sm-8">
                         	<div class="row mt10">
                            	<div class="col-sm-5">
                                	<label> School Name</label>
                                	<input type="text" name="schoolname" class="form-control"  placeholder="School Name" id="school_name"> 
                                </div>
                            	<!--div class="col-sm-5">
                                   <label> &nbsp;</label>
                                    <select type="select" class="form-control new-select" name="levelofstudy">
                                        <option value="">Level of study</option>
                                        <option value="1">Engineering</option>						
                                        <option value="2">Masters</option>						
                                    </select>   
                                </div-->
                                <div class="col-sm-2">
                                	<label> &nbsp;</label>
                                	<input type="submit" class="btn btn-primary" value="Add">
                                </div>
                            </div>
                         </div>
                        </div>
                        
                        <div class="form-group">
                        <label for="datepicker" class="col-sm-4 control-label">Test taken and scores</label>
                         <div class="col-sm-8">
                         	<div class="row mt10 mb30">
                            	<div class="col-sm-5">
                                	<label> Test Name</label>
                                	<select type="select" class="form-control new-select" name="Test Name">
                                        <option value="">Test Name</option>
                                          <?php 
                                          
                                            $exam_type       = getMasters('exam_type');	
                                          
                                             if($exam_type)
                                                {
                                                    foreach($exam_type as $exam_name)
                                                    {
                                                       
                                                        echo '<option  value="'.$exam_name['id'].'">'.$exam_name['name'].'</option>';
                                                    }
                                                }
                                          
                                          
                                          ?>				
                                    </select>   

                                </div>
                            	<div class="col-sm-5">
                                	<label> &nbsp;</label>
                                	<input type="text" name="tsetscore" class="form-control"  id="testscore" placeholder="Test Score"> 
                                </div>
                                <div class="col-sm-2">
                                <label> &nbsp;</label>
                                	<!--<input type="submit" class="btn btn-primary" value="Save score">-->
                                </div>
                            </div>
                         </div>
                        </div>
                        
                        <hr/>
                        
                        
                        
                        	<h2 class="tcol_darkblue mb30 mt30"> Interested In </h2>
			<div class="form-group">
                                <label for="levelofstudy" class="col-sm-4 control-label">Level of study</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="interested_degree_id">
                                    <option value="">Level of study</option>
                                    <?php 
                                        $master_degree       = getMasters('master_degree');
                                        if($master_degree)
                                        {
                                            foreach($master_degree as $mast)
                                            {
                                                $selected = '';
                                                if($mast['id'] == $user_data->interested_degree_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$mast['id'].'">'.$mast['degree_name'].'</option>';
                                            }
                                        }
                                    ?>						
                          		</select>   
                                </div>                             
                            </div>
                            
			<div class="form-group">
                                <label for="areaofstudy" class="col-sm-4 control-label">Area of study</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="interested_field_id">
                                    <option value="">Area of study</option>
                                    <?php 
                                        $area_of_study       = getMasters('field_of_study');
                                        if($area_of_study)
                                        {
                                            foreach($area_of_study as $area)
                                            {
                                                $selected = '';
                                                if($area['id'] == $user_data->interested_field_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$area['id'].'">'.$area['field_name'].'</option>';
                                            }
                                        }
                                    ?>	
                                   				
                          		</select>   
                                </div>                             
                            </div>
                            
							<div class="form-group mb30">
                                <label for="domainofstudy" class="col-sm-4 control-label">Domain of study</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="interested_domain_id">
                                    <option value="">Domain of study</option>
                                    <?php 
                                        $domain       = getMasters('master_majors_domains');
                                        if($domain)
                                        {
                                            foreach($domain as $dom)
                                            {
                                                $selected = '';
                                                if($dom['id'] == $user_data->interested_domain_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$dom['id'].'">'.$dom['domains_name'].'</option>';
                                            }
                                        }
                                    ?>						
                          		</select>   
                                </div>                             
                            </div>
                        <hr/>
                    	<h2 class="tcol_darkblue mb30 mt30"> Work Experience </h2>
                           <div class="form-group">
                               
                                <label for="job_position_id" class="col-sm-4 control-label">Current job Position</label>
                                <div class="col-sm-8">
                                  <select type="select" class="form-control new-select" name="job_position_id">
                                    <option value="">Job Position</option>
                                    <?php 
                                        $job_position       = getMasters('job_position');
                                        if($job_position)
                                        {
                                            foreach($job_position as $pos)
                                            {
                                                $selected = '';
                                                if($pos['id'] == $user_data->job_position_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$pos['id'].'">'.$pos['name'].'</option>';
                                            }
                                        }
                                    ?>
                          		</select> 
                                </div>
                              </div>
                              
                           <div class="form-group">
                                <label for="company" class="col-sm-4 control-label">Current Company</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="company" value="<?php echo $user_data->company?>" id="company" >
                                </div>
                              </div>
                              
                              <div class="form-group mb30">
                                <label for="industry " class="col-sm-4 control-label">Current Industry</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="industry_id">
                                    <option value="">Industry</option>
                                    <?php 
                                        $industry       = getMasters('industry');
                                        if($industry)
                                        {
                                            foreach($industry as $ind)
                                            {
                                                $selected = '';
                                                if($ind['id'] == $user_data->industry_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$ind['id'].'">'.$ind['name'].'</option>';
                                            }
                                        }
                                    ?>
                                    					
                          		</select>   
                                </div>                             
                            </div>
                              <div class="form-group mb30">
                                <label for="functionality " class="col-sm-4 control-label">Current Functionality</label>
                                 <div class="col-sm-8">
                                <select type="select" class="form-control new-select" name="functionality_id">
                                    <option value="">Functionality</option>
                                    <?php 
                                        $functionality       = getMasters('functionality');
                                        if($functionality)
                                        {
                                            foreach($functionality as $func)
                                            {
                                                $selected = '';
                                                if($func['id'] == $user_data->functionality_id)
                                                    $selected = 'selected';
                                                echo '<option '.$selected.' value="'.$func['id'].'">'.$func['name'].'</option>';
                                            }
                                        }
                                    ?>					
                          		</select>   
                                </div>                             
                            </div>
							
                            <hr/>

                        
                    </div>
                    
                    
                    
                    
                     <div class="col-sm-12 col-md-12 mt30 mb30">
                    <div class="tabbable tabs-left row-fluid">
                    


                         <div class="col-sm-3">
                        <ul class="nav nav-tabs">
                             <li><a href="#savedschool" data-toggle="tab">Saved Schools</a></li>
                             <li class="active"><a href="#followings" data-toggle="tab">Followings</a></li>
                             <li><a href="#followers" data-toggle="tab">Followers</a></li>
                             <li><a href="#reviews" data-toggle="tab">Your Reviews</a></li>
                           </ul>
                      </div>
                         <div class="tab-content col-sm-8">
                        <div class="tab-pane" id="savedschool">
                             <div class="row"> 
                             <div id="tabs1">
  <ul>
 <li class="col-sm-4 col-md-4 tcol_darkblue f_18 active"><a href="#school1">School</a></li>
  </ul>
  <div id="school1">
    <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> Saved Schools : </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"> <button type="button" class="close" data-dismiss="alert" >&times;</button>School Name  </div>
                                    
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control"></div>
                            </div>
  </div>
</div>
                              </div>
                           </div>
                        <div class="tab-pane active" id="followings">
                       <div id="tabs">
  <ul>
 <li class="col-sm-4 col-md-4 tcol_darkblue f_18 active"><a href="#school">School</a></li>
    <li class="col-sm-4 col-md-4 tcol_darkblue f_18"><a href="#users">Users</a></li>
    <li class="col-sm-4 col-md-4 tcol_darkblue f_18"><a href="#communities">Communities</a></li>
  </ul>
  <div id="school">
    <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> Schools you are following : </div>
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-toggle="modal" data-target=".bs-example-modal-sm">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-toggle="modal" data-target=".bs-example-modal-sm">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Name  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control"></div>
                            </div>
  </div>
  <div id="users">
    <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> Users you are following : </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find User to follow <input type="text" placeholder="Find User" class="form-control"></div>
                            </div>
  </div>
  <div id="communities">
  <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> Communities you are following : </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> Community Name  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find Community to follow <input type="text" placeholder="Find Community" class="form-control"></div>
                            </div>
  </div>
</div>
                        
                           </div>
                        <div class="tab-pane" id="followers">
                             <div class="row"> 
                             <div id="tabs2">
  <ul>
    <li class="col-sm-4 col-md-4 tcol_darkblue f_18"><a href="#users1">Users</a></li>
  </ul>
  
  <div id="users1">
    <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> Users you are following : </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> User Name  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find User to follow <input type="text" placeholder="Find User" class="form-control"></div>
                            </div>
  </div>
</div>
                             
                              </div>
                           </div>
                        <div class="tab-pane" id="reviews">
                             <div class="row">
                             <div id="tabs3">
  <ul>
    <li class="col-sm-4 col-md-4 tcol_darkblue f_18"><a href="#schoolreviewd">Schools</a></li>
  </ul>
  
  <div id="schoolreviewd">
    <div class="row"> 
                             	
                             	<div class="tcol_grey f_18  mb20"> School Reviewed : </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                	<div class="alert tabscont"><button type="button" class="close" data-dismiss="alert">&times;</button> School Reviewed  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="findschool"> Find School Reviewed to follow <input type="text" placeholder="Find School Reviewed" class="form-control"></div>
                            </div>
  </div>
</div>
                             
                               </div>
                           </div>
                      </div>
                       </div>
                  </div>  
                        
                </div>
                	<div class="col-sm-3"></div>
					<div class="col-sm-9 mt20 mb30">
                    	<input type="submit" value="Submit" class="btn btn-primary" >
                    	<input type="button" value="Cancel" class="btn btn-danger review_cancel">
                    	<!--<input type="reset" value="Reset" class="btn btn-info ">-->
                    </div>                
                    
                    </form>
                
               <div ang:round:progress data-round-progress-model="roundProgressData"
                            data-round-progress-width="500"
                            data-round-progress-height="500"
                            data-round-progress-outer-circle-width="40"
                            data-round-progress-outer-circle-radius="200"
                            data-round-progress-label-font="100pt Arial"
                            data-round-progress-outer-circle-background-color="#505769"
                            data-round-progress-outer-circle-foreground-color="#12eeb9"
                           
                            data-round-progress-label-color="#fff"></div>

    <input type="number" ng-model="roundProgressData.label"/>
    
    
    <div class="row">
    	<div class="col-sm-12">
        <ul class="metalisting">
        	<li class="compare_element"></li>
        	<li class="compare1"> <div class="compare_circle mt10">1 </div></li>
        	<li class="compare2"><div class="compare_circle mt10">2</div></li>
        	<li class="compare3"><div class="compare_circle mt10">3</div></li>
            
        </ul>
        <ul class="metalisting">
        	<li class="compare_element">
            	<div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/school.png"> 
                                                </div> 
                                                <div class="col-sm-9 col-md-9">School</div>
                                            </div>
            </li>
        	<li class="compare1"> <input type="text" class="form-control" placeholder="School Name"> </li>
        	<li class="compare2"><input type="text" class="form-control" placeholder="School Name"></li>
        	<li class="compare3"><input type="text" class="form-control" placeholder="School Name"></li>
            
        </ul>
        	<ul class="metalisting">
            	<li> 
                	<ul>
                    	<li  class="compare_element">
                        	<div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/school.png"> 
                                                </div> 
                                                <div class="col-sm-9 col-md-9">School</div>
                                            </div>
                        </li>
                    	<li  class="compare_element">
                        	 <div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/location.png">
                                                </div>
                                                <div class="col-sm-9 col-md-9">Location</div>
                                            </div>
                        </li>
                        <li  class="compare_element">
                        <div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/rank.png">
                                                </div>
                                                <div class="col-sm-9 col-md-9"> Rank</div>
                                            </div>
                        </li>
                        <li  class="compare_element">
                        	<div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/acceptance.png">
                                                </div>
                                                <div class="col-sm-9 col-md-9"> Acceptance rate</div>
                                            </div>
                        </li>
                        <li  class="compare_element">
                        	<div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/tution.png">
                                                </div>
                                                <div class="col-sm-9 col-md-9"> Tution fees</div>
                                            </div>

                        </li>
                        <li  class="compare_element">
                        	 <div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/testscore.png"> 
                                                </div>
                                                <div class="col-sm-9 col-md-9">Test scores</div>
                                            </div>
                        </li>
                        <li  class="compare_element">
                        	 <div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/industries.png">
                                                </div>
                                                <div class="col-sm-9 col-md-9">
                                                    Industries</div>
                                            </div>

                        </li>
                        <li  class="compare_element">
                        	<div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/avgsalary.png"> 

                                                </div>

                                                <div class="col-sm-9 col-md-9">Average starting salary</div></div>
                                                </li>
                        <li  class="compare_element">
                        	 <div class="row"> 
                                                <div class="col-sm-3 col-md-3">
                                                    <img src="<?php echo CLIENT_IMAGES; ?>icons/avgexp.png">
                                                </div>

                                                <div class="col-sm-9 col-md-9">Average work experience</div></div>
                        </li>
                        
                     
                        
                        
                    </ul>
                </li>
            	<li> 
                	<ul>
                    	<li  class="compare1">sfd</li>
                    	<li  class="compare1">fdds</li>
                    </ul>
                </li>
            	<li> 
                	<ul>
                    	<li  class="compare2">sfd</li>
                    	<li  class="compare2">fdds</li>
                    </ul>

                
                </li>
            	<li> 
                	 <ul>
                    	<li  class="compare3">sfd</li>
                    	<li  class="compare3">fdds</li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
    

           </div>
           
           <div class="col-sm-2 sidebar">
           	<img src="<?php echo CLIENT_IMAGES ;?>ticker.jpg" class="mt20 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace.jpg" class="mt10 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace2.jpg" class="mt10 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace4.jpg" class="mt10 img-responsive">
           	
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
	<link href="<?php echo CLIENT_CSS ;?>bootstrap-multiselect.css" rel="stylesheet">
	<link href="<?php echo CLIENT_CSS ;?>bootstrap_hexagone.css" rel="stylesheet">
    <script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap-multiselect.js"></script>
    <script src="<?php echo CLIENT_SCRIPTS ;?>angular.min.js"></script>
    <script src="<?php echo CLIENT_SCRIPTS ;?>angular-round-progress-directive.js"></script>
	<script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo CLIENT_MODULES?>client_user_module_js.js"></script>
     
	 <script>
      var app = angular.module('angularjs-starter', ['angular.directives-round-progress']);

      app.controller('MainCtrl', function($scope) {
        $scope.roundProgressData = {
          label: 48,
          percentage: 0.11
        }

        // Here I synchronize the value of label and percentage in order to have a nice demo
        $scope.$watch('roundProgressData', function (newValue, oldValue) {
          newValue.percentage = newValue.label / 100;
        }, true);
      });
      </script>
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
 <script>
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true
    });
  });
  
  
  $(document).on("click",".remove_logo",function(e)
		{
			e.preventDefault();
			var id            = $(this).attr('id');
			
			$("#main-"+id).remove();
			
		   
		});
                
 
   
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $("#testscore").attr('maxlength','3');
            $("#testscore").bind("keypress", function (e) {
              
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
         {
        //display error message
          alert("Plase enter digit only");
               return false;
            }

            });
        });
  
  </script>	  
    
   <script>
  $(function() {
    $( "#tabs, #tabs1, #tabs2, #tabs3" ).tabs();
  });
  </script>

  </body>
</html>
    <script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>
 <script src="<?php echo ADMIN_SCRIPTS ;?>plugins/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
// Custom example logic
$(function() {
        var site_url                                                            = 'http://192.168.2.148/GMU/';//$("#hidden_site_url").val(); 
        var uploader                                                            = new plupload.Uploader({
        runtimes                                                                : 'gears,html5,flash,silverlight,browserplus',
        browse_button                                                           : 'profile_pic',
        container                                                               : 'container',
        max_file_size                                                           : '10mb',
        url                                                                     : '<?php echo ADMIN_SCRIPTS ;?>plugins/upload.php/?image_type=profile_pic',//site_url+'admin/breed/process_image',
        flash_swf_url                                                           : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.flash.swf',
        silverlight_xap_url                                                     : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.silverlight.xap',
        filters : [
                {title : "Image files", extensions : "jpg,gif,png,jpeg,JPG,JPEG,PNG,GIF,JPEG"},
                {title : "Zip files", extensions : "zip"},
                //{title : "Video files", extensions : "mp4"}
        ],
        resize                                                          : {width : 768, height : 500, quality : 100}
	});

	uploader.bind('Init', function(up, params) {
		//$('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
	});
        
	$('#profile_pic').click(function(e) {
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
                    data                                                        : {filename:filename,file_id:file.id,filetype:'profile_pic'},
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
