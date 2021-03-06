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

define('FRONT_CAPTCHA_LINK',BASE_URL."/captcha");
//All uploaded file constant
define('FILE_UPDATE_LINK',BASE_URL."/update-file");
//All student constant
define('STUDENT_LOGIN_LINK',BASE_URL."/student-login");
define('STUDENT_LOGOUT_LINK',BASE_URL."/student-logout");
define('STUDENT_REGISTER_LINK',BASE_URL."/student-registration");
define('STUDENT_VIDEO_LINK',BASE_URL."/video_lessons/");
define('STUDENT_ACTIVE_EMAIL_LINK',BASE_URL."/email-verify/");

define('STUDENT_VIDEO_SEARCH_LINK',BASE_URL."/video_lessons_search");

define('STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/update-profile");
define('STUDENT_RESOURCES_LINK',BASE_URL."/student-resources");
define('IS_STUDENT_ACTIVE',BASE_URL."/is-student-active");
define('STUDENT_REPORTS',BASE_URL."/employee-reports");
define('STUDENT_ONLINE_EXAM_LINK',"http://gyanshala.hp.gov.in/pariksha/");

define('STUDENT_SCORE_LINK',BASE_URL."/student-score/");
define('STUDENT_QUIZ_RESULTS_LINK',BASE_URL."/student-attempted-quiz-list");
define('STUDENT_MY_PROFILE_LINK',BASE_URL."/student-my-profile");


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
define('RMSA_VERIFY_EMAIL',BASE_URL."/rmsa-verify-email");
define('RMSA_TEACHER_ACTIVE',BASE_URL."/rmsa-teacher-active");
define('RMSA_UNBLOCK_USER',BASE_URL."/rmsa-unblock-user");
define('RMSA_STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-student-profile/");
define('RMSA_EMPLOYEE_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-employee-profile/");
define('RMSA_TEACGER_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-teacher-profile/");
define('RMSA_FILE_ACTIVE',BASE_URL."/rmsa-file-active");
define('RMSA_REPORTS',BASE_URL."/employee-reports");
define('RMSA_ONLINE_EXAM_LINK',"http://gyanshala.hp.gov.in/pariksha");
define('RMSA_UPDATE_PROFILE_LINK',BASE_URL."/rmsa-update-profile");
define('RMSA_MY_PROFILE_LINK',BASE_URL."/rmsa-my-profile");
define('RMSA_WRONG_LOGIN_LOG_LINK',BASE_URL."/rmsa-wrong-login-log");

//All employee constant
define('EMPLOYEE_LOGIN_LINK',BASE_URL."/employee-login");
define('EMPLOYEE_LOGOUT_LINK',BASE_URL."/employee-logout");
define('EMPLOYEE_UPLOAD_FILE_LINK',BASE_URL."/employee-uploadresource");
define('EMPLOYEE_UPLOAD_CHILD_FILE_LINK',BASE_URL."/employee-uploadresource-child/");
define('EMPLOYEE_RESOURCES_LIST_LINK',BASE_URL."/employee-resources");
define('EMPLOYEE__QUIZ_RESOURCES_LIST_LINK',BASE_URL."/employee-resources-quiz/");
define('EMPLOYEE_EDIT_QUIZ_LINK',BASE_URL."/employee-edit-quiz/");
define('EMPLOYEE_CREATE_QUIZ_LINK',BASE_URL."/employee-create-quiz/");
define('EMPLOYEE_QUIZ_ACTIVE',BASE_URL."/employee-quiz-active");
define('EMPLOYEE_QUESTION_ACTIVE',BASE_URL."/employee-question-active");
define('EMPLOYEE_QUESTION_LIST_LINK',BASE_URL."/employee-quistions-list/");
define('EMPLOYEE_ADD_QUISTIONS_LINK',BASE_URL."/employee-add-quistions/");
define('EMPLOYEE_EDIT_QUISTIONS_LINK',BASE_URL."/employee-edit-quistions/");
define('EMPLOYEE_ONLINE_EXAM_LINK',"http://gyanshala.hp.gov.in/pariksha");
define('IS_EMPLOYEE_ACTIVE',BASE_URL."/is-employee-active");
define('EMPLOYEE_STUDENT_LIST_LINK',BASE_URL."/employee-student");
define('STUDENT_APPROVE',BASE_URL."/student-approve");
define('EMPLOYEE_UPDATE_PROFILE_LINK',BASE_URL."/employee-update-profile");
define('EMPLOYEE_MY_PROFILE_LINK',BASE_URL."/employee-my-profile");


define('EMPLOYEE_ADD_VIDEO_LINK',BASE_URL."/employee-add-video");
define('EMPLOYEE_EDIT_VIDEO_LINK',BASE_URL."/employee-update-video/");
define('EMPLOYEE_VIDEO_LIST_LINK',BASE_URL."/employee-videos");
define('EMPLOYEE_ACTIVE_VIDEO',BASE_URL."/video-active");


define('EMPLOYEE_FILE_ACTIVE',BASE_URL."/employee-file-active");
define('EMPLOYEE_STUDENT_UPDATE_PROFILE_LINK',BASE_URL."/employee-update-student-profile/");
define('EMPLOYEE_REPORTS',BASE_URL."/employee-reports");

// teacher
define('TEACHER_LOGIN_LINK',BASE_URL."/teacher-login");
define('TEACHER_LOGOUT_LINK',BASE_URL."/teacher-logout");
define('TEACHER_STUDENT_LIST_LINK',BASE_URL."/teacher-student");
define('TEACHER_RESOURCES_LIST_LINK',BASE_URL."/teacher-resources");
define('TEACHER_UPDATE_PROFILE_LINK',BASE_URL."/teacher-update-profile");
define('TEACHER_MY_PROFILE_LINK',BASE_URL."/teacher-my-profile");


//other constant

define('NOT_FOUND_404_LINK',BASE_URL."/404_override");
define('HOME_LINK',BASE_URL."/home");
define('LOAD_BLOCKS',BASE_URL."/load-blocks");
define('LOAD_TEHSIL',BASE_URL."/load-tehsil");
define('LOAD_SCHOOL',BASE_URL."/load-school");
define('LOAD_SCHOOL_BY_BLOCK',BASE_URL."/load-school-byblock");
define('LOAD_SCHOOL_CODE_BY_SCHOOL',BASE_URL."/load-school-code-byschool");
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

define('FORGET_PASSWORD_LINK',BASE_URL."/forget-password/");
define('CHANGE_FORGET_PASSWORD_LINK',BASE_URL."/change-forget-password/");
define('UPDATE_FORGET_PASSWORD_LINK',BASE_URL."/update-forget-password");


//define all title heare for page
define('HOME_TITLE',"Welcome to gyanshala.hp.gov.in - Home");
define('ABOUT_TITLE',"Welcome to gyanshala.hp.gov.in - About");
define('STUDENT_VIDEOS_TITLE',"Welcome to gyanshala.hp.gov.in - Videos");
define('CONTACT_US_TITLE',"Welcome to gyanshala.hp.gov.in - Contact Us");
define('ANNUAL_REPORTS_TITLE',"Welcome to gyanshala.hp.gov.in - AnnualReports");
define('CIRCULARS_TITLE',"Welcome to gyanshala.hp.gov.in - Circulars");
define('EMPLOYEE_LOGIN_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Login");
define('TEACHER_LOGIN_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Login");
define('EMPLOYEE_REGISTRATION_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Registration");
define('EMPLOYEE_STUDENT_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - EmployeeStudent");
define('EMPLOYEE_VIDEO_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - EmployeeVideos");
define('EMPLOYEE_ADD_VIDEO_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Add Video");
define('EMPLOYEE_EDIT_VIDEO_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Edit Video");
define('TEACHER_STUDENT_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - TeacherStudent");
define('EMPLOYEE_FILE_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - FileDw");
define('EMPLOYEE_FILE_LIST_QUIZ_TITLE',"Welcome to gyanshala.hp.gov.in - Files for quiz");
define('EMPLOYEE_QUIZ_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - Quiz list");
define('EMPLOYEE_QUESTIONS_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - Questions list");
define('EMPLOYEE_FILE_UPLOAD_TITLE',"Welcome to gyanshala.hp.gov.in - File Upload");
define('EMPLOYEE_STUDENT_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Student Profile");

define('EMPLOYEE_CREATE_QUIZ_TITLE',"Welcome to gyanshala.hp.gov.in - Create Quiz");

define('RMSAE_STUDENT_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - RmsaStudent");
define('RMSAE_EMPLOYEE_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - RmsaEmployee");
define('RMSAE_TEACHERS_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - RmsaTeachers");
define('RMSA_FILE_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - RmsaResource");
define('TEACHER_FILE_LIST_TITLE',"Welcome to gyanshala.hp.gov.in - TeacherResource");
define('RMSA_EMPLOYEE_REGISTRATION_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Registration");
define('RMSA_TEACHER_REGISTRATION_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Registration");
define('RMSA_STUDENT_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Student Profile");
define('RMSA_EMPLOYEE_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Employee Profile");
define('RMSA_TEACHER_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Teacher Profile");



define('RMSA_MY_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa My Profile");
define('EMPLOYEE_MY_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Employee My Profile");
define('TEACHER_MY_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher My Profile");
define('STUDENT_MY_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Student My Profile");
define('RMSA_WRONG_LOGIN_LOG_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Wrong Login Log");

define('STUDENT_REGISTRATION_TITLE',"Welcome to gyanshala.hp.gov.in - Student Registration");

define('REGISTERED_STUDENT_TITLE',"Welcome to gyanshala.hp.gov.in - Registered Students");
define('STUDENT_RESOURCES_TITLE',"Welcome to gyanshala.hp.gov.in - Student Resources");
define('STUDENT_ACTIVE_TITLE',"Welcome to gyanshala.hp.gov.in - Student Active");
define('EMPLOYEE_ACTIVE_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Active");
define('MOST_CONTENT_UPLOADED_EMPLOYEE_TITLE',"Welcome to gyanshala.hp.gov.in - Most Content Uploaded Employee");
define('MOST_CONTENT_RATED_EMPLOYEE_TITLE',"Welcome to gyanshala.hp.gov.in - Most Content Rated Employee");
define('MOST_CONTENT_VIEW_EMPLOYEE_TITLE',"Welcome to gyanshala.hp.gov.in - Most Content View Employee");
define('MOST_RATED_CONTENT_TITLE',"Welcome to gyanshala.hp.gov.in - Most Rated Content");
define('MOST_VIEWED_CONTENT_TITLE',"Welcome to gyanshala.hp.gov.in - Most Viewed Content");
define('MOST_ACTIVE_STUDENT_BY_CONTENT_READ',"Welcome to gyanshala.hp.gov.in - Most Active Student");
define('MOST_ACTIVE_STUDENT_ON_SCHOOL_TITLE',"Welcome to gyanshala.hp.gov.in - Most Active Student On School");
define('TOP_DISTRICT_WITH_MOST_CONTENT',"Welcome to gyanshala.hp.gov.in - Top District With Most Content");
define('COUNT_STUDENT_BYSCHOOL',"Welcome to gyanshala.hp.gov.in - School wise student count");
define('COUNT_STUDENT_BYDIST',"Welcome to gyanshala.hp.gov.in - Dist wise student count");
define('COUNT_STUDENT_BYBLOCK',"Welcome to gyanshala.hp.gov.in - Block wise student count");

define('STUDENT_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Student Profile");
define('EMPLOYEE_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Profile");
define('TEACHER_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Profile");
define('RMSA_PROFILE_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Profile");
define('ORGANIZATION_TITLE',"Welcome to gyanshala.hp.gov.in - Organization");
define('FILE_REVIEWS_TITLE',"Welcome to gyanshala.hp.gov.in - File Reviews");
define('RMSA_LOGIN_TITLE',"Welcome to gyanshala.hp.gov.in - Rmsa Login");
define('STUDENT_LOGIN_TITLE',"Welcome to gyanshala.hp.gov.in - Student Login");

define('REPORTS_2_TITLE',"Welcome to gyanshala.hp.gov.in - Reports");
define('REPORTS_2_UPLOADED_CONTENT_TITLE',"Welcome to gyanshala.hp.gov.in - Uploaded content Reports");
define('REPORTS_2_STUDENT_REGISTERED_TITLE',"Welcome to gyanshala.hp.gov.in - Student Registered Reports");
define('REPORTS_2_TEACHER_REGISTERED_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Registered Reports");

define('STUDENT_EXAM_TITLE',"Welcome to gyanshala.hp.gov.in - Student Exam");
define('STUDENT_EXAM_START_TITLE',"Welcome to gyanshala.hp.gov.in - Student Exam Start");
define('STUDENT_SCORE_TITLE',"Welcome to gyanshala.hp.gov.in - Student Exam Score");

define('STUDENT_ATTEMPTED_EXAM_TITLE',"Welcome to gyanshala.hp.gov.in - Student Quiz List");
define('STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE',"Welcome to gyanshala.hp.gov.in - Student My Quiz Attempt Result");

define('EMPLOYEE_STUDENT_ATTEMPTED_EXAM_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Student Quiz List");
define('EMPLOYEE_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE',"Welcome to gyanshala.hp.gov.in - Employee Student My Quiz Attempt Result");

define('TEACHER_STUDENT_ATTEMPTED_EXAM_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Student Quiz List");
define('TEACHER_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE',"Welcome to gyanshala.hp.gov.in - Teacher Student My Quiz Attempt Result");
define('FORGET_PASSWORD_TITLE',"Welcome to gyanshala.hp.gov.in - Forget Password");
define('CHANGE_FORGET_PASSWORD_TITLE',"Welcome to gyanshala.hp.gov.in - Change Forget Password");




