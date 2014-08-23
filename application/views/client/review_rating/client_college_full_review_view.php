
  <?php $this->load->view(CLIENT_HEADER);?>
  
  <div class="row container-fluid">
  <?php 
				
				
				$review = $get_review_rating;
				//display($review);
		$data['get_student_college_review_count'] = $this->model->get_student_college_review_count();	
		//display($data['get_student_college_review_count']);
	?>
	
	<script>
function goBack() {
    window.history.back()
}
</script>


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

    <div class="col-sm-10 col-md-10 col-xs-12">
	
      <div class="row">
        <div class="col-sm-12">
          <h1 class="page_title"><?php if(!empty($review)){echo $review->school_name;} else { echo (ucwords(str_replace("-"," ",$this->uri->segment(4)))); }?> review</h1>
          <div class="btn btn-sm"><a href="#" class="btn_back" onclick="goBack()"><i class="fa fa-caret-left col_light_blue"></i> Back</a></div>
        </div>
      </div>
      <div class="row mt30">
        <div class="col-sm-3 col-md-3 col-xs-12">
          <div class="leave_review">
            <div class="f_18 tcol_darkblue">Enter school</div>
            <input type="text" placeholder="School name" class="form-control get_review_input" id="review_school_name">
            <div class="get_review btn btn-sm get_col_review"><a href="#">Get reviews </a></div>
          </div>
          <div class="cleaner_20"></div>
          <div class="leave_review">
            <div class="f_18 tcol_grey">Want to leave a review for this school?</div>
            <div class="write_review btn btn-sm">
			<a 
			
				 <?php
                                    $id = session('client_user_id');
                                    if ($id != 0) {


                                      $result = $this->db->select('id')
									->where('college_id', $review->college_id)
									->where('student_id', session('client_user_id'))
									->from("college_review_rating")
									->get();
									 $result->num_rows();
									 
        //show_query();					
										if($result->num_rows() >=1) {
	
                                            echo "data-toggle='modal' data-target='.bs-example-modal-sm'";
                                        } else {
                                           ?>
                                            href="<?php echo CLIENT_SITE_URL?>client_college/college_review/<?php echo clean_string($review->school_name);?>/<?php echo $review->college_id; ?>"
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        data-toggle="modal" data-target=".bs-example-modal-lg"

                                        <?php
                                    }
                                    ?> >Write a review </a></div>
          </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-12">
			<?php if(!empty($review)) {?>
		
		<div class="row">
          		
          		<div class="col-sm-3  col-md-3 text-center">
                	   <?php
                          
                          $user_pic = $review->profile_pic;
			  $user_pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $user_pic)); 
                       
                          ?>
                           
                	<img src=<?php if(!empty ($review->profile_pic)){ echo $user_pic1;} else {echo "'".CLIENT_IMAGES ;}?>//user.jpg' class="img-responsive prof_pic">
                    <div class="tcol_grey student_name"><?php echo $review->name;?></div>
                    
                    <a href="#"><img src="<?php echo CLIENT_IMAGES ;?>/icons/follow.png"></a> <a href="#"><img src="<?php echo CLIENT_IMAGES ;?>/icons/message.png"></a>
                </div>
                
                <div class="col-sm-9 col-md-9">
                	<div class="row">
                        <div class="col-sm-6  col-md-6">
                            <div class="review_detail"> Year: <span><?php echo $review->year;?></span></div>
                            <div class="review_detail"> Program: <span><?php echo $review->program_name;?></span></div>
                            
                        </div>
                        <div class="col-sm-6  col-md-6">
                            <div class="review_detail"> School: <span><?php echo $review->school_name;?></span></div>
                            <div class="review_detail"> Languages: <span><?php echo $review->language;?></span></div>
                        </div>
                        <!--<div class="col-sm-12 col-md-12">
                        <div class="review_description mt10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's </div>
                        </div>-->
                    </div>
                    
                </div>
              </div> 
               <hr/>
          <div class="row">
		  <?php 
			
			$rating_val = array($review->academic_rigor,$review->academic_exchange,$review->academic_library,$review->life_fraternities,$review->life_party,$review->life_sport,$review->infra_school,$review->infra_housing,$review->placement_career,$review->placement_intership);
			$sum = array_sum($rating_val);
			
		  ?>
		  
          <h2 class="tcol_grey"><img src="<?php echo CLIENT_IMAGES ;?>/icons/rating.png" height="60" width="60"> Ratings : <span class="col_light_blue"><?php echo round($sum/10);?>/10</span></h2>
          
                      <div class="col-sm-6 col-md-6">
                  <h4 class="rating_section">Academics:</h4>
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Academic Rigor/Pedagogy <br/><br/> </div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->academic_rigor;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->academic_rigor/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->academic_rigor/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Exchange Program</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->academic_exchange;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->academic_exchange/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->academic_exchange/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Library & other Research facilities</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->academic_library;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->academic_library/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->academic_library/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                </div> <!--academics-->
            <div class="col-sm-6 col-md-6">
                  <h4 class="rating_section">Life at campus:</h4>
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Fraternities/Sororities, Associations & Extra Curricular activities</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->life_fraternities;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->life_fraternities/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->life_fraternities/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  

                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Party culture</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->life_party;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->life_party/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->life_party/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  

                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Sports Culture</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->life_sport;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->life_sport/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->life_sport/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                  
                </div> <!--life at campus-->
			<div class="clearfix"></div>
            
                        <div class="col-sm-6 col-md-6">
                  <h4 class="rating_section">Infrastructures:</h4>
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">School Infrastructure</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->infra_school;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->infra_school/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->infra_school/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Housing and Food</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->infra_housing;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->infra_housing/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->infra_housing/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                </div> <!--Infrastructure-->
            <div class="col-sm-6 col-md-6">
                  <h4 class="rating_section">Placements :</h4>
                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Career/Alumni Network</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->placement_career;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->placement_career/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->placement_career/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  

                  <div class="row"><div class="col-sm-10 col-md-10 tcol_grey f_16">Internships and Apprenticeships</div> <div class="col-sm-2 col-md-2 "> <div class="f_20 pull-right col_light_blue"> <?php echo $review->placement_intership;?> </div></div></div>
                   <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo number_format( ($review->placement_intership/10) * 100, 2 ) . '%';?>"> <span class="sr-only"><?php echo number_format( ($review->placement_intership/10) * 100, 2 ) . '%';?> Complete</span> </div>
                  </div>
                  <div class="clear"></div>
                  
                </div><!--careers-->
                
          </div> 
          <hr/>
          <div class="row mb50">
          <h2 class="tcol_grey"><img src="<?php echo CLIENT_IMAGES ;?>/icons/review.png" height="60" width="60"> Reviews : </h2>
              <div class="mt20 tcol_grey f_16">
              	<div class="f_20 tcol_darkblue"> 1. How rigorous is the curricular schedule at campus and what is the average exams/tests/quizzes per semester?</div>
                <p class="text-justify"><?php echo $review->review_ans1;?></p>
              </div>
              <div class="mt20 tcol_grey f_16">
              	<div class="f_20 tcol_darkblue"> 2. What efforts are being taken to curb ragging and anti-social activities?</div>
                <p class="text-justify"><?php echo $review->review_ans2;?></p>
              </div>
              <div class="mt20 tcol_grey f_16">
              	<div class="f_20 tcol_darkblue"> 3. How student friendly is the university campus and what amenities would you rate as best for students?</div>
                <p class="text-justify"><?php echo $review->review_ans3;?></p>
              </div>
              <div class="mt20 tcol_grey f_16">
              	<div class="f_20 tcol_darkblue"> 4. When does the placement season generally start and how is the placement process like?</div>
                <p class="text-justify"><?php echo $review->review_ans4;?></p>
              </div>
              <div class="mt20 tcol_grey f_16">
              	<div class="f_20 tcol_darkblue"> 5. How much importance does extra-curricular activities and sports hold in this university?</div>
                <p class="text-justify"><?php echo $review->review_ans5;?></p>
              </div>
          </div>    
                
		 <?php
  }
	else
	{
	
		echo "<div class='alert alert-info'>No Reviews present for this school. Be the first one to Rate your school. With Write a Review button.</div>";
	}
  ?>        
          
        </div>
		
      </div>
     
		
    </div>
	
	
    <div class="col-sm-2 sidebar">
			 <?php  $this->load->view(CLIENT_TICKER_VIEW);?>
			 <?php $this->load->view(CLIENT_ADS_VIEW); ?>
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
<script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>

</body>
</html>
