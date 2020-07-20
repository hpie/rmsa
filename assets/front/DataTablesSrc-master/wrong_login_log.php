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
$table = 'wrong_login_log';

// Table's primary key
$primaryKey = 'id ';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'id ', 'dt' =>'id'),
    array('db' => 'username', 'dt' => 'username'),
    array('db' => 'password', 'dt' => 'password'),
    array('db' => 'ip_address', 'dt' =>'ip_address'),
    array('db' => 'user_type', 'dt' =>'user_type'),
    array('db' => 'created_dt', 'dt' =>'created_dt')
);

include 'conn.php';
//// SQL server connection information
//$sql_details = array(
//    'user' => 'root',
//    'pass' => '',
//    'db' => 'rmsa',
//    'host' => 'localhost'
//);

//$where = 'rmsa_school_id = '.$_REQUEST['rmsa_school_id']; 
//if(!empty($_REQUEST['search']['value'])){
//    $value=$_REQUEST['search']['value'];
//    $where.=" AND (rmsa_user_first_name LIKE '%$value%' OR rmsa_user_gender LIKE '%$value%' OR rmsa_user_DOB LIKE '%$value%' OR rmsa_user_email_id LIKE '%$value%') ";
//}
//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::wrong_login_list($_REQUEST, $sql_details, $table, $primaryKey, $columns)
);


