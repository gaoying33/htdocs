<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companynews';

   $id = $_POST['id'];
   $title =  $_POST['title'];
   $detail = $_POST['detail'];

   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   //读取表中纪录条数
   $sql = sprintf("update %s set c_newstitle ='%s', c_newsdetail = '%s' where c_newsid =%d", $DB_TABLENAME, $title,$detail,$id);

   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "updateSuccess";

?>