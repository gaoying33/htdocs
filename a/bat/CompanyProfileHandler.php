<?php
  
   $DB_HOST ='localhost';
   $DB_USER= 'root';
   $DB_PASS='root';
   $DB_DATABASENAME='aboutus';
   $DB_TABLENAME='ab_companyinfo';

  //数据库表的列名
   $dbcolarray = array('ci_id', 'ci_content', 'ci_type');

   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
 
   $part1 = "";
   $part2 = "";
   $part3 = "";
   $part4 = "";
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where ci_type ='part1'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $address = mysql_fetch_row($result);
   else
	die("query failed");
   
   $sql = sprintf("select * from %s where ci_type ='part2'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $address = mysql_fetch_row($result);
   else
	die("query failed");


   $sql = sprintf("select * from %s where ci_type ='part3'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $address = mysql_fetch_row($result);
   else
	die("query failed");


   $sql = sprintf("select * from %s where ci_type ='part4'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $address = mysql_fetch_row($result);
   else
	die("query failed");


  

   

?>