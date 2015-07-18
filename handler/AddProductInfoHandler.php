<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';

   $name =  $_POST['name'];
   $picture = $_POST['pictureURL'];
   $introduction = $_POST['introduction'];
   $description = $_POST['description'];


   # code...   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
   $sql = sprintf("insert into %s (p_name,p_picture,p_introduction,p_description) values ('%s','%s','%s','%s')", $DB_TABLENAME, 
   	$name,$picture,$introduction,$description);
   
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "addSuccess";

?>

