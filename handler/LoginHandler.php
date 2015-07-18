<?php

  require_once "DBConfig.php";
  session_start();

  $DB_TABLENAME='ab_employee';

  $name = $_POST['name'];
  $pass = $_POST['pass'];

  //
   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);

  

   

   
   //读取表中纪录条数
   $sql = sprintf("select * from %s where e_loginname = '%s'", $DB_TABLENAME, $name);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $row = mysql_fetch_array($result);
   else
	    die("query failed");

  $checkpass = $row['e_password'];
  
  if ( $checkpass == $pass ) {
  	 echo "success";
  	 $_SESSION['views']=1;
  }
  else
  	echo "fail";


?>