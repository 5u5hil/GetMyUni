<html>
<head>
	<script type="text/javascript" src="<?php echo ADMIN_MODULES?>admin_college_module_js.js"></script>
</head>
</body>
  <form  id="college_serach_form" >
<select name="what_u_study">
</option value="">Please select<option>
<?php 

									
	$fans = $get_degree;
	if(is_array($fans))
	{
		foreach($fans as $val)
		{
			//print_r($val);
			?>
				
			<option value="<?php echo $val['id'];?>"><?php echo $val['degree_name'];?></option>
	<?php
		}
	}
									
									

?>
</select>
<select name="choose_majors">
</option value="">Please select<option>
<?php 

	
		$fans = $get_domain;
		if(is_array($fans))
		{
			foreach($fans as $val)
			{
				
				?>
					
				<option value="<?php echo $val['id'];?>"><?php echo $val['domains_name'];?></option>
		<?php
			}
		}
	
								
?>

</select>
<select name="where_like_study">
</option value="">Please select<option>
<?php 

								
	$fans = $get_country;
	if(is_array($fans))
	{
		foreach($fans as $val)
		{
			
			?>
				
			<option value="<?php echo $val['country_id'];?>"><?php echo $val['country_name'];?></option>
	<?php
		}
	}
								
								
?>
</select>
 <button class="btn btn-primary" id="college_search_btn" type="submit">Submit</button>
 </form>
</body>
</html>