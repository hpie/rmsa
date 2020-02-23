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

$table = 'quiz';
// Table's primary key
$primaryKey = 'quiz_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(      
    array('db' => 'quiz_id', 'dt' =>'quiz_id'),
    array('db' => 'quiz_title', 'dt' =>'quiz_title'),
    array('db' => 'quiz_min_questions', 'dt' =>'quiz_min_questions'),
    array('db' => 'quiz_pass_score', 'dt' => 'quiz_pass_score'),
    array('db' => 'quiz_status', 'dt' =>'quiz_status')
);
include 'conn.php';

$emp_rmsa_user_id = $_REQUEST['emp_rmsa_user_id'];
$where=" rmsa_employee_users_id=$emp_rmsa_user_id ";


//if(!empty($_REQUEST['search']['value'])){
//    $value=$_REQUEST['search']['value'];
//    $where.=" AND (uploaded_file_title LIKE '%$value%' OR uploaded_file_type LIKE '%$value%' OR uploaded_file_category LIKE '%$value%' OR uploaded_file_desc LIKE '%$value%' OR uploaded_file_group LIKE '%$value%') ";
//}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require('ssp.class.php');
echo json_encode(
       SSP::emp_quiz_list($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where,$emp_rmsa_user_id)
);


