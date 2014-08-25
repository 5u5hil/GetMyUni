$(document).ready(function() 
{
    $("#signup_form").submit(function(e)
    {
        e.preventDefault();
        var formdata           = $("#signup_form").serialize();
		
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_user/pre_login_validation",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
                        var redirect = SITE_URL+'user/pre-login-view';
			window.location.href=redirect;
                    }
                    else
                    {
                        $.each(data, function(index, value)
                        {
                           // alert(value);
                             if(value)
                            {
								if(value == "<p>The Email field must contain a unique value.</p>")
								{
                                $("#"+index).show();
                                $("#"+index).html("This Email id already in use");
								}
								else
								{
									 $("#"+index).show();
                                $("#"+index).html(value);
								}
                            }
                        });
                    }
                    
                }
            });
    });
    
    $("#pre_registration_form").submit(function()
    {
        var form_data       = $("#pre_registration_form").serialize();
      
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_user/create_user",
                dataType        : 'json',
                data            : form_data,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    //alert(data.error);
                    if(data.error == 'success')
                    {
                        var redirect = SITE_URL+'user/my-profile';
			window.location.href=redirect;
                    }
                    else
                    {
                        $.each(data, function(index, value)
                        {
                            //alert(value);
                            if(value)
                            {
                                $("#"+index).show();
                                $("#"+index).html(value);
                            }
                            
                        });
                    }
                }
            });
    });
    
    $("#save_user_profile").submit(function(e)
    {
			  e.preventDefault();
			/*var count = $('input.form-control[value!=""]').length
			
			var nPercent = (count/15)*100;
			
		$( '#circle' ).progressCircle({
			nPercent        : nPercent,
			thickness       : 4,
			circleSize      : 200
		});*/
	
        var form_data       = $("#save_user_profile").serialize();
        //alert(form_data);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_user/save_user",
                dataType        : 'json',
                data            : form_data,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    //alert(data.error);
                    if(data.error == 'success')
                    {
                        var redirect = SITE_URL+"user/my-profile";//+'user/my-profile';
                        //alert(data.msg);
						//bootbox.alert(data.msg, function() {
						window.location.href=redirect;
						//});
						 bootbox.alert(data.msg);
						
                    }
				else
                    {
                        $.each(data, function(index, value)
                        {
                            //alert(value);
                            if(value)
                            {
                                $("#"+index).show();
                                $("#"+index).html(value);
								$("html, body").animate({ scrollTop: 0 }, 600);
                            }
                            
                        });
                    }
                }
            });
			
			
    });
    
    $("#login_user_form").submit(function(e)
    {
        var form_data       = $("#login_user_form").serialize();
		//alert(form_data);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_user/validate_user",
                dataType        : 'json',
                data            : form_data,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    //alert(data.error);
                    if(data.error == 'success')
                    {
                        var redirect = CURRENT_URL;//+'user/my-profile';
						window.location.href=redirect;
                        //alert(data.msg);
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }
            });
    });
    
    
    
     $( "#school_name" ).autocomplete(
	{
		source : SITE_URL+'client/client_college/search_college_name',
		select: function(event,ui ) 
		{
                           
                        
         }
	});
        
    
         $( ".find_school_name" ).autocomplete(
		{
		source : SITE_URL+'client/client_college/search_college_name',
		select: function(event,ui ) 
		{
			
                 var cname =  (ui.item.value).split("-");
			
				var link = (($.trim(cname[0])).toLowerCase().replace(/ /g,"-"))+"-"+($.trim(cname[1]));
			
				window.location.href            = SITE_URL+'college/'+link.replace(/[ )(]/g,'')+'/'+ui.item.id;
				       
        }
	});
	
	$( ".review_school_name" ).autocomplete(
	{
		source : SITE_URL+'client/client_review_rating/search_college_name_review',
		select: function(event,ui ) 
		{
			    var cname =  (ui.item.value).split("-");
			
				var link = (($.trim(cname[0])).toLowerCase().replace(/ /g,"-"))+"-"+($.trim(cname[1]));
			  window.location.href            = SITE_URL+'client/client_review_rating/review_details_view/'+link.replace(/[ )(]/g,'')+'/'+ui.item.id;
                          
                        
        }
	});
	
	
	
	
	
	$(document).on('click','.close_user',function(){
	
		
		//$comfirm = confirm("Please confirm if you would like to continue with this operation ?");
		
		bootbox.confirm("Please confirm if you would like to continue with this operation ?", function(result) {
			 $comfirm = result ;
			}); 
		
		if ($comfirm == true) 
		{
			var id = $(this).attr('id');
			var fans = id.split("_");
			var data = "id="+id;
			//alert(data);
			 $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_user/delete_record",
                dataType        : 'json',
                data            : data,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    //alert(data.error);
                    if(data.error == 'success')
                    {
                        
						$(".follow_"+fans[1]).fadeOut();
						
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }
            });
		} 
		
	
	});
	
    
    
});