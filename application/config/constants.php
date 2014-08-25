<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');



//include_once 'config.php';
define('SITE_URL', 'http://www.getmyuni.com/');
######################################################################COMMON##########################################################################
define('UI', 'public/');
######################################################################COMMON##########################################################################
###############################################################ADMIN CONSTANTS STARTs###################################################################
define('ADMIN', 'admin/');

define('ADMIN_SITE_URL', SITE_URL . ADMIN);
define('ADMIN_CSS', SITE_URL . UI . ADMIN . 'css/');
define('ADMIN_IMAGES', SITE_URL . UI . ADMIN . 'images/');
define('ADMIN_SCRIPTS', SITE_URL . UI . ADMIN . 'scripts/');
define('ADMIN_PLUGINS', SITE_URL . UI . ADMIN . 'scripts/plugins/');
define('ADMIN_MODULES', SITE_URL . UI . ADMIN . 'scripts/modules/');

/* * *****************************************admin views ************************** */
define('ADMIN_VIEWS_FOLDER', ADMIN);
define('ADMIN_INCLUDES_FOLDER', ADMIN . 'includes/');
define('ADMIN_HEADER', ADMIN_INCLUDES_FOLDER . 'header.php');
define('ADMIN_LEFTPANEL', ADMIN_INCLUDES_FOLDER . 'leftpanel.php');
define('ADMIN_FOOTER', ADMIN_INCLUDES_FOLDER . 'footer.php');


define('ADMIN_USER_FOLDER', ADMIN . 'admin_user/');
define('ADMIN_USER', ADMIN_USER_FOLDER . 'admin_login_signup_view.php');


define('ADMIN_COLLEGE_FOLDER', ADMIN . 'college/');
define('ADMIN_COLLEGE_LIST_VIEW', ADMIN_COLLEGE_FOLDER . 'college_list_view.php');
define('ADMIN_COLLEGE_ADD_EDIT_VIEW', ADMIN_COLLEGE_FOLDER . 'college_add_edit_view.php');
define('ADMIN_COLLEGE_MASTERS', ADMIN_COLLEGE_FOLDER . 'add_masters.php');
define('ADMIN_COLLEGE_EVENT_LIST', ADMIN_COLLEGE_FOLDER . 'school_event_list_view.php');
define('ADMIN_COLLEGE_EVENT_ADD_EDIT_VIEW', ADMIN_COLLEGE_FOLDER . 'admin_school_event_add_edit.php');

define('ADMIN_MASTER_FOLDER', ADMIN . 'masters/');
define('ADMIN_MASTER_DEGREE_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_degree_add_edit.php');
define('ADMIN_MASTER_FIELD_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_field_add_edit.php');
define('ADMIN_MASTER_DOMAIN_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_domain_add_edit.php');
define('ADMIN_MASTER_COUNTRY_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_country_add_edit.php');
define('ADMIN_MASTER_TYPE_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_type_add_edit.php');
define('ADMIN_MASTER_NAME_ADD_EDIT_VIEW', ADMIN_MASTER_FOLDER . 'admin_masters_name_add_edit.php');


/* * *****************************************admin views ************************** */


###############################################################ADMIN CONSTANTS ENDS###################################################################
################################################################CLIENT CONSTANTS STARTs###################################################################
define('CLIENT', 'client/');

define('CLIENT_SITE_URL', SITE_URL . CLIENT);
define('CLIENT_CSS', SITE_URL . UI . CLIENT . 'css/');

define('CLIENT_IMAGES', SITE_URL . UI . CLIENT . 'images/');
define('CLIENT_FONTS', SITE_URL . UI . CLIENT . 'fonts/');
define('CLIENT_SCRIPTS', SITE_URL . UI . CLIENT . 'scripts/');
define('CLIENT_PLUGINS', SITE_URL . UI . CLIENT . 'scripts/pugins/');
define('CLIENT_MODULES', SITE_URL . UI . CLIENT . 'scripts/modules/');


define('CLIENT_VIEWS_FOLDER', CLIENT);
define('CLIENT_INCLUDES_FOLDER', CLIENT . 'includes/');
define('CLIENT_HEADER', CLIENT_INCLUDES_FOLDER . 'header.php');
define('CLIENT_FOOTER', CLIENT_INCLUDES_FOLDER . 'footer.php');


define('CLIENT_COLLEGE_FOLDER', CLIENT . 'college/');
define('CLIENT_COLLEGE_DETAIL_VIEW', CLIENT_COLLEGE_FOLDER . 'client_college_profile_view.php');
define('CLIENT_COLLEGE_LISTING_VIEW', CLIENT_COLLEGE_FOLDER . 'client_college_listing_view.php');
define('CLIENT_COLLEGE_REVIEW_VIEW', CLIENT_COLLEGE_FOLDER . 'client_write_college_review.php');
define('CLIENT_COLLEGE_COMPARE_VIEW', CLIENT_COLLEGE_FOLDER . 'client_college_compare_view.php');
define('CLIENT_COLLEGE_WALL_VIEW', CLIENT_COLLEGE_FOLDER . 'college_walls_view.php');
define('CLIENT_COMMUNITY_WALL_VIEW', CLIENT . 'communities/community_wall_view.php');

