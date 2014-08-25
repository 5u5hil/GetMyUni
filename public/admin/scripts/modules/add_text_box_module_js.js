
$(document).ready(function(){
 
    var counter = 2;
 
var counter = 2;
 
    $(".add_prog").click(function (e) {
 
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-name-' + counter);
 
	newTextBoxDiv.after().html('<br><select type="select" class="form-control select_pro_'+counter+'" name="program_name[]"> <option value="">Select Program Name</option><?php $fans = $get_program_name;if(is_array($fans)){foreach($fans as $val){?><option value="<?php echo $val['id'];?>"><?php echo $val['program_name'];?></option><?php }}?></select>');
 
	newTextBoxDiv.appendTo("#ckbox-program-name");
	
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-type-' + counter);
 
	newTextBoxDiv.after().html('<br><select type="select" class="form-control select_type_'+counter+'" name="program_type[]"><option value="">Select Program Type</option><?php $fans = $get_program_type;if(is_array($fans)){foreach($fans as $val){?><option value="<?php echo $val['id'];?>"><?php echo $val['program_type'];?></option><?php } }?></select>');
		
	newTextBoxDiv.appendTo("#ckbox-program-type");
	
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-legnth-' + counter);
 
	newTextBoxDiv.after().html('<br><input type="text" name="program_length[]" class="form-control prog_length_'+counter+'" />');
 
	newTextBoxDiv.appendTo("#ckbox-program-length");
	
	
		var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id",'program-size-' + counter);
 
	newTextBoxDiv.after().html('<br>	<input type="text" name="program_size[]" class="form-control prog_size_'+counter+'" />');
 
	newTextBoxDiv.appendTo("#ckbox-program-size");
	
	
		var newTextBoxDiv = $(document.createElement('div'))
	     .attr("class",'col-sm-1 btn btn-primary mt27 remove-btn-'+ counter);
	newTextBoxDiv.id = 'remove-btn'+counter;
	newTextBoxDiv.after().html('Remove');
	newTextBoxDiv.appendTo("#remove");

	counter++;
     });
 
     $("#remove").live('click',function () {
		var idq = $(this).children('div').attr('class');
		var fid = idq.slice(-1);
		alert(fid);
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	
        $(".remove-btn-" + fid).remove();
		$("#program-legnth-" + fid).remove();
		$("#program-type-" + fid).remove();
		$("#program-name-" + fid).remove();
		$("#program-size-" + fid).remove();
 
     });
	 });
