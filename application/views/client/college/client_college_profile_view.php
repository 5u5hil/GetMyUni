
<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <?php
    $ans = $get_college;
   
    $review = $get_review_rating;
	// display($review);
    /* function unique_sort($arrs, $id) 
      {
      $unique_arr = array();
      foreach ($arrs AS $arr) {

      if (!in_array($arr[$id], $unique_arr)) {
      $unique_arr[] = $arr[$id];
      }
      }
      sort($unique_arr);
      return $unique_arr;
      } */
    //display($get_student_following_college);
    //display($get_student_review_rate);
    $final_array = (array_merge($get_student_edu, $get_student_review_rate));
   
	
    $input = $final_array;
    $temp = array();
    $keys = array();

    foreach ($input as $key => $data) {
        unset($data['id']);
        if (!in_array($data, $temp)) {
            $temp[] = $data;
            $keys[$key] = true;
        }
    }

    $student = array_intersect_key($input, $keys);


    $count_gmu_con = (array_merge($get_student_following_college, $final_array));


    $input_con = $count_gmu_con;
    $temp_con = array();
    $keys_con = array();

    foreach ($input_con as $key_con => $data_con) {
        unset($data_con['id']);
        if (!in_array($data_con, $temp_con)) {
            $temp_con[] = $data_con;
            $keys_con[$key_con] = true;
        }
    }
    $student_con = array_intersect_key($input_con, $keys_con);

