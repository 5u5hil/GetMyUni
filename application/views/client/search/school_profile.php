<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get My Uni</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/GMU_favicon.png" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    
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
		<?php include("includes/header.php")?>

          <div class="row container-fluid">
           <div class="col-sm-10 col-md-10 col-xs-12">
           		<div class="row">
                	<div class="col-sm-12">
                		<h1 class="page_title">School Profile</h1>
                        <div class="btn btn-sm"><a href="#" class="btn_back"><i class="fa fa-caret-left col_light_blue"></i> Back</a></div>
                     </div>
                </div>
                
                <div class="row mt30">
                	<div class="col-sm-4 col-md-4 col-xs-12">
                		<div class="unv_name">Harvard University</div>
                        <div class="unv_location">Cambridge, Massachusetts USA</div>
                        <div class="unv_location"><a href="#">http://www.harvard.edu</a></div>
                        <div class="follower"><span class="tcol_red">154,000 </span><span class="col_light_blue">Students Following</span></div>
                        <div class="unv_review btn btn-sm"><a href="#">Review this school</a></div>
                        <div class="unv_follow btn btn-sm"><a href="#">Follow this school</a></div>
                     </div>
                	<div class="col-sm-3 col-md-3 col-xs-12">
                		<img src="images/default.jpg" class="img-responsive">
                     </div>
                	<div class="col-sm-5 col-md-5 col-xs-12">
                		<div class="col_features">
                        	<div class="mb10"><div class="feature_num">1</div> Average Tution: <span class="feature_detail">$40,000</span></div>
                        	<div  class="mb10"><div class="feature_num">2</div> Rank: <span class="feature_detail">Highly Selective</span></div>
                        	<div class="mb10"><div class="feature_num">3</div> Acceptance Rate: <span class="feature_detail"> 7%	</span></div>
                        	<div class="mb10"><div class="feature_num">4</div> Test Scores: <span class="feature_detail">GMAT</span></div>
                        	<div class="mb10"><div class="feature_num">5</div> Average Experience: <span class="feature_detail">3 years</span></div>
                        </div>
                        <div class="get_in">Want to get in? <a href="#" class="btn-sm btnyes">Yes</a> <a href="#" class="btn-sm  btnmaybe">Maybe</a></div>
                     </div>
                </div>
                <hr/>

           </div>
           
           <div class="col-sm-2 sidebar">
           	<img src="images/ticker.jpg" class="img-responsive">
           	<img src="images/adspace.jpg" class="img-responsive">
           	<img src="images/adspace.jpg" class="img-responsive">
           	<img src="images/adspace.jpg" class="img-responsive">
           
           </div>
          
          
          </div>
        
        
        
        <footer>
            <?php include("includes/footer.php")?>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>