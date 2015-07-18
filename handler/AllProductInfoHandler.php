<?php
//产品简介
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';

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
		        
		             $arrayList[]= array ( 'id' => $row['p_id'],
                                       'name' => $row['p_name'],
		                                   'picture' => $row['p_picture'],
		                                   'introduction' => $row['p_introduction'],            
		                                  );
			}
		   
   }  
   else
   {
           die("query failed");

   }
	   
  echo json_encode($arrayList);
	
 
	
?>