define('CLIENT_HOME_FOLDER', CLIENT . 'home/');
define('CLIENT_COLLEGE_HOME_VIEW', CLIENT_HOME_FOLDER . 'client_home_view.php');


define('CLIENT_LOGIN_FOLDER', CLIENT . 'signup_login/');
define('CLIENT_SIGNUP_LOGIN_VIEW', CLIENT_LOGIN_FOLDER . 'client_signup_view.php');
define('CLIENT_SIGNUP_POPUP_VIEW', CLIENT_LOGIN_FOLDER . 'client_signup_popup_view.php');
define('CLIENT_STUDENT_PRE_PROFILE_VIEW', CLIENT_LOGIN_FOLDER . 'client_student_pre_profile_view.php');
define('CLIENT_STUDENT_DETAILS_VIEW', CLIENT_LOGIN_FOLDER . 'client_student_details_view.php');

define('CLIENT_RIVEW_RATING_FOLDER', CLIENT . 'review_rating/');
define('CLIENT_RIVEW_RATING_VIEW', CLIENT_RIVEW_RATING_FOLDER . 'client_review_rating_view.php');
define('CLIENT_RIVEW_LISTING_VIEW', CLIENT_RIVEW_RATING_FOLDER . 'client_review_listing_view.php');
define('CLIENT_COLLEGE_REVIEW_DETAILS_VIEW', CLIENT_RIVEW_RATING_FOLDER . 'client_college_review_details_view.php');
define('CLIENT_COLLEGE_FULL_REVIEW_VIEW', CLIENT_RIVEW_RATING_FOLDER . 'client_college_full_review_view.php');
define('CLIENT_REVIEW_RATING_SIDE_BAR', CLIENT_RIVEW_RATING_FOLDER . 'review_rating_side_bar.php');
define('CLIENT_AJAX_REVIEW_LISTING_VIEW', CLIENT_RIVEW_RATING_FOLDER . 'client_ajax_review_listing_view.php');

define('CLIENT_USER_FOLDER', CLIENT . 'user/');
define('CLIENT_LOGIN_SIGNUP_VIEW', CLIENT_USER_FOLDER . 'client_login_signup_view.php');

define('CLIENT_PRE_REGISTER_VIEW', CLIENT_USER_FOLDER . 'client_student_pre_profile_view.php');
define('CLIENT_USER_PROFILE_VIEW', CLIENT_USER_FOLDER . 'client_student_details_view.php');
define('CLIENT_USER_POPUP_VIEW', CLIENT_USER_FOLDER . 'client_signup_popup_view.php');
define('CLIENT_SHOW_DETAILS_VIEW', CLIENT_USER_FOLDER . 'client_show_student_details_view.php');
define('CLIENT_PER_PAGE', 10);
define('FORUM_DISCUSSION_PER_PAGE', 10);
define('COMMUNITIES_PER_PAGE', 5);
define('REVIEW_PER_PAGE', 5);

define('CLIENT_FORUM_FOLDER', CLIENT . 'forums/');
define('CLIENT_FORUMS_LIST_VIEW', CLIENT_FORUM_FOLDER . 'client_forums_list_view.php');
define('CLIENT_FORUMS_DETAILS_VIEW', CLIENT_FORUM_FOLDER . 'client_forums_details_view.php');
define('CLIENT_FORUMS_TOPIC_VIEW', CLIENT_FORUM_FOLDER . 'client_forums_topic_view.php');



define('CLIENT_COMMUNITIES_FOLDER', CLIENT . 'communities/');

define('CLIENT_COMMUNITIES_VIEW', CLIENT_COMMUNITIES_FOLDER . 'client_communities_view.php');
define('CLIENT_COMMUNITIES_DETAILS_VIEW', CLIENT_COMMUNITIES_FOLDER . 'client_communities_details_view.php');


define('CLIENT_TICKER_FOLDER', CLIENT . 'ticker_ads/');

define('CLIENT_TICKER_VIEW', CLIENT_TICKER_FOLDER . 'client_ticker_view.php');
define('CLIENT_ADS_VIEW', CLIENT_TICKER_FOLDER . 'client_adspace_view.php');


/*******************************************views ***************************/
/*******************************************views ***************************/



###############################################################CLIENT CONSTANTS ENDS###################################################################


/* End of file constants.php */
/* Location: ./application/config/constants.php */