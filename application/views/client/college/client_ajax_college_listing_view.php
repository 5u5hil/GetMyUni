<!--?php print_r($this->session->all_userdata()); ?-->		
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


<?php
$data = $_GET;
$ans = $get_college;
//display($ans);
//display($get_user_following_info);
//print_r($this->session->userdata($school_session_data));

if (!empty($ans)) {
    foreach ($ans as $value) {
        ?>

        <div class="row mt30">
            <div class="col-sm-3 col-md-3">
        <?php
        $val = ((json_decode($value['college_logo'])));
        //echo $val[0];
        ?>
                <img src="<?php if (!empty($value['college_logo'])) {
            echo "/public/admin/scripts/plugins/uploads/collegelogo/$val[0]";
        } else {
            echo CLIENT_IMAGES . "college/college_1.png";
        } ?>"  class="school_logo img-responsive"/>
                <div class="btn btn-sm listing_follow">
                    <a 

                        <?php
                      
						$id = session('client_user_id');
                        if ($id != 0) {
                            ?>
                            href='javascript:;' class="user_follow" id="follow_<?php echo $value['id'] ?>"
                            <?php
                        } else 
							{
                            ?>
                             data-toggle="modal" data-target=".bs-example-modal-lg"

								<?php
							 }
							?>>
                        
						<?php
						$follow_string = 'Follow school';
						if(!empty($get_user_following_info))
						{
							
							foreach($get_user_following_info as $val)
							{
							
								if($val['school_id'] == $value['id'] )
								{
									if($val['following'] != 0)
									{
										$follow_string = 'Unfollow school';
									}
								}
								
							}
							
						}
						echo $follow_string;
						
							
						?>
                    </a>

                </div>
                <br>		
				<div class="col-sm-12 col-md-12 cmpfrmsub add_comapre_btn" id="<?php echo $value['id']."-".$value['school_name'];?>">
                                   <?php
                                        $school_record = array();
                                      
                                       if(session('school_session_compare'))
                                       {
								foreach (session('school_session_compare') as $key=>$school_details)
								{
                                                                   
                                                                        array_push($school_record,$school_details['school_id']);
                                       }}
                                         //display($school_record);
                                        if (in_array ($value['id'], $school_record))
                                        {
                                      ?>                                
                                       
                                    <div class="compare-text_<?php echo $value['id'];?>"><div class="compare_circle mt10 compare_circle1 " >+</div>
                                            <span class="compare_text">Selected</span></div>
                                        <?php }else { ?>
                                    
                                    <div class="compare-text_<?php echo $value['id'];?>"><div class="compare_circle mt10 compare_circle1 " >+</div>
                                            <span class="compare_text">Compare</span></div>
                                        <?php } ?>
                            </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <h2 class="tcol_darkblue mt0"><a class="tcol_darkblue" href="<?php echo SITE_URL; ?>college/<?php echo clean_string($value['school_name']); ?>/<?php echo clean_string($value['id']); ?>"><?php echo $value['school_name']; ?></a></h2>
                <div class="unv_location"><?php echo $value['address']; ?></div>
                <div class="row mt10">
                    <div class="col-sm-6 col-md-6 border-right">
                        <div class="col_det_title"> Average Fees</div>
                        <div class="col_det_value"> $<?php echo number_format($value['avg_tution']); ?></div>
                    </div>
                    <div class="col-sm-6 col-md-6 ">
                        <div class="col_det_title"> Acceptance Rate</div>
                        <div class="col_det_value"> <?php  if($value['acc_rate'] == 0){ echo "N/A";} else { echo $value['acc_rate']."%";} ?></div>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-sm-6 col-md-6 border-right">
                        <div class="col_det_title"> Test scores</div>
                        <div class="col_det_value"> <?php echo $value['test_score']; ?> <?php echo $value['avg_test_score']; ?></div>
                    </div>
                    <div class="col-sm-6 col-md-6 ">
                        <div class="col_det_title"> Average Salary</div>
                        <div class="col_det_value"> <?php if($value['avg_salary'] == 0){ echo "N/A";} else {echo "$".number_format($value['avg_salary']);}; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 text-center">
                <div class="wanttogetin">want to get in?</div>
                <center>
                    <div class="text-center btnyeslb" >
					
					
					<a 
					
					 <?php
                      
						$id = session('client_user_id');
                        if ($id != 0) {
                           ?>
                            href='javascript:;' class="user_follow" id="interest-yes_<?php echo $value['id'] ?>"
                            <?php
                        } else 
							{
                            ?>
                             data-toggle="modal" data-target=".bs-example-modal-lg"

								<?php
							 }
							?>
					
					>
					
					<?php
						$follow_string = 'Yes';
						if(!empty($get_user_following_info))
						{
							
							foreach($get_user_following_info as $val)
							{
							
								if($val['school_id'] == $value['id'] )
								{
									if($val['interest_yes_maybe'] == 1)
									{
										$follow_string = 'No';
									}
								}
								
							}
							
						}
						echo $follow_string;
						
							
						?>
					
				
					</a>  </div>
                    <div class="text-center btnyeslb" >
					
					
					<a 

						
						<?php
                      
						$id = session('client_user_id');
                        if ($id != 0) {
                           ?>
                            href='javascript:;' class="user_follow" id="interest-maybe_<?php echo $value['id'] ?>"
                            <?php
                        } else 
							{
                            ?>
                             data-toggle="modal" data-target=".bs-example-modal-lg"

								<?php
							 }
							?>
					 >
					
					
					<?php
						$follow_string = 'May be';
						if(!empty($get_user_following_info))
						{
							
							foreach($get_user_following_info as $val)
							{
							
								if($val['school_id'] == $value['id'] )
								{
									if($val['interest_yes_maybe'] == 2)
									{
										$follow_string = 'No';
									}
								}
								
							}
							
						}
						echo $follow_string;
						
							
						?>
					
					
					
					</a>  </div>
                </center>
            </div>
        </div>
        <hr/>
        <?php
    }
    ?>
    <!--<ul class="pagination pull-right">
      <li><a href="#">&laquo;</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>--><?php echo @$pagination ;  ?>

    <?php
} else {

   
        echo "<div class='alert alert-info'>Search Result Not Found</div>";
   
    //echo 'hello';
}
?>
<!--script>
var counter = 1;
$(".compare_circle1").click(function(e){
	$(".old_data").hide();
	 
	 if (counter >3)
       {
			alert("You can only add scores of 3 tests in your profile");
			return false;
       }
	// newTextBoxDiv.appendTo(".comapre_school_add");
	e.preventDefault();
	var id = $(this).attr('id').split("-");
	
	if($(".new_data").find("."+id[0]).length > 0){
		alert(id[1] + " has already been added to compare!");
			return false;
	} 
	//alert(id);
	//$("#school_1").html(id[0]);
	//$("#school_1").html(id[1]);
				
				
                        var newTextBoxDiv = $(document.createElement('div'))
                                .attr("class", 'col-sm-3 col-md-3 main_s_div_'+counter+'');

                        newTextBoxDiv.after().html('<div class="hs_number mt10 school_'+counter+'">'+counter+'</div> <span id="school_'+counter+'" class="'+id[0]+'">'+id[1].substring(0,8)+"..."+'</span> <a class="remove_school_btn  '+counter+'">x</a><input type="hidden" name="comapre_school[]" value="'+id[0]+'" >');

                        newTextBoxDiv.appendTo(".new_data");

                       counter++;
						
						
						
					$("html, body").animate({ scrollTop: 0 }, 600);


    });
	
		 $(document).on('click', '.remove_school_btn', function()
                    {
						counter--;
                       // counter = $(".count_school_name").length;
                        var idq = $(this).attr('class');
						//alert(idq);
                        var fid = idq.split(" ");
						//remove(fid)
                        //alert(fid[2]);
                        if (counter < 1) {
                            //alert("No more textbox to remove");
                            return false;
                        }
                       
                        $(".main_s_div_" + fid[2]).remove();
                        
                    });
  
