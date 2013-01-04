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

$lang_set = '^(en|th|de|fr|nl)';

$route['default_controller'] = "home";

$route['404_override'] = '';

// '/en', '/de', '/fr' and '/nl' URIs -> use default controller
$route['^(en|th|de|fr|nl)$'] = $route['default_controller'];



$route['(:any)'.'_tests'] = '$1'.'_tests';


////////// Urls start


//Carrent
$route['carrent/(:any)'] = 'carrent/user_index/$1';
$route[$lang_set.'/'.'carrent/(:any)'] = 'carrent/user_index/$1';
$route["carrent"] = 'carrent/user_index';
$route[$lang_set.'/'."carrent"] = 'carrent/user_index';


//Airline
$route['airline/(:any)'] = 'airline/user_index/$1';
$route[$lang_set.'/'.'airline/(:any)'] = 'airline/user_index/$1';
$route["airline"] = 'airline/user_index';
$route[$lang_set.'/'."airline"] = 'airline/user_index';

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
$route[$lang_set.'/'.LangUtil::line("url_lang_location").'/search'] = 'location/user_search';


$route[$lang_set.'/'.LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/user_view/$4';
$route[$lang_set.'/'.LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/user_view/$3';
$route[$lang_set.'/'.LangUtil::line("url_lang_location").'/(:any)'] = 'location/user_index/$2'; //for Tag
$route[$lang_set.'/'.LangUtil::line("url_lang_location")] = 'location/user_index';

$route[LangUtil::line("url_lang_location").'/(:num)'] = 'location/user_index';
$route[LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/user_view/$3';
$route[LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/user_view/$1/$2';
$route[LangUtil::line("url_lang_location").'/(:any)'] = 'location/user_index/$1'; //for Tag
$route[LangUtil::line("url_lang_location")] = 'location/user_index';


//tour admin

$route['admin/tour/setdisplay'] = 'tour/admin_setdisplay';
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
$route[$lang_set.'/'.LangUtil::line("url_lang_tour").'/search'] = 'tour/user_search';

//$route[LangUtil::line("url_lang_tour").'/(:any)/search'] = 'tour/user_search/$1';
//$route[$lang_set.'/'.LangUtil::line("url_lang_tour").'/(:any)/search'] = 'tour/user_search/$1';
$route[LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/user_view/$2';
$route[$lang_set.'/'.LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/user_view/$2';
$route[LangUtil::line("url_lang_tour")."/(:any)"] = 'tour/user_index'; 
$route[$lang_set.'/'.LangUtil::line("url_lang_tour")."/(:any)"] = 'tour/user_index'; 
$route[LangUtil::line("url_lang_tour")] = 'tour/user_index'; 
$route[$lang_set.'/'.LangUtil::line("url_lang_tour")] = 'tour/user_index'; 

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
$route['admin/tag/delete/(:num)'] = 'tag/admin_delete/$1';
$route['admin/tag/create'] = 'tag/admin_create';
$route['admin/tag/create/(:num)'] = 'tag/admin_create/$1';
$route['admin/tag/(:any)/(:any)-(:num)'] = 'tag/admin_view/$3';
$route['admin/tag/(:any)-(:num)'] = 'tag/admin_view/$2';
$route['admin/tag/(:any)'] = 'tag/admin_list'; //for Tag

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


//Home
$route['admin'] = 'home/admin_list';
$route[$lang_set] = 'home/index';
$route['(:any)'] = 'home/index';
$route[$lang_set.'/(:num)'] = 'home/index';
$route[$lang_set.'/(:any)'] = 'home/index';

///////// Urls end



/* End of file routes.php */
/* Location: ./application/config/routes.php */