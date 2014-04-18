<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

include(APPPATH."utils/CILangUtil.php");

$route['default_controller'] = "home";

$route['404_override'] = '';

// '/en', '/de', '/fr' and '/nl' URIs -> use default controller
$route['^(en|th|de|fr|nl)$'] = $route['default_controller'];


////////// Urls start
//Carrent
$route['carrent/(:any)'] = 'carrent/user_index/$1';
$route["carrent"] = 'carrent/user_index';


//Airline
$route['airline/(:any)'] = 'airline/user_index/$1';
$route["airline"] = 'airline/user_index';

//location
$route['admin/location/setdisplay'] = 'location/admin_setdisplay';
$route['admin/location'] = 'location/admin_index';
$route['admin/location/create/(:any)'] = 'location/admin_create/$1';
$route['admin/location/create'] = 'location/admin_create';
$route['admin/location/ajax_delete'] = 'location/ajax_delete';
$route['admin/location/delete/(:any)'] = 'location/admin_delete/$1';
$route['admin/location/(:any)/(:any)-(:num)'] = 'location/admin_view/$3';
$route['admin/location/(:any)-(:num)'] = 'location/admin_view/$1/$2';
$route['admin/location/(:any)'] = 'location/admin_index'; //for Tag
$route['admin/location'] = 'location/admin_index';


$route[LangUtil::line("url_lang_location").'/search'] = 'location/user_search';


$route[LangUtil::line("url_lang_location").'/(:num)'] = 'location/user_index';
$route[LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/user_view/$3';
$route[LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/user_view/$1/$2';
$route[LangUtil::line("url_lang_location").'/(:any)'] = 'location/user_index/$1'; //for Tag
$route[LangUtil::line("url_lang_location")] = 'location/user_index';

//tour admin
$route['admin/tour/userbookingview/(:any)'] = 'tour/admin_userbookingview/$1';
$route['admin/tour/bookinglist'] = 'tour/admin_bookinglist';
$route['admin/tour/agencybookingview/(:any)'] = 'tour/admin_agencybookingview/$1';
$route['admin/tour/setdisplay'] = 'tour/admin_setdisplay';
$route['admin/tour/setfisrtpageprice'] = 'tour/admin_setfisrtpageprice';
$route['admin/tour/setcharter'] = 'tour/admin_setcharter';
$route['admin/tour/(:num)'] = 'tour/admin_index/$1';
$route['admin/tour'] = 'tour/admin_index';
$route['admin/tour/update'] = 'tour/admin_update';
$route['admin/tour/delete/(:num)'] = 'tour/admin_delete/$1';
$route['admin/tour/createtag/(:any)/(:any)'] = 'tour/admin_createtag/$1/$2';
$route['admin/tour/create'] = 'tour/admin_create';
$route['admin/tour/create/(:num)'] = 'tour/admin_create/$1';
$route['admin/tour/(:any)/(:any)-(:num)'] = 'tour/admin_view/$3';
$route['admin/tour/(:any)-(:num)'] = 'tour/admin_view/$2';
$route['admin/tour/(:any)'] = 'tour/admin_list'; //for Tag

//tour user
$route[LangUtil::line("url_lang_tour").'/search'] = 'tour/user_search';
$route[LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/user_view/$2/$1';
$route[LangUtil::line("url_lang_tour")."/(:any)"] = 'tour/user_index';
$route[LangUtil::line("url_lang_tour")] = 'tour/user_index';


//Custom Tour user
$route["customtour/create/step1"] = 'customtour/user_create_step1';
$route["customtour/create/step2"] = 'customtour/user_create_step2';
$route["customtour/ajax/(:any)"] = 'customtour/ajax_index/$1';
$route["customtour/ajax/get_menu_list"] = 'customtour/ajax_get_menu_list';
$route["customtour/publish/(:any)"] = 'customtour/user_publish/$1';
//$route['customtour/(:any)-(:num)'] = 'customtour/user_view/$2';
$route["customtour/(:any)"] = 'customtour/user_index';
$route["customtour"] = 'customtour/user_index';


//hotel admin
$route['admin/hotel/userbookingview/(:any)'] = 'hotel/admin_userbookingview/$1';
$route['admin/hotel/agencybookingview/(:any)'] = 'hotel/admin_agencybookingview/$1';
$route['admin/hotel/setdisplay'] = 'hotel/admin_setdisplay';
$route['admin/hotel/(:num)'] = 'hotel/admin_index/$1';
$route['admin/hotel'] = 'hotel/admin_index';
$route['admin/hotel/update'] = 'hotel/admin_update';
$route['admin/hotel/delete/(:num)'] = 'hotel/admin_delete/$1';
$route['admin/hotel/createtag/(:any)/(:any)'] = 'hotel/admin_createtag/$1/$2';
$route['admin/hotel/create'] = 'hotel/admin_create';
$route['admin/hotel/create/(:num)'] = 'hotel/admin_create/$1';
$route['admin/hotel/(:any)/(:any)-(:num)'] = 'hotel/admin_view/$3';
$route['admin/hotel/(:any)-(:num)'] = 'hotel/admin_view/$2';
$route['admin/hotel/(:any)'] = 'hotel/admin_list'; //for Tag



//hotel user
$route[LangUtil::line("url_lang_hotel").'/search'] = 'hotel/user_search';
$route[LangUtil::line("url_lang_hotel").'/(:any)-(:num)'] = 'hotel/user_view/$2';
$route[LangUtil::line("url_lang_hotel")."/(:any)"] = 'hotel/user_index';
$route[LangUtil::line("url_lang_hotel")] = 'hotel/user_index';

//Report
$route['admin/report'] = 'report/admin_index';
$route['admin/report/(:any)'] = 'report/admin_index';
$route['admin/report/(:num)'] = 'report/admin_index'; 
/*
$route['admin/report/(:any)/(:any)-(:num)'] = 'report/admin_view/$3';
$route['admin/report/(:any)-(:num)'] = 'report/admin_view/$1';
$route['admin/report/(:any)'] = 'report/admin_list'; 
*/


//Agency
$route['admin/'.LangUtil::line("url_lang_agency")] = 'agency/admin_index';
$route['admin/'.LangUtil::line("url_lang_agency").'/update'] = 'agency/admin_update';
$route['admin/'.LangUtil::line("url_lang_agency").'/delete/(:num)'] = 'agency/admin_delete/$1';
$route['admin/'.LangUtil::line("url_lang_agency").'/create'] = 'agency/admin_create';
$route['admin/'.LangUtil::line("url_lang_agency").'/create/(:num)'] = 'agency/admin_create/$1';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)/(:any)-(:num)'] = 'agency/admin_view/$3';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)-(:num)'] = 'agency/admin_view/$2';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)'] = 'agency/admin_list'; //for Tag

