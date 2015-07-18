<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companynews';

   $id1 = $_POST['id1'];
   $id2 = $_POST['id2'];
   $rank1 = 0;
   $rank2 = 0;

   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   $sql = sprintf("select c_rank from %s where c_newsid = %d", $DB_TABLENAME,$id1);
   $result = mysql_query($sql, $conn);
  
   if ($result)
   {

     $row = mysql_fetch_array($result);
     $rank1 = $row[0];   
   }  
   else
   {
       die("query failed");

   }
 
   $sql = sprintf("select c_rank from %s where c_newsid = %d", $DB_TABLENAME,$id2);
   $result = mysql_query($sql, $conn);
  
   if ($result)
   {

     $row = mysql_fetch_array($result);
     $rank2 = $row[0];   
   }  
   else
   {
       die("query failed");

   }




   $sql = sprintf("update %s set c_rank =%d where c_newsid = %d", $DB_TABLENAME, $rank2,$id1);

   $result = mysql_query($sql, $conn);

   $sql = sprintf("update %s set c_rank =%d where c_newsid = %d", $DB_TABLENAME, $rank1,$id2);

   $result = mysql_query($sql, $conn);


   mysql_close($conn);

   echo "moveUpSuccess";

?>