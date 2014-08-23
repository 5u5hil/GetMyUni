<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get My Uni</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/GMU_favicon.png" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script>
    function validate()
	{
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	var email=document.getElementById('email').value;	
	var flag=0;
	if(email="" || emailPattern.test(email))
	{
		document.getElementById('email').style.border="2px red solid";
		flag++
	}
	else
	{
		document.getElementById('email').style.border=" ";
	}
	
	if(flag==0)
	{
	     return false;	
	}
	else
	{
		return true;
	}
	}
    
    </script>-->
    <style type="text/css">
	.navbar-form .form-control {
		width: 296px;
		border-radius: 15px;
}
		.navbar-form{padding:2px 8px;}
		
	</style>
  </head>
  <body>
      <div class="container">
          <div class="row">
            <div class="col-sm-12">
                  <div class="logo text-center">
                    <img src="images/logo.png" class="mt36">
                  </div>
        	</div>
        </div>
        
        
          <div class="row">
            <div class="col-sm-12 greybg">
                 <div class="row text-center">
                 	<DIV class="col-sm-1"></DIV>
                 	<div class="col-sm-3 text-center">
                    	<div class="year">
                        	1760
                        </div>
                        <center><div class="redline"></div></center>
                    	<div class="revolution">
                        	Industrial <span>Revolution</span>
                        </div>
                    </div>
                    
                 	<div class="col-sm-4">
                    	<div class="year">
                        	1960
                        </div>
                        <center><div class="redline"></div></center>
                    	<div class="revolution">
                        	Digital <span>Revolution</span>
                        </div>
                    </div>
                    
                 	<div class="col-sm-3">
                    	<div class="year">
                        	2014
                        </div>
                        <center><div class="redline"></div></center>
                    	<div class="revolution">
                        	Educational <span>Revolution</span>
                        </div>
                    </div>
                    
                    
                 	<DIV class="col-sm-1"></DIV>
                 </div> 
        	</div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-12 bluebg">
                  <div class="text-center">
                    	<h3 class="text-white">Ready to discover an innovative approach to education?  </h3>
                        <div class="leaveemail">Leave us your email to receive updates on our launch </div>
                        <div class="subscribe">
                        	<form class="navbar-form" role="form" action="send_mail.php" method="post"  >
                                <div class="form-group">
                                  <input type="text" name="email" id="email" required placeholder="Email" class="form-control" >
                                  
                                </div>
                                
                                <button type="submit" class="btn btn-subscribe">Subscribe</button>
                          </form>
                        </div>
                        
                          <div class="text-alert">
							<?php if(isset($_SESSION['success']))
								  {
									  echo $_SESSION['success'];
									  unset($_SESSION['success']);
								  }
								  	
									   ?>
                      	</div><br/>
                  </div>
        	</div>
        </div>
        
        <div class="row">
        	<div class="col-sm-12 footerbg">
            	<center>Copyright &copy; 2014. GetMyUni -  All Rights Reserved</center>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>