<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_recruitinfo';

   $content =  $_POST['addcontent'];

   # code...   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
   $sql = sprintf("insert into %s (r_content) values ('%s')", $DB_TABLENAME, $content);
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "addSuccess";

?>