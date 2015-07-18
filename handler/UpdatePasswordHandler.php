<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_employee';

   $newPass = $_POST['newpass'];
 
  
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
      
   //读取表中纪录条数
   $sql = sprintf("update %s set e_password ='%s' where e_id = 1", $DB_TABLENAME, $newPass);
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "updateSuccess";

?>

