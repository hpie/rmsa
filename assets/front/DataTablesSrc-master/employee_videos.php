<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'rmsa_youtube_video';

// Table's primary key
$primaryKey = 'rmsa_youtube_video_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'rmsa_youtube_video_id', 'dt' =>'rmsa_youtube_video_id'),
    array('db' => 'youtube_video_title', 'dt' =>'youtube_video_title'),
    array('db' => 'youtube_video_description', 'dt' =>'youtube_video_description'),
    array('db' => 'youtube_video_url', 'dt' =>'youtube_video_url'),
    array('db' => 'youtube_video_recomendation', 'dt' =>'youtube_video_recomendation'),
    array('db' => 'youtube_video_class', 'dt' =>'youtube_video_class'),
    array('db' => 'youtube_video_subject', 'dt' =>'youtube_video_subject'),
    array('db' => 'youtube_video_topic', 'dt' =>'youtube_video_topic'),
    array('db' => 'youtube_video_subtopic', 'dt' =>'youtube_video_subtopic'),
    array('db' => 'youtube_video_language', 'dt' =>'youtube_video_language'),
    array('db' => 'youtube_video_instructor', 'dt' =>'youtube_video_instructor'),
    array('db' => 'youtube_video_status', 'dt' =>'youtube_video_status')
    
);

include 'conn.php';
//// SQL server connection information
//$sql_details = array(
//    'user' => 'root',
//    'pass' => '',
//    'db' => 'rmsa',
//    'host' => 'localhost'
//);

//print_r($_REQUEST);die;
//$where='';
$rmsa_user_id=$_REQUEST['rmsa_user_id'];
$where = " rmsa_user_id ='$rmsa_user_id' ";

//if(!empty($_REQUEST['search']['value'])){
//    $value=$_REQUEST['search']['value'];
//    $where.=" AND (rsu.rmsa_user_first_name LIKE '%$value%' OR rsu.rmsa_user_gender LIKE '%$value%' OR rsu.rmsa_user_DOB LIKE '%$value%' OR rsu.rmsa_user_email_id LIKE '%$value%') ";
//}
//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::employee_videos($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


