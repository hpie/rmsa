<?php
/*
 * Helper functions for building a DataTables server-side processing SQL query
 *
 * The static functions in this class are just helper functions to help build
 * the SQL used in the DataTables demo server-side processing scripts. These
 * functions obviously do not represent all that can be done with server-side
 * processing, they are intentionally simple to show how it works. More complex
 * server-side processing operations will likely require a custom script.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
//$protocol = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'])!== 'off') ? 'https' : 'http';
//$base_url = $protocol.'://'.$_SERVER['HTTP_HOST'];
$base_url= $_SERVER['SERVER_NAME'];
$url='';
if($base_url=='localhost'){
    $url.='/rmsa';
}
define('IMG_URL',$url); 
$protocol = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'])!== 'off') ? 'https' : 'http';
$r = $_SERVER['SCRIPT_NAME'];
$subdomain = explode('/', $r);
array_pop($subdomain);
$urllink=$protocol.'://'.$_SERVER['HTTP_HOST'];
if($urllink=="https://localhost" || $urllink=="http://localhost"){  
    $urllink.='/rmsa';
}
define('BASE_URL', $urllink);
$filepath="/assets/front/fileupload/server/php/files";
define('FILE_URL', $filepath);
//define('BASE_URL', $url);
// REMOVE THIS BLOCK - used for DataTables test environment only!
$file = $_SERVER['DOCUMENT_ROOT'].'/datatables/pdo.php';
if ( is_file( $file ) ) {
	include( $file );
}
class SSP {
	/**
	 * Create the data output array for the DataTables rows
	 *
	 *  @param  array $columns Column information array
	 *  @param  array $data    Data from the SQL get
	 *  @return array          Formatted data in a row based format
	 */
    
        static function data_output($columns, $data) {
//      print_r($columns);die;
        $out = array();
        for ($i = 0, $ien = count($data); $i < $ien; $i++) {
            $row = array();
            for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
                $column = $columns[$j];
                // Is there a formatter?
                if (isset($column['formatter'])) {
                    $row[$column['dt']] = $column['formatter']($data[$i][$column['db']], $data[$i]);
                } else {                  
                    $row[$column['dt']] = $data[$i][$columns[$j]['dt']];
                }
            }
            $out[] = $row;
        }
        return $out;
    }
    
    
//	static function data_output ( $columns, $data )
//	{
//		$out = array();
//		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
//			$row = array();
//			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
//				$column = $columns[$j];
//				// Is there a formatter?
//				if ( isset( $column['formatter'] ) ) {
//					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
//				}
//				else {
//					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
//				}
//			}
//			$out[] = $row;
//		}
//		return $out;
//	}
	/**
	 * Database connection
	 *
	 * Obtain an PHP PDO connection from a connection details array
	 *
	 *  @param  array $conn SQL connection details. The array should have
	 *    the following properties
	 *     * host - host name
	 *     * db   - database name
	 *     * user - user name
	 *     * pass - user password
	 *  @return resource PDO connection
	 */
	static function db ( $conn )
	{
		if ( is_array( $conn ) ) {
			return self::sql_connect( $conn );
		}
		return $conn;
	}
	/**
	 * Paging
	 *
	 * Construct the LIMIT clause for server-side processing SQL query
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @return string SQL limit clause
	 */
	static function limit ( $request, $columns )
	{
		$limit = '';
		if ( isset($request['start']) && $request['length'] != -1 ) {
			$limit = "LIMIT ".intval($request['start']).", ".intval($request['length']);
		}
		return $limit;
	}
	/**
	 * Ordering
	 *
	 * Construct the ORDER BY clause for server-side processing SQL query
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @return string SQL order by clause
	 */
	static function order ( $request, $columns )
	{
		$order = '';
		if ( isset($request['order']) && count($request['order']) ) {
			$orderBy = array();
			$dtColumns = self::pluck( $columns, 'dt' );
			for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
				// Convert the column index into the column data property
				$columnIdx = intval($request['order'][$i]['column']);
				$requestColumn = $request['columns'][$columnIdx];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				if ( $requestColumn['orderable'] == 'true' ) {
					$dir = $request['order'][$i]['dir'] === 'asc' ?
						'ASC' :
						'DESC';
					$orderBy[] = ''.$column['db'].' '.$dir;
				}
			}
			if ( count( $orderBy ) ) {
				$order = 'ORDER BY '.implode(', ', $orderBy);
			}
		}
		return $order;
	}
	/**
	 * Searching / Filtering
	 *
	 * Construct the WHERE clause for server-side processing SQL query.
	 *
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here performance on large
	 * databases would be very poor
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @param  array $bindings Array of values for PDO bindings, used in the
	 *    sql_exec() function
	 *  @return string SQL where clause
	 */
	static function filter ( $request, $columns, &$bindings )
	{
		$globalSearch = array();
		$columnSearch = array();
		$dtColumns = self::pluck( $columns, 'dt' );
		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];
			for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				if ( $requestColumn['searchable'] == 'true' ) {
					$binding = self::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$globalSearch[] = "".$column['db']." LIKE ".$binding;
				}
			}
		}
		// Individual column filtering
		if ( isset( $request['columns'] ) ) {
			for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				$str = $requestColumn['search']['value'];
				if ( $requestColumn['searchable'] == 'true' &&
				 $str != '' ) {
					$binding = self::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$columnSearch[] = "".$column['db']." LIKE ".$binding;
				}
			}
		}
		// Combine the filters into a single string
		$where = '';
		if ( count( $globalSearch ) ) {
			$where = '('.implode(' OR ', $globalSearch).')';
		}
		if ( count( $columnSearch ) ) {
			$where = $where === '' ?
				implode(' AND ', $columnSearch) :
				$where .' AND '. implode(' AND ', $columnSearch);
		}
		if ( $where !== '' ) {
			$where = 'WHERE '.$where;
		}
		return $where;
	}
	/**
	 * Perform the SQL queries needed for an server-side processing requested,
	 * utilising the helper functions of this class, limit(), order() and
	 * filter() among others. The returned array is ready to be encoded as JSON
	 * in response to an SSP request, or can be modified if needed before
	 * sending back to the client.
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array|PDO $conn PDO connection resource or connection parameters array
	 *  @param  string $table SQL table to query
	 *  @param  string $primaryKey Primary key of the table
	 *  @param  array $columns Column information array
	 *  @return array          Server-side processing response array
	 */
	static function simple ( $request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
        if ($where_custom) {
            if ($where) {
                $where .= ' AND ' . $where_custom;
            } else {
                $where .= 'WHERE ' . $where_custom;
            }
        }   
//        echo 'hi';die;
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id                             
			 $where
			 $order
			 $limit"
		);                                                             
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id                         
			 $where "
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id
                         $where "
		);
		$recordsTotal = $resTotalLength[0][0];

        $result=self::data_output($columns,$data);

        $resData=array();

        if(!empty($result)){
            foreach ($result as $row){
                $stud_id=$row['rmsa_user_id'];                
                $title = 'Click to deactivate student';
                $class = 'btn_approve_reject btn btn-success btn-xs';
                $text = 'Active';
                $isactive = 1;

                if($row['rmsa_user_status'] == 'REMOVED'){
                    $title = 'Click to active student';
                    $class = 'btn_approve_reject btn btn-danger btn-xs';
                    $text  = 'Inactive';
                    $isactive = 0;
                }                
                $row['rmsa_user_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                $row['rmsa_user_edit'] = "<a href='".BASE_URL."/employee-update-student-profile/$stud_id' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";
                $row['index']='';
                array_push($resData, $row); 
            }
        }
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}  
        
        
        static function employee_videos ( $request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
        if ($where_custom) {
            if ($where) {
                $where .= ' AND ' . $where_custom;
            } else {
                $where .= 'WHERE ' . $where_custom;
            }
        }   
//        echo 'hi';die;
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table                                                   
			 $where
			 $order
			 $limit"
		);                                                             
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table                                               
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			FROM   $table
                        $where     
                        "
		);
		$recordsTotal = $resTotalLength[0][0];

        $result=self::data_output($columns,$data);

        $resData=array();

        if(!empty($result)){
            foreach ($result as $row){
                $video_id=$row['rmsa_youtube_video_id'];                
                $title = 'Click to deactivate video';
                $class = 'btn_approve_reject btn btn-success btn-xs';
                $text = 'Active';
                $isactive = 1;

                if($row['youtube_video_status'] == 'REMOVED'){
                    $title = 'Click to active video';
                    $class = 'btn_approve_reject btn btn-danger btn-xs';
                    $text  = 'Inactive';
                    $isactive = 0;
                }                
                $row['youtube_video_status'] = "<button type='button' data-id='".$row['rmsa_youtube_video_id']."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                $row['rmsa_video_edit'] = "<a href='".BASE_URL."/employee-update-video/$video_id' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";
                $row['index']='';
                array_push($resData, $row); 
            }
        }
