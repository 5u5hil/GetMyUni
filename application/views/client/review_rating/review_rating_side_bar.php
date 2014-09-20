<?php 	

    $this->load->model('client/client_college_model','model');
     $data['get_student_college_review_count'] = $this->model->get_student_college_review_count();
   

?>   
    <script>
        function goBack() {
             parent.history.back();
        return false;
        }
    </script>
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


    
            
   <div class="col-sm-3 col-md-3 col-xs-12">
        <div class="btn btn-sm"><a class="btn_back" onclick="goBack()"><i class="fa fa-caret-left col_light_blue"></i> Back</a></div><br><br>
       
          <div class="leave_review">
            <div class="f_18 tcol_darkblue">Enter school</div>
            <input type="text" placeholder="School name" class="form-control get_review_input" id="review_school_name">
            <div class="get_review btn btn-sm get_col_review"><a href="javascript:;">Get reviews </a></div>
          </div>
          <div class="cleaner_20"></div>
          
		   <?php 
		
			if(($this->uri->segment(3)) != "college_review")
			{
			
		  ?>
		  
          <div class="tcol_grey f_16 mb10">Filter your search by</div>
            <form class="filter" id="review_search_form">
          <div class="filter_search">
          	<div class="degree_type">
            	<div class="f_18 mb10">DEGREE TYPE</div>
                
				
				<?php    $data['get_degree']	= $this->model->get_college_degree(); 
                            {
                                foreach( $data['get_degree'] as $master)
                                {
									
									  $checked       = '';
									  if($master['id']== "1")
									  $checked = 'checked';
                                    echo '<div><input '.$checked.' type="radio" name="degree_type"  id="int_degree_'.$master['id'].'"  value="'.$master['id'].'"> <label for="int_degree_'.$master['id'].'">'.$master['degree_name'].'</label></div> ';
                                }
                            }
				?>
               
            </div>
          </div>
          
          <div class="filter_search">
          	<div class="degree_type">
            	<div class="f_18 mb10">DISCIPLINE</div>
               <select type="select" class="form-control new-select" name="r_field" >
							<option value="">Select Field</option>
							<?php 

								 $data['get_field'] = $this->model->field_of_study();
								
									print_r($data['get_field'] );
									
											if(is_array($data['get_field'] ))
											{
												foreach(($data['get_field'])  as $val)
												{
											
													echo '<option value="'.$val['id'].'" >'.$val['field_name'].'</option>';
												}
											}
								
							?>
						</select>
            </div>
          </div>
          
		<div class="filter_search">
          	<div class="degree_type">
            	<div class="f_18 mb10">MAJORS</div>
                <select name="majors" class="form-control new-select">
                	 <option value="">Select Field</option>
                            <?php		
                                   $data['get_domain']	= $this->model->get_majors_domains(); 
                                   if(is_array($data['get_domain']))
                                   {
                                           foreach(($data['get_domain']) as $val)
                                           {

                                                           echo '<option value="'.$val['id'].'" >'.$val['domains_name'].'</option>';
                                           }
                                   }
                           ?>
						
                </select>
                
            </div>
          </div>
          
		<div class="filter_search">
          	<div class="degree_type">
            	<div class="f_18 mb10">COUNTRY/ CITY</div>
                <select name="country" class="form-control new-select">
                	<option value=""> Country/ City </option>
                	<?php 

						$data['get_country'] = $this->model->get_master_country();
						foreach(($data['get_country']) as $val) 
						{
						
							echo '<option value="'.$val['country_id'].'" >'.$val['country_name'].'</option>';
						}
					?>
                </select>
                
            </div>
            
            
          </div>
          
          <input type="submit" value="Go" class="button_go" id="review_search">
          <input type="reset" value="Clear Search" class="clear_search">
          
            </form>
           <?php
		   }
		   
		   ?>
          <div class="cleaner_20"></div>
		  
		  <?php 
		
			if(($this->uri->segment(3)) != "review_rating_view" && ($this->uri->segment(3)) != "college_review")
			{
			
		  ?>
          <div class="leave_review mb20">
            <div class="f_18 tcol_grey">Want to leave a review for this school?</div>
            <div class="write_review btn btn-sm">
                <a 

                    <?php 
					$id = session('client_user_id');
                                         if ($id != 0)
					{ 
                         
                                        
                                        if($data['get_student_college_review_count'] >= 1)
                                        {
                         
                                           echo "data-toggle='modal' data-target='.bs-example-modal-sm'";
                                            
                                        }
                                        
                                     else {
				   ?>
					 href="<?php echo CLIENT_SITE_URL?>client_college/college_review/<?php echo $this->uri->segment(4)?>/<?php echo $this->uri->segment(5)?>"
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
                    Write a review 
                </a>
            </div>
          </div>
			<?php
			}
			?>
        </div>