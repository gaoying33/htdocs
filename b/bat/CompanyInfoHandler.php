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

   $address ="";
   $phone = "";
   $mail = "";
   $fax = "";
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where ci_type ='address'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $address = mysql_fetch_row($result);
   else
	die("query failed");


   $sql = sprintf("select * from %s where ci_type ='phone'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $phone = mysql_fetch_row($result);
   else
	die("query failed");

   
   $sql = sprintf("select * from %s where ci_type ='mail'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $mail = mysql_fetch_row($result);
   else
	die("query failed");


   $sql = sprintf("select * from %s where ci_type ='fax'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $fax= mysql_fetch_row($result);
   else
	die("query failed");

  $arrayList = array(
  	'address' => $address[1],
     'phone'  => $phone[1],
     'mail'  => $mail[1],
     'fax'  => $fax[1] 
  	);

 echo json_encode($arrayList);

?>