//        print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}  
        
        static function rmsa_student_list ( $request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
        if ($where_custom) {
            if ($where) {
                $where .= ' AND ' . $where_custom;
            } else {
                $where .= 'WHERE ' . $where_custom;
            }
        }       
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id                         
			 $where
			 $order
			 $limit"
		);                                                             
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			FROM   $table 
                        INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id                         
			$where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			FROM   $table
                        INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=rsu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=rsu.rmsa_district_id 
                        $where "
		);
		$recordsTotal = $resTotalLength[0][0];

        $result=self::data_output($columns,$data);

        $resData=array();

        if(!empty($result)){
            foreach ($result as $row){
                $stud_id=$row['rmsa_user_id'];  
                $title = 'Click to deactivate student';
                $class = 'btn_approve_reject btn btn-success btn-xs';
                $text = 'Active';
                $isactive = 1;
                if($row['rmsa_user_status'] == 'REMOVED'){
                    $title = 'Click to active student';
                    $class = 'btn_approve_reject btn btn-danger btn-xs';
                    $text  = 'Inactive';
                    $isactive = 0;
                }                
                $row['rmsa_user_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                
                               
                if($row['rmsa_user_email_verified_status'] == '0'){
                    $title = 'Click to Verify Email';
                    $class = 'btn_approve_email btn btn-danger btn-xs';
                    $text  = 'Verify';
                    $isactive = 0;
                    $row['rmsa_user_email_verified_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-value='rmsa_student_users'  data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                } 
                else{
                    $row['rmsa_user_email_verified_status'] = "Email verified";
                }
                
                
                
                $row['rmsa_user_block']="None";
                if($row['rmsa_user_locked_status']==1 || $row['rmsa_user_attempt']>=3){
                    $row['rmsa_user_block']="<button type='button' data-id='".$row['rmsa_user_id']."' data-status='rmsa_student_users' title='Click to unblock' class='btn_unblock btn btn-danger btn-xs'>Unblock</button>";
                }
                
                $row['rmsa_user_edit'] = "<a href='".BASE_URL."/rmsa-update-student-profile/$stud_id' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";
                $row['index']='';
                array_push($resData, $row); 
            }
        }
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	} 
        
        static function rmsa_employee_list ( $request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }       
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
			 $where
			 $order
			 $limit"
		);                                                             
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
                         $where "                        
		);
		$recordsTotal = $resTotalLength[0][0];

        $result=self::data_output($columns,$data);

        $resData=array();

        if(!empty($result)){
            foreach ($result as $row){
                $stud_id=$row['rmsa_user_id']; 
                $title = 'Click to deactivate employee';
                $class = 'btn_approve_reject btn btn-success btn-xs';
                $text = 'Active';
                $isactive = 1;
                if($row['rmsa_user_status'] == 'REMOVED'){
                    $title = 'Click to active employee';
                    $class = 'btn_approve_reject btn btn-danger btn-xs';
                    $text  = 'Inactive';
                    $isactive = 0; 
                }                
                $row['rmsa_user_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                
                
                if($row['rmsa_user_email_verified_status'] == '0'){
                    $title = 'Click to Verify Email';
                    $class = 'btn_approve_email btn btn-danger btn-xs';
                    $text  = 'Verify';
                    $isactive = 0;
                    $row['rmsa_user_email_verified_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-value='rmsa_employee_users' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                } 
                else{
                    $row['rmsa_user_email_verified_status'] = "Email verified";
                }
                
                
                $row['rmsa_user_block']="None";
                if($row['rmsa_user_locked_status']==1 || $row['rmsa_user_attempt']>=3){
                    $row['rmsa_user_block']="<button type='button' data-id='".$row['rmsa_user_id']."' data-status='rmsa_employee_users' title='Click to unblock' class='btn_unblock btn btn-danger btn-xs'>Unblock</button>";
                }
                
                $row['rmsa_user_edit'] = "<a href='".BASE_URL."/rmsa-update-employee-profile/$stud_id' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";
                $row['index']='';
                array_push($resData, $row); 
            }
        }
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}         
        
        static function rmsa_teachers_list ( $request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }       
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
			 $where
			 $order
			 $limit"
		);                                                             
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                             INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
                         INNER JOIN rmsa_schools rs
                         ON rs.rmsa_school_id=reu.rmsa_school_id
                         INNER JOIN rmsa_districts rd
                         ON rd.rmsa_district_id=reu.rmsa_district_id 
                         $where "                        
		);
		$recordsTotal = $resTotalLength[0][0];

        $result=self::data_output($columns,$data);

        $resData=array();

        if(!empty($result)){
            foreach ($result as $row){
                $stud_id=$row['rmsa_user_id']; 
                $title = 'Click to deactivate employee';
                $class = 'btn_approve_reject btn btn-success btn-xs';
                $text = 'Active';
                $isactive = 1;
                if($row['rmsa_user_status'] == 'REMOVED'){
                    $title = 'Click to active employee';
                    $class = 'btn_approve_reject btn btn-danger btn-xs';
                    $text  = 'Inactive';
                    $isactive = 0; 
                }                
                $row['rmsa_user_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                
                $row['rmsa_user_block']="None";
                if($row['rmsa_user_locked_status']==1 || $row['rmsa_user_attempt']>=3){
                    $row['rmsa_user_block']="<button type='button' data-id='".$row['rmsa_user_id']."' data-status='rmsa_teacher_users' title='Click to unblock' class='btn_unblock btn btn-danger btn-xs'>Unblock</button>";
                }
                
                if($row['rmsa_user_email_verified_status'] == '0'){
                    $title = 'Click to Verify Email';
                    $class = 'btn_approve_email btn btn-danger btn-xs';
                    $text  = 'Verify';
                    $isactive = 0;
                    $row['rmsa_user_email_verified_status'] = "<button type='button' data-id='".$row['rmsa_user_id']."' data-value='rmsa_teacher_users' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";
                } 
                else{
                    $row['rmsa_user_email_verified_status'] = "Email verified";
                }
                
                
                
                $row['rmsa_user_edit'] = "<a href='".BASE_URL."/rmsa-update-teacher-profile/$stud_id' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";
                $row['index']='';
                array_push($resData, $row); 
            }
        }
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}         
        static function emp_file_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '',$emp_rmsa_user_id)
	{                         
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }
//                echo $where;die;
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 		
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			FROM   $table
                        $where    
                        "
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){                    
                    foreach ($result as $row){                           
                        if(!empty($request['uploaded_file_tag'])){                           
                            if(!empty($row['uploaded_file_volroot'])){                               
                                $volrootid=$row['uploaded_file_volroot'];     
                                
                                $data = self::sql_exec( $db, $bindings,
                                        "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                         FROM rmsa_uploaded_files
                                         WHERE rmsa_uploaded_file_id = '$volrootid'
                                        "
                                ); 
                                $row=$data[0];                               
                            }
                        }
                        
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];
                        $reviews = self::sql_exec( $db,
                            "SELECT AVG(rmsa_file_rating) as overall_rating FROM rmsa_file_reviews
                                    WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}' AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
                        $star = '';
                        if(count($reviews)){
                            $rating = $reviews[0]['overall_rating'];
                            $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
                            for ($x = 0; $x < 5; $x++) {
                                if (floor($starNumber)-$x >= 1) {
                                    $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                                }
                                elseif ($starNumber-$x > 0) {
                                    $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                                }
                                else {
                                    $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                                }
                            }
                        }
                        else{
                            for ($x = 0; $x < 5; $x++) {
                                $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                            }
                        }
                        //get number of student view count
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                                                 
                        $title = 'Click to deactivate file';
                        $class = 'btn_approve_reject btn btn-success btn-xs';
                        $text = 'Active';
                        $isactive = 1;
                        if($row['uploaded_file_status'] == 'REMOVED'){
                            $title = 'Click to active file';
                            $class = 'btn_approve_reject btn btn-danger btn-xs';
                            $text  = 'Inactive';
                            $isactive = 0; 
                        }                
                        $row['uploaded_file_status'] = "<button type='button' data-id='".$rmsa_file_id."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";                        
                        
                        $student_view_count = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}'");
                        $total_student_view = $student_view_count[0]['total_Student_views'];
                        $link_str="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$row['uploaded_file_path']."&embedded=true";
                        $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                        $row['ratting']="<td>$star<br><button class='filereviewslink btn-xs btn btn-warning'  id='$rmsa_file_id'>View Reviews</button></td>";
                        $i=0;
                        if($row['uploaded_file_hasvol']=="YES"){
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext'];                            
                            $dataChild = self::sql_exec( $db, $bindings,
                                    "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                     FROM $table
                                     WHERE uploaded_file_volroot=".$row['rmsa_uploaded_file_id']." ORDER BY uploaded_file_volorder ASC"
                            );
                            $resultChild=self::data_output($columns,$dataChild);
                            $strTd='';
                            $strTdAmodel='';
                            $strModel=''; 
                            $str='';                             
                            foreach ($resultChild as $rowChild){
                                $student_view_count_child = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rowChild['rmsa_uploaded_file_id']}'");
                                $total_student_view_child = $student_view_count_child[0]['total_Student_views'];
                                $link_str_child="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$rowChild['uploaded_file_path']."&embedded=true"; 
                                if($i<=1){                                
                                    $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                          <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                                    }                                    
                                    $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                             <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";                                                                       
                                $i=$i+1;                               
                            }
                            $str.=$strTd."</tr></table>";
                            $strModel.=$strTdAmodel."</tr></table>";

                            $row['extModel']=$row['ext'].$strModel;
                                                     
                            $row['ext'].=$str;
