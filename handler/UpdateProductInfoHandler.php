<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_productinfo';

   $id = $_POST['id'];
   $name =  $_POST['name'];
   $picture = $_POST['pictureURL'];
   $introduction = $_POST['introduction'];
   $description = $_POST['description'];

   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   //读取表中纪录条数
   $sql = sprintf("update %s set p_name ='%s', p_picture = '%s',p_introduction='%s',p_description='%s' where p_id =%d", $DB_TABLENAME, $name,$picture,$introduction,$description,$id);

   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "updateSuccess";

?>