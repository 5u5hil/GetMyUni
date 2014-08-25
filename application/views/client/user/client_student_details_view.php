
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

                            <!-- <div id="hexagon">
                                                                     <img src="<?php echo CLIENT_IMAGES; ?>icons/default_profile.png" class="img-responsive" id="hexagon"></div>-->

<!--<div class="hexa gon"> <img src="<?php echo CLIENT_IMAGES; ?>adspace.jpg" class="img-responsive" > </div>-->

                            <?php
                            if (isset($user_data->profile_pic) && (($user_data->profile_pic != '[""]'))) {
                                if (is_array(json_decode($user_data->profile_pic))) {
                                    foreach ((json_decode($user_data->profile_pic)) as $key => $val) {
                                        echo "<div class='display_image' id='main-$key'><div class=''><image src='$val'  class='studentprofilepic img-responsive'></div><br><input type='hidden'  value='$val' name='profile_pic[]'> <div class='text-center'><a class='remove_logo' id='$key' href='javascript:;'>Remove</a></div></div>";
                                    }
                                }
								else{?>
								<div class='display_image '><div class=''><img class="studentprofilepic" src=<?php echo CLIENT_IMAGES ;?>defaultuser.jpg></div></div>
                           <?php                          
                            }
							}
							else
							{
                            ?>
							<div class='display_image '><div class=''><img class="studentprofilepic" src=<?php echo CLIENT_IMAGES ;?>defaultuser.jpg></div></div>
							<?php }?>
                            <br><br>
                            <div style="clear:both;"></div>

                            <a id='profile_pic' href='javascript:;'   <?php if (($user_data->profile_pic) != "") { ?> style="display:none;" <?php } ?> >	<input type="button" class="btn btn-primary" value="Upload Photo" ></a>

                        </div>
                        <span id="image1_err"  class="error"></span> <span id="imgerror" class="error"></span>
                    </div>
					
					
                    <div class="tcol_darkblue f_18 mt20">Your profile is <?php echo $abc;?> complete</div>
                    <!--img src="<?php echo CLIENT_IMAGES; ?>profilecomplete.png"-->
                    <div id="circle">
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="tcol_darkblue mb20"> Personal Info </h2>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-4 control-label"> Name <span style="color:#B00000">*</span></label>
                        <div class="col-sm-8">
                            <input data-progression="" type="text" class="form-control pro_com_text"  data-helper="" name="name" id="firstname" value="<?php echo $user_data->name ?>">
							<label for="name" class="error" id="name_err">This field is required.</label>
                        </div>
						
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input data-progression="" type="email" disabled="disabled"  data-helper="" class="form-control pro_com_text" id="email" value="<?php echo $user_data->email ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datepicker" class="col-sm-4 control-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input data-progression="" type="text" name="dob"  data-helper="" value="<?php  if($user_data->dob !="0000-00-00") { echo date('d-m-Y', strtotime($user_data->dob)); }else {  echo "";}?>" class="form-control pro_com_text" id="datepicker" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-4 control-label">Gender</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <?php
                                $male_checked = 'checked';
                                $female_checked = '';
                                if ($user_data->gender == 'M')
                                    $male_checked = 'checked';
                                if ($user_data->gender == 'F')
                                    $female_checked = 'checked';
                                ?>
                                <input data-progression="" class = "form-control" type="radio"  name="gender" id="male" value="M" <?php echo $male_checked ?>> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" data-progression class = "form-control" name="gender" id="female" value="F" <?php echo $female_checked ?>> Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="col-sm-4 control-label">Country of residence</label>
                        <div class="col-sm-8">
                            <select data-progression="" type="select" class="form-control new-select pro_com_sel" name="country_id">
                                <option value="">Country name</option>
                                <?php
                                $country = getMasters('country');
                                if ($country) {

                                    foreach ($country as $con) {
                                        $selected = '';
                                        if ($con['country_id'] == $user_data->country_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $con['country_id'] . '">' . $con['country_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>   
                        </div>                             
                    </div>

                    <div class="form-group mb30">
                        <label for="preferredlocation" class="col-sm-4 control-label">Preferred destination of study</label>
                        <div class="col-sm-8">
                            <select data-progression="" type="select" class="form-control new-select pro_com_sel" name="preferred_destination">
                                <option value="">Country name</option>
                                <?php
                                $country = getMasters('country');
                                if ($country) {

                                    foreach ($country as $con1) {
                                        $pre_selected = '';
                                        if ($con1['country_id'] == $user_data->preferred_destination)
                                            $pre_selected = 'selected';
                                        echo '<option ' . $pre_selected . ' value="' . $con1['country_id'] . '">' . $con1['country_name'] . '</option>';
                                    }
                                }
                                ?>					
                            </select>   
                        </div>                             
                    </div>  

                    <hr/>  


                    <h2 class="tcol_darkblue mb30 mt30"> Educational Info </h2>

                    <div class="form-group">
                        <label  class="col-sm-12">Qualification</label>
                        <div class="col-sm-12">
                            <div class="row mt10">
                                <div class="">
                                    <!--label> School Name</label-->
                                    <!--input type="text" name="schoolname" class="form-control"  placeholder="School Name" id="school_name"--> 
                                </div>

                                <?php
                                if (!empty($get_edu)) {
                                    
                                    ?>
                                     <div  class="col-sm-9 select_school_name">
                                    <?php $i = 1;
                                    foreach ($get_edu as $edu_info) {
                                        ?>
                                       
                                            <div id="school_name_<?php echo $i ?>" class="count_school_name">
                                                
                                                    <select type="select" class="form-control new-select select_school_name_<?php echo $i ?> _pro-school-sel" name="schoolname[]">
                                                        <option value="00-00-00">Select School Name</option>
                                                        <?php
                                                        foreach ($get_school_name as $school_ans) {

                                                            $pre_selected = '';
                                                            if ($school_ans['id'] == $edu_info['college_id'])
                                                                $pre_selected = 'selected';

                                                            echo '<option ' . $pre_selected . ' value="' . $school_ans['id'] . '-' . $school_ans['field_study'] . '-' . $school_ans['degree'] . '">' . $school_ans['school_name'] . ' - ' . $school_ans['degree_name'] . ' - ' . $school_ans['field_name'] . '</option>';
                                                        }
                                                        ?>
                                                        <option value="0-0-0" <?php if($edu_info['college_id'] == 0) { echo "selected = selected";}?>class="other">other</option>
                                                        
                                                    </select> 
                                                  
                                                <div class="school_name_<?php echo $i; ?>" <?php if ($edu_info['other'] == "") { ?> style='display:none;' <?php } ?>>
                                                    <div class="row">
                                                        <div class="col-sm-4 " >
                                                            <input type="text" name="other_schoolname[]" class="mt10 form-control _pro-school-text"  placeholder="School Name" value="<?php echo $edu_info['other']; ?>"> 
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <select type="select" class="form-control new-select select_degree mt10" name="school_degree[]">
                                                                <option value="">Select Degree</option>
                                                                <?php
                                                                foreach ($master_degree as $degree) {

                                                                    $pre_selected = '';
                                                                    if ($edu_info['other'] != "") {
                                                                        if ($degree['id'] == $edu_info['degree']) {
                                                                            $pre_selected = 'selected';
                                                                        }
                                                                    }
                                                                    echo '<option ' . $pre_selected . ' value="' . $degree['id'] . '">' . $degree['degree_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <select type="select" class="form-control new-select select_field mt10" name="school_field[]"> 
                                                                <option value="">Select field</option>
                                                                <?php
                                                                foreach ($study_field as $field) {

                                                                    $pre_selected = '';
                                                                    if ($edu_info['other'] != "") {
                                                                        if ($field['id'] == $edu_info['field_study'])
                                                                            $pre_selected = 'selected';
                                                                    }
                                                                    echo '<option ' . $pre_selected . ' value="' . $field['id'] . '">' . $field['field_name'] . '</option>';
                                                                }
                                                                ?>

                                                            </select>
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
                               
                                            

                                        <div class="col-sm-3">   <input type="button" class="btn btn-primary" value="Add" id="add_school_name">
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
													
												

                                                    <div class="eduaddbtn btn btn-primary mt27 remove-btn-<?php echo $i ?>" style="margin:1px 0 0;">Remove</div>


                                                
                                                <?php
                                            }

                                            $i++;
                                             }
                                            ?>
                                                </div>
                                        </div>

                                        <?php
                                   
                                } else {
                                    ?>

                                    <div class="col-sm-9 select_school_name">
                                        <div id="school_name_0" >
                                            <select type="select" class="form-control new-select select_school_name_0 _pro-school-sel" name="schoolname[]">
                                                <option value="">Select School Name</option>
                                                <?php
                                                foreach ($get_school_name as $school_ans) {

                                                    echo '<option  value="' . $school_ans['id'] . '-' . $school_ans['field_study'] . '-' . $school_ans['degree'] . '">' . $school_ans['school_name'] . ' - ' . $school_ans['degree_name'] . ' - ' . $school_ans['field_name'] . '</option>';
                                                }
                                                ?>
                                                <option value="0-0-0" class="other">other</option>
                                            </select>   
                                            <div class="school_name_0">
                                                <div class="row">
                                                    <div class="col-sm-4 " >
                                                        <input type="text" name="other_schoolname[]" class="mt10 form-control _pro-school-text"  placeholder="School Name"   value=""> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select type="select" class="form-control new-select select_degree mt10" name="school_degree[]">
                                                            <option value="">Select Degree</option>
                                                            <?php
                                                            foreach ($master_degree as $degree) {

                                                                $pre_selected = '';


                                                                echo '<option ' . $pre_selected . ' value="' . $degree['id'] . '">' . $degree['degree_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select type="select" class="mt10 form-control new-select select_field" name="school_field[]">
                                                            <option value="">Select field</option>


                                                            <?php
                                                            foreach ($study_field as $field) {

                                                                $pre_selected = '';


                                                                echo '<option ' . $pre_selected . ' value="' . $field['id'] . '">' . $field['field_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

                                        </div>
                                    </div>

                                    <div class="col-sm-3" id=" hide_div" >

                                        <input type="button" class="btn btn-primary" value="Add" id="add_school_name">

                                        <div class="school_name_0" style="height:44px; display:block;">
                                            &nbsp;
                                        </div>


                                        <div class="remove_school">

                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt20">
                        <label  class="col-sm-12">Test taken and scores</label>
                        <div class="col-sm-12">
                            <div class="row mt10 mb30">
                                <?php
                                if (!empty($get_test)) {
                                    ?>
                                    <div class="col-sm-5">
                                        <!--label> Test Name</label-->

                                        <div id="select_test_name" >
                                            <?php
                                            $i = 1;
                                            foreach ($get_test as $edu_test) {
                                                ?>

                                                <div id="test_name_<?php echo $i; ?>" class="test_name">

                                                    <select type="select" class="form-control new-select mb10 pro_test_sel" name="test_name[]">
                                                        <option value="">Test Name</option>
                                                        <?php
                                                        $exam_type = getMasters('exam_type');

                                                        if ($exam_type) {
                                                            foreach ($exam_type as $exam_name) {
                                                                $pre_selected = '';
                                                                if ($exam_name['id'] == $edu_test['test_name'])
                                                                    $pre_selected = 'selected';
                                                                echo '<option  ' . $pre_selected . ' value="' . $exam_name['id'] . '">' . $exam_name['name'] . '</option>';
                                                            }
                                                        }
                                                        ?>				
                                                    </select> 


                                                </div>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div id="test_score_text">
                                            <?php
                                            $i = 1;
                                            foreach ($get_test as $edu_test) {
                                                ?>

                                                <div id="test_score_<?php echo $i; ?>" class="test_name">
                                                    <input type="text" name="tsetscore[]" class="form-control testscore mb10"   placeholder="Test Score"  value="<?php echo $edu_test['test_score'] ?>"> 
                                                </div>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label> &nbsp;</label>
                                        <input type="button" class="btn btn-primary" value="Add" id="add_test"><br/>

                                        <div id="remove">

                                            <?php
                                            $i = 1;
                                            foreach ($get_test as $edu_test) {

                                                if ($i >= 2) {
                                                    ?>

                                                   
                                                    <div class="eduaddbtn btn btn-primary mt27 r-btn-<?php echo $i; ?>" style="margin:8px 0 0;">Remove</div>

                                                    <?php
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <?php
                                } else {
                                    ?>


                                    <div class="col-sm-5">
                                        <!--label> Test Name</label-->

                                        <div id="select_test_name">

                                            <div id="test_name_1" class="test_name">
                                                <select type="select" class="form-control new-select mb10 pro_test_sel" name="test_name[]">
                                                    <option value="">Test Name</option>
                                                    <?php
                                                    $exam_type = getMasters('exam_type');

                                                    if ($exam_type) {
                                                        foreach ($exam_type as $exam_name) {

                                                            echo '<option  value="' . $exam_name['id'] . '">' . $exam_name['name'] . '</option>';
                                                        }
                                                    }
                                                    ?>				
                                                </select> 
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div id="test_score_text">


                                            <div id="test_score_1" class="test_name">
                                                <input type="text" name="tsetscore[]" class="form-control testscore mb10"   placeholder="Test Score"> 
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                      
                                        <input type="button" class="btn btn-primary" value="Add" id="add_test"><br/>

                                        <div id="remove">


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
                        <label for="levelofstudy" class="col-sm-4 control-label">Level of study</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="interested_degree_id">
                                <option value="">Level of study</option>
                                <?php
                                $master_degree = getMasters('master_degree');
                                if ($master_degree) {
                                    foreach ($master_degree as $mast) {
                                        $selected = '';
                                        if ($mast['id'] == $user_data->interested_degree_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $mast['id'] . '">' . $mast['degree_name'] . '</option>';
                                    }
                                }
                                ?>						
                            </select>   
                        </div>                             
                    </div>

                    <div class="form-group">
                        <label for="areaofstudy" class="col-sm-4 control-label">Area of study</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="interested_field_id">
                                <option value="">Area of study</option>
                                <?php
                                $area_of_study = getMasters('field_of_study');
                                if ($area_of_study) {
                                    foreach ($area_of_study as $area) {
                                        $selected = '';
                                        if ($area['id'] == $user_data->interested_field_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $area['id'] . '">' . $area['field_name'] . '</option>';
                                    }
                                }
                                ?>	

                            </select>   
                        </div>                             
                    </div>

                    <div class="form-group mb30">
                        <label for="domainofstudy" class="col-sm-4 control-label">Domain of study</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="interested_domain_id">
                                <option value="">Domain of study</option>
                                <?php
                                $domain = getMasters('master_majors_domains');
                                if ($domain) {
                                    foreach ($domain as $dom) {
                                        $selected = '';
                                        if ($dom['id'] == $user_data->interested_domain_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $dom['id'] . '">' . $dom['domains_name'] . '</option>';
                                    }
                                }
                                ?>						
                            </select>   
                        </div>                             
                    </div>
                    <hr/>
                    <h2 class="tcol_darkblue mb30 mt30"> Work Experience </h2>
                    <div class="form-group">

                        <label for="job_position_id" class="col-sm-4 control-label ">Current job Position</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="job_position_id">
                                <option value="">Job Position</option>
                                <?php
                                $job_position = getMasters('job_position');
                                if ($job_position) {
                                    foreach ($job_position as $pos) {
                                        $selected = '';
                                        if ($pos['id'] == $user_data->job_position_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $pos['id'] . '">' . $pos['name'] . '</option>';
                                    }
                                }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="col-sm-4 control-label">Current Company</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control pro_com_text" name="company" value="<?php echo $user_data->company ?>" id="company" >
                        </div>
                    </div>

                    <div class="form-group mb30">
                        <label for="industry " class="col-sm-4 control-label">Current Industry</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="industry_id">
                                <option value="">Industry</option>
                                <?php
                                $industry = getMasters('industry');
                                if ($industry) {
                                    foreach ($industry as $ind) {
                                        $selected = '';
                                        if ($ind['id'] == $user_data->industry_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $ind['id'] . '">' . $ind['name'] . '</option>';
                                    }
                                }
                                ?>

                            </select>   
                        </div>                             
                    </div>
                    <div class="form-group mb30">
                        <label for="functionality " class="col-sm-4 control-label">Current Functionality</label>
                        <div class="col-sm-8">
                            <select type="select" class="form-control new-select pro_com_sel" name="functionality_id">
                                <option value="">Functionality</option>
                                <?php
                                $functionality = getMasters('functionality');
                                if ($functionality) {
                                    foreach ($functionality as $func) {
                                        $selected = '';
                                        if ($func['id'] == $user_data->functionality_id)
                                            $selected = 'selected';
                                        echo '<option ' . $selected . ' value="' . $func['id'] . '">' . $func['name'] . '</option>';
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

                                                        <div class="alert tabscont follow_<?php echo $save_school['id']; ?>"> <button type="button" class="close_user" id="user-intrest_<?php echo $save_school['id']; ?>" >&times;</button><?php echo (strlen($save_school['school_name']) > 20) ? substr($save_school['school_name'], 0, 20) . '...' : $save_school['school_name']; ?></div>

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

                                                        <div class="alert tabscont follow_<?php echo $following_school['id']; ?>"> <button type="button" class="close_user" id="user-intrest_<?php echo $following_school['id']; ?>">&times;</button><?php echo (strlen($following_school['school_name']) > 20) ? substr($following_school['school_name'], 0, 20) . '...' : $following_school['school_name']; ?></div>



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
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="findschool"> Find schools to follow <input type="text" placeholder="Find Schools" class="form-control find_school_name"></div>
                                                </div>
                                            </div>
                                            <div id="communities">
                                                <div class="row"> 

                                                    <div class="tcol_grey f_18  mb20"> Communities you are following : </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                        <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> Community Name  </div>
                                                    </div>
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
                                                        <div class="col-sm-4 col-md-4">
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4">
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4">
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                            <div class="alert tabscont"><button type="button" class="close_user" data-dismiss="alert">&times;</button> User Name  </div>
                                                        </div>
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

                                                                <div class="alert tabscont follow_<?php echo $user_review['id']; ?>"> <button type="button" class="close_user"  id="user-review_<?php echo $user_review['id']; ?>">&times;</button><?php echo (strlen($user_review['school_name']) > 20) ? substr($user_review['school_name'], 0, 20) . '...' : $user_review['school_name']; ?></div>



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
                        
                            <input type="submit" value="Submit" class="btn btn-primary" id="submit">
                            <input type="button" value="Cancel" class="btn btn-danger review_cancel">
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

            <script type="text/javascript">

			<?php
			if (!empty($get_test)) {
				$count_test = (count($get_test));
				?>

									var counter = 1 +<?php echo $count_test; ?>
				<?php
			} else {
				?>
									var counter = 2;
				<?php
			}
			?>

                $(document).ready(function() {

                    $("#add_test").click(function(e) {
					
					
					<?php if (!empty($get_test)) {
				$count_test = (count($get_test));
				?>

									 if (counter > 3) {
                            bootbox.alert("You can only add scores of 3 tests in your profile");
                            return false;
                        }
				<?php
			} else {
				?>
									 if (counter >= 3) {
                            bootbox.alert("You can only add scores of 3 tests in your profile");
                            return false;
                        }
				<?php
			}
			?>


                       

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("id", 'test_name_' + counter);

                        newTextBoxDiv.after().html('<br><select type="select" class="form-control mb10 new-select pro_test_sel" name="test_name[]"><option value="">Test Name</option><?php
$exam_type = getMasters('exam_type');
if ($exam_type) {
    foreach ($exam_type as $exam_name) {
        echo '<option  value="' . $exam_name['id'] . '">' . $exam_name['name'] . '</option>';
    }
}
?></select> ');

                        newTextBoxDiv.appendTo("#select_test_name");

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("id", 'test_score_' + counter);

                        newTextBoxDiv.after().html('<br><input type="text" name="tsetscore[]" class="form-control mb10" placeholder="Test Score"> ');

                        newTextBoxDiv.appendTo("#test_score_text");

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'mt30 btn btn-primary mt27 r-btn-' + counter);
                        newTextBoxDiv.id = 'remove-btn' + counter;
                        newTextBoxDiv.after().html('Remove');
                        newTextBoxDiv.appendTo("#remove");

                    $('select[name*="test_name[]"] option').attr('disabled', false);

                        // loop each select and set the selected value to disabled in all other selects
                        $('select[name*="test_name[]"]').each(function() {
                            var $this = $(this);
                            $('select[name*="test_name[]"]').not($this).find('option').each(function() {
                                var str = $(this).attr('value');

                                if ($(this).attr('value') == $this.val())
                                    $(this).attr('disabled', true);

                            });
                            $('select[name*="test_name[]"] option[value=""]').removeAttr("disabled");
                        });
                        counter++;

                    });

                    $(document).on('click', '#remove', function() {
                        var idq = $(this).children('div').attr('class');

                        var fid = idq.slice(-1);

                        if (counter == 1) {
                            //alert("No more textbox to remove");
                            return false;
                        }

                        $(".r-btn-" + fid).remove();
                        $("#test_name_" + fid).remove();
                        $("#test_score_" + fid).remove();
                        counter--;
                    });

                   $(document).on('change', 'select[name*="test_name[]"]', function() {


                        // start by setting everything to enabled
                        $('select[name*="test_name[]"] option').attr('disabled', false);

                        // loop each select and set the selected value to disabled in all other selects
                        $('select[name*="test_name[]"]').each(function() {
                            var $this = $(this);
                            $('select[name*="test_name[]"]').not($this).find('option').each(function() {
                                var str = $(this).attr('value');

                                if ($(this).attr('value') == $this.val())
                                    $(this).attr('disabled', true);

                            });
                            $('select[name*="test_name[]"] option[value=""]').removeAttr("disabled");
                        });

                    });


                });


            </script>

            <script type="text/javascript">

                $(document).ready(function() {

<?php
if (!empty($get_edu)) {
    //$count = (count($get_edu));
    ?>

                        var counter = $(".count_school_name").length;
    <?php
} else {
    ?>
                        var counter = 1;
    <?php
}
?>

                    $("#add_school_name").click(function(e) {
                        counter = $(".count_school_name").length;
                        //alert(counter);
                        counter++;
						<?php if (!empty($get_edu)) {
    //$count = (count($get_edu));
    ?>
                        if (counter > 3)
                        {
                            bootbox.alert("Sorry, you can only add upto 3 Schools in your profile");
                            return false;
                        }
						 <?php
						} else {
							?>
											if (counter >= 3)
                        {
                            bootbox.alert("Sorry, you can only add upto 3 Schools in your profile");
                            return false;
                        }
							<?php
						}
						?>

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("id", 'school_name_' + counter)
                                .addClass("count_school_name");
                        newTextBoxDiv.after().html('<br><select type="select" class="form-control new-select select_school_name_' + counter + ' _pro-school-sel" name="schoolname[]"><option value="">Select School Name</option><?php
foreach ($get_school_name as $school_ans) {
    echo '<option  value="' . $school_ans['id'] . '-' . $school_ans['field_study'] . '-' . $school_ans['degree'] . '">' . $school_ans['school_name'] . '-' . $school_ans['degree_name'] . ' - ' . $school_ans['field_name'] . '</option>';
}
?><option value="0-0-0" class="other">other</option></select><div class="school_name_' + counter + '"><div class="school_name_' + counter + '"><div class="row"><div class="col-sm-4 " ><input type="text" name="other_schoolname[]" class="mt10 form-control _pro-school-text"  placeholder="School Name" value=""> </div><div class="col-sm-4"><select type="select" class="form-control mt10 new-select  select_degree" name="school_degree[]"><option value="">Select Degree</option><option value="2">Bachelors</option><option value="1">Masters</option><option value="3">Doctorate</option></select></div><div class="col-sm-4"><select type="select" class="form-control mt10 new-select  select_degree" name="school_field[]"><option value="">Select field</option><option value="1">Management</option><option value="2">Engineering</option></select></div></div>');

                        newTextBoxDiv.appendTo(".select_school_name");

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'eduaddbtn btn btn-primary mt27 remove-btn-' + counter);
                       // newTextBoxDiv.id = 'remove-btn' + counter;
                        newTextBoxDiv.after().html('Remove');
                        newTextBoxDiv.appendTo(".remove_school");

                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'school_name_' + counter)
								 .addClass("hide_box");

                        newTextBoxDiv.after().html('&nbsp;');
                        newTextBoxDiv.appendTo(".remove_school");



                        $('.school_name_' + counter + '').css('display', 'none');


                        $(document).on('change', '.select_school_name_' + counter + '', function(e) {
                            //alert(123);
                            var idq = $(this).attr('class');

                            var fid = idq.split("_");

                            e.preventDefault();
                            if ($(this).val() == "0-0-0") {
                                $('.school_name_' + fid[3] + '').css('display', 'block');
                            }


                        });

                        $('select[name*="schoolname[]"] option,select[name*="school_degree[]"] option').prop('disabled', false);
                        $('select[name*="schoolname[]"] option:selected,select[name*="school_degree[]"] option:selected').each(function() {

                            $("select[name*='schoolname[]'] option[value=" + $(this).val() + "],select[name*='school_degree[]'] option[value=" + $(this).val() + "]").attr("disabled", "disabled");

                        });
                        $('select[name*="schoolname[]"] option[value="0-0-0"],select[name*="school_degree[]"] option[value=""]').removeAttr("disabled");
                        //counter++;
                    });


                    $(document).on('change', 'select[name*="schoolname[]"],select[name*="school_degree[]"]', function() {


                        // start by setting everything to enabled
                        $('select[name*="schoolname[]"] option,select[name*="school_degree[]"] option').attr('disabled', false);

                        // loop each select and set the selected value to disabled in all other selects
                        $('select[name*="schoolname[]"],select[name*="school_degree[]"]').each(function() {
                            var $this = $(this);
                            $('select[name*="schoolname[]"],select[name*="school_degree[]"]').not($this).find('option').each(function() {
                                var str = $(this).attr('value');

                                if ($(this).attr('value') == $this.val())
                                    $(this).attr('disabled', true);

                            });
                            $('select[name*="schoolname[]"] option[value="0-0-0"],select[name*="school_degree[]"] option[value=""]').removeAttr("disabled");
                        });

                    });
                    $(document).on('click', '.remove_school div', function()
                    {
						counter--;
                        counter = $(".count_school_name").length;
                        var idq = $(this).attr('class');

                        var fid = idq.slice(-1);
                        //alert(fid);
                        if (counter < 1) {
                            //alert("No more textbox to remove");
                            return false;
                        }

                        $(".remove-btn-" + fid).remove();
                        $("#school_name_" + fid).remove();
                        
                    });

                });


            </script>

            <script>
            ( function( $ ){
			
				var count_text = $('input.pro_com_text[value!=""]').length;
				var count_select = $("select.pro_com_sel option:selected[value!='']").length;
				
				var tcount = $('.form-control').length;
				//alert(count_text);
				//alert(count_select);
				var school_count_sel = $("select._pro-school-sel option:selected[value!='']").length;
				var school_count_text = $('input._pro-school-text[value!=""]').length;
				var test_count_sel = $("select.pro_test_sel option:selected[value!='']").length;
				//alert(test_count_sel);
				 var img = $( ".studentprofilepic" ).attr('src');
				 var res = img.split("/");
				//alert(res[5]);
				if ((school_count_sel >=1) || (school_count_text >=1))
					{
						var total_school = 1;
					}
					else
					{
						var total_school = 0;
					}	
					
					if ((test_count_sel >=1))
					{
						var total_test = 1;
					}
					else
					{
						var total_test = 0;
					}	
				if(res[6] == "defaultuser.jpg")
				
				{
					var img_count = 0;
				}
				else if(res[9] != "defaultuser.jpg")
				{
					var img_count = 1;
				}
									
				
				//alert(img_count);
				//alert(school_count_text);
			var nPercent = ((count_text+count_select+1+total_school+total_test+img_count)/16)*100;
			<?php $abc = "<script>document.write(nPercent)</script>"?>   
                    $( '#circle' ).progressCircle({
                    
                     nPercent        : nPercent.toFixed(),
					showPercentText : true,
					circleSize      : 140,
					thickness       : 4
                    
                    });
            
					
            })( jQuery );
            </script>


            <script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
            <script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                // Custom example logic
                $(function() {
                    var site_url = '<?php echo SITE_URL;?>';//$("#hidden_site_url").val(); 
                    var uploader = new plupload.Uploader({
                        runtimes: 'gears,html5,flash,silverlight,browserplus',
                        browse_button: 'profile_pic',
                        container: 'container',
                        max_file_size: '10mb',
                        max_file_count: '1',
                        multi_selection: false,
                        url: '<?php echo ADMIN_SCRIPTS; ?>plugins/upload.php/?image_type=eventimg', //site_url+'admin/breed/process_image',
                        flash_swf_url: site_url + 'ui/admin/scripts/plugin/plupload/js/plupload.flash.swf',
                        silverlight_xap_url: site_url + 'ui/admin/scripts/plugin/plupload/js/plupload.silverlight.xap',
                        filters: [
                            {title: "Image files", extensions: "jpg,gif,png,jpeg,JPG,PNG,GIF,JPEG"},
                            {title: "Zip files", extensions: "zip"},
                            //{title : "Video files", extensions : "mp4"}
                        ],
                        resize: {width: 768, height: 500, quality: 100}
                    });

                    /*&uploader.bind('Init', function(up, params) {
                     //$('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
                     });*/


                    $('#profile_pic').click(function(e) {
                        uploader.start();
                        e.preventDefault();
                    });

                    uploader.init();

                    uploader.bind('FilesAdded', function(up, files) {


                        $.each(files, function(i, file) {
                            $('#container').html(
                                    '<div class="images temp_class"   id="' + file.id + '" >  <b></b>' +
                                    '</div>');

                        });

                        $("#profile_pic").css("display", "none");

                        uploader.start();
                        uploader.refresh();
                        //setTimeout(function () { up.start(); });
                        //up.refresh(); // Reposition Flash/Silverlight
                    });

                    /*uploader.bind('FilesRemoved', function(up, files) {
                     $("#profile_pic").css("display","block");
                     });*/

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

                    uploader.bind('FileUploaded', function(up, file, info) {
                        var obj = JSON.parse(info.response);
                        $('#' + file.id + " b").html("100%");
                        $('#' + file.id).html('<img src="ui/admin/images/ajax-loader.gif">');
                        var image_width = $("#hidden_image_width").val();
                        var image_height = $("#hidden_image_height").val();

                        //alert(site_url);
                        //alert(image_width+image_height);
                        var filename = obj.result.cleanFileName;
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo ADMIN_SCRIPTS; ?>plugins/file_rename_resize.php',
                            data: {filename: filename, file_id: file.id, filetype: 'profile_pic',site_url:'<?php echo SITE_URL;?>'},
                            dataType: 'json',
                            success: function(data)
                            {
                                value = eval(data);
                                //alert(value.image);
                                $('#' + file.id).html('');
                                $('#' + file.id).removeClass("temp_class");
                                $('#' + file.id).html(value.image);
                                if (value.error == 'success')
                                {

                                    $('#' + file.id).html(value.image);
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
