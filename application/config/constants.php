<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| Custom Constants (added by CI Bootstrap)
|--------------------------------------------------------------------------
| Constants to be used in both Frontend and other modules
|
*/
if (!(PHP_SAPI === 'cli' OR defined('STDIN')))
{           
	// Base URL with directory support
	$protocol = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'])!== 'off') ? 'https' : 'http';
	$base_url = $protocol.'://'.$_SERVER['HTTP_HOST'];
	$base_url.= dirname($_SERVER['SCRIPT_NAME']);
	define('BASE_URL', $base_url);
	
	// For API prefix in Swagger annotation (/application/modules/api/swagger/info.php)
	define('API_PROTOCOL', $protocol);
	define('API_HOST', $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']));
}

define('CI_BOOTSTRAP_REPO','https://github.com/waifung0207/ci_bootstrap_3');
define('CI_BOOTSTRAP_VERSION','Build 20170324');	// will follow semantic version (e.g. v1.x.x) after first stable launch

// Upload paths
//define('UPLOAD_COVER_PHOTO',	'assets/uploads/cover_photos');


//define all link heare for menu and other links

//All uploaded file constant
define('FILE_UPDATE_LINK',BASE_URL."/update-file");
//All student constant
define('STUDENT_LOGIN_LINK',BASE_URL."/student-login");
define('STUDENT_LOGOUT_LINK',BASE_URL."/student-logout");
define('STUDENT_REGISTER_LINK',BASE_URL."/student-registration");
define('STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/update-profile");
define('STUDENT_RESOURCES_LINK',BASE_URL."/student-resources");
define('IS_STUDENT_ACTIVE',BASE_URL."/is-student-active");
define('STUDENT_QUIZ_RESULTS_LINK',BASE_URL."/employee-resources");
define('STUDENT_REPORTS',BASE_URL."/employee-reports");
define('STUDENT_ONLINE_EXAM_LINK',"http://tcexam.hpie.in");

//All Rmsa users constant
define('RMSA_LOGIN_LINK',BASE_URL."/rmsa-login");
define('RMSA_LOGOUT_LINK',BASE_URL."/rmsa-logout");
define('RMSA_STUDENT_LIST_LINK',BASE_URL."/rmsa-student");
define('RMSA_EMPLOYEE_LIST_LINK',BASE_URL."/rmsa-employee");
define('RMSA_TEACHERS_LIST_LINK',BASE_URL."/rmsa-teachers");
define('RMSA_RESOURCES_LIST_LINK',BASE_URL."/rmsa-resources");
define('RMSA_STUDENT_REGISTER_LINK',BASE_URL."/rmsa-student-registration");
define('RMSA_EMPLOYEE_REGISTER_LINK',BASE_URL."/employee-registration");
define('RMSA_TEACHERS_REGISTER_LINK',BASE_URL."/teacher-registration");
define('RMSA_EMPLOYEE_ACTIVE',BASE_URL."/rmsa-employee-active");
define('RMSA_STUDENT_ACTIVE',BASE_URL."/rmsa-student-active");
define('RMSA_TEACHER_ACTIVE',BASE_URL."/rmsa-teacher-active");
define('RMSA_UNBLOCK_USER',BASE_URL."/rmsa-unblock-user");
define('RMSA_STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-student-profile/");
define('RMSA_EMPLOYEE_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-employee-profile/");
define('RMSA_TEACGER_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-teacher-profile/");
define('RMSA_FILE_ACTIVE',BASE_URL."/rmsa-file-active");
define('RMSA_REPORTS',BASE_URL."/employee-reports");
define('RMSA_ONLINE_EXAM_LINK',"http://tcexam.hpie.in");
define('RMSA_QUIZ_MCQ_LINK',BASE_URL."/employee-resources");

//All employee constant
define('EMPLOYEE_LOGIN_LINK',BASE_URL."/employee-login");
define('EMPLOYEE_LOGOUT_LINK',BASE_URL."/employee-logout");
define('EMPLOYEE_UPLOAD_FILE_LINK',BASE_URL."/employee-uploadresource");
define('EMPLOYEE_UPLOAD_CHILD_FILE_LINK',BASE_URL."/employee-uploadresource-child/");
define('EMPLOYEE_RESOURCES_LIST_LINK',BASE_URL."/employee-resources");
define('EMPLOYEE__QUIZ_RESOURCES_LIST_LINK',BASE_URL."/employee-resources-quiz");
define('EMPLOYEE_CREATE_QUIZ_LINK',BASE_URL."/employee-create-quiz/");
define('EMPLOYEE_QUIZ_MCQ_LINK',BASE_URL."/employee-resources");
define('EMPLOYEE_ONLINE_EXAM_LINK',"http://tcexam.hpie.in");
define('IS_EMPLOYEE_ACTIVE',BASE_URL."/is-employee-active");
define('EMPLOYEE_STUDENT_LIST_LINK',BASE_URL."/employee-student");
define('STUDENT_APPROVE',BASE_URL."/student-approve");
define('EMPLOYEE_FILE_ACTIVE',BASE_URL."/employee-file-active");
define('EMPLOYEE_STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/employee-update-student-profile/");
define('EMPLOYEE_REPORTS',BASE_URL."/employee-reports");

// teacher
define('TEACHER_LOGIN_LINK',BASE_URL."/teacher-login");
define('TEACHER_LOGOUT_LINK',BASE_URL."/teacher-logout");
define('TEACHER_STUDENT_LIST_LINK',BASE_URL."/teacher-student");
define('TEACHER_RESOURCES_LIST_LINK',BASE_URL."/teacher-resources");


//other constant
define('HOME_LINK',BASE_URL."/home");
define('LOAD_TEHSIL',BASE_URL."/load-tehsil");
define('LOAD_SCHOOL',BASE_URL."/load-school");
define('POST_REVIEW',BASE_URL."/post-review");
define('COMMENT_REPLY',BASE_URL."/comment-reply");
define('DISPLAY_REVIEW',BASE_URL."/display-review");
define('DISPLAY_RATING',BASE_URL."/display-rating");

define('FILE_VIEW_COUNT',BASE_URL."/total-fileview");
define('ACTIVE_STUDENTS',BASE_URL."/active-student");
define('ACTIVE_EMPLOYEE',BASE_URL."/active-employee");
define('ACTIVE_TEACHER',BASE_URL."/active-teacher");
define('MOST_CONTENT_UPLOADED_EMPLOYEE',BASE_URL."/top-content-uploaded-employee");
define('MOST_RATED_UPLOADED_EMPLOYEE',BASE_URL."/top-employee-most-rated");
define('MOST_VIEW_CONTENT_EMPLOYEE',BASE_URL."/top-employee-most-viewed");
define('MOST_RATED_CONTENT',BASE_URL."/most-rated-content");
define('MOST_VIEWED_CONTENT',BASE_URL."/most-viewed-content");
define('MOST_ACTIVE_STUDENT',BASE_URL."/most-active-student");

define('EMPLOYEE_REPORTS',BASE_URL."/employee-reports");
define('EMPLOYEE_REPORTS_2',BASE_URL."/employee-reports-2");




//define all title heare for page
define('HOME_TITLE',"Welcome to rmsahimachal.nic.in - Home");
define('ABOUT_TITLE',"Welcome to rmsahimachal.nic.in - About");
define('CONTACT_US_TITLE',"Welcome to rmsahimachal.nic.in - Contact Us");
define('ANNUAL_REPORTS_TITLE',"Welcome to rmsahimachal.nic.in - AnnualReports");
define('CIRCULARS_TITLE',"Welcome to rmsahimachal.nic.in - Circulars");
define('EMPLOYEE_LOGIN_TITLE',"Welcome to rmsahimachal.nic.in - Employee Login");
define('TEACHER_LOGIN_TITLE',"Welcome to rmsahimachal.nic.in - Teacher Login");
define('EMPLOYEE_REGISTRATION_TITLE',"Welcome to rmsahimachal.nic.in - Employee Registration");
define('EMPLOYEE_STUDENT_LIST_TITLE',"Welcome to rmsahimachal.nic.in - EmployeeStudent");
define('TEACHER_STUDENT_LIST_TITLE',"Welcome to rmsahimachal.nic.in - TeacherStudent");
define('EMPLOYEE_FILE_LIST_TITLE',"Welcome to rmsahimachal.nic.in - FileDw");
define('EMPLOYEE_FILE_LIST_QUIZ_TITLE',"Welcome to rmsahimachal.nic.in - Files for quiz");
define('EMPLOYEE_QUIZ_LIST_TITLE',"Welcome to rmsahimachal.nic.in - Quiz list");
define('EMPLOYEE_FILE_UPLOAD_TITLE',"Welcome to rmsahimachal.nic.in - File Upload"); 
define('EMPLOYEE_STUDENT_PROFILE_TITLE',"Welcome to rmsahimachal.nic.in - Employee Student Profile");

define('EMPLOYEE_CREATE_QUIZ_TITLE',"Welcome to rmsahimachal.nic.in - Create Quiz");

define('RMSAE_STUDENT_LIST_TITLE',"Welcome to rmsahimachal.nic.in - RmsaStudent");
define('RMSAE_EMPLOYEE_LIST_TITLE',"Welcome to rmsahimachal.nic.in - RmsaEmployee");
define('RMSAE_TEACHERS_LIST_TITLE',"Welcome to rmsahimachal.nic.in - RmsaTeachers");
define('RMSA_FILE_LIST_TITLE',"Welcome to rmsahimachal.nic.in - RmsaResource");
define('TEACHER_FILE_LIST_TITLE',"Welcome to rmsahimachal.nic.in - TeacherResource");
define('RMSA_EMPLOYEE_REGISTRATION_TITLE',"Welcome to rmsahimachal.nic.in - Employee Registration");
define('RMSA_TEACHER_REGISTRATION_TITLE',"Welcome to rmsahimachal.nic.in - Teacher Registration");
define('RMSA_STUDENT_PROFILE_TITLE',"Welcome to rmsahimachal.nic.in - Rmsa Student Profile");
define('RMSA_EMPLOYEE_PROFILE_TITLE',"Welcome to rmsahimachal.nic.in - Rmsa Employee Profile");
define('RMSA_TEACHER_PROFILE_TITLE',"Welcome to rmsahimachal.nic.in - Rmsa Teacher Profile");

define('STUDENT_REGISTRATION_TITLE',"Welcome to rmsahimachal.nic.in - Student Registration");

define('REGISTERED_STUDENT_TITLE',"Welcome to rmsahimachal.nic.in - Registered Students");
define('STUDENT_RESOURCES_TITLE',"Welcome to rmsahimachal.nic.in - Student Resources");
define('STUDENT_ACTIVE_TITLE',"Welcome to rmsahimachal.nic.in - Student Active");
define('EMPLOYEE_ACTIVE_TITLE',"Welcome to rmsahimachal.nic.in - Employee Active");
define('MOST_CONTENT_UPLOADED_EMPLOYEE_TITLE',"Welcome to rmsahimachal.nic.in - Most Content Uploaded Employee");
define('MOST_CONTENT_RATED_EMPLOYEE_TITLE',"Welcome to rmsahimachal.nic.in - Most Content Rated Employee");
define('MOST_CONTENT_VIEW_EMPLOYEE_TITLE',"Welcome to rmsahimachal.nic.in - Most Content View Employee");
define('MOST_RATED_CONTENT_TITLE',"Welcome to rmsahimachal.nic.in - Most Rated Content");
define('MOST_VIEWED_CONTENT_TITLE',"Welcome to rmsahimachal.nic.in - Most Viewed Content");
define('MOST_ACTIVE_STUDENT_BY_CONTENT_READ',"Welcome to rmsahimachal.nic.in - Most Active Student");
define('MOST_ACTIVE_STUDENT_ON_SCHOOL_TITLE',"Welcome to rmsahimachal.nic.in - Most Active Student On School");
define('TOP_DISTRICT_WITH_MOST_CONTENT',"Welcome to rmsahimachal.nic.in - Top District With Most Content");
define('STUDENT_PROFILE_TITLE',"Welcome to rmsahimachal.nic.in - Student Profile");
define('ORGANIZATION_TITLE',"Welcome to rmsahimachal.nic.in - Organization");
define('FILE_REVIEWS_TITLE',"Welcome to rmsahimachal.nic.in - File Reviews");
define('RMSA_LOGIN_TITLE',"Welcome to rmsahimachal.nic.in - Rmsa Login");
define('STUDENT_LOGIN_TITLE',"Welcome to rmsahimachal.nic.in - Student Login");

define('REPORTS_2_TITLE',"Welcome to rmsahimachal.nic.in - Reports");
define('REPORTS_2_UPLOADED_CONTENT_TITLE',"Welcome to rmsahimachal.nic.in - Uploaded content Reports");
define('REPORTS_2_STUDENT_REGISTERED_TITLE',"Welcome to rmsahimachal.nic.in - Student Registered Reports");
define('REPORTS_2_TEACHER_REGISTERED_TITLE',"Welcome to rmsahimachal.nic.in - Teacher Registered Reports");




