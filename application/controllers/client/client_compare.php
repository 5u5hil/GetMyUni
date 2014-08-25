<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_compare extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('client/client_college_model', 'model');
        $this->load->model('admin/admin_college_model');
    }

   function compare_college_data_add()
   {
   
	$ans_data = session('school_session_compare');
	$count_img = count($ans_data);
	if($count_img >=3)
	{
	
		echo "1";
	}
	else
	{
   if(!session('school_session_compare')){
   $this->session->set_userdata('school_session_compare',array());
   }
   
    $arrShopItems = $this->session->userdata('school_session_compare');
$ans					= $this->input->post();
$arrAddItem =array(
                    'school_id' => $ans['id'],
                    'school_name' => $ans['school_name']
                );
// populate the array with your data

		$arrShopItems[] =& $arrAddItem;
		$this->session->set_userdata('school_session_compare', $arrShopItems); 
		$ans_data = session('school_session_compare');
		$count = 1;
		 if((session('school_session_compare')))
							 //display(session('school_session_compare'));
							{
								$ans_data = session('school_session_compare');
								$count = 1;
								foreach ($ans_data as $key=>$school_details)
								{
							?>
						
  
	
								<div class="col-sm-3 col-md-3" >
                            	<div class="hs_number mb10 mr3 pull-left"><?php echo $count;?></div> <span class="school_1 <?php  echo $school_details['school_id']; ?> text-center" ><?php echo $school_details['school_name'];?></span> <span class="delete_compare" id="<?php echo $school_details['school_id']; ?>">x</span>
								<input type="hidden" value="<?php  echo $school_details['school_id'];?>" name="comapre_school[]" id=<?php  echo $school_details['school_id'];?>>
                            </div>
  
		
							<?php 
								$count++;
								}
								
							}
							if(empty($ans_data))
							{
							?>
							<div class="col-sm-3 col-md-3" >
                            	<div class="hs_number mt10">1</div> <span id="school_1">School Name</span> <span>x</span>
								<input type="hidden" name="" >
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">2</div> <span>School Name</span> <span>x</span>
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">3</div> </span>School Name</span> <span>x</span>
                            </div>
							<?php
								}
							

		}
   }
   
    function compare_college_data_delete()
   {
   
   if(!session('school_session_compare')){
   $this->session->set_userdata('school_session_compare',array());
   }
   
    $arrShopItems = $this->session->userdata('school_session_compare');
$ans					= $this->input->post();

$key = $this->searchForKey('school_id',$ans['id'],$arrShopItems);

unset($arrShopItems[$key]);


$this->session->set_userdata('school_session_compare', $arrShopItems);  
   
	$ans_data = session('school_session_compare');
		$count = 1;
		 if((session('school_session_compare')))
							// display(session('school_session_compare'));
							{
								$ans_data = session('school_session_compare');
								$count = 1;
								foreach ($ans_data as $key=>$school_details)
								{
							
						
  ?>
	
								<div class="col-sm-3 col-md-3" >
                            	<div class="hs_number mb10 mr3 pull-left"><?php echo $count;?></div> <span class="school_1 <?php  echo $school_details['school_id']; ?> text-center" ><?php echo $school_details['school_name'];?></span> <span class="delete_compare" id="<?php echo $school_details['school_id']; ?>">x</span>
								<input type="hidden" value="<?php  echo $school_details['school_id'];?>" name="comapre_school[]" id=<?php  echo $school_details['school_id'];?>>
                            </div>
  
		
							<?php 
								$count++;
								}
								
							}
							if(empty($ans_data))
							{
							?>
							<div class="col-sm-3 col-md-3" >
                            	<div class="hs_number mt10">1</div> <span id="school_1">School Name</span> <span>x</span>
								<input type="hidden" name="" >
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">2</div> <span>School Name</span> <span>x</span>
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">3</div> </span>School Name</span> <span>x</span>
                            </div>
							<?php
								}
							

   }
   
   function searchForKey($keyy, $value, $array) {
foreach ($array as $key => $val) {
if ($val[$keyy] == $value) {
return $key;
}
}
return null;
}
   
}

?>