//                            $resChild=self::data_output($columns,$dataChild);
                            $row['child']="<a class='btn btn-success btn_approve btn-xs' href=".IMG_URL.'/employee-uploadresource-child/'.$row['rmsa_uploaded_file_id'].">Upload Child</a>";
                        }
                        else{ 
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";                            
                            $row['extModel']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";
                            $row['child']="-----No Hasvol-----";
                        }
                        if($i>1){
                        $row['ext'].='<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$row['rmsa_uploaded_file_id'].'">View More</button>
                        <div class="modal" id="myModal'.$row['rmsa_uploaded_file_id'].'" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">File List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        '.$row['extModel'].'
                                        </div>
                                        <div class="modal-footer">                
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>            
                                    </div>
                                </div>
                            </div>';
                            }
                        $row['index']='';
                        $fileId = $row['rmsa_uploaded_file_id'];
                        $row['action'] = "<a href='".BASE_URL."/view-file/$fileId' class='btn btn-xs btn-warning'>Edit  <i class='fa fa-pencil'></i></a>";

                        array_push($resData, $row);
                    }  
                }
//                print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}
        
        static function emp_quiz_file_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '',$emp_rmsa_user_id)
	{                 
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }                
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		);   		
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table $where "
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){                    
                    foreach ($result as $row){                                                                                                                                      
                                $rmsa_file_id = $row['rmsa_uploaded_file_id'];                                     
                                $data = self::sql_exec( $db, $bindings,"SELECT COUNT(quiz_id) as quizCount FROM quiz WHERE rmsa_uploaded_file_id = '$rmsa_file_id'");                                 
                                $countQuiz=$data[0]['quizCount'];                                                                                           
                                                                 
                        $reviews = self::sql_exec( $db,
                            "SELECT AVG(rmsa_file_rating) as overall_rating FROM rmsa_file_reviews
                                    WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}' AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
                        $star = '';
                        if(count($reviews)){
                            $rating = $reviews[0]['overall_rating'];
                            $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
                            for ($x = 0; $x < 5; $x++) {
                                if (floor($starNumber)-$x >= 1) {
                                    $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                                }
                                elseif ($starNumber-$x > 0) {
                                    $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                                }
                                else {
                                    $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                                }
                            }
                        }
                        else{
                            for ($x = 0; $x < 5; $x++) {
                                $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                            }
                        }
                        //get number of student view count
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                                                 
                        $student_view_count = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}'");
                        $total_student_view = $student_view_count[0]['total_Student_views'];
                        $link_str="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$row['uploaded_file_path']."&embedded=true";
                        $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                        $row['ratting']="<td>$star</td>";
                        $row['ext']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";                            
                        $row['index']='';
                        $fileId = $row['rmsa_uploaded_file_id'];
                        
                        if($countQuiz>0){                             
                            $row['action']="<a href='".BASE_URL."/employee-edit-quiz/$fileId' class='btn btn-xs btn-success'>Edit Quiz <i class='fa fa-pencil'></i></a>";
                            $row['action'].="<br><a href='".BASE_URL."/employee-quiz-list/$fileId' class='btn btn-xs btn-info'>View Quiz <i class='fa fa-eye'></i></a>";
                        }
                        else{
                            $row['action'] = "<a href='".BASE_URL."/employee-create-quiz/$fileId' class='btn btn-xs btn-warning'>Create Quiz <i class='fa fa-pencil'></i></a>";
                        }                                                
//                        $row['quizlist'] = "<a href='".BASE_URL."/employee-quiz-list/$fileId' class='btn btn-xs btn-warning'>Create Quiz sasas<i class='fa fa-pencil'></i></a>";
                        array_push($resData, $row);
                    }  
                }
