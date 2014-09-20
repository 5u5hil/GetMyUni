<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get My Uni</title>

    <!-- Bootstrap -->
	<link href="<?php echo CLIENT_CSS ;?>custom.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>style.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>social-buttons.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES ;?>GMU_favicon.png" />
    <link rel="stylesheet" href="<?php echo CLIENT_FONTS ;?>font-awesome/css/font-awesome.min.css">
    <script src="<?php echo ADMIN_SCRIPTS ;?>jquery-1.10.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo ADMIN_MODULES?>admin_college_module_js.js"></script>
    <script type="text/javascript">
    SITE_URL    = '<?php echo SITE_URL?>';
    CLIENT_SIGNUP_LOGIN_VIEW = '<?php echo CLIENT_SIGNUP_LOGIN_VIEW?>'
     CURRENT_URL = '<?php echo current_url() ?>';
     
    </script>
    <script>


    function toggle_visibility(id) 
	{
       var e = document.getElementById(id);
	   var f = document.getElementById("signup_form_div");
	  var c = document.getElementById("login_content");
	   var d = document.getElementById("register_content");
       if(e.style.display == 'block')
	   {
          e.style.display = 'none';
		  f.style.display = 'none';
		  c.style.display = 'none';
		  d.style.display = 'block';
		 }
       else
	   {
          e.style.display = 'block';
		  f.style.display = 'none';
		c.style.display = 'block';
		  d.style.display = 'none';
		}
    }
	
	
	 function toggle_visibility_sign(id) 
	{
       var e = document.getElementById(id);
	   var f = document.getElementById("login_form_div");
	    var c = document.getElementById("register_content");
		var d = document.getElementById("login_content");
       if(e.style.display == 'block')
	   {
          e.style.display = 'none';
		  f.style.display = 'none';
		  c.style.display = 'none';
		  d.style.display = 'block';
		  
		 }
       else
	   {
          e.style.display = 'block';
		   c.style.display = 'block';
		  f.style.display = 'none';
		   d.style.display = 'none';
		 
		}
    }
	
	 $(document).ready(function() 
	{
			 $('#login_btn').click(function() {
				alert(123);
				$("#register_content").css("display","none");
			 
			 });
	
	});

    
	</script>
  </head>
  <body>
  
		<?php 
				$current_url =  current_url();				
								
		?>	 					
									
      <div class="container">
      
      	
      	<div class="row">
        
        	<nav class="navbar navbar-default" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-3">
                  <a class="navbar-brand" href="<?php echo  SITE_URL;?>"><img src="<?php echo CLIENT_IMAGES ;?>logo.png" ></a>
                </div>
            
              </div><!-- /.container-fluid -->
            </nav>
        </div>
		
          <div class="row border-top">
          	<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
            	<div class="signup_title">Let's get started</div>
               
				
				<div class="signup_subtitle" id="login_content" >Login with Admin credentials to manage the Website</div>
			
				
				
				
            </div>
          </div>
          
          <div class="row">
          	
          	<div class="col-md-offset-4 col-md-4 col-sm-4 col-xs-12 text-center">
            	
             
                <center>
                                   
						
					
					<div id="login_form_div"  >
                    <form id="login_user_form" onsubmit="return false">
							
					  
						<div class="form-group" >
							<input type="email" placeholder="Email" class="form-control input-lg" name="email">
							<label for="name" class="error" id="email_err">This field is required.</label>
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control input-lg" name="password">
							<label for="name" class="error" id="password_err">This field is required.</label>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12"><input type="submit" class="sign_up" value="Login" > </div>
								
                                
							</div>
						</div>
                                                    
						</form>
					</div>
						<!--<div class="row">
                            <div class="col-sm-9"><div class="hv_acct">Already have an account? <span><a href="#" onclick="toggle_visibility('login_form_div');">Login</a></span></div></div>
                        </div>-->
                    
                </center>
                </div>
            </div>
          </div>
        
        
        <footer>
            <?php $this->load->view(CLIENT_FOOTER);?>
        </footer>
    </div>

   <script src="<?php echo CLIENT_SCRIPTS ;?>jquery.min.js"></script>
  
    <script src="<?php echo CLENT_SCRIPTS ;?>bootstrap.min.js"></script>
     </body>
</html>