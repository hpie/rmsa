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
$table = 'rmsa_student_users';

// Table's primary key
$primaryKey = 'rmsa_user_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'rmsa_user_id', 'dt' =>'rmsa_user_id'),
    array('db' => 'rmsa_user_first_name', 'dt' => 'rmsa_user_first_name'),
    array('db' => 'rmsa_user_gender', 'dt' =>'rmsa_user_gender'),
    array('db' => 'rmsa_user_DOB', 'dt' =>'rmsa_user_DOB'),
    array('db' => 'rmsa_user_email_id', 'dt' =>'rmsa_user_email_id')
);
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'rmsa',
    'host' => 'localhost'
);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);

