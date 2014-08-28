<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Write a review - <?php echo (ucwords(str_replace("-", " ", $this->uri->segment(4)))); ?></h1>
            </div>
        </div>
        <!-- <?php print_r($get_college) ?> --> 

        <div class="row mt30">
            <?php $this->load->view(CLIENT_REVIEW_RATING_SIDE_BAR) ?>
            <div class="col-sm-9 col-md-9 col-xs-12">
                <form id="review_rating_form" >
                    <h2 class="page_title mt0">Rate your school</h2>
                    <div class="f_18 tcol_grey mb20"> 10 = High / 1= Low</div>
                    <div class="row mt20 mb50">
                        <!--form action="#" method="post" class="review_email_form"-->

                        <div class="col-sm-6 col-md-6 "><div class="form-group"> <span class="f_16 tcol_grey">Please write your school email </span> </div></div>
                        <div class="col-sm-4 col-md-4 ">
                            <div class="form-group"><input type="text" placeholder="Please enter a valid school Email Id '@<?= $get_college[0]["email_domain"] ?>'" class="form-control" name="pemail" id="email" /></div>
                        </div>
                        <div class="col-sm-2 col-md-2 pull-right">
                            <div class="">
                                <div class="form-group"> <input type="submit" value="Confirm" class="btn btn-primary review_confirm_email"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div  id="passcode">
                            <div class="col-sm-6 col-md-6 "><div class="form-group"> <span class="f_16 tcol_grey">We have sent the passcode to your email id. Please enter it here to write the review. </span></div> </div>
                            <div class="col-sm-4 col-md-4 ">
                                <div class="form-group"><input type="password" placeholder="Enter Passcode" class="form-control" name='passcode'></div>
                            </div>
                            <div class="col-sm-2 col-md-2 pull-right">
                                <div class="form-group">
                                    <input type="submit" value="Confirm" class="btn btn-primary confirmpasscode">
                                </div>
                            </div>
                        </div>
                        <!--/form-->
                    </div>
                    <?php
                    //display($get_college);
                    //display($get_field);
                    ?>
                    <div id="info_disable">
                        <div id="basic_info">

                            <div class="form-group mb10">
                                <label for="year" class="col-sm-4 control-label tcol_grey">Year</label>
                                <div class="col-sm-8 mb10">
                                    <input type="text" placeholder="Year" class="form-control year_input" name="year">
                                    <!--select name="year" class="form-control new-select">
                                      <option>Please Select Year</option>
                                      <option value="1st year">1st year</option>
                                      <option value="2nd year">2nd year</option>
                                      <option value="3rd year">3rd year</option>
                                      <option value="4th year">4th year</option>
                                      <option value="5th year">5th year</option>
                                    </select-->
                                    <label class="error" id="year_err"></label>
                                </div>
                            </div>

                            <div class="form-group mb10">
                                <label for="language" class="col-sm-4 control-label tcol_grey">Languages Spoken</label>
                                <div class="col-sm-8 mb10">
                                    <input type="text" placeholder="Language" class="form-control" name="language">
                                    <label class="error" id="language_err"></label>
                                </div>
                            </div>

                            <!--div class="form-group mb10">
                    <label for="school" class="col-sm-4 control-label tcol_grey">Select School</label>
                    <div class="col-sm-8 mb10">
                        <select name="college_id" class="form-control new-select">
                                            <option>Select School</option>
                            <?php
                            if (is_array($get_college)) {
                                foreach ($get_college as $val) {
                                    $selected = '';

                                    if ($this->uri->segment(5) == $val['id'])
                                        $selected = 'selected';

                                    echo '<option ' . $selected . ' value="' . $val['id'] . '" >' . $val['school_name'] . '</option>';
                                }
                            }
                            ?>
                          </select>                              
                                             </div>
                         <span class="error" id="college_id_err"></span>
                  </div-->


                            <div class="form-group mb10">
                                <label for="school" class="col-sm-4 control-label tcol_grey">Select Program</label>
                                <div class="col-sm-8 mb10">
                                    <select name="program_id" class="form-control  new-select">
                                        <?php
                                        if (is_array($get_college_program)) {

                                            foreach ($get_college_program as $val) {

                                                echo '<option  value="' . $val['program_name_id'] . '" >' . $val['program_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>                              
                                </div>
                                <label class="error" id="program_id_err"></label>  
                            </div>


                            <!--			  
                                                      <div class="col-sm-4 col-md-3 ">
                                            <input type="text" placeholder="Language" class="form-control" name="language">
                                          </div>
                                                       <span class="error" id="language_err"></span>
                                                      <div class="col-sm-4 col-md-3 ">
                                                            <select name="college_id">
                                                                    <option>Select School</option>
                            <?php
                            if (is_array($get_college)) {
                                foreach ($get_college as $val) {
                                    $selected = '';

                                    if ($this->uri->segment(5) == $val['id'])
                                        $selected = 'selected';

                                    echo '<option ' . $selected . ' value="' . $val['id'] . '" >' . $val['school_name'] . '</option>';
                                }
                            }
                            ?>
                                                            </select>
                                          </div>
                                                      <span class="error" id="college_id_err"></span>
                                                      <br>
                                                      <div class="col-sm-4 col-md-3 ">
                                            <select name="program_id">
                            <?php
                            if (is_array($get_college_program)) {
                                foreach ($get_field as $val) {
                                    $selected = '';

                                    //if($this->uri->segment(5) == $val['id'])
                                    //$selected       = 'selected';

                                    echo '<option ' . $selected . ' value="' . $val['field_name'] . '" >' . $val['field_name'] . '</option>';
                                }
                            }
                            ?>
                                                            </select>
                                          </div>
                                                        <span class="error" id="program_id_err"></span>
                            -->		  </div>
                        <div class="clearfix"></div>
                        <div class="row mb50">
                            <div class="col-sm-6 col-md-6">
                                <div class="rating">
                                    <h4 class="rating_section">Academics:</h4>
                                    <div class="tcol_grey f_16 mt20">Academic Rigor/Pedagogy <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Do classes make you sleepy?" data-content="Please rate the school on rigor of academics, quality and relevance of courses, teaching pedagogy and quality of tests."></i> </div> <br>
                                    <div class="frm_opt_container">


                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="academic_rigor" id="field_1-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_1-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>

                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="academic_rigor_err"></label>
                                    <div class="clear"></div>

                                    <div class="tcol_grey f_16 mt20">Exchange Program <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Is your school a paradise for bookworms?" data-content="Please rate the school on quality of Library, Research facilities and  available funding for research."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="academic_exchange" id="field_2-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_2-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="academic_exchange_err"></label>
                                    <div class="tcol_grey f_16 mt20">Library & other Research facilities <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Something better please?" data-content="Please rate the school on its exchange program policy: Relevance of program and the quality of university partners."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="academic_library" id="field_3-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_3-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="academic_library_err"></label>

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="rating">
                                    <h4 class="rating_section">Life at Campus:</h4>
                                    <div class="tcol_grey f_16 mt20">Fraternities/Sororities, Associations & Extra Curricular activities <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="All work and no play makes jack a dull boy eh?" data-content="Please rate the diversity and activities of fraternities and on- campus associations (professional and cultural)."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="life_fraternities" id="field_4-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_4-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="life_fraternities_err"></label>
                                    <div class="clear"></div>

                                    <div class="tcol_grey f_16 mt20">Party culture <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Do you sleep much during your week?" data-content="Rate the partying culture of your school ?"></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="life_party" id="field_5-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_5-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="life_party_err"></label>
                                    <div class="tcol_grey f_16 mt20">Sports Culture <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Is your college known for churning out the next Lebron James?" data-content="Please rate the campus on the sports culture."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="life_sport" id="field_6-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_6-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="life_sport_err"></label>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6 col-md-6 mt30">
                                <div class="rating">
                                    <h4 class="rating_section">Infrastructure:</h4>
                                    <div class="tcol_grey f_16 mt20">School Infrastructure <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="How many stars for your campus?" data-content="Please rate the quality of overall school infrastructure including buildings, classrooms, connectivity etc"></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="infra_school" id="field_7-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_7-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="infra_school_err"></label>
                                    <div class="clear"></div>

                                    <div class="tcol_grey f_16 mt20">Housing and Food <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="There isn't much worse than an empty stomach and no sleep " data-content="Please rate availability and quality of on campus housing and food."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="infra_housing" id="field_8-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_8-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <label class="error" id="infra_housing_err"></label>
                                </div>
                            </div><div class="col-sm-6 col-md-6 mt30">
                                <div class="rating">
                                    <h4 class="rating_section">Placements:</h4>
                                    <div class="tcol_grey f_16 mt20">Career/Alumni Network <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="What are the chances of you being the next CEO?" data-content="Please rate how easy it is to find a job and the helpfulness of the career services/Alumni network."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="placement_career" id="field_9-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_9-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <label class="error" id="placement_career_err"></label>
                                    <div class="clear"></div>

                                    <div class="tcol_grey f_16 mt20">Internships and Apprenticeships <i class="fa fa-lg fa-question-circle popover-dismiss tcol_darkblue" data-toggle="popover" title="Trained or Drained?" data-content="Please rate according to the availability and quality of internships to students."></i></div>
                                    <div class="frm_opt_container">

                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            ?>

                                            <div class="frm_radio">
                                                <input type="radio" name="placement_intership" id="field_10-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                                <label for="field_10-<?php echo $i; ?>" class="c_<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <label class="error" id="placement_intership_err"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb50 review_form mt30">
                            <h2 class="page_title mt0">Review this school</h2>
                            <div class="tcol_grey f_18">What is your opinion on your institute?</div>

                            <div class="mt20">
                                <label for="que1">1. How rigorous is the curricular schedule at campus and what is the average exams/tests/quizzes per semester?</label>
                                <textarea name="review_ans1" id="review_ans1"></textarea>
                                <label class="error" id="review_ans1_err"></label>
                            </div>
                            <div class="mt20">
                                <label for="que2">2. What efforts are being taken to curb ragging and anti-social activities?</label>
                                <textarea name="review_ans2" id="review_ans2"></textarea>
                                <label class="error" id="review_ans2_err"></label>
                            </div>
                            <div class="mt20">
                                <label for="q3">3. How student friendly is the university campus and what amenities would you rate as best for students?</label>
                                <textarea name="review_ans3" id="review_ans3"></textarea>
                                <label class="error" id="review_ans3_err"></label>
                            </div>
                            <div class="mt20">
                                <label for="q4">4. When does the placement season generally start and how is the placement process like?</label>
                                <textarea name="review_ans4" id="review_ans4"></textarea>
                                <label class="error" id="review_ans4_err"></label>
                            </div>
                            <div class="mt20">
                                <label for="q5">5. How much importance does extra-curricular activities and sports hold in this university?</label>
                                <textarea name="review_ans5" id="review_ans5"></textarea>
                                <label class="error" id="review_ans5_err"></label>
                            </div>
                            <div class="mt20">
                                <input type="submit" value="Submit" class="btn btn-primary" id="review_rating_btn">
                                <input type="button" value="Cancel" class="btn btn-danger review_cancel">
                                <input type="reset" value="Reset" class="btn btn-info ">
                            </div>
                            <input type="hidden" value="<?php echo $this->uri->segment(5); ?>" name="college_id">

                        </div>
                </form>
            </div>
        </div>
    </div>
    <hr/>
</div>
<div class="col-sm-2 sidebar">
    <?php $this->load->view(CLIENT_TICKER_VIEW); ?>
    <?php $this->load->view(CLIENT_ADS_VIEW); ?>
</div>
</div>
<footer>
    <?php $this->load->view(CLIENT_FOOTER); ?>
</footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>bootbox.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo CLIENT_MODULES; ?>client_rating_passcode_module_js.js"></script>
<script>
    var coll_dom = "<?= $get_college[0]["email_domain"] ?>";
    $('.popover-dismiss').popover({
        trigger: 'hover'
    })

    $(document).ready(function() {

        $("#field_1-0").attr('checked', true);
        $("#field_1-0").val("");
        $("#field_2-0").attr('checked', true);
        $("#field_2-0").val("");
        $("#field_3-0").attr('checked', true);
        $("#field_3-0").val("");
        $("#field_4-0").attr('checked', true);
        $("#field_4-0").val("");
        $("#field_5-0").attr('checked', true);
        $("#field_5-0").val("");
        $("#field_6-0").attr('checked', true);
        $("#field_6-0").val("");
        $("#field_7-0").attr('checked', true);
        $("#field_7-0").val("");
        $("#field_8-0").attr('checked', true);
        $("#field_8-0").val("");
        $("#field_9-0").attr('checked', true);
        $("#field_9-0").val("");
        $("#field_10-0").attr('checked', true);
        $("#field_10-0").val("");
        $(".c_0").css('display', 'none');
    });

    var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    $(function() {

        $(".year_input").bind("keypress", function(e) {

            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
            {

                bootbox.alert("Plase enter digit only", function() {
                    return false;
                });
            }

        });
        var i = 0;
        $("input#email").focus(function() {
            if (i == 0) {
                $(this).val("@<?= @$get_college[0]["email_domain"] ?>");
            }
            i++;
        });

    });

</script>

</body>
</html>
