<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Follow_School extends CI_Controller
 {

	function __construct() 
	{
        parent::__construct();
		$this->load->model('client/client_follow_school_model');
               $this->load->model('client/client_college_model', 'model');
    }
	
	
	   function follow_school_info()
    {
           $count = 1;     
		$ans					= $this->input->post();
		$this->load->model('client/client_follow_school_model');
		$this->client_follow_school_model->insert_user_follow_info($ans);
		
                $id = $this->uri->segment(3);
                $this->model->college_id = $this->input->post('school_id');
				$data['following_count'] = $this->model->following_count(); 
			    //$json_error['following_count'] = $this->model->following_count();
				$data['get_student_following_college'] = $this->model->get_student_following_college();
				//display($data['get_student_following_college']);
				if(!empty($data['get_student_following_college'])){foreach ($data['get_student_following_college'] as $followers) {
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
                                                   
}
else
{
	echo " <div class='col-sm-9 alert alert-info'> No student is currently following this school </div>";
}
echo "@".$data['following_count'];
											
				
				 
                
	
	}
}

?>