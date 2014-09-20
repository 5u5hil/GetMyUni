  <?php 
				
				
				$review = $get_review_rating;
				//display($review);
		$data['get_student_college_review_count'] = $this->model->get_student_college_review_count();	
		$data['get_user_follow_info'] = $this->model->get_user_follow_info(session('client_user_id'));
                //display($data['get_student_college_review_count']);
	?>  
  <div class="col-sm-9 col-md-9 col-xs-12">
				<?php 
					
					$review = $get_review_rating;
					//display($review);
					if(!empty($review))
					{
						foreach($review as $ans_review)
						{
							$rating_val = array($ans_review["academic_rigor"],$ans_review["academic_exchange"],$ans_review["academic_library"],$ans_review["life_fraternities"],$ans_review["life_party"],$ans_review["life_sport"],$ans_review["infra_school"],$ans_review["infra_housing"],$ans_review["placement_career"],$ans_review["placement_intership"]);
							$sum = array_sum($rating_val);
                                                        $student_id = $ans_review['student_id']
					
				?>
			
          <div class="row mb40">
            	<div class="col-sm-6 col-md-6">
                    
                   
                    
                      <?php
                          
                          $user_pic = $ans_review["profile_pic"];
			  $user_pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $user_pic)); 
                       
                          ?>
                            
                            
                	<a href="<?php echo SITE_URL ?>client/client_user/user_show_profile/<?php echo $ans_review['student_id']; ?>" target="_blank"><img src=<?php if(!empty ($ans_review["profile_pic"])){ echo $user_pic1;} else {echo "'".CLIENT_IMAGES ;}?>/defaultuser.jpg' class="img-responsive display_inline prof_pic" style="height:83px;width:84px;"></a>
            	         
                    
            		<!--<img src="<?php echo CLIENT_IMAGES ;?>/user.jpg" class="img-responsive display_inline">-->
                  <?php $id = session('client_user_id'); if($id != $ans_review['student_id']) {?>
                        <a href="javascript:;" 
                    
                       <?php 
                              
                        $id = session('client_user_id');
                        if ($id != 0) {
                            ?>
                            href='javascript:;'  id="<?php echo $ans_review['student_id'];?>"  class="user_following_user" 
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg"

                            <?php
                        }
                        ?>
                    
                    >
                        
                          
                     <?php
                             if(isset($data['get_user_follow_info']->user_following))
                             
                             $user_data_follow = (json_decode( $data['get_user_follow_info']->user_following));
                             //display($user_data_follow);
                        $follow_string = 'Follow';
                        if (!empty(   $user_data_follow))
                            {

                            foreach (  $user_data_follow as $val) {
                                   
                                if ( $val == $ans_review['student_id']) {
                                   
                                        $follow_string = 'Unfollow';
                                    
                                }
                            }
                        }
                          echo $follow_string;
                        ?>
                            
                    </a>
                             
                             
                             
                             <a id="<?php echo  $student_id ?>"
                             <?php
                            $id = session('client_user_id');
                             if ($id != 0) {
                                ?>
                            class="msgg"
                            <?php
                        } else {
                            ?>
                            data-toggle="modal" data-target=".bs-example-modal-lg"

                            <?php
                        }
                                 ?>><img src="<?php echo CLIENT_IMAGES ;?>/icons/message.png"  class=""></a>
                  <?php }?>
                             
                    <div class="college_review_detail mt10"> Name: <span><?php echo $ans_review["name"];?></span></div>
                    <div class="college_review_detail mt10"> Program: <span><?php echo $ans_review["program_name"];?></span></div>
                    <div class="college_review_detail mt10"> Year: <span><?php if($ans_review["year"] == ""){ echo "-";}else{ echo $ans_review["year"];}?></span></div>
                    <div class="college_review_detail mt10"> Languages: <span><?php if($ans_review["language"] == ""){ echo "-";}else{echo $ans_review["language"];}?></span></div>
                </div>
                <div class="col-sm-6 col-md-6">
                	<h2 class="tcol_grey"><img src="<?php echo CLIENT_IMAGES ;?>/icons/rating.png" height="50" width="50"> Ratings : <span class="col_light_blue"><?php echo round($sum/10);?>/10</span></h2>
                	<h2 class="tcol_grey"><img src="<?php echo CLIENT_IMAGES ;?>/icons/review.png" height="50" width="50"> Reviews : </h2>
                    <div class="review_description"><?php echo $ans_review["review_ans1"];?></div>
                    <div class="read_full_review"><a href="<?php echo SITE_URL?>client/client_review_rating/review_full_details_view/<?php echo $ans_review["id"];?>">Read full review</a></div>
                </div>
                
            </div>
			
            <hr/>
            <?php
			
					}
				 echo $pagination ;
				}
					
				else 
				{
					?>
					<?php echo "<div class='alert alert-info'>No Reviews present for this school. Be the first one to Rate your school</div>"; ?>
					
					     <div class="leave_review col-sm-3 col-md-3 col-xs-12">
            <div class="f_18 tcol_grey">Want to leave a review for this school?</div>
            <div class="write_review btn btn-sm">
			<a 
			
				 <?php
                                    $id = session('client_user_id');
                                    if ($id != 0) {


                                      $result = $this->db->select('id')
									->where('college_id',$this->uri->segment(5))
									->where('student_id', $id)
									->from("college_review_rating")
									->get();
									 $result->num_rows();
									 
        //show_query();					
										if($result->num_rows() >=1) {
	
                                            echo "data-toggle='modal' data-target='.bs-example-modal-sm'";
                                        } else {
                             ?>
                                            href="<?php echo CLIENT_SITE_URL?>client_college/college_review/<?php echo clean_string($this->uri->segment(4));?>/<?php echo $this->uri->segment(5); ?>"
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        data-toggle="modal" data-target=".bs-example-modal-lg"

                                        <?php
                                    }
                                    ?> >Write a review </a></div>
          </div>
					
			<?php 	
				
				}
			?>
          
          </div>   <!---- Message box -->

                            
                        <div class="modal fade" id="compose_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Compose Message</h3>
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= CLIENT_SITE_URL ?>client_notification/message_insert/">
                  
                    <input type="hidden" class="form-control" id="name" name="to" placeholder="Type name" value=""/>
                    

                    <div class="form-group">
                        <label for="where" class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="where" name="sub" placeholder="Subject" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="shortdesc" class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="msg" required> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="submit" value="Create" class="home_search_button">
                            <input type="button" value="Cancel" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                        
                        
                        


                        <!---- Message box -->
