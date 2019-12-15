<?php
if($_SERVER['HTTP_HOST']=='localhost'){
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASE','rmsa');
}
else{
    define('USERNAME','s7hpiein_rmsauser');
    define('PASSWORD','Hp!#Rm%aD*');
    define('DATABASE','s7hpiein_rmsa');
}
$options = array(
    'db_host' => 'localhost',
    'db_user' => USERNAME,
    'db_pass' => PASSWORD,
    'db_name' => DATABASE,
    'db_table' => 'rmsa_uploaded_files'
);

