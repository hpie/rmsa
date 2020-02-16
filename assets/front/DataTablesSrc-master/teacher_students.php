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
$table = 'rmsa_student_users rsu';

// Table's primary key
$primaryKey = 'rsu.rmsa_user_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'rsu.rmsa_user_id', 'dt' =>'rmsa_user_id'),
    array('db' => 'rsu.rmsa_school_id', 'dt' =>'rmsa_user_id'),
    array('db' => 'rsu.rmsa_user_first_name', 'dt' => 'rmsa_user_first_name'),
    array('db' => 'rsu.rmsa_user_gender', 'dt' =>'rmsa_user_gender'),
    array('db' => 'rsu.rmsa_user_DOB', 'dt' =>'rmsa_user_DOB'),
    array('db' => 'rsu.rmsa_user_email_id', 'dt' =>'rmsa_user_email_id'),
    array('db' => 'rsu.rmsa_user_status', 'dt' =>'rmsa_user_status'),
    array('db' => 'rs.rmsa_school_title', 'dt' =>'rmsa_school_title'),
    array('db' => 'rd.rmsa_district_name', 'dt' =>'rmsa_district_name')
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
$school_id=$_REQUEST['rmsa_school_id'];
$where = " rsu.rmsa_school_id ='$school_id' ";

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
    SSP::simple($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);

