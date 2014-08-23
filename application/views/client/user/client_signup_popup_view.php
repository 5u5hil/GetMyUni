
          <div class="row">
          	
          	<div class="col-md-offset-4 col-md-5 col-sm-5 col-xs-12 text-center">
            	
                <div class="btn btn-xlarge  btn-facebook signbtn"><i class="fa fa-2x fa-facebook"></i>  Connect with Facebook</div>
               
                <div class="btn btn-xlarge btn-linkedin signbtn"><i class="fa fa-2x fa-linkedin"></i>  Connect with Linkedin</div>
                
                <div class="btn btn-xlarge btn-google-plus signbtn"><i class="fa fa-2x fa-google-plus"></i>  Connect with Google +</div>
                
                <div class="or"> or </div>
                <center>
				
					
					<div id="login_form_div">
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
					</div> <!--div closing from college listing-->
						<div class="row">
                            <div class="col-sm-12"><div class="hv_acct">Do not have an account? <span><a href="<?php echo SITE_URL ?>user/login-view" onclick="toggle_visibility('login_form_div');">Signup</a></span></div></div>
                        </div>
                    </div>
                </center>
            </div>

<script type="text/javascript" src="<?php echo CLIENT_MODULES?>client_user_module_js.js"></script>
	<script type="text/javascript">
	SITE_URL    = '<?php echo SITE_URL?>';
	CURRENT_URL = '<?php echo current_url() ?>';
	CLIENT_SIGNUP_LOGIN_VIEW = '<?php echo CLIENT_SIGNUP_LOGIN_VIEW?>'
	</script>