//                print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}
         static function emp_quiz_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '',$emp_rmsa_user_id)
	{                         
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }                
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 
		// Main query to actually get the data
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table $where"
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){                    
                    foreach ($result as $row){
                        $quiz_id=$row['quiz_id'];                                 
                        $data = self::sql_exec( $db, $bindings,"SELECT COUNT(question_id) as questionCount FROM questions WHERE quiz_id = '$quiz_id'");                                 
                        $countQuestion=$data[0]['questionCount'];                                                                                           

                        $row['index']=''; 
                        
                        $title = 'Click to deactivate file';
                        $class = 'btn_approve_reject btn btn-success btn-xs';
                        $text = 'Active';
                        $isactive = 1;
                        if($row['quiz_status'] == 'REMOVED'){
                            $title = 'Click to active file';
                            $class = 'btn_approve_reject btn btn-danger btn-xs';
                            $text  = 'Inactive';
                            $isactive = 0; 
                        }                
                        $row['quiz_status'] = "<button type='button' data-id='".$quiz_id."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";                                                                                                                        
                        $row['action'] = "<a href='".BASE_URL."/employee-add-quistions/$quiz_id' class='btn btn-xs btn-warning'>Add Question <i class='fa fa-pencil'></i></a>";
                         if($countQuestion>0){
                             $row['action'].="<br><a href='".BASE_URL."/employee-quistions-list/$quiz_id' class='btn btn-xs btn-info'>Question List <i class='fa fa-eye'></i></a>";                        
                         }                                
                        array_push($resData, $row);
                    }  
                }
//              print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}
                static function emp_questions_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{                         
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }                
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 
		// Main query to actually get the data
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table $where "
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){                    
                    foreach ($result as $row){
//                        print_r($row);die;
                        $questions_id=$row['question_id'];
                        $row['index']='';
                        $title = 'Click to deactivate file';
                        $class = 'btn_approve_reject btn btn-success btn-xs';
                        $text = 'Active';
                        $isactive = 1;
                        if($row['question_status'] == 'REMOVED'){
                            $title = 'Click to active file';
                            $class = 'btn_approve_reject btn btn-danger btn-xs';
                            $text  = 'Inactive';
                            $isactive = 0; 
                        }                
                        $row['question_status'] = "<button type='button' data-id='".$questions_id."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";                        
                        
                        $row['action'] = "<a href='".BASE_URL."/employee-edit-quistions/$questions_id' class='btn btn-xs btn-warning'>Edit <i class='fa fa-pencil'></i></a>";
                        array_push($resData, $row);
                    }  
                }
//              print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}

        
        static function rmsa_file_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }                
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 
		// Main query to actually get the data
