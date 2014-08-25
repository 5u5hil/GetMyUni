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
    <script type="text/javascript" src="<?php echo CLIENT_MODULES?>client_signup_module_js.js"></script>
	<script type="text/javascript" src="<?php echo CLIENT_MODULES?>client_login_module_js.js"></script>
	<script type="text/javascript">
	SITE_URL    = '<?php echo SITE_URL?>';
	CLIENT_SIGNUP_LOGIN_VIEW = '<?php echo CLIENT_SIGNUP_LOGIN_VIEW?>'
	</script>
	<script>
		

    function toggle_visibility(id) 
	{
       var e = document.getElementById(id);
	   var f = document.getElementById("signup_form_div")
       if(e.style.display == 'block')
	   {
          e.style.display = 'none';
		  f.style.display = 'none';
		 }
       else
	   {
          e.style.display = 'block';
		  f.style.display = 'none';
		}
    }

	
	</script>
  </head>
  <body>
  
							
      <div class="container">
      
      	
      	<div class="row">
        
        	<nav class="navbar navbar-default" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-3">
                  <a class="navbar-brand" href="#"><img src="<?php echo CLIENT_IMAGES ;?>logo.png" ></a>
                </div>
            
              </div><!-- /.container-fluid -->
            </nav>
        </div>
		
          <div class="row">
          	<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
            	<div class="signup_title">Let's get started</div>
                <div class="signup_subtitle">Register with Get My Uni and get access to... lorem ipsum </div>
            </div>
          </div>
          
          <div class="row border-top">
          	
          	<div class="col-md-offset-4 col-md-4 col-sm-4 col-xs-12 text-center">
            	
                <div class="btn btn-xlarge  btn-facebook "><i class="fa fa-2x fa-facebook"></i>  Connect with Facebook</div>
               
                <div class="btn btn-xlarge btn-linkedin " id="in_auth" onclick="onLinkedInAuth()"><i class="fa fa-2x fa-linkedin"></i>  Connect with Linkedin</div>
                
                <div class="btn btn-xlarge btn-google-plus "><i class="fa fa-2x fa-google-plus"></i>  Connect with Google +</div>
                
                <div class="or"> or </div>
                <center>
					<div id="signup_form_div" style="display:block;">
						<form id="signup_form">
						<div class="form-group">
							<input type="text" placeholder="Full Name" class="form-control input-lg" name="full_name">
							 <label for="name" class="error" id="full_name_err">This field is required.</label>
						</div>
						<div class="form-group">
							<input type="email" placeholder="Email" class="form-control input-lg" name="email">
							<label for="name" class="error" id="email_err">This field is required.</label>
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control input-lg" name="password">
							<label for="name" class="error" id="password_err">This field is required.</label>
						</div>
						<div class="form-group">
							<input type="password" placeholder="Confirm Password" class="form-control input-lg" name="confirm_password">
							<label for="name" class="error" id="confirm_password_err">This field is required.</label>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3"><input type="submit" class="sign_up" value="Sign Up" id="signup_btn"> </div>
							</div>
						</div>
                        </form>
					</div>
					
					<div id="login_form_div" style="display:none;">
						<form id="login_form">
							
					  
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
								<div class="col-sm-3"><input type="submit" class="sign_up" value="Login" id="login_btn"> </div>
							</div>
						</div>
						</form>
					</div>
						<div class="row">
                            <div class="col-sm-9"><div class="hv_acct">Already have an account? <span><a href="#" onclick="toggle_visibility('login_form_div');">Login</a></span></div></div>
                        </div>
                    </div>
                </center>
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

<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: 755iyxpryw6vwb
  
  authorize: true
</script>
<script type="text/javascript">


    function onLinkedInLoad() 
    {
        LinkedINAuth();//added(remove to make it )
        IN.Event.on(IN, "auth", onLinkedInAuth);
    }
    function LinkedINAuth()
    {
       IN.UI.Authorize().place();
    }
        // 2. Runs when the viewer has authenticated
        function onLinkedInAuth() {
            
                           
            onLinkedInLoad();
            $(".linkedin_loader").html('<img src="<?php echo CLIENT_IMAGES?>/loaders/loader8.gif">');                
            $("#in_auth").hide();  
            IN.API.Profile("me").fields("id","first-name", "last-name", "email-address","pictureUrl","industry","positions","skills","location","public-profile-url","phone-numbers","publications").result(function (data) {
        member = data.values[0]; 
        //make ajax call to update with database
            $.ajax({
                type                                                            : "POST",
                url                                                             : SITE_URL+"client/client_users/social_login",
                dataType                                                        : "json",
                data                                                            : {
                                                                                    'social_type':'linkedin',  
                                                                                    'linkedin_id':member.id,
                                                                                    'email':member.emailAddress,
                                                                                    'first_name':member.firstName,
                                                                                    'last_name':member.lastName,
                                                                                    'profile_pic':member.pictureUrl,
                                                                                    'industry':member.industry,
                                                                                    'position':member.positions,
                                                                                    'skills':member.skills,
                                                                                    'location':member.location,
                                                                                    'public_profile_url':member.publicProfileUrl,
                                                                                   },
                success : function(msg)
                {
                    var val                                                     = eval(msg);
                    
                    if(val.error == 'error' )
                    {
                        alert('Something Went Wrong');
                        $(".linkedin_loader").html('');                
                        $("#in_auth").show();  
                    }
                    if(val.error == 'success' )
                    {
                        location.reload();
                    }
                    

                }
            });
        
        //console.log(data);
            }).error(function (data) {
                console.log(data);
            });
        }
</script>