<?php
 
require_once "DBConfig.php";
$DB_TABLENAME='ab_otherpicture';

$url = $_POST['url'];

 if (file_exists("../upload/" . $url))
 {
      unlink("../upload/" . $url);
  
 }

   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
   $sql = sprintf("delete from %s where p_url = %s", $DB_TABLENAME, $url);
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "deleteSuccess";
?>