//		$data = self::sql_exec($db, $bindings,
//			"SELECT ".implode(", ", self::pluck($columns, 'db'))." FROM $table WHERE uploaded_file_volroot=0 AND rmsa_employee_users_id='$emp_rmsa_user_id'  $order $limit"
//		);
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table $where "
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){
                    foreach ($result as $row){                        
                        if(!empty($request['uploaded_file_tag'])){                           
                            if(!empty($row['uploaded_file_volroot'])){                               
                                $volrootid=$row['uploaded_file_volroot'];     
                                
                                $data = self::sql_exec( $db, $bindings,
                                        "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                         FROM rmsa_uploaded_files
                                         WHERE rmsa_uploaded_file_id = '$volrootid'
                                        "
                                ); 
                                $row=$data[0];                               
                            }
                        }                                                                                                
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];
                        $reviews = self::sql_exec( $db,
                            "SELECT AVG(rmsa_file_rating) as overall_rating FROM rmsa_file_reviews
                                    WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}' AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
                        $star = '';
                        if(count($reviews)){
                            $rating = $reviews[0]['overall_rating'];
                            $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
                            for ($x = 0; $x < 5; $x++) {
                                if (floor($starNumber)-$x >= 1) {
                                    $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                                }
                                elseif ($starNumber-$x > 0) {
                                    $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                                }
                                else {
                                    $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                                }
                            }
                        }
                        else{
                            for ($x = 0; $x < 5; $x++) {
                                $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                            }
                        }
                        //get number of student view count
//                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                        
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                                                 
                        $title = 'Click to deactivate file';
                        $class = 'btn_approve_reject btn btn-success btn-xs';
                        $text = 'Active';
                        $isactive = 1;
                        if($row['uploaded_file_status'] == 'REMOVED'){
                            $title = 'Click to active file';
                            $class = 'btn_approve_reject btn btn-danger btn-xs';
                            $text  = 'Inactive';
                            $isactive = 0; 
                        }                
                        $row['uploaded_file_status'] = "<button type='button' data-id='".$rmsa_file_id."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";                        
                        
                        
                        $student_view_count = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}'");
                        $total_student_view = $student_view_count[0]['total_Student_views'];
                        $link_str="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$row['uploaded_file_path']."&embedded=true";
                        $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                        $row['ratting']="<td>$star<br><button class='filereviewslink btn-xs btn btn-warning'  id='$rmsa_file_id'>View Reviews</button></td>";
                        $i=0;
                        if($row['uploaded_file_hasvol']=="YES"){
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext'];
                            $dataChild = self::sql_exec( $db, $bindings,
                                    "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                     FROM $table
                                     WHERE uploaded_file_volroot=".$row['rmsa_uploaded_file_id']." ORDER BY uploaded_file_volorder ASC"
                            );
                            $resultChild=self::data_output($columns,$dataChild);
                            $strTd='';
                            $strTdAmodel='';
                            $strModel=''; 
                            $str='';                             
                            foreach ($resultChild as $rowChild){
                                $student_view_count_child = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rowChild['rmsa_uploaded_file_id']}'");
                                $total_student_view_child = $student_view_count_child[0]['total_Student_views'];
                                $link_str_child="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$rowChild['uploaded_file_path']."&embedded=true"; 
                                if($i<=1){                                
                                    $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                          <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                                    }                                    
                                    $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                             <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";                                                                       
                                $i=$i+1;                               
                            }
                            $str.=$strTd."</tr></table>";
                            $strModel.=$strTdAmodel."</tr></table>";

                            $row['extModel']=$row['ext'].$strModel;
                                                     
                            $row['ext'].=$str;
//                            $resChild=self::data_output($columns,$dataChild);
//                            $row['child']="<a class='btn btn-success btn_approve btn-xs' href=".IMG_URL.'/employee-uploadresource-child/'.$row['rmsa_uploaded_file_id'].">Upload Child</a>";
                        }
                        else{ 
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";                            
                            $row['extModel']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";
//                            $row['child']="-----No Hasvol-----";
                        } 
                        if($i>1){
                        $row['ext'].='<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$row['rmsa_uploaded_file_id'].'">View More</button>
                        <div class="modal" id="myModal'.$row['rmsa_uploaded_file_id'].'" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">File List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        '.$row['extModel'].'
                                        </div>
                                        <div class="modal-footer">                
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>            
                                    </div>
                                </div>
                            </div>';
                            }
                        $row['index']='';
                        array_push($resData, $row);
                    }  
                }
//                print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}
        static function teacher_file_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '')
	{
		$bindings = array();
		$db = self::db( $conn );
                
		// Build the SQL query string from the request
                
		$limit = self::limit( $request, $columns );                                               
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
                
                if ($where_custom) {
                    if ($where) {
                        $where .= ' AND ' . $where_custom;
                    } else {
                        $where .= 'WHERE ' . $where_custom;
                    }
                }                
                $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 
		// Main query to actually get the data
//		$data = self::sql_exec($db, $bindings,
//			"SELECT ".implode(", ", self::pluck($columns, 'db'))." FROM $table WHERE uploaded_file_volroot=0 AND rmsa_employee_users_id='$emp_rmsa_user_id'  $order $limit"
//		);
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db,
			"SELECT COUNT({$primaryKey})
			 FROM   $table $where "
		);
		$recordsTotal = $resTotalLength[0][0];                
                $result=self::data_output($columns,$data);
                $resData=array();
                if(!empty($result)){
                    foreach ($result as $row){                        
                        if(!empty($request['uploaded_file_tag'])){                           
                            if(!empty($row['uploaded_file_volroot'])){                               
                                $volrootid=$row['uploaded_file_volroot'];     
                                
                                $data = self::sql_exec( $db, $bindings,
                                        "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                         FROM rmsa_uploaded_files
                                         WHERE rmsa_uploaded_file_id = '$volrootid'
                                        "
                                ); 
                                $row=$data[0];                               
                            }
                        }                                                                                                
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];
                        $reviews = self::sql_exec( $db,
                            "SELECT AVG(rmsa_file_rating) as overall_rating FROM rmsa_file_reviews
                                    WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}' AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
                        $star = '';
                        if(count($reviews)){
                            $rating = $reviews[0]['overall_rating'];
                            $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
                            for ($x = 0; $x < 5; $x++) {
                                if (floor($starNumber)-$x >= 1) {
                                    $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                                }
                                elseif ($starNumber-$x > 0) {
                                    $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                                }
                                else {
                                    $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                                }
                            }
                        }
                        else{
                            for ($x = 0; $x < 5; $x++) {
                                $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                            }
                        }
                        //get number of student view count
//                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                        
                        $rmsa_file_id = $row['rmsa_uploaded_file_id'];                                                 
                        $title = 'Click to deactivate file';
                        $class = 'btn btn-success btn-xs';
                        $text = 'Active';
                        $isactive = 1;
                        if($row['uploaded_file_status'] == 'REMOVED'){
                            $title = 'Click to active file';
                            $class = 'btn btn-danger btn-xs';
                            $text  = 'Inactive';
                            $isactive = 0; 
                        }                
                        $row['uploaded_file_status'] = "<button type='button' data-id='".$rmsa_file_id."' data-status = '".$isactive."' title='".$title."' class='".$class." btn-xs'>".$text."</button>";                                                                        
                        $student_view_count = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}'");
                        $total_student_view = $student_view_count[0]['total_Student_views'];
                        $link_str="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$row['uploaded_file_path']."&embedded=true";
                        $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                        $row['ratting']="<td>$star<br><button class='filereviewslink btn-xs btn btn-warning'  id='$rmsa_file_id'>View Reviews</button></td>";
                        $i=0;
                        if($row['uploaded_file_hasvol']=="YES"){
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext'];
                            $dataChild = self::sql_exec( $db, $bindings,
                                    "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                     FROM $table
                                     WHERE uploaded_file_volroot=".$row['rmsa_uploaded_file_id']." ORDER BY uploaded_file_volorder ASC"
                            );
                            $resultChild=self::data_output($columns,$dataChild);
                            $strTd='';
                            $strTdAmodel='';
                            $strModel=''; 
                            $str='';                             
                            foreach ($resultChild as $rowChild){
                                $student_view_count_child = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rowChild['rmsa_uploaded_file_id']}'");
                                $total_student_view_child = $student_view_count_child[0]['total_Student_views'];
                                $link_str_child="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$rowChild['uploaded_file_path']."&embedded=true"; 
                                if($i<=1){                                
                                    $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                          <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                                    }                                    
                                    $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."' class='viewFile'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                             <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";                                                                       
                                $i=$i+1;                               
                            }
                            $str.=$strTd."</tr></table>";
                            $strModel.=$strTdAmodel."</tr></table>";

                            $row['extModel']=$row['ext'].$strModel;
                                                     
                            $row['ext'].=$str;
