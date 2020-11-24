<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homecontroller';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

$route['admin/logout'] = 'admincontroller/logout';
$route['Commingsoon'] = 'Commingsoon/index';

$route['admin/attribute/subcategory'] = 'admincontroller/attr_subcategory';
$route['admin/attribute/subcategory/(:any)'] = 'admincontroller/attr_subcategory/$1';
$route['admin/attribute/subcategory/(:any)/(:any)'] = 'admincontroller/attr_subcategory/$1/$2';

$route['admin/attribute/product'] = 'admincontroller/attr_product';
$route['admin/attribute/product/(:any)'] = 'admincontroller/attr_product/$1';
$route['admin/attribute/product/(:any)/(:any)'] = 'admincontroller/attr_product/$1/$2';

$route['admin/(:any)/(:any)/(:any)/(:any)'] = 'admincontroller/$1/$2/$3/$4';
$route['admin/(:any)/(:any)/(:any)'] = 'admincontroller/$1/$2/$3';
$route['admin/(:any)/(:any)'] = 'admincontroller/$1/$2';
$route['admin/(:any)'] = 'admincontroller/$1';

$route['admin'] = 'authcontroller/index';
// $route['chats/([a-zA-Z/]*)/([a-zA-Z/]*)'] = 'chat';
// $route['chat_mobile'] = 'homecontroller/mobileChat';
$route['chat_mobile_detail'] = 'homecontroller/mobileChatDetail';

$route['/'] = 'homecontroller/index';
$route['home'] = 'homecontroller/index';
$route['sell'] = 'homecontroller/sell';
$route['sell/(:any)/(:any)'] = 'homecontroller/sell/$1/$2';
$route['activation/(:any)/(:any)'] = 'homecontroller/activation/$1/$2';
$route['forgot_password/(:any)/(:any)'] = 'homecontroller/forgot_password/$1/$2';
$route['messenger/(:any)/(:any)'] = 'homecontroller/messenger/$1/$2';
$route['offer_status/(:any)/(:any)/(:any)'] = 'homecontroller/offer_status/$1/$2/$3';
$route['category/(:any)'] = 'homecontroller/category/$1';
$route['google_login'] = 'homecontroller/google_login';
$route['search'] = 'homecontroller/search';
$route['cart'] = 'homecontroller/cart';
$route['checkout'] = 'homecontroller/checkout';
$route['thank-you'] = 'homecontroller/thank_you';
$route['account'] = 'homecontroller/account';
$route['ajax_call'] = 'homecontroller/ajax_call';
$route['logout'] = 'homecontroller/logout';
$route['item/(:any)'] = 'homecontroller/item/$1';
$route['user/(:any)'] = 'homecontroller/user/$1';
$route['(:any)'] = 'homecontroller/page/$1';
$route['buy/(:any)'] = 'homecontroller/page/buy/$1';

$route['userlisting'] = 'homecontroller/userlisting';
$route['userlisting/(:any)'] = 'homecontroller/userlisting/$1';
$route['chat/(:any)/(:any)'] = 'Chat/chat/$1/$2';


