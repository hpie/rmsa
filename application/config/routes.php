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


$route['captcha']           = 'front/EmpLogin/recaptcha';
//all rmsa users routes
$route['rmsa-login']           = 'front/RmsaLogin';
$route['rmsa-logout']          = 'front/RmsaLogin/rmsaLogout';
$route['rmsa-student']          ='front/Rmsa/view_student';
$route['rmsa-employee']          ='front/Rmsa/view_employee';
$route['rmsa-teachers']          ='front/Rmsa/view_teachers';
$route['rmsa-resources']       = 'front/RmsaResource';
$route['rmsa-student-registration']    = 'front/Helper/create_student';
$route['rmsa-employee-active']          = 'front/Rmsa/active_employee';
$route['rmsa-student-active']          = 'front/Rmsa/active_student';
$route['rmsa-verify-email']          = 'front/Rmsa/verify_email';

$route['rmsa-teacher-active']          = 'front/Rmsa/active_teacher';
$route['rmsa-unblock-user']          = 'front/Rmsa/unblock_user';
$route['rmsa-file-active']          = 'front/Rmsa/active_file';
$route['rmsa-update-student-profile/(:any)'] = 'front/Rmsa/update_student_profile/$1';
$route['rmsa-update-employee-profile/(:any)'] = 'front/Rmsa/update_employee_profile/$1';
$route['rmsa-update-teacher-profile/(:any)'] = 'front/Rmsa/update_teacher_profile/$1';
$route['employee-registration']    = 'front/Rmsa/create_employee';
$route['teacher-registration']    = 'front/Helper/create_teacher';
$route['rmsa-update-profile']          = 'front/Rmsa/update_profile';
$route['rmsa-my-profile']          = 'front/Rmsa/profile';
$route['rmsa-wrong-login-log']       = 'front/Rmsa/wrong_login_list';

//all employee routes
//$route['employee-registration']    = 'front/EmpRegistration';
$route['employee-login']           = 'front/EmpLogin';
$route['employee-logout']          = 'front/EmpLogin/employeeLogout';
$route['employee-uploadresource']  = 'front/FileUpload';
$route['employee-uploadresource-child/(:any)'] = 'front/FileUpload/childFileUpload/$1';
$route['update-file/(:any)'] = 'front/fileDw/update_file/$1';
$route['view-file/(:any)'] = 'front/fileDw/view_file/$1';
$route['employee-resources']       = 'front/FileDw';
$route['employee-resources-quiz']       = 'front/FileDw/quiz_file_list';
$route['is-employee-active']       = 'front/EmpLogin/isActiveEmployee';
$route['employee-student']         = 'front/Employee/view_student';
$route['student-approve']          = 'front/Employee/approve_student';
$route['employee-file-active']          = 'front/Employee/active_file';
$route['employee-update-student-profile/(:any)'] = 'front/Employee/update_student_profile/$1';
$route['employee-create-quiz/(:any)'] = 'front/Employee/create_quiz/$1';
$route['employee-edit-quiz/(:any)'] = 'front/Employee/edit_quiz/$1';
$route['employee-quiz-list/(:any)'] = 'front/fileDw/quiz_list/$1';
$route['employee-quiz-active']          = 'front/Employee/active_quiz';
$route['employee-question-active']          = 'front/Employee/active_question';
$route['employee-quistions-list/(:any)'] = 'front/fileDw/questions_list/$1';


$route['employee-add-quistions/(:any)'] = 'front/Employee/add_quistions/$1';
$route['employee-edit-quistions/(:any)'] = 'front/Employee/edit_quistions/$1';

$route['employee-videos'] = 'front/Employee/view_videos';
$route['employee-add-video'] = 'front/Employee/add_videos';
$route['video-active']          = 'front/Employee/active_video';
$route['employee-update-video/(:any)'] = 'front/Employee/update_video/$1';
$route['employee-update-profile']          = 'front/Employee/update_profile';
$route['employee-my-profile']          = 'front/Employee/profile';

