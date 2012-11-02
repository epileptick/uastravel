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


$route['default_controller'] = "location/user_view/17";
$route['404_override'] = '';


//location
$route['admin/'.LangUtil::line("url_lang_location")] = 'location/admin_index';
$route['admin/'.LangUtil::line("url_lang_location")."/create/(:any)"] = 'location/admin_create/$1';
$route['admin/'.LangUtil::line("url_lang_location")."/create"] = 'location/admin_create';
$route['admin/'.LangUtil::line("url_lang_location")."/ajax_delete"] = 'location/ajax_delete';
$route['admin/'.LangUtil::line("url_lang_location")."/delete/(:any)"] = 'location/admin_delete/$1';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/admin_view/$3';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/admin_view/$2';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)'] = 'location/admin_index'; //for Tag
$route['admin/'.LangUtil::line("url_lang_location")] = 'location/admin_index';


$route[LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/user_view/$3';
$route[LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/user_view/$2';
$route[LangUtil::line("url_lang_location").'/(:any)'] = 'location/user_index'; //for Tag
$route[LangUtil::line("url_lang_location")] = 'location/user_index';


//tour
$route['admin/'.LangUtil::line("url_lang_tour")] = 'tour/admin_index';
$route['admin/'.LangUtil::line("url_lang_tour").'/update'] = 'tour/admin_update';
$route['admin/'.LangUtil::line("url_lang_tour").'/delete/(:num)'] = 'tour/admin_delete/$1';
$route['admin/'.LangUtil::line("url_lang_tour").'/create'] = 'tour/admin_create';
$route['admin/'.LangUtil::line("url_lang_tour").'/create/(:num)'] = 'tour/admin_create/$1';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)/(:any)-(:num)'] = 'tour/admin_view/$3';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/admin_view/$2';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)'] = 'tour/admin_list'; //for Tag

$route[LangUtil::line("url_lang_tour").'/(:any)/(:any)-(:num)'] = 'tour/user_view/$3';
$route[LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/user_view/$2';
$route[LangUtil::line("url_lang_tour").'/(:any)'] = 'tour/user_list/$1'; //for Tag
$route[LangUtil::line("url_lang_tour")] = 'tour/user_index'; //list tour

//Agency
$route['admin/'.LangUtil::line("url_lang_agency")] = 'agency/admin_index';
$route['admin/'.LangUtil::line("url_lang_agency").'/update'] = 'agency/admin_update';
$route['admin/'.LangUtil::line("url_lang_agency").'/delete'] = 'agency/admin_delete';
$route['admin/'.LangUtil::line("url_lang_agency").'/create/(:num)'] = 'agency/admin_create/$1';
$route['admin/'.LangUtil::line("url_lang_agency").'/create'] = 'agency/admin_create';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)/(:any)-(:num)'] = 'agency/admin_view/$3';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)-(:num)'] = 'agency/admin_view/$2';
$route['admin/'.LangUtil::line("url_lang_agency").'/(:any)'] = 'agency/admin_list'; //for Tag


//Tag
$route['/(:any)'] = 'tag/user_index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */