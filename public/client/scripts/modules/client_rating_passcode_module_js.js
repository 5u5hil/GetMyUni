$(document).ready(function() 
{
	$("#passcode").css("display","none");
	//$("#info_disable").children().attr("disabled","disabled");
	$('#info_disable :input').attr('disabled', true);

	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	
    $(".review_confirm_email").click(function(e)
    {
       e.preventDefault();
		var email = $('#email').val();
  
		if(!email.match(re) || email == "") 
		{
			bootbox.alert("Invalid Email", function()
			{
				return true;
			});
		}
		 
		else
		{
			$("#passcode").css("display","block");
			
			$('#info_disable :input').attr('disabled', false);
		}
	 // return false;
    });
    
    
});