//all teacher routes
$route['teacher-login']           = 'front/TechLogin';
$route['teacher-logout']          = 'front/TechLogin/teacherLogout';
$route['teacher-student']         = 'front/Teacher/view_student';
$route['teacher-resources']       = 'front/TeacherResource';
$route['teacher-update-profile']          = 'front/Teacher/update_profile';
$route['teacher-my-profile']          = 'front/Teacher/profile';

//all student routes
$route['video_lessons/(:num)']    = 'front/Helper/student_videos/$1';
$route['video_lessons_search']    = 'front/Helper/video_lessons_search';
//$route['video_lessons/(:any)/(:any)/(:any)/(:any)']    = 'front/Helper/student_videos/$1/$2/$3/$4';
$route['student-registration']    = 'front/Helper/create_student';
$route['update-profile']          = 'front/Student/update_profile';
$route['student-my-profile']          = 'front/Student/profile';

$route['student-login']           = 'front/StudentLogin';
$route['email-verify/(:any)/(:any)']           = 'front/StudentLogin/verify_email/$1/$2';
$route['student-logout']          = 'front/Student/logout';
$route['is-student-active']       = 'front/Student/is_active';
$route['registered-students']     = 'front/RegisteredStudents';
$route['exam/(:any)']       = 'front/Student/exam/$1';
$route['student-exam/(:any)/(:any)/(:any)'] = 'front/Student/studentExam/$1/$2/$3';
$route['student-score/(:any)']       = 'front/Student/studentScore/$1';
$route['exam-questins/(:any)/(:any)']       = 'front/Student/question_details_all/$1/$2';

$route['student-attempted-quiz-list']       = 'front/Student/attempted_quiz_list';
$route['my-quiz-attempt-result/(:any)']       = 'front/Student/my_quiz_attempt_result/$1';

$route['employee-student-attempted-quiz-list/(:any)']       = 'front/Employee/attempted_quiz_list/$1';
$route['emp-my-quiz-attempt-result/(:any)/(:any)']       = 'front/Employee/my_quiz_attempt_result/$1/$2';

$route['teacher-student-attempted-quiz-list/(:any)']       = 'front/Teacher/attempted_quiz_list/$1';
$route['tec-my-quiz-attempt-result/(:any)/(:any)']       = 'front/Teacher/my_quiz_attempt_result/$1/$2';


//All filr resources route
$route['student-resources/(:any)']       = 'front/Resource/resources/$1';
$route['total-fileview']          = 'front/Resource/file_viewcount';
$route['post-review']             = 'front/Resource/post_review';
$route['display-review']          = 'front/Resource/display_review';
$route['display-rating']          = 'front/Resource/display_rating';
$route['file-reviews/(:any)']     = 'front/Resource/view_review/$1';
$route['comment-reply']           = 'front/Resource/comment_reply';

//helper routes
$route['load-blocks']             = 'front/helper/load_blocks';
$route['load-tehsil']             = 'front/helper/load_tehsil';
$route['load-school']             = 'front/helper/load_school';
$route['load-school-byblock']             = 'front/helper/load_school_byblock';
$route['load-school-code-byschool']             = 'front/helper/load_school_code_byschool';
$route['active-student']          = 'front/helper/total_active_students';
$route['active-employee']         = 'front/helper/total_active_employee';
$route['top-content-uploaded-employee'] = 'front/helper/top_employee_with_most_uploaded_content';
$route['top-employee-most-rated'] = 'front/helper/top_employee_with_most_rated_content';
$route['top-employee-most-viewed'] = 'front/helper/top_employee_with_most_viewed_content';
$route['most-rated-content']            = 'front/helper/most_rated_content';
$route['most-viewed-content']            = 'front/helper/most_viewed_content';
$route['most-active-student']            = 'front/helper/most_active_student_by_content_read';

$route['employee-reports/(:any)']     = 'front/helper/employee_reports/$1';
$route['employee-reports-2/(:any)/(:any)']     = 'front/helper/employee_reports_2/$1/$2';

$route['forget-password/(:any)']           = 'front/EmpLogin/forget_password/$1';
$route['change-forget-password/(:any)']           = 'front/EmpLogin/forget_password_change/$1';
$route['update-forget-password']           = 'front/EmpLogin/update_forget_password';


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