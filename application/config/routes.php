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
$route['default_controller'] = 'auth/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//view routes

// |=== Karyawan Routes
$route['karyawan'] = 'globalcontroller/index'; // Views for dashboard anon users
$route['karyawan/add'] = 'globalcontroller/addData'; // Views add karyawan
// $route['karyawan/edit/(:num)'] = 'globalcontroller/editdata/$1';//Views edit
$route['karyawan/detail/(:num)'] = 'globalcontroller/detailsView/$1'; //View details

// |=== Dept Routes
$route['department'] = 'globalcontroller/deptView'; //Views add dept

// |=== Registration Routes
$route['register'] = 'auth/registerView'; //views register

// |=== Profile Routes
$route['profile/changepfp/(:num)'] = 'globalcontroller/profile/$1';


//action routes
// |=== Auth Routes
$route['login'] = 'auth/login'; // login action
$route['logout'] = 'auth/logout'; // logout action
$route['register/submit'] = 'auth/register'; // register action
$routes ['karyawan/details/(:num)'] = 'globalcontroller/editdata/$1';



// |=== Karyawan Routes
$route['karyawan/insert'] = 'globalcontroller/insertdata'; // action add
$route['karyawan/delete/(:num)'] = 'globalcontroller/deleteData/$1'; //action delete
$route['karyawan/edit/(:num)'] = 'globalcontroller/editdata/$1'; //Retrieve and action edit

// |=== Dept Routes
$route['department/add'] = 'globalcontroller/adddept';

// change pfp
$route['profile/changepfp/(:num)/edit'] = 'globalcontroller/mediaupload/$1'; // action change



