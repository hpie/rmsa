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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Added by CI Bootstrap 3
| Multilingual routing (use 2 characters (e.g. en, zh, cn, es) for switching languages)
| -------------------------------------------------------------------------
*/
$route['^(\w{2})/(.*)$'] = '$2';
$route['^(\w{2})$'] = $route['default_controller'];

/*
| -------------------------------------------------------------------------
| Added by CI Bootstrap 3
| Additional routes on top of codeigniter-restserver
| -------------------------------------------------------------------------
| Examples from rule: "api/(:any)/(:num)"
|	- [GET]		/api/users/1 ==> Users Controller's id_get($id)
|	- [POST]	/api/users/1 ==> Users Controller's id_post($id)
|	- [PUT]		/api/users/1 ==> Users Controller's id_put($id)
|	- [DELETE]	/api/users/1 ==> Users Controller's id_delete($id)
| 
| Examples from rule: "api/(:any)/(:num)/(:any)"
|	- [GET]		/api/users/1/subitem ==> Users Controller's subitem_get($parent_id)
|	- [POST]	/api/users/1/subitem ==> Users Controller's subitem_post($parent_id)
|	- [PUT]		/api/users/1/subitem ==> Users Controller's subitem_put($parent_id)
|	- [DELETE]	/api/users/1/subitem ==> Users Controller's subitem_delete($parent_id)
*/
$route['api/(:any)/(:num)']				= 'api/$1/id/$2';
$route['api/(:any)/(:num)/(:any)']		= 'api/$1/$3/$2';

/*
| -------------------------------------------------------------------------
| Added by CI Bootstrap 3
| Uncomment these if require API versioning (by module name like api_v1)
| -------------------------------------------------------------------------
*/
/*
$route['api/v1']						= "api_v1";
$route['api/v1/(:any)']					= "api_v1/$1";
$route['api/v1/(:any)/(:num)']			= "api_v1/$1/id/$2";
$route['api/v1/(:any)/(:num)/(:any)']	= "api_v1/$1/$3/$2";
$route['api/v1/(:any)/(:any)']			= "api_v1/$1/$2";
*/


//all employee routes
$route['employee-registration']    = 'front/EmpRegistration';
$route['employee-login']           = 'front/EmpLogin';
$route['employee-logout']          = 'front/EmpLogin/employeeLogout';
$route['employee-uploadresource']  = 'front/FileUpload';
$route['employee-uploadresource-child/(:any)'] = 'front/FileUpload/childFileUpload/$1';
$route['employee-resources']       = 'front/FileDw';
$route['is-employee-active']       = 'front/EmpLogin/isActiveEmployee';
$route['employee-student']         = 'front/EmployeeStudent';
$route['student-approve']          = 'front/EmployeeStudent/approve';


//all student routes
$route['student-registration']    = 'front/StudentRegistration';
$route['update-profile']          = 'front/Student/update_profile';
$route['student-login']           = 'front/StudentLogin';
$route['student-logout']          = 'front/Student/logout';
$route['is-student-active']       = 'front/Student/is_active';
$route['registered-students']     = 'front/RegisteredStudents';


//All filr resources route
$route['student-resources']       = 'front/Resource/resources';
$route['total-fileview']          = 'front/Resource/file_viewcount';
$route['post-review']             = 'front/Resource/post_review';
$route['display-review']          = 'front/Resource/display_review';
$route['display-rating']          = 'front/Resource/display_rating';
$route['file-reviews/(:any)']     = 'front/Resource/view_review/$1';
$route['comment-reply']           = 'front/Resource/comment_reply';

//helper routes
$route['load-tehsil']             = 'front/helper/load_tehsil';
$route['load-school']             = 'front/helper/load_school';



//others routes
$route['circulars']              = 'front/Circulars';
$route['annual-Reports']         = 'front/AnnualReports';
$route['contact-us']             = 'front/ContactUs';
$route['home']                   = 'front/Home';
$route['about-us']               = 'front/About';
$route['organization']           = 'front/Organization';
//$route['file-dw']='front/FileDw';
//$route['file-upload']='front/FileUpload';
//$route['file-dw-data']='front/FileDw/FileDwData';