<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';

   $id =  $_POST['id'];

   # code...   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
  $sql = sprintf("delete from %s where p_id = %d", $DB_TABLENAME, $id);
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "deleteSuccess";

?>