//display($student_con);

    /* $sort_arr = unique_sort($final_array, 'name');
      $sort_arr1 = unique_sort($final_array, 'profile_pic');
      echo "<pre>";
      print_r($sort_arr);
      echo"</pre>";

      echo "<pre>";
      print_r($sort_arr1);
      echo"</pre>"; */
    if ((count($get_avg_rating)) != 0) {

        $total_review_count = count($get_avg_rating);
    } else {
        $total_review_count = 1;
    }

    $get_user_following_info = $this->model->get_user_following_info();
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myCarousel2').carousel({
               // interval: 500
			   AutoPlay: true
            });


        });

    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myCarousel').carousel({
                //interval: 500
				 AutoPlay: true
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myCarousel1').carousel({
               // interval: 500
			    AutoPlay: true
            })


        });
    </script>

    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">School Profile</h1>
                <div class="btn btn-sm"><a class="btn_back back_page" onclick="goBack()"><i class="fa fa-caret-left col_light_blue"></i> Back</a></div>
            </div>
        </div>

        <!--End school profile-->
        <div class="row mt30">
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
                <div class="modal-dialog modal-lg"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Login with one of the below options</h4>
                        </div> 
                        <div class="modal-body">
                            <?php $this->load->view(CLIENT_USER_POPUP_VIEW); ?> 
                        </div>
                    </div> 
                </div>
            </div> 
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"> 
                <div class="modal-dialog modal-sm"> 
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <br/>
                            You have already written review for this School.
                        </div>
                    </div> 
                </div>
            </div> 


            <div class="col-sm-4 col-md-4 col-xs-12">
                <div class="unv_name"><?php echo $ans->school_name; ?></div>
                <div class="unv_location"><?php echo $ans->address; ?></div>
                <div class="unv_location"><a href="<?php echo $ans->website; ?>"><?php echo $ans->website; ?></a></div>
                <div class="follower"><span class="tcol_red total_follow"><?php echo $following_count; ?> </span><span class="col_light_blue">&nbsp;Student(s) Following</span></div>
                <div class="unv_review btn btn-sm">
                    <a   <?php
                    $id = session('client_user_id');
                    if ($id != 0) {
                        ?>
                            href='<?php echo CLIENT_SITE_URL ?>client_college/college_review/<?php echo clean_string($ans->school_name); ?>/<?php echo $ans->id; ?>'
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg"

                            <?php
                        }
                        ?> >Review this school</a></div>
                <div class="unv_follow btn btn-sm">
                    <a 

                        <?php
                        $id = session('client_user_id');
                        if ($id != 0) {
                            ?>
                            href='javascript:;' class="user_follow" id="follow_<?php echo $ans->id; ?>"
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg"

                            <?php
                        }
                        ?>>

                        <?php
                        $follow_string = 'Follow school';
                        if (!empty($get_user_following_info)) {

                            foreach ($get_user_following_info as $val) {

                                if ($ans->id == $val['school_id']) {
                                    if ($val['following'] != 0) {
                                        $follow_string = 'Unfollow school';
                                    }
                                }
                            }
                        }
                        echo $follow_string;
                        ?>
                    </a></div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12"> 
                <div id="myCarousel2" class="carousel slide">
                    <?php $val = (json_decode($ans->college_logo)); ?>
                    <ol class="carousel-indicators">

                        <?php
                        if (!empty($ans->college_logo)) {
                            $i = 0;
                            foreach ($val as $logo) {
                                $i++;
                                ?>
                                <li data-target="#myCarousel2" data-slide-to="<?php echo $i - 1 ?>" id="li_<?php echo $i - 1 ?>"></li>
                                <?php
                            }
                        } else {
                            ?>
                            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                            <?php
                        }
                        ?>        
                    </ol>

                    <!-- Carousel items -->


                    <div class="carousel-inner">
                        <?php
                        if (!empty($ans->college_logo)) {
                            $i = 0;
                            foreach ($val as $logo) {
                                $i++;
                                ?>
                                <div class="item" id="img_<?php echo $i; ?>">
                                    <div class="row-fluid">
                                        <div class="span3"><a href="#x" class="thumbnail"><img src="<?php echo $logo ?>" alt="Image" class="school_logo"></a></div>
                                    </div><!--/row-fluid-->
                                </div><!--/item-->  

                                <?php
                            }
                        } else {
                            ?>
                            <div class="item active">
                                <div class="row-fluid">
                                    <div class="span3"><a href="#x" class="thumbnail"><img src="<?php echo CLIENT_IMAGES . "college/college_1.png" ?>" alt="Image" class="school_logo"></a></div>
                                </div><!--/row-fluid-->
                            </div><!--/item-->  
                            <?php
                        }
                        ?>        
                    </div><!--/carousel-inner-->

                </div><!--/myCarousel2-->

                <div class="f_16 tcol_grey text-justify">Follow the school to get regular updates. Express your interest by clicking yes or may be and we will help you get in.</div>

            </div>
            <div class="col-sm-5 col-md-5 col-xs-12">
                <div class="col_features">

                    <div  class="mb10">
                        <div class="feature_num">1</div>
                        Rank: <span class="feature_detail"><?php echo $ans->rank; ?></span></div>
                    <div class="mb10">
                        <div class="feature_num">2</div>
                        Acceptance Rate: <span class="feature_detail"><?php echo $ans->acc_rate; ?> %</span></div>
                    <div class="mb10">
                        <div class="feature_num">3</div>
                        Average Course Fees: <span class="feature_detail"> $<?php echo number_format($ans->avg_tution); ?></span></div>
                    <div class="mb10">
                        <div class="feature_num">4</div>
                        Test Name: <span class="feature_detail"><?php echo $ans->test_score; ?></span></div>
                    <div class="mb10">
                        <div class="feature_num">5</div>
                        Test Scores: <span class="feature_detail"><?php echo $ans->avg_test_score; ?></span></div>

                </div>
                <div class="get_in">Want to get in? 

                    <a  

                        <?php
                        $id = session('client_user_id');
                        if ($id != 0) {
                            ?>
                            href='javascript:;' class="user_follow btnyes" id="interest-yes_<?php echo $ans->id; ?>"
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg" class="btnyes"

                            <?php
                        }
                        ?>

                        >

                        <?php
                        $follow_string = 'Yes';
                        if (!empty($get_user_following_info)) {

                            foreach ($get_user_following_info as $val) {

                                if ($ans->id == $val['school_id']) {
                                    if ($val['interest_yes_maybe'] == 1) {
                                        $follow_string = 'No';
                                    }
                                }
                            }
                        }
                        echo $follow_string;
                        ?>


                    </a>


                    <a 

                        <?php
                        $id = session('client_user_id');
                        if ($id != 0) {
                            ?>
                            href='javascript:;' class="user_follow btnyes" id="interest-maybe_<?php echo $ans->id; ?>"
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg" class="btnyes"

                            <?php
                        }
                        ?>

                        >

                        <?php
                        $follow_string = 'May be';
                        if (!empty($get_user_following_info)) {

                            foreach ($get_user_following_info as $val) {

                                if ($ans->id == $val['school_id']) {
                                    if ($val['interest_yes_maybe'] == 2) {
                                        $follow_string = 'No';
                                    }
                                }
                            }
                        }
                        echo $follow_string;
                        ?>

                    </a>

                </div>
            </div>
        </div>
        <hr/>
        <!--End school profile--> 

        <!--start quick facts-->
        <div class="row mb50">
            <h2 class="quick_facts ">Quick Facts</h2>
            <div class="clearfix"></div>
            <div class="col-sm-6 col-md-6 clearfix">
                <h3 class="tcol_darkblue">Before School</h3>
                <div class="row mt30">
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/international.jpg" class="img-responsive img-center">
                        <div class="qfright_border">
                            <div class="quick_facts_details"> Average experience <br>(in months)</div>
                            <h3 class="tcol_darkblue mt0"><?php echo $ans->work_exp; ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/female_student.jpg" class="img-responsive img-center">
                        <div class="qfright_border">
                            <div class="quick_facts_details"> Gender ratio (F&nbsp;:&nbsp;M)</div>
                            <h3 class="tcol_darkblue mt0"><?php echo $ans->gender_dist; ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/accomodation.jpg" class="img-responsive img-center">
                        <div class="qfright_border">
                            <div class="quick_facts_details">Campus Housing</div>
                            <h3 class="tcol_darkblue mt0">
                                <?php
                                $accomodation = $ans->acco_mod;
                                {
                                    if ($accomodation == 1) {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }
                                }
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <h3 class="tcol_darkblue">After School</h3>
                <div class="row mt30">
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/employed.jpg" class="img-responsive img-center">
                        <div class="qfright_border">
                            <div class="quick_facts_details">% Employed in 3 months from graduation</div>
                            <h3 class="tcol_darkblue mt0"><?php echo $ans->percentage_job; ?>% </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/avgsalary.jpg" class="img-responsive img-center">
                        <div class="qfright_border">
                            <div class="quick_facts_details">Average Salary</div>
                            <h3 class="tcol_darkblue mt0">$<?php echo number_format($ans->avg_salary); ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-center"> <img src="<?php echo CLIENT_IMAGES; ?>icons/employement.jpg" class="img-responsive img-center">
                        <div class="quick_facts_details">Top sectors of employment</div>
                        <h3 class="tcol_darkblue mt0" style="font-size:18px;"> <?php
                            $topsector = $ans->topsector;
                            $array_topsector = explode(",", $topsector);
                            foreach ($array_topsector as $top_val) {
                                echo $top_val . " ";
                            };
                            ?> </h3>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <!--End quick facts--> 

        <!--Start summary-->
        <div class="row mb30">
            <div class="col-sm-12 col-md-12">
                <div class="big_title">Summary <span>
                        <?php
                        $program = $ans->program;
                        $array_domain = explode(",", $program);
                        echo count($array_domain);
                        ?>
                        programs offered</span></div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-summary" id="#togg">
                <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
            </div>
            <div class="collapse in col-sm-12 col-md-12 col-xs-12 mt30" id="toggle-summary" >
                <div class="tabbable tabs-left row-fluid">
                    <div class="col-sm-3">
                        <ul class="nav nav-tabs">
                            <li><a href="#domain" data-toggle="tab">Domains</a></li>
                            <li class="active"><a href="#programs" data-toggle="tab">Programs</a></li>
                            <li><a href="#c" data-toggle="tab">Key admission criteria</a></li>
                            <li><a href="#c" data-toggle="tab">Key Documentation</a></li>
                        </ul>
                    </div>
                    <div class="tab-content col-sm-8">
                        <div class="tab-pane" id="domain">
                            <div class="row">
                                <div class="col-sm-6 col-sm-6">
                                    <h4 class="tcol_red">Domains</h4>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-12 summary-table">


                                    <?php
                                    $domain = $ans->domain;
                                    $array_domain = explode(",", $domain);
                                    if (is_array($array_domain)) {
                                        foreach ($array_domain as $val_domain) {
                                            $fans = $get_domain;
                                            if (is_array($fans)) {
                                                foreach ($fans as $val) {
                                                    if ($val_domain == $val['id']) {

                                                        echo "<div class='tcol_grey f_16'> <i class='fa fa-arrow-circle-right'></i> " . $val['domains_name'] . "</div> ";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>


                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="programs">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 ">
                                    <!--onchange="location = this.options[this.selectedIndex].value;"-->
                                    <select class="form-control new-select" >
                                        <option value="">Browse Programs</option>
                                        <?php
                                        $ans_program = $get_college_program;
//sdisplay($ans_program);
                                        foreach ($ans_program as $program_value) {
                                            ?>
                                            <option value="#pro_<?php echo $program_value['id']; ?>"><?php echo $program_value['program_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-6">
                                    <h4 class="tcol_red">Programs</h4>
                                </div>
                                <div class="col-sm-6 col-sm-6">
                                    <h4 class="tcol_red">Want to get in?</h4>
                                </div>
                                <div class="clearfix"></div>
                                <div class="sum_table_height">
                                    <?php
                                    $ans_program = $get_college_program;
                                    //display($ans_program);
                                    if (($ans_program) != "no") {
                                        foreach ($ans_program as $program_value) {
                                            ?>

                                            <div class="col-sm-12 sum_table_program" id="pro_<?php echo $program_value['id']; ?>">
                                                <div class="col-sm-6 border-right">
                                                    <div class=" f_20 col_light_blue"><?php echo $program_value['program_name']; ?></div>
                                                    <div class=" tcol_grey f_18" >Batch Size : <?php echo $program_value['program_size']; ?></div>
                                                    <div class=" tcol_grey f_18" >Length : <?php echo $program_value['program_legth']; ?></div>
                                                    <div class=" tcol_grey f_18" >Type : <?php echo $program_value['program_type']; ?></div>
                                                </div>
                                                <div class="col-sm-6">

                                                    <a  

                                                        <?php
                                                        $id = session('client_user_id');
                                                        if ($id != 0) {
                                                            ?>
                                                            href='javascript:;' class="user_follow btnyes" id="program-yes_<?php echo $ans->id ?>_<?php echo $program_value['program_name_id'] ?>"
                                                            <?php
                                                        } else {
                                                            ?>
                                                            data-toggle="modal" data-target=".bs-example-modal-lg" class="btnyes"

                                                            <?php
                                                        }
                                                        ?>

                                                        >

                                                        <?php
                                                        $follow_string = 'Yes';
                                                        if (!empty($get_user_following_info)) {
                                                            foreach ($get_user_following_info as $val) {
                                                                if (($ans->id == $val['school_id']) && ($val['program_id'] == $program_value['program_name_id'])) {
                                                                    if ($val['pro_yes_maybe'] == 1) {
                                                                        $follow_string = 'No';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        echo $follow_string;
                                                        ?>
                                                    </a>


                                                    <a 

                                                        <?php
                                                        $id = session('client_user_id');
                                                        if ($id != 0) {
                                                            ?>
                                                            href='javascript:;' class="user_follow btnyes" id="program-maybe_<?php echo $ans->id ?>_<?php echo $program_value['program_name_id'] ?>"
                                                            <?php
                                                        } else {
                                                            ?>
                                                            data-toggle="modal" data-target=".bs-example-modal-lg" class="btnyes"

                                                            <?php
                                                        }
                                                        ?>

                                                        >

                                                        <?php
                                                        $follow_string = 'May be';
                                                        if (!empty($get_user_following_info)) {
                                                            foreach ($get_user_following_info as $val) {
                                                                if (($ans->id == $val['school_id']) && ($val['program_id'] == $program_value['program_name_id'])) {
                                                                    if ($val['pro_yes_maybe'] == 2) {
                                                                        $follow_string = 'No';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        echo $follow_string;
                                                        ?>

                                                    </a>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>            
                            </div>
                        </div>
                        <div class="tab-pane" id="c">
                            <div class="row">
                                <div class="col-sm-6 col-sm-6">
                                    <h4 class="tcol_red">Key admission criteria</h4>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-12 summary-table lh30">
                                    <div class=" tcol_grey f_16" ><span class="summmary_ad_criteria"> 1</span> GMAT Scores:
                                        <?php
                                        if ($ans->gmat_score == "1") {
                                            echo "N/A";
                                        } if ($ans->gmat_score == "2") {
                                            echo " very Important";
                                        } if ($ans->gmat_score == "3") {
                                            echo "Important";
                                        } if ($ans->gmat_score == "4") {
                                            echo "Not Imporatnt";
                                        }
                                        ?>
                                    </div>
                                    <div class=" tcol_grey f_16" ><span class="summmary_ad_criteria"> 2</span> Resume/work ex:
                                        <?php
                                        if ($ans->resume == "1") {
                                            echo "N/A";
                                        } if ($ans->resume == "2") {
                                            echo " very Important";
                                        } if ($ans->resume == "3") {
                                            echo "Important";
                                        } if ($ans->resume == "4") {
                                            echo "Not Imporatnt";
                                        }
                                        ?>
                                    </div>
                                    <div class=" tcol_grey f_16" ><span class="summmary_ad_criteria"> 3</span> Application essay:
                                        <?php
                                        if ($ans->app_essay == "1") {
                                            echo "N/A";
                                        } if ($ans->app_essay == "2") {
                                            echo " very Important";
                                        } if ($ans->app_essay == "3") {
                                            echo "Important";
                                        } if ($ans->app_essay == "4") {
                                            echo "Not Imporatnt";
                                        }
                                        ?>
                                    </div>
                                    <div class=" tcol_grey f_16" ><span class="summmary_ad_criteria"> 4</span> Interviews:
                                        <?php
                                        if ($ans->interview == "1") {
                                            echo "N/A";
                                        } if ($ans->interview == "2") {
                                            echo " very Important";
                                        } if ($ans->interview == "3") {
                                            echo "Important";
                                        } if ($ans->interview == "4") {
                                            echo "Not Imporatnt";
                                        }
                                        ?>
                                    </div>
                                    <div class=" tcol_grey f_16" ><span class="summmary_ad_criteria"> 5</span> Transcript:
                                        <?php
                                        if ($ans->transcript == "1") {
                                            echo "N/A";
                                        } if ($ans->transcript == "2") {
                                            echo " very Important";
                                        } if ($ans->transcript == "3") {
                                            echo "Important";
                                        } if ($ans->transcript == "4") {
                                            echo "Not Imporatnt";
                                        }
                                        ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <!--End summary-->

        <!--Start rating-->     

        <div class="row mb30">
            <div class="col-sm-12 col-md-12">
                <div class="big_title"> <img src="<?php echo CLIENT_IMAGES; ?>icons/rating.png">Ratings </div>
                <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-ratings">
                    <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
                </div>
                <div class="clear"></div>


                <div id="toggle-ratings" class="row collapse in">
<?php if (!empty($get_avg_rating)) { ?>
                        <div class="col-sm-offset-3 col-sm-4 col-md-4">
                            <h4 class="rating_section">Academics:</h4>
                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Academic Rigor/Pedagogy <br/><br/><br/></div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 

                                        <?php
                                        if (!empty($get_avg_rating)) {

                                            $sum = 0;

                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum+= $value['academic_rigor'];
                                            }
                                            echo round($sum / $total_review_count);
                                        }
                                        ?>
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Exchange Program</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum1 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum1+= $value['academic_exchange'];
                                            }
                                            echo round($sum1 / $total_review_count);
                                        }
                                        ?> 
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Library & other Research facilities</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue">
                                        <?php
                                        if (!empty($get_avg_rating)) {

                                            $sum2 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum2+= $value['academic_library'];
                                            }
                                            echo round($sum2 / $total_review_count);
                                        }
                                        ?>
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum1 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum1 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                        </div> <!--academics-->
                        <div class="col-sm-offset-1 col-sm-4 col-md-4">
                            <h4 class="rating_section">Life at campus:</h4>
                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Fraternities/Sororities, Associations & Extra Curricular activities</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum3 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum3+= $value['life_fraternities'];
                                            }
                                            echo round($sum3 / $total_review_count);
                                        }
                                        ?> 


                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum3 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum3 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>


                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Party culture</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue">  
                                        <?php
                                        if (!empty($get_avg_rating)) {

                                            $sum4 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum4+= $value['life_party'];
                                            }
                                            echo round($sum4 / $total_review_count);
                                        }
                                        ?> 
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum4 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum4 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>


                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Sports Culture <br/><br/></div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum5 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum5+= $value['life_sport'];
                                            }
                                            echo round($sum5 / $total_review_count);
                                        }
                                        ?> 

                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum5 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum5 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>


                        </div> <!--life at campus-->

                        <div class="clear"></div>

                        <div class="col-sm-offset-3 col-sm-4 col-md-4">
                            <h4 class="rating_section">Infrastructure:</h4>
                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">School Infrastructure</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum6 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum6+= $value['infra_school'];
                                            }
                                            echo round($sum6 / $total_review_count);
                                        };
                                        ?> 
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum6 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum6 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Housing and Food <br/><br/></div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 

                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum7 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum7+= $value['infra_housing'];
                                            }
                                            echo round($sum7 / $total_review_count);
                                        }
                                        ?> 

                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum7 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum7 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                        </div> <!--Infrastructure-->
                        <div class="col-sm-offset-1 col-sm-4 col-md-4">
                            <h4 class="rating_section">Placements:</h4>
                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Career/Alumni Network</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum8 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum8+= $value['placement_career'];
                                            }
                                            echo round($sum8 / $total_review_count);
                                        }
                                        ?> 
                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum8 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum8 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>


                            <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Internships and Apprenticeships</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> 
                                        <?php
                                        if (!empty($get_avg_rating)) {
                                            $sum9 = 0;
                                            foreach ($get_avg_rating as $key => $value) {
                                                $sum9+= $value['placement_intership'];
                                            }
                                            echo round($sum9 / $total_review_count);
                                        }
                                        ?> 

                                    </div></div></div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php if (!empty($get_avg_rating)) echo number_format((($sum9 / $total_review_count) / 10) * 100, 2) . '%'; ?>"> <span class="sr-only"><?php if (!empty($get_avg_rating)) echo number_format((($sum9 / $total_review_count) / 10) * 100, 2) . '%'; ?> Complete</span> </div>
                            </div>
                            <div class="clear"></div>

                        </div><!--careers-->
                        <?php
                    }

                    else {
                        echo "<div class='col-sm-12 alert alert-info'>Sorry, no Ratings as yet for this college!</div>";
                    }
                    ?>

                </div>
            </div>
        </div>
        <hr/>
        <!--End rating-->


        <!--Start reviews-->   
       	<div class="row mb50">
            <div class="col-sm-12 col-md-12">
                <div class="big_title"> <img src="<?php echo CLIENT_IMAGES; ?>icons/review.png"> Reviews <span> <?php echo $review_count; ?> student review(s)</span></div>
            </div>
            <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-reviews">
                <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
            </div>

            <div id="toggle-reviews" class="row collapse in">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-3  col-md-3">
                        <div class="leave_review">
                            <div class="f_18 tcol_grey">
                                <a>
                                    Want to leave a review for this school?
                                </a>
                            </div>
                            <div class="write_review btn btn-sm">
                                <a 

                                    <?php
                                    $id = session('client_user_id');
                                    if ($id != 0) {


                                        if ($get_student_college_review_count >= 1) {

                                            echo "data-toggle='modal' data-target='.bs-example-modal-sm'";
                                        } else {
                                            ?>
                                            href="<?php echo CLIENT_SITE_URL ?>client_college/college_review/<?php echo clean_string($ans->school_name); ?>/<?php echo $ans->id; ?>"
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        data-toggle="modal" data-target=".bs-example-modal-lg"

                                        <?php
                                    }
                                    ?> 

                                    >
                                    Write a review
                                </a></div>
                        </div>
                    </div>

<?php if (!empty($review)) { ?>
                        <div class="col-sm-3  col-md-3 text-center">

                            <?php
                            if (!empty($review->profile_pic)) {
                                $user_pic = $review->profile_pic;
                                $user_pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $user_pic));
                            }
                            ?>


                            <a href="<?php echo SITE_URL ?>client/client_user/user_show_profile/<?php echo $review->student_id; ?>" ><img src=<?php
                            if (!empty($review->profile_pic)) {
                                echo $user_pic1;
                            } else {
                                echo "'" . CLIENT_IMAGES;
                            }
                            ?>/defaultuser.jpg' class="img-responsive prof_pic"></a>
                                 <div class="tcol_grey student_name"><?php if (!empty($get_review_rating)) echo $review->name; ?></div>
                            <a href="#"> <img src="<?php echo CLIENT_IMAGES; ?>/icons/follow.png"></a> <a href="#"> <img src="<?php echo CLIENT_IMAGES; ?>/icons/message.png"> </a>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="col-sm-6  col-md-6">
                                <div class="review_detail"> Year: <span><?php
                                        if (!empty($get_review_rating)) {
                                            if (($review->year) == "") {
                                                echo "-";
                                            } else {
                                                echo $review->year;
                                            }
                                        }
                                        ?></span></div>
                                <div class="review_detail"> Program: <span><?php if (!empty($get_review_rating)) echo $review->program_name ?></span></div>

                            </div>
                            <div class="col-sm-6  col-md-6">
                                <div class="review_detail"> School: <span><?php if (!empty($get_review_rating)) echo $ans->school_name; ?></span></div>
                                <div class="review_detail"> Languages: <span> <?php
                                        if (!empty($get_review_rating)) {
                                            if (($review->language) == "") {
                                                echo "-";
                                            } else {
                                                echo $review->language;
                                            }
                                        }
                                        ?></span></div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="review_description mt10"><?php if (!empty($get_review_rating)) echo $review->review_ans1; ?></div>
                            </div>
                            <div class="col-sm-offset-5 col-sm-7 col-md-7">
                                <div class="mt20 text-center"><a href="<?php echo SITE_URL ?>client/client_review_rating/review_full_details_view/<?php
                                    if (!empty($get_review_rating)) {
                                        echo $review->id;
                                    } else {
                                        echo clean_string($ans->school_name);
                                    }
                                    ?>" class="read_full_school_review">Read full school review</a></div>
                                <div class="mt10 text-center"> <a href="<?php echo SITE_URL ?>client/client_review_rating/review_details_view/<?php echo clean_string($ans->school_name); ?>/<?php echo $ans->id; ?>" class="read_all_school_reviews">Read all school reviews </a></div>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo " <div class='col-sm-9 alert alert-info'> No reviews yet. Be the first one to review this school</div>";
                    }
                    ?>
                </div>
            </div>

        </div>
        <hr>
        <!--End reviews--> 

        <!--Start gmu connection-->
       	<div class="row mb50">
            <div class="col-sm-12 col-md-12">
                <div class="big_title"> GMU Connections <span> <span class="total_follow"><?php echo $following_count; ?></span> Follower(s), <?php echo count($student); ?> Student(s)</span></div>
            </div>
            <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-gmu-connection">
                <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 mt30 collapse in" id="toggle-gmu-connection">
                <div class="tabbable tabs-left row-fluid">
                    <div class="col-sm-3">
                        <ul class="nav nav-tabs">
                            <li><a href="#followers" data-toggle="tab">Followers</a></li>
                            <li class="active"><a href="#students" data-toggle="tab">Students</a></li>
                        </ul>
                    </div>
                    <div class="tab-content col-sm-8">
                        <div class="tab-pane" id="followers">
                            <div class="col-sm-12 col-md-12">


                                <h4 class="tcol_grey mb30"> Followers </h4>

<?php if (!empty($get_student_following_college)) { ?>
                                    <div id="myCarousel3" class="carousel slide">


                                        <!-- Carousel items -->


                                        <div class="carousel-inner follow_ajax">
									
                                            <?php
										
                                            $count = 1;
                                            foreach ($get_student_following_college as $followers) {
                                                if ($count % 4 == 1) {
                                                    ?>

                                                    <div class="item event_<?php echo $count; ?> <?php
                                                    if ($count == 1) {
                                                        echo 'active';
                                                    }
                                                    ?>">
                                                        <div class="row-fluid">

                                                            <?php
                                                        }
                                                        if (!empty($followers['profile_pic'])) {
                                                            $profile_pic = $followers['profile_pic'];

                                                            $profile_pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $profile_pic));
                                                        }
                                                        ?>

                                                        <div class="col-sm-3 col-md-3 col-xs-6"><a href="#x" class="thumbnail">
                                                                <img src=<?php
                                                                if (!empty($followers['profile_pic'])) {
                                                                    echo $profile_pic1;
                                                                } else {
                                                                    echo "'" . CLIENT_IMAGES;
                                                                }
                                                                ?>defaultuser.jpg'alt="Image" class="img-responsive stprof"> </a> 


                                                            <span class="tcol_grey f_16">
                                                        <?php echo $followers['name']; ?><br/></span></div>
                                                        <?php
                                                        if ($count % 4 == 0) {
                                                            echo "</div></div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 4 != 1)
                                                        echo "</div></div>";
                                                    ?>


                                                </div><!--/carousel-inner-->




                                                <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
                                                <a class="right carousel-control" href="#myCarousel3" data-slide="next"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
                                            </div><!--/myCarousel-->
                                            <?php
                                        } else {
                                            echo " <div class='col-sm-9 alert alert-info'> No student is currently following this school </div>";
                                        }
                                        ?>

                                    </div>

                                </div>
                                <div class="tab-pane active" id="students">


                                    <div class="col-sm-12 col-md-12">


                                        <h4 class="tcol_grey mb30"> Admitted Students</h4>

<?php if (!empty($student)) { ?>
                                            <div id="myCarousel" class="carousel slide">


                                                <div class="carousel-inner">



                                                    <?php
                                                    $count = 1;
                                                    foreach ($student as $student_record) {
                                                        if ($count % 4 == 1) {
                                                            ?>

                                                            <div class="item event_<?php echo $count; ?> <?php
                                                            if ($count == 1) {
                                                                echo 'active';
                                                            }
                                                            ?>">
                                                                <div class="row-fluid">

                                                                    <?php
                                                                }
                                                                if (!empty($student_record['profile_pic'])) {
                                                                    $profile_spic = $student_record['profile_pic'];

                                                                    $profile_spic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $profile_spic));
                                                                }
                                                                ?>

                                                                <div class="col-sm-3 col-md-3 col-xs-6"><a href="#x" class="thumbnail"><img src=<?php
                                                                        if (!empty($student_record['profile_pic'])) {
                                                                            echo $profile_spic1;
                                                                        } else {
                                                                            echo "'" . CLIENT_IMAGES;
                                                                        }
                                                                        ?>defaultuser.jpg' alt="Image" class="img-responsive stprof"> </a> <span class="tcol_grey f_16"><?php echo $student_record['name']; ?><br/></span></div>
                                                                                                                                            <?php
                                                                                                                                            if ($count % 4 == 0) {
                                                                                                                                                echo "</div></div>";
                                                                                                                                            }
                                                                                                                                            $count++;
                                                                                                                                        }
                                                                                                                                        if ($count % 4 != 1)
                                                                                                                                            echo "</div></div>";
                                                                                                                                        ?>


                                                        </div><!--/carousel-inner-->


                                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
                                                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
                                                    </div><!--/myCarousel-->
                                                    <?php
                                                } else {
                                                    echo "<div class='col-sm-9 alert alert-info'> No student has been admitted to this college</div>";
                                                }
                                                ?>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>       
                        <hr>
                        <!--end gmu connection-->     

                        <!--Start events-->     
                        <div class="row mb50">
                            <div class="col-sm-12 col-md-12">
                                <div class="big_title"> Events <span> Discover school events</span></div>
                            </div>
                            <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-events">
                                <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
                            </div>

                            <div class="col-sm-12 col-md-12 collapse in" id="toggle-events">


                                <!--h4 class="tcol_grey mb30"> Admitted Students</h4-->

