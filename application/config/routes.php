<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "client/client_home/home_view";
$route['404_override'] = '';
######################################################################ADMIN ROUTE#############################################################
######################################################################ADMIN ROUTE#############################################################
//$route['admin'] = 'admin/college/index';
$route['admin'] = 'admin/college/add_edit';


######################################################################CLIENT ROUTE#############################################################
$route['college'] = 'client/client_home/home_view';
$route['college'] = 'client/client_college/college_list';
$route['college/(:any)'] = 'client/client_college/college_list/$1/$1';

$route['review_rating'] = 'client/client_review_rating/review_details_view';

$route['user/login-view'] = 'client/client_user/login_view';
$route['user/login'] = 'client/client_user/login_page_view';
$route['user/pre-login-view'] = 'client/client_user/pre_login_view';
$route['user/my-profile'] = 'client/client_user/my_profile';
$route['forums'] = 'client/client_forums/forum_list_view';


$route['forums/(:any)/(:any)/(:any)/(:any)'] = 'client/client_forums/forum_topic_view/$2/$3/$4/';
$route['forums/(:any)/(:any)/(:any)'] = 'client/client_forums/forum_details_view/$2/$3/';
$route['forums/(:any)'] = 'client/client_forums/forum_list_view/$1/';

$route['communities/(:any)/(:num)'] = 'client/client_communities/client_com_details_view/$2';
$route['communities/(:num)'] = 'client/client_communities/client_communities_view/$1';

$route['ticker'] = 'client/client_ticker/ticker_view';
$route['adspace'] = 'client/client_adspace/adspace_view';
$route['profile/(:num)'] = 'client/client_user/user_show_profile/$1/';
$route['notifications'] = 'client/client_notification/notification_view/';
######################################################################CLIENT ROUTE#############################################################




/* End of file routes.php */
/* Location: ./application/config/routes.php */