</script-->
<script>
 $(document).ready(function() {
$(document).on("click",".add_comapre_btn",function(e) {
		
			e.preventDefault();
	
		 var id = $(this).attr('id').split("-");
		var data = "id="+id[0]+"&school_name="+id[1];
		//alert(data);
		if($(".old_data").find("."+id[0]).length > 0){
		bootbox.alert(id[1] + " has already been added to compare!");
			return false;
		} 
		 $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_compare/compare_college_data_add",
                dataType        : 'html',
                data            : data,
                success: function(msg)
                {

					var report = msg;
					if(report == 1)
					{
						bootbox.alert("Three Schools already been added to compare!");
					}
					else
					{
						
						$(".old_data").html(msg);
                                                $(".compare-text_"+id[0]).html("<div class='compare_circle mt10 compare_circle1'>+</div><span class='compare_text'>Selected</span>");
									 
					}
                  }
            });
			$("html, body").animate({ scrollTop: 0 }, 600);
	});
	
	
	
	$(document).on("click",".delete_compare",function(e) {
		
			e.preventDefault();
		 var id = $(this).attr('id')
		var data = "id="+id;
		//alert(data);
		 $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_compare/compare_college_data_delete",
                dataType        : 'html',
                data            : data,
                success: function(msg)
                {

					//alert(msg);
					$(".old_data").html(msg);
                                        $(".compare-text_"+id).html("<div class='compare_circle mt10 compare_circle1'>+</div><span class='compare_text'>Compare</span>");
				}
                  
            });
			
	});
	});
	
</script>