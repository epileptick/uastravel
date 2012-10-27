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


//location
$route['admin/'.LangUtil::line("url_lang_location")] = 'location/index';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/read/$3';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/read/$2';
$route['admin/'.LangUtil::line("url_lang_location").'/(:any)'] = 'location/index'; //for Tag
$route['admin/'.LangUtil::line("url_lang_location")] = 'location/index';

$route[LangUtil::line("url_lang_location")] = 'location/user_index';
$route[LangUtil::line("url_lang_location").'/(:any)/(:any)-(:num)'] = 'location/user_read/$3';
$route[LangUtil::line("url_lang_location").'/(:any)-(:num)'] = 'location/user_read/$2';
$route[LangUtil::line("url_lang_location").'/(:any)'] = 'location/user_index'; //for Tag
$route[LangUtil::line("url_lang_location")] = 'location/user_index';


//tour
$route['admin/'.LangUtil::line("url_lang_tour")] = 'tour/index';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)/(:any)-(:num)'] = 'tour/read/$3';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/read/$2';
$route['admin/'.LangUtil::line("url_lang_tour").'/(:any)'] = 'tour/index'; //for Tag
$route['admin/'.LangUtil::line("url_lang_tour")] = 'tour/index';

$route[LangUtil::line("url_lang_tour")] = 'tour/user_index';
$route[LangUtil::line("url_lang_tour").'/(:any)/(:any)-(:num)'] = 'tour/user_read/$3';
$route[LangUtil::line("url_lang_tour").'/(:any)-(:num)'] = 'tour/user_read/$2';
$route[LangUtil::line("url_lang_tour").'/(:any)'] = 'tour/user_index'; //for Tag
$route[LangUtil::line("url_lang_tour")] = 'tour/user_index';


//Tag
$route['admin/(:any)'] = 'tag/index/$1';

$route['/(:any)'] = 'tag/user_index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */