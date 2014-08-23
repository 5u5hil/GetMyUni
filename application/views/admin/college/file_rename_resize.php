<?php
 //echo 'hello wrolde';
//print_r($_POST[]); 
 $file_name	 = $_POST['filename'];
 $filetype = $_POST['filetype'];
 $filetype;

if($filetype=='collegelogo')
{
 $html= '<img src="http://192.168.2.148/GMU/public/admin/images/uploads/banner_image/'.$file_name.'" height="100px" width="100px">';
 $html .= '<input type="hidden" id="banner_image" name="banner_image[]" value="http://192.168.2.148/GMU/public/admin/images/uploads/banner_image/'.$file_name.'"> <br>';
$json_array['image'] = $html;
echo json_encode($json_array);
}


 ?>