//                            $resChild=self::data_output($columns,$dataChild);
//                            $row['child']="<a class='btn btn-success btn_approve btn-xs' href=".IMG_URL.'/employee-uploadresource-child/'.$row['rmsa_uploaded_file_id'].">Upload Child</a>";
                        }
                        else{ 
                            $row['ext']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";                            
                            $row['extModel']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";
//                            $row['child']="-----No Hasvol-----";
                        } 
                        if($i>1){
                        $row['ext'].='<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$row['rmsa_uploaded_file_id'].'">View More</button>
                        <div class="modal" id="myModal'.$row['rmsa_uploaded_file_id'].'" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">File List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        '.$row['extModel'].'
                                        </div>
                                        <div class="modal-footer">                
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>            
                                    </div>
                                </div>
                            </div>';
                            }
                        $row['index']='';
                        array_push($resData, $row);
                    }  
                }
//                print_r($resData);die;
		/*
		 * Output
		 */
		return array(
			"draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal" => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data" => $resData
		);
	}
    static function student_file_list ($request, $conn, $table, $primaryKey, $columns,$where_custom = '')
    {
        $bindings = array();
        $db = self::db( $conn );
        // Build the SQL query string from the request
        $limit = self::limit( $request, $columns );
        $order = self::order( $request, $columns );
        $where = self::filter( $request, $columns, $bindings );                        
        if ($where_custom) {
            if ($where) {
                $where .= ' AND ' . $where_custom;
            } else {
                $where .= 'WHERE ' . $where_custom;
            }
        }        
        // Main query to actually get the data
                        
        $data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		); 
