<?php
  
   //产品详情
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';
   
   $productID = $_POST['productID'];

  //数据库表的列名
   $dbcolarray = array('p_id', 'p_name','p_picture','p_introduction','p_description');

  //
   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   $row ="";
  
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where p_id = 1", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $row = mysql_fetch_row($result);
   else
	    die("query failed");

  $arrayList = array('name' =>$row[1] , 
  	                   'picture' => $row[2] ,
  	                   'introduction'=> $row[3], 
  	                   'detail' => $row[4],

  	                );

   echo json_encode($arrayList);

?>