<?php
//联系方式
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companyinfo';

  //数据库表的列名
   $dbcolarray = array('ci_id', 'ci_content', 'ci_type');

   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

   $contactInfo ="";
  
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where ci_type ='contact'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $contactInfo = mysql_fetch_row($result);
   else
	    die("query failed");

   echo json_encode($contactInfo[1]);

?>