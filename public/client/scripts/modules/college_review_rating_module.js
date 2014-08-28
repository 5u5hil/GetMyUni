$(document).ready(function() 
{
	$('#img_1,#li_0').addClass( "active" );
	
	
	$(".review_cancel").click(function(){
	
		window.location.href=SITE_URL;
	
	});
	
    $("#review_rating_btn").click(function(e)
    {
        e.preventDefault();
		var current_url			= CURRENT_URL;
               // alert(current_url);
		var split_url			= current_url.split("/");
              //  alert(split_url);
        var formdata           = $("#review_rating_form").serialize();
          
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_review_rating/review_rating_validation",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
						bootbox.alert("Thank you for your valuable time, your Review is successfully registered with us", function() {
						  var redirect = SITE_URL+"client/client_review_rating/review_details_view/"+split_url[7]+"/"+split_url[8];
							window.location.href=redirect;
						});
					
			 
                      
                    }
                    else
                    {
                        $.each(data, function(index, value)
                        {
                           //alert("Review not submitted because one or more mandatory parameters. Please enter those and Submit the Review again");
                           if(value)
                            $("#"+index).show();
                            $("#"+index).html(value);
							$("html, body").animate({ scrollTop: 0 }, 600);
                        });
                    }
                    
                }
            });
    });
	
	/*************************************** review_school_autocomplete ****************************************/
	
    $( "#review_school_name" ).autocomplete(
	{
		source : SITE_URL+'client/client_review_rating/search_college_name_review',
		select: function(event,ui ) 
		{
			
			//window.location.href            = SITE_URL+'client/client_review_rating/review_details_view/'+ui.item.value+'/'+ui.item.id;
                        
                           $(".get_col_review").click(function(e){
                            
                            e.preventDefault();
                            var cname =  (ui.item.value).split("-");
			
						var link = (($.trim(cname[0])).toLowerCase().replace(/ /g,"-"));
			
							//window.location.href            = SITE_URL+'college/'+link+'/'+ui.item.id;
                            window.location.href            = SITE_URL+'client/client_review_rating/review_details_view/'+link.replace(/[ )(]/g,'')+'/'+ui.item.id;
                           });
        }
	});
	
	/*************************************** review_school_autocomplete ****************************************/
	
	
	/*************************************** review_rating search ***********************************************/
	
	 $("#review_search").click(function(e)
    {
        e.preventDefault();
		 var image = CLIENT_IMAGES+"loading.gif";
		 $("#ajax_college_review_list").html("<img class='text-center' id='loading' src='"+image+"' />");
        var formdata           = $("#review_search_form").serialize();
		//alert(formdata);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_review_rating/get_review_sort_data",
                dataType        : 'html',
                data            : formdata,
                success: function(msg)
                {

					$("#ajax_college_review_list").html(msg);
					$(".search_replace_title").html("Search School Review");
				}
                  
            });
    });
	
	
	 $(document).on("click","#search_page li a",function(e)
    {
		 e.preventDefault(); // cancel the link itself
        var ur = $(this).attr("href");
		 $.ajax({
                type            : 'POST',
                url             : ur,
                dataType        : 'html',
                //data            : formdata,
                success: function(msg)
                {

					$("#ajax_college_review_list").html(msg);
					$(".search_replace_title").html("Search School Review");
				}
                  
            });
    })


	
	
	
	/************************************** review_rating search **************************************************/
    
    
});