//        $data = self::sql_exec($db, $bindings,
//            "SELECT ".implode(", ", self::pluck($columns, 'db'))." FROM $table WHERE uploaded_file_volroot=0  $order $limit"
//        );
        // Data set length after filtering
        $resFilterLength = self::sql_exec( $db, $bindings,
            "SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
        );
        $recordsFiltered = $resFilterLength[0][0];
        // Total data set length
        $resTotalLength = self::sql_exec( $db,
            "SELECT COUNT({$primaryKey})
			 FROM   $table $where "
        );
        $recordsTotal = $resTotalLength[0][0];
        $result=self::data_output($columns,$data);
        $resData=array();
        if(!empty($result)){
            foreach ($result as $row){                 
                    if(!empty($request['uploaded_file_tag'])){                           
                        if(!empty($row['uploaded_file_volroot'])){                               
                            $volrootid=$row['uploaded_file_volroot'];     
                            $data = self::sql_exec( $db, $bindings,
                                    "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                     FROM rmsa_uploaded_files
                                     WHERE rmsa_uploaded_file_id = '$volrootid'
                                     AND uploaded_file_status='ACTIVE'"
                            ); 
                            $row=$data[0];                               
                        }
                    }                
                $rmsa_file_id = $row['rmsa_uploaded_file_id'];
                $reviews = self::sql_exec($db,
                    "SELECT AVG(rmsa_file_rating) as overall_rating FROM rmsa_file_reviews
                    WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}' AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
                $star = '';
                if(count($reviews)){
                    $rating = $reviews[0]['overall_rating'];
                    $starNumber = rtrim(rtrim(number_format($rating, 1, ".", ""), '0'), '.');
                    for ($x = 0; $x < 5; $x++) {
                        if (floor($starNumber)-$x >= 1) {
                            $star.= '<i class="fa fa-star" style="color:#ffc000;"></i>';
                        }
                        elseif ($starNumber-$x > 0) {
                            $star.= '<i class="fa fa-star-half-o" style="color:#ffc000;"></i>';
                        }
                        else {
                            $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                        }
                    }
                }
                else{
                    for ($x = 0; $x < 5; $x++) {
                        $star.= '<i class="fa fa-star-o" style="color:#ffc000;"></i>';
                    }
                }                                
                /***************exam****************/
                $examResult=0;
                $attendSts=1;
                $rmsa_user_id=$request['rmsa_user_id'];                                                              
                $examData = self::sql_exec($db,
                                    "SELECT COUNT(quiz_id) AS count_id,quiz_id,quiz_pass_score FROM quiz                                       
                                        WHERE rmsa_uploaded_file_id='$rmsa_file_id'
                                    "
                            ); 
                if(!empty($examData[0]['count_id'])){
                    $examResult=$examData[0]['count_id'];
                    $quiz_id=$examData[0]['quiz_id'];
                    $quiz_pass_score=$examData[0]['quiz_pass_score'];
                    $quizAttendStatus = self::sql_exec($db,
                                    "SELECT COUNT(rmsa_quiz_student_mapping_id) AS count_attend FROM rmsa_quiz_student_mapping                                        
                                        WHERE rmsa_user_id='$rmsa_user_id' AND quiz_id='$quiz_id' AND quiz_student_score >= '$quiz_pass_score'
                                    "
                            );                     
                    $attendSts=$quizAttendStatus[0]['count_attend'];                        
                }                
//                echo $attendSts;
                 /***************exam end****************/                
                //get number of student view count
                $student_view_count = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rmsa_file_id}'");
                $total_student_view = $student_view_count[0]['total_Student_views'];
                $link_str="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$row['uploaded_file_path']."&embedded=true";
                
                if($attendSts == 0){
                    $link_str=BASE_URL.'/exam/'.$rmsa_file_id;
                    $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                        <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                }
                else{
                $row['ext']="<td style='padding: 0px 0px;' class='tooltip1'><center><a class='view_count' data-id='".$row['rmsa_uploaded_file_id']."' href='".$link_str."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$row['uploaded_file_type'].".png' style='width:40%'><br>".$row['uploaded_file_title']."</a>
                        <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$row['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view."</span></center></td>";
                }
                $row['review']="<td><center><img src='".IMG_URL."/assets/front/DataTablesSrc-master/images/customer-review.png' style='width:20%;cursor: pointer;' class='open_review' onclick='openreview($rmsa_file_id)'></center></td>";
                $row['ratting']="<td>$star<br><button class='filereviewslink btn-xs btn btn-warning'  id='$rmsa_file_id'>View Reviews</button></td>";
//                        . "<span class='open_review' onclick='openreview($rmsa_file_id)' style='cursor: pointer;'></span>";
                $i=0;
                if($row['uploaded_file_hasvol']=="YES"){
                    $row['ext']="<table><tr style='background-color:transparent'>".$row['ext'];
                    $dataChild = self::sql_exec( $db, $bindings,
                        "SELECT ".implode(", ", self::pluck($columns, 'db'))."
                                     FROM $table
                                     WHERE uploaded_file_volroot=".$row['rmsa_uploaded_file_id']." AND uploaded_file_status='ACTIVE' ORDER BY uploaded_file_volorder ASC"
                    );
                    $resultChild=self::data_output($columns,$dataChild);
                    $strTdAmodel='';
                    $strModel=''; 
                    $strTd='';
                    $str='';
                    $exam_rmsa_child_file_id=array();
                    foreach ($resultChild as $rowChild){                        
                        /***************examchild****************/
                                $examResultChild=0;
                                $attendStsChild=1; 
                                $rmsa_child_file_id=$rowChild['rmsa_uploaded_file_id'];
                                $examDataChild = self::sql_exec($db,
                                                    "SELECT COUNT(quiz_id) AS count_id,quiz_id,quiz_pass_score FROM quiz                                        
                                                        WHERE rmsa_uploaded_file_id='$rmsa_child_file_id'
                                                    "
                                            ); 
                                if(!empty($examDataChild[0]['count_id'])){
                                    $examResultChild=$examDataChild[0]['count_id'];
                                    $quiz_id_child=$examDataChild[0]['quiz_id'];
                                    $quiz_pass_score_child=$examDataChild[0]['quiz_pass_score'];
                                    $quizAttendStatusChild = self::sql_exec($db,
                                                    "SELECT COUNT(rmsa_quiz_student_mapping_id) AS count_attend FROM rmsa_quiz_student_mapping                                        
                                                        WHERE rmsa_user_id='$rmsa_user_id' AND quiz_id='$quiz_id_child' AND quiz_student_score >= '$quiz_pass_score_child'
                                                    "
                                            );                     
                                    $attendStsChild=$quizAttendStatusChild[0]['count_attend'];                        
                                }                
//                                echo $attendStsChild;
                                 /***************examchild end****************/                
                                                                                                                        
                        $student_view_count_child = self::sql_exec($db,"SELECT COUNT(*) as total_Student_views FROM rmsa_user_file_views WHERE rmsa_uploaded_file_id = '{$rowChild['rmsa_uploaded_file_id']}'");
                        $total_student_view_child = $student_view_count_child[0]['total_Student_views'];
                        $link_str_child="https://docs.google.com/viewer?url=".BASE_URL.FILE_URL.'/'.$rowChild['uploaded_file_path']."&embedded=true";
                        if($attendSts==0){
                                $link_str_child=BASE_URL.'/exam/'.$rmsa_file_id;
                                if($i<=1){                                                                
                                        $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                             <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";                                    
                                }
                                $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                 <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                        }else{                            
                            if($i<=1){                            
                                if($attendStsChild == 0){
                                    array_push($exam_rmsa_child_file_id,$rmsa_child_file_id);
                                    $exam_file_id=$exam_rmsa_child_file_id[0];
                                    $link_str_child=BASE_URL.'/exam/'.$exam_file_id;
                                    $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                         <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                                }   
                                else{    
                                $strTd.="<td style='padding: 0px 0px;' class='tooltip1'><center><a class='view_count' data-id='".$rowChild['rmsa_uploaded_file_id']."' href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                         <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                                }
                            }
                            if($attendStsChild == 0){                                
                                array_push($exam_rmsa_child_file_id,$rmsa_child_file_id);
                                $exam_file_id=$exam_rmsa_child_file_id[0];
                                $link_str_child=BASE_URL.'/exam/'.$exam_file_id;
                                $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                            }
                            else{
                            $strTdAmodel.="<td style='padding: 0px 0px;' class='tooltip1'><center><a class='view_count' data-id='".$rowChild['rmsa_uploaded_file_id']."' href='".$link_str_child."'><img src='".IMG_URL."/assets/front/fileupload/img/file-icon/icon/".$rowChild['uploaded_file_type'].".png' style='width:40%'><br>".$rowChild['uploaded_file_title']."</a>
                                     <br><span style='font-size:10px' class='tooltiptext'>Hit count <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$rowChild['uploaded_file_viewcount']."<br>Student view <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ".$total_student_view_child."</span></center></td>";
                            }
                        }
                        $i=$i+1; 
                    }
//                    print_r($exam_rmsa_child_file_id);
                    $str.=$strTd."</tr></table>";
                    $strModel.=$strTdAmodel."</tr></table>";
                    $row['extModel']=$row['ext'].$strModel;
                    $row['ext'].=$str;
                    $row['child']="<a class='btn btn-success btn_approve btn-xs' href=".IMG_URL.'/employee-uploadresource-child/'.$row['rmsa_uploaded_file_id'].">Upload Child</a>";                    
                }
                else{
                    $row['ext']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";
                    $row['extModel']="<table><tr style='background-color:transparent'>".$row['ext']."</tr></table>";
                    $row['child']="-----No Hasvol-----";
                }                
                if($i>1){
                        $row['ext'].='<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$row['rmsa_uploaded_file_id'].'">View More</button>
                        <div class="modal" id="myModal'.$row['rmsa_uploaded_file_id'].'" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">File List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        '.$row['extModel'].'
                                        </div>
                                        <div class="modal-footer">                
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>            
                                    </div>
                                </div>
                            </div>';
                            }
                $row['index']='';
                array_push($resData, $row);
            }
        }
//                print_r($resData);die;
        /*
         * Output
         */
        return array(
            "draw" => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal" => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data" => $resData
        );
    }
	/**
	 * The difference between this method and the simple one, is that you can
	 * apply additional where conditions to the SQL queries. These can be in
	 * one of two forms:
	 *
	 * * 'Result condition' - This is applied to the result set, but not the
	 *   overall paging information query - i.e. it will not effect the number
	 *   of records that a user sees they can have access to. This should be
	 *   used when you want apply a filtering condition that the user has sent.
	 * * 'All condition' - This is applied to all queries that are made and
	 *   reduces the number of records that the user can access. This should be
	 *   used in conditions where you don't want the user to ever have access to
	 *   particular records (for example, restricting by a login id).
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array|PDO $conn PDO connection resource or connection parameters array
	 *  @param  string $table SQL table to query
	 *  @param  string $primaryKey Primary key of the table
	 *  @param  array $columns Column information array
	 *  @param  string $whereResult WHERE condition to apply to the result set
	 *  @param  string $whereAll WHERE condition to apply to all queries
	 *  @return array          Server-side processing response array
	 */
	static function complex ( $request, $conn, $table, $primaryKey, $columns, $whereResult=null, $whereAll=null )
	{
		$bindings = array();
		$db = self::db( $conn );
		$localWhereResult = array();
		$localWhereAll = array();
		$whereAllSql = '';
		// Build the SQL query string from the request
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
		$whereResult = self::_flatten( $whereResult );
		$whereAll = self::_flatten( $whereAll );
		if ( $whereResult ) {
			$where = $where ?
				$where .' AND '.$whereResult :
				'WHERE '.$whereResult;
		}
		if ( $whereAll ) {
			$where = $where ?
				$where .' AND '.$whereAll :
				'WHERE '.$whereAll;
			$whereAllSql = 'WHERE '.$whereAll;
		}
		// Main query to actually get the data
		$data = self::sql_exec( $db, $bindings,
			"SELECT ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $where
			 $order
			 $limit"
		);
		// Data set length after filtering
		$resFilterLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
		);
		$recordsFiltered = $resFilterLength[0][0];
		// Total data set length
		$resTotalLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT({$primaryKey})
			 FROM   $table ".
			$whereAllSql
		);
		$recordsTotal = $resTotalLength[0][0];
		/*
		 * Output
		 */
		return array(
			"draw"            => isset ( $request['draw'] ) ?
				intval( $request['draw'] ) :
				0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => self::data_output( $columns, $data )
		);
	}
	/**
	 * Connect to the database
	 *
	 * @param  array $sql_details SQL server connection details array, with the
	 *   properties:
	 *     * host - host name
	 *     * db   - database name
	 *     * user - user name
	 *     * pass - user password
	 * @return resource Database connection handle
	 */
	static function sql_connect ( $sql_details )
	{
		try {
			$db = @new PDO(
				"mysql:host={$sql_details['host']};dbname={$sql_details['db']}",
				$sql_details['user'],
				$sql_details['pass'],
				array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
			);
		}
		catch (PDOException $e) {
			self::fatal(
				"An error occurred while connecting to the database. ".
				"The error reported by the server was: ".$e->getMessage()
			);
		}
		return $db;
	}
	/**
	 * Execute an SQL query on the database
	 *
	 * @param  resource $db  Database handler
	 * @param  array    $bindings Array of PDO binding values from bind() to be
	 *   used for safely escaping strings. Note that this can be given as the
	 *   SQL query string if no bindings are required.
	 * @param  string   $sql SQL query to execute.
	 * @return array         Result from the query (all rows)
	 */
	static function sql_exec ( $db, $bindings, $sql=null )
	{
		// Argument shifting
		if ( $sql === null ) {
			$sql = $bindings;
		}
		$stmt = $db->prepare( $sql );
		//echo $sql;
		// Bind parameters
		if ( is_array( $bindings ) ) {
			for ( $i=0, $ien=count($bindings) ; $i<$ien ; $i++ ) {
				$binding = $bindings[$i];
				$stmt->bindValue( $binding['key'], $binding['val'], $binding['type'] );
			}
		}
		// Execute
		try {
			$stmt->execute();
		}
		catch (PDOException $e) {
			self::fatal( "An SQL error occurred: ".$e->getMessage() );
		}
		// Return all
		return $stmt->fetchAll( PDO::FETCH_BOTH );
	}
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Internal methods
	 */
	/**
	 * Throw a fatal error.
	 *
	 * This writes out an error message in a JSON string which DataTables will
	 * see and show to the user in the browser.
	 *
	 * @param  string $msg Message to send to the client
	 */
	static function fatal ( $msg )
	{
		echo json_encode( array( 
			"error" => $msg
		) );
		exit(0);
	}
	/**
	 * Create a PDO binding key which can be used for escaping variables safely
	 * when executing a query with sql_exec()
	 *
	 * @param  array &$a    Array of bindings
	 * @param  *      $val  Value to bind
	 * @param  int    $type PDO field type
	 * @return string       Bound key to be used in the SQL where this parameter
	 *   would be used.
	 */
	static function bind ( &$a, $val, $type )
	{
		$key = ':binding_'.count( $a );
		$a[] = array(
			'key' => $key,
			'val' => $val,
			'type' => $type
		);
		return $key;
	}
	/**
	 * Pull a particular property from each assoc. array in a numeric array, 
	 * returning and array of the property values from each item.
	 *
	 *  @param  array  $a    Array to get data from
	 *  @param  string $prop Property to read
	 *  @return array        Array of property values
	 */
	static function pluck ( $a, $prop )
	{
		$out = array();
		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}
		return $out;
	}
	/**
	 * Return a string from an array or a string
	 *
	 * @param  array|string $a Array to join
	 * @param  string $join Glue for the concatenation
	 * @return string Joined string
	 */
	static function _flatten ( $a, $join = ' AND ' )
	{
		if ( ! $a ) {
			return '';
		}
		else if ( $a && is_array($a) ) {
			return implode( $join, $a );
		}
		return $a;
	}
}