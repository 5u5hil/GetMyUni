<?php
 //echo 'hello wrolde';
//print_r($_POST[]); 
 $file_name	 = $_POST['filename'];
$ans_file_name = (explode(".",$file_name));
 $filetype = $_POST['filetype'];

$site_url = $_POST['site_url'];
if($filetype=='collegelogo')
{
 $html= '<div id="main-'.$ans_file_name[0].'"><img src="'.$site_url.'public/admin/scripts/plugins/uploads/collegelogo/'.$file_name.'" height="100px" width="100px" ></div><br><a class="remove_logo" id="'.$ans_file_name[0].'" href="#">Remove</a>';
 $html .= '<input type="hidden" id="college_logo" name="college_logo[]" value="'.$site_url.'public/admin/scripts/plugins/uploads/collegelogo/'.$file_name.'"> </div><br>';
$json_array['image'] = $html;
echo json_encode($json_array);
}

if($filetype=='eventimg')
{
 $html= '<div id="main-'.$ans_file_name[0].'"><img src="'.$site_url.'public/admin/scripts/plugins/uploads/eventimg/'.$file_name.'" height="100px" width="100px" ><br><a class="remove_logo" id="'.$ans_file_name[0].'" href="#">Remove</a>';
 $html .= '<input type="hidden" id="event_img" name="event_img[]" value="'.$site_url.'public/admin/scripts/plugins/uploads/eventimg/'.$file_name.'"> </div><br>';
$json_array['image'] = $html;
echo json_encode($json_array);
}

if($filetype=='profile_pic')
{
 $html= '<div class="display_image" id="main-'.$ans_file_name[0].'"><div ><img class="studentprofilepic" src="'.$site_url.'public/admin/scripts/plugins/uploads/eventimg/'.$file_name.'" ></div><br><a class="remove_logo" id="'.$ans_file_name[0].'" href="#">Remove</a>';
 $html .= '<input type="hidden" id="profile_pic" name="profile_pic[]" value="'.$site_url.'public/admin/scripts/plugins/uploads/eventimg/'.$file_name.'"> </div><br>';
$json_array['image'] = $html;
echo json_encode($json_array);
}

 ?>