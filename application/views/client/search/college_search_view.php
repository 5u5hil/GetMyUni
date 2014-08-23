<html>
<head>
	<script src="<?php echo ADMIN_SCRIPTS ;?>jquery-1.10.2.min.js" type="text/javascript"></script>
	<!--script type="text/javascript" src="<?php echo CLIENT_MODULES?>college_search_module.js"></script-->
</head>
</body>
  <form  id="college_search_form" action="college_list" method="GET">
<select name="type">
<option value="">Please select</option>
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
<select name="course">
<option value="">Please select</option>
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
<select name="country">
<option value="">Please select</option>
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