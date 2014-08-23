<?php 	

    $this->load->model('client/client_college_model','model');
 
?>      

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
       <div class="modal-content">
     	 <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Register with Get My Uni</h4>
        	</div> 
       <div class="modal-body">
        <?php $this->load->view(CLIENT_USER_POPUP_VIEW); ?> 
      </div>
        </div> 
        </div>
    </div> 

        <div class="col-sm-9 col-md-9 col-xs-12">
			<?php 
					$i = 0;
					$review = $get_review_rating;
					//display($review);
					if(!empty($review))
					{
						foreach($review as $ans_review)
						{
							$i++;
							$rating_val = array($ans_review["academic_rigor"],$ans_review["academic_exchange"],$ans_review["academic_library"],$ans_review["life_fraternities"],$ans_review["life_party"],$ans_review["life_sport"],$ans_review["infra_school"],$ans_review["infra_housing"],$ans_review["placement_career"],$ans_review["placement_intership"]);
							$sum = array_sum($rating_val);
					
				?>
          <div class="row mb40">
            	<div class="col-sm-6 col-md-6">
            		<h2 class="tcol_darkblue mt0"><a class="tcol_darkblue" href="<?php echo SITE_URL; ?>college/<?php echo clean_string($ans_review["school_name"]); ?>/<?php echo clean_string($ans_review['college_id']); ?>"><?php echo $ans_review["school_name"];?></a></h2>
                    <div class="unv_location"><?php echo $ans_review["address"];?></div>
                </div>
                <div class="col-sm-3 col-md-3 border-right">
                	<div class="f_20 col_light_blue">
                            <?php  
                            
                          $query = $this->db
                        ->select(
                                'REVIEW.id,
                                    REVIEW.college_id,

                               (REVIEW.program_id+REVIEW.academic_rigor+ REVIEW.academic_exchange+REVIEW.academic_library+REVIEW.life_fraternities+REVIEW.life_party+REVIEW.life_sport+REVIEW.infra_school+REVIEW.infra_housing+REVIEW.placement_career+REVIEW.placement_intership)/10 as avg'

                                )
                        ->from('college_review_rating as  REVIEW')
                        ->where('REVIEW.college_id',$ans_review['college_id'])
                        ->get();
                        $avg_rating = $query->result_array();
                        
                        if((count( $avg_rating)) != 0)
			{
			
			$total_review_count = count($avg_rating);
			}
			else
			{
				$total_review_count = 1;
			
			}
                        
                        if(!empty($avg_rating))
                        {
                          
                                
                                 $sum = 0;

					  foreach($avg_rating as $val)
                                         {
					$sum+= $val['avg'];
					}
					echo round($sum/$total_review_count)."/10";
                                
                        }
                           ?>
                            
                           
                        
                        </div>
                    <div class="unv_location">Average Rating</div>
            		<div class="get_review btn btn-sm"><a href="<?php echo SITE_URL?>client/client_review_rating/review_details_view/<?php echo clean_string($ans_review["school_name"]); ?>/<?php echo clean_string($ans_review['college_id']); ?>">Explore </a></div>
                </div>
                <div class="col-sm-3 col-md-3">
                	                	<div class="f_20 col_light_blue">
                                                   
                                                    <?php 
                                                
                                                        echo $ans_review['review_count'];
                                                    ?>
                                                </div>
                    <div class="unv_location">Review(s)</div>
            		<div class="write_review btn btn-sm">
                            <a 
                                
						<?php 
					$id = session('client_user_id');
                                     if ($id != 0)
					{ 
                         
                                         $result = $this->db->select('id')
                                        ->where('college_id',$ans_review["college_id"])
                                        ->where('student_id',session('client_user_id'))
                                        ->from("college_review_rating")
                                        ->get();
                                        //show_query();
                                        $get_student_college_review_count =  $result->num_rows();
                                         
                                        if($get_student_college_review_count > 1)
                                        {
                         
                                           echo "data-toggle='modal' data-target='.bs-example-modal-sm'";
                                            
                                        }
                                        
                                     else {
				   ?>
					href="<?php echo SITE_URL?>client/client_college/college_review/<?php echo clean_string($ans_review["school_name"]);?>/<?php echo $ans_review["college_id"];?>"
					<?php
					}
					
                                        }
					else
					{
				 ?>
					data-toggle="modal" data-target=".bs-example-modal-lg"
					
				<?php
				}
				?> 
						
                              
                                
                                >
                                
                                Write a review </a></div>

                </div>
            </div>
            <hr/>
			
			<?php
				}
				echo $pagination;
				}
				
			 
				else 
				{

					echo "<div class='alert alert-info'>Search Result Not Found</div>";
   
				}
			?>
			
           </div>
    