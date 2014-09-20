<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get My Uni</title>

        <!-- Bootstrap -->
        <link href="<?php echo CLIENT_CSS; ?>custom.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap-theme.min.css" rel="stylesheet">
		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <link href="<?php echo CLIENT_CSS; ?>ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    
    <!--[if IE 8]>
<style type="text/css">
	<link href="<?php echo CLIENT_CSS; ?>ie.css" rel="stylesheet" type="text/css" />
</style>
<![endif]-->

<!--[if lt IE 8]>
	<link href="<?php echo CLIENT_CSS; ?>ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
        
<!--[if gte IE 8]>
	<link href="<?php echo CLIENT_CSS; ?>ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
        
        <link href="<?php echo CLIENT_CSS; ?>style.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>social-buttons.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES; ?>GMU_favicon.png" />
        <link rel="stylesheet" href="<?php echo CLIENT_FONTS; ?>font-awesome/css/font-awesome.min.css">

        <link href="<?php echo CLIENT_CSS; ?>jquery-ui.css" rel="stylesheet">

        <script src="<?php echo ADMIN_SCRIPTS; ?>jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_review_rating_module.js"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_search_module.js"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_follow_module.js"></script>
        <!--script src="<?php echo CLIENT_MODULES; ?>client_rating_passcode_module_js.js"></script-->
        <script language="javascript" type="text/javascript">
            function resizeIframe(obj) {
                console.log(obj)
                obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }

        </script>
        <script>
            function chk_active(data)
            {
                var data1 = data;
                $(".homesearch_submenu li a").removeClass('active');
                $("#" + data1).addClass("active");
                $("#degree").val(data1);
            }
        </script>
        <script>

            function toggle_visibility(id)
            {
                var e = document.getElementById(id);
                var f = document.getElementById("signup_form_div")
                if (e.style.display == 'block')
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


        <script type="text/javascript">
            SITE_URL = '<?php echo SITE_URL ?>';
            CLIENT_SIGNUP_LOGIN_VIEW = '<?php echo CLIENT_SIGNUP_LOGIN_VIEW ?>'
            CLIENT_IMAGES = '<?php echo CLIENT_IMAGES ?>';
            CURRENT_URL = '<?php echo current_url() ?>';
            CLIENT_SITE_URL = '<?php echo CLIENT_SITE_URL ?>';
        </script>
        <style type="text/css">
            .dropdown:hover .dropdown-menu 
            {
                display: block;
            }
        </style>

    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '801856803178501',
                    xfbml: true,
                    version: 'v2.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="container">

            <div class="row">
                <?php
                //display($this->session->all_userdata());
                if (!session('client_user_id')) {
                    ?>
                    <div class="col-xs-4 col-md-4 col-md-offset-7">
                        <ul class="nav navbar-nav navbar-right">
                            <!--?php print_r ($this->session->userdata('login_info'));?-->
                            <li><a href="<?php echo SITE_URL ?>user/login">Login</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle header_top_signup" data-toggle="dropdown">Sign up <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo SITE_URL ?>user/login-view">Student Signup</a></li>
                                    <!--li><a href="#">Admin Signup</a></li-->
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php
                } else {
                    ?>

                    <?php
                    $id = session('client_user_id');
                    if ($id != 0) {
                        $query = $this->db
                                ->select('U_T.profile_pic')->from('user as U_T')
                                //-> where('U_T.id',$user_id)
                                ->where('U_T.id', $id)
                                ->get();
                        $query->row('profile_pic');

                        $pro_pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $query->row('profile_pic')));
                        //display($pro_pic);
                    }
                    ?>
                    <div class="col-xs-12 col-md-4 col-md-offset-7 mt20">
                        <div class="pull-right">
                            <div class="m_div"><a href="/messages/1/" class="top_nav_icon mr20"><img src="<?php echo CLIENT_IMAGES; ?>icons/message.png" ><span class="badge msgs"></span></a></div>
                             <div class="n_div"><a href="/notifications/" class="top_nav_icon mr20"><img src="<?php echo CLIENT_IMAGES; ?>icons/light.png"><span class="badge noti"></span></a></div>
                             <a href="#" class="top_nav_icon mr20  dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img src=<?php
                                if ($pro_pic != "") {
                                    echo $pro_pic;
                                } else {
                                    echo "'" . CLIENT_IMAGES;
                                    ?>defaultuser.jpg' <?php } ?> height="26" width="26"></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo SITE_URL ?>user/my-profile">Edit Profile</a></li>
                                <li><a href="<?php echo SITE_URL ?>client/client_user/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $.ajax({
                                type: "POST",
                                url: CLIENT_SITE_URL + "client_notification/get_unread_notification_count/",
                                success: function(data) {
                                    $(".noti").html(data);
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: CLIENT_SITE_URL + "client_notification/get_unread_message_count/",
                                success: function(data) {
                                    $(".msgs").html(data);
                                }
                            });
                        });
                        setInterval(function() {
                            $.ajax({
                                type: "POST",
                                url: CLIENT_SITE_URL + "client_notification/get_unread_notification_count/",
                                success: function(data) {
                                    $(".noti").html(data);
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: CLIENT_SITE_URL + "client_notification/get_unread_message_count/",
                                success: function(data) {
                                    $(".msgs").html(data);
                                }
                            });
                        }, 100000);
                    </script>
                    <?php
                }
                ?>

            </div>
            <div class="row">

                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header col-md-3">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo SITE_URL ?>"><img src="<?php echo CLIENT_IMAGES; ?>logo.png" ></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav nav-justified mt17 ">
                                <li class="<?= current_url() == "http://www.getmyuni.com/index.php" ? "active" : "" ?>"><a href="<?php echo SITE_URL ?>">School Search</a></li>
                                <li class="<?= preg_match("/review/", current_url()) ? "active" : "" ?>"><a href="<?php echo CLIENT_SITE_URL ?>client_review_rating/review_rating_view">Reviews and Ratings</a></li>
                                <li class="<?= preg_match("/forum/", current_url()) ? "active" : "" ?>"><a href="<?php echo SITE_URL ?>forums/1/">Forums</a></li>
                                <li class="<?= preg_match("/communities/", current_url()) ? "active" : "" ?>"><a href="<?php echo SITE_URL ?>communities/1/">Communities</a></li>
                                <li class="<?= preg_match("/news/", current_url()) ? "active" : "" ?>"><a href="<?php echo SITE_URL ?>news">News</a></li>

                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>