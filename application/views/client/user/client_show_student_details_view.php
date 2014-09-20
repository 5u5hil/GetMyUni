
<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//display($user_data);
 $abc = "";  
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

                    <label for="firstname" class="col-sm-4 control-label"></label>
                    <div class='controls'><div id='filelist' ></div>
                        <div style='clear:both;'></div>
                        <div id='container'>
                               <div id="sub_container">
                          

                            <?php
                            if (isset($user_data->profile_pic) && (($user_data->profile_pic != ""))) {
                                $pro_pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $user_data->profile_pic));
                                        echo "<div class='display_image' id='main-0'><div class=''><image src=$pro_pic  class='studentprofilepic img-responsive'></div><br><input type='hidden'  value=$pro_pic name='profile_pic[]'> <div class='text-center'></div></div>";
                            }
							else
							{
                            ?>
							<div class='display_image '><div class=''><img class="studentprofilepic" src=<?php echo CLIENT_IMAGES ;?>defaultuser.jpg></div></div>
							<?php }?>
                            <br><br>
                            </div>
                            <div style="clear:both;"></div>
                            
                          

                        </div>
                        
                        <span id="image1_err"  class="error"></span> <span id="imgerror" class="error"></span>
                    </div>
					
		
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="tcol_darkblue mb20"> Personal Info </h2>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-4 control-label"> Name <span>:</span></label>
                        <div class="col-sm-8">
                            <label  class="control-label"><?php echo $user_data->name ?></label>
                          
                            
                        </div>
						
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email <span>:</span></label>
                        <div class="col-sm-8">
                            <label data-progression=""  disabled="disabled"  data-helper="" class="control-label " id="email" ><?php echo $user_data->email ?></abel>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datepicker" class="col-sm-4 control-label">Date of Birth <span>:</span></label>
                        <div class="col-sm-8">
                            <label data-progression=""  name="dob"  data-helper=""  class="control-label pro_com_text"> <?php  if($user_data->dob !="0000-00-00") { echo date('d-m-Y', strtotime($user_data->dob)); }?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-4 control-label">Gender <span>:</span></label>
                        <div class="col-sm-8">
                            <label  class="control-label"><?php if ($user_data->gender == 'M') { echo "Male"; } else { echo "Female";} ?></label>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="col-sm-4 control-label">Country of residence<span>:</span></label>
                        <div class="col-sm-8">
                           
                                <?php
                                $country = getMasters('country');
                                if ($country) {

                                    foreach ($country as $con) {
                                        
                                        if ($con['country_id'] == $user_data->country_id)
                                        {
                                         ?>
                                           <label  class="control-label"><?php echo $con['country_name'] ?></label>
                                     <?php 
                                           }
                                        }
                                    }
                               
                                ?>
                        
                        </div>                             
                    </div>

                    <div class="form-group mb30">
                        <label for="preferredlocation" class="col-sm-4 control-label">Preferred destination of study<span>:</span></label>
                        <div class="col-sm-8">
                          
                                <?php
                                $country = getMasters('country');
                                if ($country) {

                                    foreach ($country as $con) {
                                     
                                            
                                        if ($con['country_id'] == $user_data->preferred_destination)
                                        {
                                                //echo $con1['country_id'];
                                             //echo $user_data->preferred_destination;
                                         ?>
                                            <label  class="control-label"><?php echo $con['country_name'] ?></label>
                                      <?php 
                                         }
                                    }
                                }
                                ?>					
                        
                        </div>                             
                    </div>  

                    <hr/>  


                    <h2 class="tcol_darkblue mb30 mt30"> Educational Info </h2>

                    <div class="form-group">
                        <!--label  class="col-sm-12">Qualification</label-->
                        <div class="col-sm-12">
                            <div class="row mt10">
                                <div class="">
                                    <!--label> School Name</label-->
                                    <!--input type="text" name="schoolname" class="form-control"  placeholder="School Name" id="school_name"--> 
                                </div>

                                <?php
                                if (!empty($get_edu)) {
                                    
                                    ?>
                                     <div  class="col-sm-13 select_school_name">
                                    <?php $i = 1;
                                    foreach ($get_edu as $edu_info) {
                                        ?>
                                       
                                            <div id="school_name_<?php echo $i ?>" class="count_school_name">
                                                
                                                   
                                                        <?php
                                                        foreach ($get_school_name as $school_ans) {

                                                            
                                                            if ($school_ans['id'] == $edu_info['college_id'])
                                                            {
                                                            ?>
                                                           
                                                        <label  ><?php echo $school_ans['school_name'] . ' - ' . $school_ans['degree_name'] . ' - ' . $school_ans['field_name']  ?></label>
                                                      
                                                           
                                                        <?php 
                                                            
                                                        }
                                                        }
                                                        ?>
                                                      
                                                  
                                                <div class="school_name_<?php echo $i; ?>" <?php if ($edu_info['other'] == "") { ?> style='display:none;' <?php } ?>>
                                                    <div class="row">
                                                        <div class="col-sm-4 " >
                                                            <label  name="other_schoolname[]" class="control-label" ><?php echo $edu_info['other']; ?></label> 
                                                        </div>
                                                        <div class="col-sm-4">
                                                            
                                                                <?php
                                                                foreach ($master_degree as $degree) {

                                                                    $pre_selected = '';
                                                                    if ($edu_info['other'] != "") {
                                                                        if ($degree['id'] == $edu_info['degree']) {
                                                                            $pre_selected = 'selected';
                                                                        
                                                                    
                                                                    ?>
                                                                   
                                                                     <label><?php echo $degree['degree_name']; ?></label>
                                                               <?php
                                                                    }
                                                                }
                                                                }
                                                                ?>
                                                          
                                                        </div>
                                                        <div class="col-sm-4">
                                                          
                                                                <?php
                                                                foreach ($study_field as $field) {

                                                                    $pre_selected = '';
                                                                    if ($edu_info['other'] != "") {
                                                                        if ($field['id'] == $edu_info['field_study'])
                                                                            $pre_selected = 'selected';
                                                                    
                                                                 ?>
                                                                    
                                                                     <label><?php echo $field['field_name']; ?></label>
                                                                <?php 
                                                                    }
                                                                     }
                                                                     
                                                                   
                                                                ?>

                                                          
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
											  <br>
                                         <?php
                                          $i++;
                                    }
                                         ?>
                                           
                                        </div>
                               
                                            

                                        <div class="col-sm-3">   
                                             <div class="remove_school" >
                                                  <?php $i = 1;
                                    foreach ($get_edu as $edu_info) {
                                        ?>
                                            <?php if ($i == 1) { ?>
                                             
                                            <?php } else {  if(($edu_info["other"] == "")){?>

                                              				   
													<div class="school_name_<?php echo $i;?>" style='height:22px; display:block;'>&nbsp;
                                        </div>
													
													
													<?php } if(($edu_info["other"] != "")){?><div class="school_name_<?php echo $i;?>" style='height:66px; display:block;'>&nbsp;
                                        </div>
													
													
													<?php }?>
													
												

                                                  


                                                
                                                <?php
                                            }

                                            $i++;
                                             }
                                            ?>
                                                </div>
                                        </div>

                                        <?php
                                   
                                        } 
                                    ?>

                                    
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <h2 class="tcol_darkblue mb30 mt30"> Interested In </h2>
                    <div class="form-group">
                        <label for="levelofstudy" class="col-sm-4 control-label">Level of study<span>:<span></label>
                        <div class="col-sm-8">
                           
                                <?php
                                $master_degree = getMasters('master_degree');
                                if ($master_degree) {
                                    foreach ($master_degree as $mast) {
                                       
                                        if ($mast['id'] == $user_data->interested_degree_id)
                                        {
                                           ?>
                                            <label  class="control-label"><?php echo $mast['degree_name']; ?></label>
                                       <?php 
                                          }
                                    }
                                }
                                ?>						
                           
                        </div>                             
                    </div>

                    <div class="form-group">
                        <label for="areaofstudy" class="col-sm-4 control-label">Area of study<span>:<span></label>
                        <div class="col-sm-8">
                            
                                <?php
                                $area_of_study = getMasters('field_of_study');
                                if ($area_of_study) {
                                    foreach ($area_of_study as $area) {
                                       
                                        if ($area['id'] == $user_data->interested_field_id)
                                        {  
                                        ?>
                                            
                                            <label  class="control-label"><?php echo $area['field_name']; ?></label>
                                       <?php 
                                            }
                                     }
                                }
                                ?>	

                          
                        </div>                             
                    </div>

                    <div class="form-group mb30">
                        <label for="domainofstudy" class="col-sm-4 control-label">Domain of study<span>:<span></label>
                        <div class="col-sm-8">
                           
                                <?php
                                $domain = getMasters('master_majors_domains');
                                if ($domain) {
                                    foreach ($domain as $dom) {
                                     
                                        if ($dom['id'] == $user_data->interested_domain_id)
                                        {
                                            ?>
                                            
                                                <label  class="control-label"><?php echo $dom['domains_name']; ?></label>
                                        <?php 
                                        }
                                    }
                                }
                                ?>						
                             
                        </div>                             
                    </div>
                    <hr/>
                    <h2 class="tcol_darkblue mb30 mt30"> Work Experience </h2>
                    <div class="form-group">

                        <label for="job_position_id" class="col-sm-4 control-label ">Current job Position<span>:<span></label>
                        <div class="col-sm-8">
                          
                                <?php
                                $job_position = getMasters('job_position');
                                if ($job_position) {
                                    foreach ($job_position as $pos) {
                                       
                                        if ($pos['id'] == $user_data->job_position_id)
                                        {
                                          ?>
                                        <label  class="control-label"><?php echo $pos['name']; ?></label>
                                   
                                     <?php 
                                        }
                                        }
                                }
                                ?>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="col-sm-4 control-label">Current Company<span>:<span></label>
                        <div class="col-sm-8">
                           <label  class="control-label"><?php echo $user_data->company ?></label>
                        </div>
                    </div>

                    <div class="form-group mb30">
                        <label for="industry " class="col-sm-4 control-label">Current Industry</label>
                        <div class="col-sm-8">
                            
                                <?php
                                $industry = getMasters('industry');
                                if ($industry) {
                                    foreach ($industry as $ind) {
                                       
                                        if ($ind['id'] == $user_data->industry_id)
                                        { 
                                        ?>    
                                            
                                        
                                       <label  class="control-label"><?php echo $pos['name']; ?></label>
                                    <?php
                                        }
                                    
                                    }
                                }
                                ?>

                           
                        </div>                             
                    </div>
                    <div class="form-group mb30">
                        <label for="functionality " class="col-sm-4 control-label">Current Functionality<span>:<span></label>
                        <div class="col-sm-8">
                           
                                <?php
                                $functionality = getMasters('functionality');
                                if ($functionality) {
                                    foreach ($functionality as $func) {
                                       
                                        if ($func['id'] == $user_data->functionality_id)
                                        {
                                            ?>
                                                <label  class="control-label"><?php echo $pos['name']; ?></label>
                                           <?php 
                                           
                                        }
                                    }
                                }
                                ?>					
                           
                        </div>                             
                    </div>

                    <hr/>

                </div>

                <div class="col-sm-12 col-md-12 mt30 mb30">
                    <div class="tabbable tabs-left row-fluid">

                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close_user" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">close_user</span></button>
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

                        <div class="col-sm-3">
                            <ul class="nav nav-tabs">
                                <li><a href="#savedschool" data-toggle="tab">Saved Schools</a></li>
                                <li class="active"><a href="#followings" data-toggle="tab">Following</a></li>
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



                                                <?php
                                                $count = 1;
												if( !empty($get_user_save_school))
												{
                                                foreach ($get_user_save_school as $save_school) {
                                                    if ($count % 3 == 1) {
                                                        ?>

                                                        <div class="col-sm-4 col-md-4">

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="alert tabscont save_school_<?php echo $save_school['id']; ?> button_a"> <a><?php echo (strlen($save_school['school_name']) > 20) ? substr($save_school['school_name'], 0, 20) . '...' : $save_school['school_name']; ?></a></div>

                                                        <!-- data-toggle="modal" data-target=".bs-example-modal-sm"   for boot strap dialog-->

                                                        <?php
                                                        if ($count % 3 == 0) {
                                                            echo "</div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 3 != 1)
                                                        echo "</div>";
														
								}
                                                                else
                                                                {
                                                                    echo " <div class='alert alert-info'>You have not saved any Schools. Save them from School page to get regular updates about the school.</div>";
                                                                }
                                                    ?>
                                                        
                                                    <div class="clearfix"></div>
                                                    <div class="findschool"> Find schools <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
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

                                                <?php
                                                $count = 1;
						if(!empty($get_user_following_school))
						{
                                                foreach ($get_user_following_school as $following_school) {
                                                    if ($count % 3 == 1) {
                                                        ?>

                                                        <div class="col-sm-4 col-md-4">

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="alert tabscont follow_<?php echo $following_school['id']; ?> button_a"> <a><?php echo (strlen($following_school['school_name']) > 20) ? substr($following_school['school_name'], 0, 20) . '...' : $following_school['school_name']; ?></a></div>



                                                        <?php
                                                        if ($count % 3 == 0) {
                                                            echo "</div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 3 != 1)
                                                        echo "</div>";
                                                    }
                                                    else
                                                    {
                                                            echo "<div class='alert alert-info'>You are not following any Schools. Follow them from School page to get regular updates about the school</div>";

                                                    }
                                                    ?>


                                                    <div class="clearfix"></div>
                                                    <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
                                                </div>
                                            </div>
                                            <div id="users">
                                                <div class="row"> 

                                                    <div class="tcol_grey f_18  mb20"> Users you are following : </div>
                                                <?php
                                                $count = 1;
						$user_follow_data = (json_decode($get_user_follow_info->user_following));		
                                                //display($user_follow_data);
                                                if(!empty($user_follow_data))
												{
                                                foreach ($user_follow_data as $follow_user) {
                                                    if ($count % 3 == 1) {
                                                        ?>

                                                        <div class="col-sm-4 col-md-4">

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="alert tabscont user_follow_<?php echo $follow_user; ?>"><?php echo get_user_name_id($follow_user) ;?></div>



                                                        <?php
                                                        if ($count % 3 == 0) {
                                                            echo "</div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 3 != 1)
                                                        echo "</div>";
                                                    }
                                                    else
                                                    {
                                                            echo "<div class='alert alert-info'>You are not following any User. Follow them from School page to get regular updates about the user</div>";

                                                    }
                                                    ?>

                                                    <div class="clearfix"></div>
                                                    <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
                                                </div>
                                            </div>
                                            <div id="communities">
                                                <div class="row"> 

                                                    <div class="tcol_grey f_18  mb20"> Communities you are following : </div>
                                                    
                                                    
                                                    
                                                                     <?php
                                                $count = 1;
												if(!empty($get_user_community_detail))
												{
                                                foreach ($get_user_community_detail as $following_communi) {
                                                    if ($count % 3 == 1) {
                                                        ?>

                                                        <div class="col-sm-4 col-md-4">

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="alert tabscont user_community_<?php echo $following_communi['id']; ?> button_a"> <a ><?php echo  $following_communi['cname']; ?></a></div>



                                                        <?php
                                                        if ($count % 3 == 0) {
                                                            echo "</div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 3 != 1)
                                                        echo "</div>";
                                                    }
                                                    else
                                                    {
                                                            echo "<div class='alert alert-info'>You are not following any Community. Follow them from Community page to get regular updates about the community</div>";

                                                    }
                                                    ?>

                                                    
                                                    <div class="clearfix"></div>
                                                    <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
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

                                                        <div class="tcol_grey f_18  mb20"> Users following you: </div>
                                                                                                      
                                                                     <?php
                                                $count = 1;
												if(!empty($select_user_following_u))
												{
                                                foreach ($select_user_following_u as $user_followu) {
                                                    if ($count % 3 == 1) {
                                                        ?>

                                                        <div class="col-sm-4 col-md-4">

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="alert tabscont user_followu_<?php echo $user_followu['id']; ?> button_a"> <a><?php echo  $user_followu['name']; ?></a></div>



                                                        <?php
                                                        if ($count % 3 == 0) {
                                                            echo "</div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 3 != 1)
                                                        echo "</div>";
                                                    }
                                                    else
                                                    {
                                                            echo "<div class='alert alert-info'>No user following you</div>";

                                                    }
                                                    ?>
                                                        <div class="clearfix"></div>
                                                        <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
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


                                                        <?php
                                                        $count = 1;
														if(!empty($get_user_review))
														{
                                                        foreach ($get_user_review as $user_review) {
                                                            if ($count % 3 == 1) {
                                                                ?>

                                                                <div class="col-sm-4 col-md-4">

                                                                    <?php
                                                                }
                                                                ?>

                                                                <div class="alert tabscont follow_<?php echo $user_review['id']; ?>"> <?php echo (strlen($user_review['school_name']) > 20) ? substr($user_review['school_name'], 0, 20) . '...' : $user_review['school_name']; ?></div>



                                                                <?php
                                                                if ($count % 3 == 0) {
                                                                    echo "</div>";
                                                                }
                                                                $count++;
                                                            }
                                                            if ($count % 3 != 1)
															{
                                                                echo "</div>";
															}
															}
															else
															{
															
																echo "<div class='alert alert-info'> You have not written any Review. Kindly write Review for the school where you pursued your education.</div>";
															}
                                                            ?>


                                                            <div class="clearfix"></div>
                                                            <div class="findschool"> Find schools to review <input type="text" placeholder="Find Schools" class="form-control review_school_name"></div>
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
                        
                           
                            <!--<input type="reset" value="Reset" class="btn btn-info ">-->
                        </div>                

                        </form>
						 <!--p>Content here. <a class="alert" href=#>Alert!</a></p-->
                    </div>

                    <div class="col-sm-2 sidebar">
						<?php  $this->load->view(CLIENT_TICKER_VIEW);?>
						<?php $this->load->view(CLIENT_ADS_VIEW); ?>
					</div>

                    </div>

                </div>

                        <div class="col-sm-3"></div>
                                   


                </div>

                <footer>
                    <?php $this->load->view(CLIENT_FOOTER); ?>
                </footer>
            </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script>
            <link href="<?php echo CLIENT_CSS; ?>circle.css" rel="stylesheet">
            <script src="<?php echo CLIENT_SCRIPTS; ?>progress-circle.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
            <script src="<?php echo CLIENT_SCRIPTS; ?>bootbox.js"></script>
            <link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
            <script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script>

            <script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script>
                         <!--script>
        $(document).on("click", ".alert", function(e) {
            bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
        });
    </script-->

            <script>
            $(function() {
                $("#datepicker").datepicker({
                    defaultDate: '',
                    dateFormat: "dd-mm-yy",
                    yearRange: "1950:+nn",
                    changeMonth: true,
                    changeYear: true
                });
            });

            $(function() {

                $('.school_name_0').css('display', 'none');

                $(document).on("change", "select[class*='select_school_name_']", function(e) { 
                    var idq = $(this).attr('class');

                    var fid = idq.split("_");
					//alert(fid);
                    e.preventDefault();
                    if ($(this).val() == "0-0-0") {
                        $('.school_name_'+fid[3]).css('display', 'block');
						if( fid[3] == 1)
						{
						 var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'school_name_' + 1)
								 .addClass("hide_box");

                        newTextBoxDiv.after().html('&nbsp;');
                        newTextBoxDiv.appendTo(".remove_school");
						}
						if( fid[3] == 2)
						{
						 var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'school_name_' + 3)
								 .addClass("hide_box");

                        newTextBoxDiv.after().html('&nbsp;');
                        newTextBoxDiv.appendTo(".remove_school");
						}
						if( fid[3] == 3)
						{
						 var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'school_name_' + 3)
								 .addClass("hide_box");

                        newTextBoxDiv.after().html('&nbsp;');
                        newTextBoxDiv.appendTo(".remove_school");
						}
                    }
					else
					{
						 $('.school_name_'+fid[3]).css('display', 'none');
						 $('.school_name_'+fid[3]+' input').val('');
						 $('.school_name_'+fid[3]+' select').val('');
					}

                });
            });

            $(document).on("click", ".remove_logo", function(e)
            {
                e.preventDefault();
                var id = $(this).attr('id');
                $("#main-" + id).remove();
                $("#profile_pic").css("display", "block");
            });

            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function() {
                $(".testscore").attr('maxlength', '3');
                $(".testscore").bind("keypress", function(e) {

                    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
                    {
                        //display error message
                        bootbox.alert("Plase enter digit only");
                        return false;
                    }

                });
            });

            </script>	  

            <script>
                $(function() {
                    $("#tabs, #tabs1, #tabs2, #tabs3").tabs();
                });
            </script>

            </body>
            </html>

            <script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
            <script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>
       