<?php if (!empty($get_school_event)) { ?>
                                    <div id="myCarousel1" class="carousel slide">



                                        <!-- Carousel items -->
                                        <div class="carousel-inner">

                                            <?php
                                            $count = 1;
                                            foreach ($get_school_event as $event) {
                                                if ($count % 4 == 1) {
                                                    ?>

                                                    <div class="item event_<?php echo $count; ?> <?php
                                                    if ($count == 1) {
                                                        echo 'active';
                                                    }
                                                    ?>">
                                                        <div class="row-fluid">

                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="col-sm-3 col-md-3">
                                                            <div class="thumbnail">
                                                                <div class="event_icon">
                                                                    <?php
                                                                    $logo = $event['event_img'];
                                                                    $ans_logo = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $logo));
                                                                    //echo $ans_logo;
                                                                    ?>

                                                                    <img src=<?php
                                                                    if (!empty($event['event_img'])) {
                                                                        echo $ans_logo;
                                                                    } else {
                                                                        echo "'" . CLIENT_IMAGES;
                                                                    }
                                                                    ?>/icons/calendar-icon.png' class="img-responsive">
                                                                </div> 
                                                                <div class="event_detail">
                                                                    <div>Event name: <?php echo $event['event_name']; ?></div>
                                                                    <div>Date: <?php echo $event['event_date']; ?> </div>
                                                                    <div> Location: <?php echo $event['event_location']; ?> </div>
                                                                    <div class="mt10"> 
                                                                        <a href="#" class="event_social"><i class="fa fa-facebook tcol_darkblue"></i></a>
                                                                        <a href="#" class="event_social"><i class="fa  fa-linkedin tcol_darkblue"></i></a>
                                                                        <a href="#" class="event_social"><i class="fa  fa-google-plus tcol_darkblue"></i></a>
                                                                    </div>
                                                                </div> 
                                                            </div> 										  
                                                        </div>

                                                        <?php
                                                        if ($count % 4 == 0) {
                                                            echo "</div></div>";
                                                        }
                                                        $count++;
                                                    }
                                                    if ($count % 4 != 1)
                                                        echo "</div></div>";
                                                    ?>



                                                </div><!--/carousel-inner-->

                                                <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
                                                <a class="right carousel-control" href="#myCarousel1" data-slide="next"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
                                            </div><!--/myCarousel-->

                                            <?php
                                        } else {
                                            echo "<div class='col-sm-12 alert alert-info'> No Event to display for this college</div>";
                                        }
                                        ?>
                                    </div>
                                </div>       
                                <!--end events-->     
                                <hr>



                                <div class="row mb50">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="big_title"> Wall <span> Have a question? Let's get started.</span></div>
                                    </div>
                                    <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-walls">
                                        <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 collapse in" id="toggle-walls">
                                        <iframe style="width: 100%;border: none;" frameborder="0" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);' src="<?= CLIENT_SITE_URL ?>client_college/get_college_wall/<?= $this->uri->segment(3, 0) ?>/1/<?= $this->uri->segment(2, 0) ?>"  ></iframe>      
                                    </div>
                                </div>



                                <!-- Walls End -->

                            </div>
                            <div class="col-sm-2 sidebar">
								<?php  $this->load->view(CLIENT_TICKER_VIEW);?>
								<?php $this->load->view(CLIENT_ADS_VIEW); ?>
							</div>
                        </div>




                        <!-- Walls -->


                        <footer>
<?php $this->load->view(CLIENT_FOOTER); ?>
                        </footer>
                    </div>

                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
                    <script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script> 
                    <!-- Include all compiled plugins (below), or include individual files as needed --> 
                    <script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
                    <script src="<?php echo CLIENT_MODULES; ?>college_follow_module.js"></script>
                    <script src="<?php echo CLIENT_MODULES; ?>client_user_module_js.js"></script>
                    <script type="text/javascript">
                                            $('.collapse').on('shown.bs.collapse', function() {
                                                $(this).parent().find(".openarrow").removeClass("openarrow").addClass("closearrow");
                                            }).on('hidden.bs.collapse', function() {
                                                $(this).parent().find(".closearrow").removeClass("closearrow").addClass("openarrow");
                                            });

                    </script>



                    <script>
                        $(document).ready(function() {
                            setInterval(function() {
                                resizeIframe($("#schoolwalls iframe"))
                            }, 1000);
                            $('.carousel-inner .item:first').addClass('active');
                        });
                    </script>
                    </body>
                    </html>