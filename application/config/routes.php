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
|	https://codeigniter.com/userguide3/general/routing.html
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


//$route['default_controller'] = 'events';  // Default controller
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['students'] = 'students/index';
$route['students/create'] = 'students/create';
$route['users'] = 'students';

$route['edit/(:num)'] = 'students/edit/$1';
$route['delete/(:num)'] = 'students/delete/$1';


$route['teachers'] = 'teachers/index';
$route['teachers/create'] = 'teachers/create';
$route['teachers/edit/(:any)'] = 'teachers/edit/$1';
$route['teachers/delete/(:any)'] = 'teachers/delete/$1';


$route['marks'] = 'marks/index';
$route['marks/create'] = 'marks/create';
$route['marks/edit/(:any)'] = 'marks/edit/$1';
$route['marks/delete/(:any)'] = 'marks/delete/$1';




//$route['upload'] = 'UploadController/index';
// $route['upload/do_upload'] = 'UploadController/upload';



$route['upload'] = 'UploadController/index';
$route['upload/do_upload'] = 'UploadController/do_upload';

$route['event'] = 'events/index';





//$route['default_controller'] = 'company'; // Default controller
$route['company'] = 'company/index';
$route['company/create'] = 'company/create';
$route['company/store'] = 'company/store';
$route['company/edit/(:any)'] = 'company/edit/$1';
$route['company/update'] = 'company/update';
$route['company/delete/(:any)'] = 'company/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




$route['default_controller'] = 'keys';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routes for Keys
//$route['keys'] = 'keys/index';
$route['keys/create'] = 'keys/create';
$route['keys/edit/(:any)'] = 'keys/edit/$1';
$route['keys/delete/(:any)'] = 'keys/delete/$1';
$route['keys/view/(:any)'] = 'keys/view/$1';

// Routes for Values
$route['values/index/(:any)'] = 'values/index/$1';
$route['values/create/(:any)'] = 'values/create/$1';
$route['values/edit/(:any)'] = 'values/edit/$1';
$route['values/delete/(:any)'] = 'values/delete/$1';


$route['default_controller'] = 'KeyValueController';
     $route['get/(:any)'] = 'KeyValueController/get_value/$1';
     $route['set'] = 'KeyValueController/set_value';