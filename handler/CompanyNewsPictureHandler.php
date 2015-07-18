<?php
//产品简介
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_newspicture';

  //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
   
  
   $arrayList = array();
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
  
   if ($result)
   {

		  while($row = mysql_fetch_array($result))
			{
		        $arrayList[]= array(  'id' => $row['pic_id'],
                                  'url' => $row['pic_url'],
                                  'describe' => $row['pic_des'],		                                                                      
		                           );
			}
		   
   }  
   else
   {
           die("query failed");

   }
	   

  echo json_encode($arrayList);
	
 
	
?>