
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>Get My Uni</title>
	
  <link href="<?php echo ADMIN_CSS ;?>custom.css" rel="stylesheet">
  <link href="<?php echo ADMIN_CSS ;?>style.default.css" rel="stylesheet">
  <link href="<?php echo ADMIN_CSS ;?>jquery.datatables.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ADMIN_CSS ;?>bootstrap-fileupload.min.css" />
   <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES; ?>GMU_favicon.png" />
  <link rel="stylesheet" href="<?php echo ADMIN_CSS ;?>custom.css" />
  
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
   <script src="<?php echo CLIENT_SCRIPTS ;?>jquery.min.js"></script>
  <script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS ;?>jquery-1.10.2.min.js" type="text/javascript"></script>
  <script src="<?php echo CLIENT_SCRIPTS; ?>bootbox.js"></script>
  <script type="text/javascript" src="<?php echo ADMIN_MODULES?>admin_college_master_module_js.js"></script>
  <style type="text/css">.error{display:none;} </style>
  <script type="text/javascript">
  SITE_URL    = '<?php echo SITE_URL?>';
  </script>
</head>

<body>

<section>
  
	<div class="leftpanel">
		
<div class="logopanel">
  <h1><span>[</span> Get My University <span>]</span></h1>
</div>
<!-- logopanel -->

<div class="leftpanelinner mt10"> 
  
  <!-- This is only visible to small devices -->
  <div class="visible-xs hidden-sm hidden-md hidden-lg">
    <div class="media userlogged"> <img alt="" src="images/photos/loggeduser.png" class="media-object">
      <div class="media-body">
        <h4>Admin</h4>
        <span>"Life is so..."</span> </div>
    </div>
    <h5 class="sidebartitle actitle">Account</h5>
    <ul class="nav nav-pills nav-stacked nav-bracket mb30">
      <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
      <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
      <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
    </ul>
  </div>
  <h5 class="sidebartitle">Navigation</h5>
  
  <ul class="nav nav-pills nav-stacked nav-bracket">
    <li class="nav-parent nav-active"><a href="#"><i class="fa fa-folder"></i> Colleges Data <span> </span></a>
      <ul class="children" style="display: block;">
        <li class="sub-menu active"> <a data="Dashboard" href="<?php echo ADMIN_SITE_URL?>college/index"><i class="fa fa-caret-right"></i> College</a></li>
        <li class="sub-menu "> <a data="Organizer" href="<?php echo ADMIN_SITE_URL?>school_events/school_event_listing_view"><i class="fa fa-caret-right"></i> Event</a></li>
        <!--span class="fa fa-arrow-down"></span-->
       
      </ul>
    </li>
    <li class="nav-parent nav-active"><a href="#"><i class="fa fa-folder"></i> Master Data <span> </span></a>
      <ul class="children" style="display: block;">
        <li class="sub-menu "> <a data="Master_Degree" href="<?php echo ADMIN_SITE_URL?>college_master/master_degree_list_view"><i class="fa fa-caret-right"></i> Master Degree</a></li>
        <li class="sub-menu "> <a data="Master_Field_of_study" href="<?php echo ADMIN_SITE_URL?>college_master/master_field_list_view"><i class="fa fa-caret-right"></i> Master Field Of Study</a></li>
        <li class="sub-menu "> <a data="Master_Majors_Domains" href="<?php echo ADMIN_SITE_URL?>college_master/master_domain_list_view"><i class="fa fa-caret-right"></i> Master Majors Domains</a></li>
        <li class="sub-menu "> <a data="Master_Country" href="<?php echo ADMIN_SITE_URL?>college_master/master_country_list_view"><i class="fa fa-caret-right"></i> Master Country</a></li>
        <li class="sub-menu "> <a data="Master_program_name" href="<?php echo ADMIN_SITE_URL?>college_master/master_name_list_view"><i class="fa fa-caret-right"></i> Master Program Name</a></li>
        <li class="sub-menu "> <a data="Master_top_sector" href="<?php echo ADMIN_SITE_URL?>college_master/master_top_list_view"><i class="fa fa-caret-right"></i> Master Top Sectors </a></li>
        <li class="sub-menu "> <a data="Master_forum_name" href="<?php echo ADMIN_SITE_URL?>college_master/master_forum_list_view"><i class="fa fa-caret-right"></i> Master Forums</a></li>
        <!--li class="sub-menu "> <a data="Master_program_type" href="<?php echo ADMIN_SITE_URL?>college_master/master_type_add_edit"><i class="fa fa-caret-right"></i> Master Program Type</a></li-->
      </ul>
    </li>
  </ul>
</div>
<!-- leftpanelinner -->
	</div><!-- leftpanel -->
  
	<div class="mainpanel">
    
		<div class="headerbar">
				<!-- Header Left -->
	
	<!--a class="menutoggle"><i class="fa fa-bars"></i></a-->
      
      
	<!-- Header Right -->
	  
      <div class="header-right">
        <ul class="headermenu">
       <li><!-- User Account -->
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="images/photos/blog4.jpg" alt="" />
                <?php 
                if(session('client_user_id'))
                 echo session('client_user_name');
                ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <!--li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li-->
                <li><a href="<?php echo SITE_URL ?>client/client_user/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
		  
          <li><!-- Right Panel -->
            <!--button id="chatview" class="btn btn-default tp-icon chat-icon">
                <i class="fa fa-arrow-left"></i>
            </button-->
          </li>
        </ul>
      </div><!-- header-right -->
		</div><!-- headerbar -->
		<!--
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i> Manage College <!--span>All elements to manage your School...</span></h2>
		  <div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
			  <li><a href="index.php">GetMyUni</a></li>
			  <li class="active">Manage College</li>
			</ol>
		  </div>
		</div> -->