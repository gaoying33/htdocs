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
   $sql = sprintf("insert into %s (c_newstitle,c_newsdetail,c_rank) values ('%s','%s',-1)", $DB_TABLENAME, 
   	$title,$detail);
   
   $result = mysql_query($sql, $conn);

   $sql = sprintf("select c_newsid from %s where c_rank = -1", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);

   if ($result)
   {
        $row = mysql_fetch_array($result);
        $id = $row[0];
   }  
   else
   {
           die("query failed");

   }
      
   $sql = sprintf("update %s set c_rank = %d where c_newsid = %d", $DB_TABLENAME,$id,$id);

   $result = mysql_query($sql, $conn);

   mysql_close($conn);

   echo "addSuccess";

?>