$route['agency/hasdata/(:any)'] = 'agency/hasdata/$1'; //for Tag
$route['agency/phpsearch/(:any)'] = 'agency/phpsearch/$1'; //for Tag

//Tag
$route['admin/tag'] = 'tag/admin_index';
$route['admin/tag/update'] = 'tag/admin_update';
$route['admin/tag/move'] = 'tag/admin_move';
$route['admin/tag/ajaxdelete'] = 'tag/admin_ajaxdelete';
$route['admin/tag/delete/(:num)'] = 'tag/admin_delete/$1';
$route['admin/tag/create'] = 'tag/admin_create';
$route['admin/tag/create/(:num)'] = 'tag/admin_create/$1';
$route['admin/tag/list'] = 'tag/admin_list';
$route['admin/tag/updatelang'] = 'tag/admin_updatelang';
$route['admin/tag/child/(:num)/(:num)'] = 'tag/admin_child/$1/$2';
$route['admin/tag/(:any)/(:any)-(:num)'] = 'tag/admin_view/$3';
$route['admin/tag/(:any)-(:num)'] = 'tag/admin_view/$2';
$route['admin/tag/(:any)'] = 'tag/admin_list'; //for Tag

//Type
$route['admin/type/create'] = 'type/admin_create';
$route['admin/type/create/(:num)'] = 'type/admin_create/$1';
$route['admin/type/delete/(:num)'] = 'type/admin_delete/$1';

$route['tag/jssearch/(:any)'] = 'tag/jssearch/$1';
$route['tag/jssearch'] = 'tag/jssearch';
$route['tag/jsonsearch/(:any)'] = 'tag/jsonsearch/$1';

//Images
$route['images/ajax_list'] = 'images/ajax_list';
$route['images/ajax_upload'] = 'images/ajax_upload';
$route['images/ajax_delete/(:any)'] = 'images/ajax_delete/$1';

//User
$route['user'] = 'user';
$route['user/login'] = 'user/login';
$route['user/fblogin'] = 'user/fblogin';
$route['user/login_ajax'] = 'user/login_ajax';
$route['user/logout_ajax'] = 'user/logout_ajax';
$route['user/logout'] = 'user/logout';

$route['admin/user'] = 'user/admin_index';
$route['admin/user/create'] = 'user/admin_create';
$route['admin/user/create/(:num)'] = 'user/admin_create/$1';

//Group
$route['admin/group'] = 'group/admin_index';
$route['admin/group/create'] = 'group/admin_create';

$route['admin/translate'] = 'translate/index';
$route['admin/translate/tag'] = 'translate/tag';


//Article

$route['admin/article'] = 'article/admin_index';
$route['admin/article/(:num)'] = 'article/admin_index/$1';
$route['admin/article/setdisplay'] = 'article/admin_setdisplay';
$route['admin/article/create'] = 'article/admin_create';
$route['admin/article/create/(:any)'] = 'article/admin_create/$1';
$route['admin/article/ajax_delete'] = 'article/ajax_delete';
$route['admin/article/delete/(:any)'] = 'article/admin_delete/$1';

//Checkout
$route['checkout/success'] = 'checkout/user_success';
$route['checkout/payment/(:any)'] = 'checkout/user_do_payment/$1';
$route['checkout/payment_return/(:any)'] = 'checkout/user_payment_return/$1';
$route['checkout/payment_cancel/(:any)'] = 'checkout/user_payment_cancel/$1';

//Search
$route['search?keyword=(:any)'] = 'search/user_index/$1';
$route['search/(:any)'] = 'search/user_index/$1';
$route['search'] = 'search/user_index';

//Home
$route['admin'] = 'home/admin_list';
$route['(:any)'] = 'home/index';

///////// Urls end



/* End of file routes.php */
/* Location: ./application/config/routes.php */