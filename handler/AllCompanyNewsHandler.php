<?php
//产品简介
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companynews';


   
  //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
   
  //总共有的记录条数
  
   $arrayList = array();
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
  
   if ($result)
   {

     
		  while($row = mysql_fetch_array($result))
			{
		           $arrayList[]= array( 'id' => $row['c_newsid'],
                                      'title' => $row['c_newstitle'],
		                                   'detail' => $row['c_newsdetail'],		                                       
		                                  );
			}
		   
   }  
   else
   {
           die("query failed");

   }
	   

  

  echo json_encode($arrayList);
	
 
	
?>