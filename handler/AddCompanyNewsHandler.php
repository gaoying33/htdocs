<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companynews';

   $title =  $_POST['title'];
   $detail = $_POST['detail'];


   # code...   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
   $sql = sprintf("insert into %s (c_newstitle,c_newsdetail) values ('%s','%s')", $DB_TABLENAME, 
   	$title,$detail);
   
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "addSuccess";

?>

