
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get My Uni</title>

    <!-- Bootstrap -->
    <link href="<?php echo CLIENT_CSS ;?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo CLIENT_CSS ;?>style.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES ;?>GMU_favicon.png" />
	<link rel="stylesheet" href="<?php echo CLIENT_FONTS ;?>font-awesome/css/font-awesome.min.css">
    
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
			<?php $this->load->view(CLIENT_HEADER);?>
          <div class="row container-fluid">
           <div class="col-sm-10 col-md-10 col-xs-12">
           		<div class="row">
                	<div class="col-sm-12">
                		<h1 class="page_title">Advanced Search</h1>
                      
                     </div>
                </div>
                
                <div class="row mt30">
                	<div class="col-sm-3 col-md-3 col-xs-12">
                  <div class="accordion" id="leftMenu">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseOne">
                                  Degree Type <i class="fa fa-caret-down pull-right"></i> 
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li><a href="#">Bachelors </a></li>
                                    <li><a href="#">Masters</a></li>
                                    <li><a href="#">Doctorate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseTwo">
                                Discipline <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li><a href="#">Engineering & Science</a></li>
                                    <li><a href="#">Management</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseThree">
                                 Majors <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseFour">
                                 Country/ City <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseFour" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseFive">
                                 Tution <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseFive" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseSix">
                                 Top Schools <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseSix" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div>
                    
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseSeven">
                                 Test Scores <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseSeven" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div><div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseEight">
                                 Verbal Ability <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseEight" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div><div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseNine">
                                 Quant Ability <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseNine" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div><div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseTen">
                                 Career Ambition <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseTen" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li>This is one</li>
                                    <li>This is two</li>
                                    <li>This is Three</li>
                                </ul>                 
                            </div>
                         </div>
                    </div>
                </div>
                     </div>
                	
                	<div class="col-sm-9 col-md-9 col-xs-12">
                		<div class="row tcol_darkblue">
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number">1</div> School Name x
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number">2</div> School Name x
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number">3</div> School Name x
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="compare_circle">+</div> Compare
                            </div>
                        </div>
                        
                        <div class="row mt30">
                         	
                            	<div class="col-sm-2 sort">
                                 <span>Sort By</span>
                                </div>
                            	<div class="col-sm-2 sort_t">
                                 	<span class="">Rank </span>
                                </div>
                            	<div class="col-sm-2 sort_t">
                                Tution
                                </div>
                            	<div class="col-sm-2 sort_t">
                                Relevance
                                </div>
                            	<div class="col-sm-4 sort_t">
                               	&nbsp;
                                </div>
                          
                       </div>
					   
							<?php
								if(isset($_GET) && ($_GET["type"]!="") || ($_GET["course"]!="") || ($_GET["country"]!=""))
								{

									$data = $_GET;						
									$ans = $get_search;
									
								}
								else
								{
												
									$ans = $get_college_info;
									
								}
								    if(is_array($ans))
									{
										foreach($ans as $value)
										{
									
								
							?>
                       
										   <div class="row mt30">
											<div class="col-sm-3 col-md-3">
												<img src="<?php echo CLIENT_IMAGES ;?>default.jpg"  class="school_logo img-responsive"/>
												<div class="btn btn-sm listing_follow">Follow this school</a></div>
												<div class="compare_circle">+</div> <span class="tcol_darkblue f_18">Compare</span>
											</div>
											<div class="col-sm-6 col-md-6">
												<h2 class="tcol_darkblue mt0"><a class="tcol_darkblue" href="<?php echo SITE_URL?>college_details?id=<?php echo $value['college_id']; ?>"><?php echo $value['school_name'];?></a></h2>
												<div class="unv_location"><?php echo $value['address'];?></div>
												<div class="row mt10">
													<div class="col-sm-6 col-md-6 border-right">
														<div class="col_det_title"> Average Fees</div>
														<div class="col_det_value"> $<?php echo $value['avg_tution'];?></div>
													</div>
													<div class="col-sm-6 col-md-6 ">
														<div class="col_det_title"> Acceptance Rate</div>
														<div class="col_det_value"> <?php echo $value['acc_rate'];?>%</div>
													</div>
												</div>
												<div class="row mt10">
													<div class="col-sm-6 col-md-6 border-right">
														<div class="col_det_title"> Test scores</div>
														<div class="col_det_value"> GMAT <?php echo $value['test_score'];?></div>
													</div>
													<div class="col-sm-6 col-md-6 ">
														<div class="col_det_title"> Average Salary</div>
														<div class="col_det_value"> $<?php echo $value['avg_salary'];?></div>
													</div>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="wanttogetin">want to get in?</div>
												<center><div class="wanttogetin_bottom"></div>
												<div class="text-center btnyeslb"><a href="#" class=" ">Yes</a>  </div>
												<div class="text-center btnyeslb"><a href="#" class="">May be</a>  </div>
												</center>
											</div>
										   </div>
											<hr/>
					   <?php
							
										}
									}
									else
									{
									
										if($ans=="no")
										{
											echo "No Result Found";
										}
									}
								
						?>
					   
                       
                
                                              
                     </div>
                </div>
                <hr/>

           </div>
           
           <div class="col-sm-2 sidebar">
           	<img src="<?php echo CLIENT_IMAGES ;?>ticker.jpg" class="mt20 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace.jpg" class="mt10 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace.jpg" class="mt10 img-responsive">
           	
           
           </div>
          
          
          </div>
        
        
        
        <footer>
            <?php $this->load->view(CLIENT_FOOTER);?>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo CLIENT_SCRIPTS ;?>jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap.min.js"></script>
  </body>
</html>
