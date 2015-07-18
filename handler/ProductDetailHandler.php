<?php
  
   //产品详情
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';
   
   $productID = $_POST['productID'];

  //
   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   $row ="";
  
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where p_id = %d", $DB_TABLENAME, $productID);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $row = mysql_fetch_array($result);
   else
	    die("query failed");

  $arrayList = array(  'id' =>$row['p_id'],
                       'name' =>$row['p_name'] , 
  	                   'picture' => $row['p_picture'] ,
  	                   'introduction'=> $row['p_introduction'], 
  	                   'detail' => $row['p_description'],

  	                );

   echo json_encode($arrayList);

?>