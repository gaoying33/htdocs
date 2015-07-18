<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_newspicture';
    
   $id = $_POST['id'];
   $describe =  $_POST['describe'];
   $url = $_POST['url'];

   # code...   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   
   //读取表中纪录条数
   $sql = sprintf("update %s set pic_url ='%s', pic_des = '%s' where pic_id = %d", $DB_TABLENAME, $url,$describe,$id);
   $result = mysql_query($sql, $conn);
   mysql_close($conn);

   echo "updateSuccess";
   

?>

