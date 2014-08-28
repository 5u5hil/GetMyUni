$(document).ready(function() 
{
	$(document).on("click", ".user_follow", function(){
	//alert(124);
	var id = ($(this).attr('id'));
	var text = ($.trim($(this).text()));
	var data = id.split("_");
	
	if(data[0]=="follow")
	{
		
		if( text == "Follow school")
		{
			var following = 1;
		}
		else
		{
			var following = 0;
		}
		var finaldata="following="+following+"&school_id="+data[1]+"&type=following";
		
		
		$(this).text(text == "Unfollow school" ? "Follow school" : "Unfollow school");
		//alert(finaldata); 
		
	}
	if(data[0]=="interest-yes")
	{
		
		if( text == "No")
		{
			var following = 0;
		}
		else
		{
			var following = 1;
		}
		$(this).text(text == "No" ? "yes" : "No");
		var finaldata="interest_yes_maybe="+following+"&school_id="+data[1]+"&type=interest-yes";
	//alert(finaldata);
	
	}
	if(data[0]=="interest-maybe")
	{
		
		
		if( text == "No")
		{
			var following = 0;
		}
		else
		{
			var following = 2;
		}
		$(this).text(text == "No" ? "May Be" : "No");
		var finaldata="interest_yes_maybe="+following+"&school_id="+data[1]+"&type=interest-yes";
		//alert(finaldata);
	}
        
        
        if(data[0]=="program-yes")
	{
		
		if( text == "No")
		{
			var following = 0;
		}
		else
		{
			var following = 1;
		}
		$(this).text(text == "No" ? "yes" : "No");
		var finaldata="pro_yes_maybe="+following+"&school_id="+data[1]+"&program_id="+data[2]+"&type=program-yes";
	//alert(finaldata);
	
	}
        
        if(data[0]=="program-maybe")
	{
		
		if( text == "No")
		{
			var following = 0;
		}
		else
		{
			var following = 2;
		}
		$(this).text(text == "No" ? "May Be" : "No");
		var finaldata="pro_yes_maybe="+following+"&school_id="+data[1]+"&program_id="+data[2]+"&type=program-yes";
		
	}
	
	$.ajax({
	
				type            : 'POST',
                url             : SITE_URL+"client/client_follow_school/follow_school_info",
                dataType        : 'html',
                data            : finaldata,
                success: function(msg)
                {
                    
					
					var obj = (msg.split("@"));
					
					//alert(msg);
                     $(".total_follow").html(obj[1]);
					  $(".follow_ajax").html(obj[0]);
						
					 
                }
            });
	
});


$(document).on("click", ".user_following_user", function(e){
    e.PreventDefault();
    
    alert(1);
    
});


});


