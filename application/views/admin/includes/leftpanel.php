
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
  
  <!--  <ul class="nav nav-pills nav-stacked nav-bracket">
		<li class="nav-parent nav-active <?php //if ($thisPage=="Exhibitors" || "Add Exhibitor" || "Surveys" || "Add Surveys" || "Speakers" || "Add Speaker") echo "nav-active active"; ?>"><a href="#"><i class="fa fa-suitcase"></i> <span>Colleges Data</span></a>
          <ul class="children">
			<li class="sub-menu active"><a href="index.php"><i class="fa fa-bar-chart-o"></i> Analytics</a></li>
			<li class=""><a href="eventprofile.php"><i class="fa fa-folder-open"></i> Event Profile</a></li>
			<li class=""><a href="agenda.php"><i class="fa fa-calendar"></i> Agenda</a></li>
			<li class=""><a href="promote.php"><i class="fa fa-rocket"></i> Promote</a></li>
            <li class=""><a href="exhibitors.php"><i class="fa fa-sitemap"></i> Exhibitors</a></li>
            <li class=""><a href="sponsors.php"><i class="fa fa-dollar"></i> Sponsors</a></li>
            <li class=""><a href="speakers.php"><i class="fa fa-bullhorn"></i> Speakers</a></li>
            <li class=""><a href="#"><i class="fa fa-users"></i> Attendees</a></li>
            <li class=""><a href="surveys.php"><i class="fa fa-pencil-square-o"></i> Surveys</a></li>
          </ul>
        </li>
	  
	  
		<li class="nav-parent nav-active active"><a href="#"><i class="fa fa-calendar-o"></i> <span>Master Data</span></a>
          <ul class="children">
            <li><a href="event1.php"><i class="fa fa-calender"></i> Event 4</a></li>
			<li><a href="event1.php"><i class="fa fa-calender"></i> Event 5</a></li>
          </ul>
        </li>
		
      </ul>-->
  
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
        <li class="sub-menu "> <a data="Master_Degree" href="<?php echo ADMIN_MASTER_VIEW ?>collge_master/master_degree_list_view"><i class="fa fa-caret-right"></i> Master Degree</a></li>
        <li class="sub-menu "> <a data="Master_Field_of_study" href="#"><i class="fa fa-caret-right"></i> Master Field Of Study</a></li>
        <li class="sub-menu "> <a data="Master__Majors_Domains" href="#"><i class="fa fa-caret-right"></i> Master Majors Domains</a></li>
        <li class="sub-menu "> <a data="Master_Country" href="#"><i class="fa fa-caret-right"></i> Master Country</a></li>
        <li class="sub-menu "> <a data="Master_program_name" href="#"><i class="fa fa-caret-right"></i> Master Program Name</a></li>
		<li class="sub-menu "> <a data="Master_program_type" href="#"><i class="fa fa-caret-right"></i> Master Program Type</a></li>
      </ul>
    </li>
  </ul>
</div>
<!-- leftpanelinner -->