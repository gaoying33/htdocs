<?php
  //公司简介
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_companyinfo';



   //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
 
   $part1 = "";
   $part2 = "";
   $part3 = "";
   $part4 = "";
   
   //读取表中纪录条数
  
   $sql = sprintf("select ci_content from %s where ci_type ='describe_part1'", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
	  $part1 = mysql_fetch_array($result);
   else
	 die("query failed");
   
    $sql = sprintf("select ci_content from %s where ci_type ='describe_part2'", $DB_TABLENAME);
  $result = mysql_query($sql, $conn);
   if ($result)
	  $part2 = mysql_fetch_array($result);
   else
	 die("query failed");


     $sql = sprintf("select ci_content from %s where ci_type ='describe_part3'", $DB_TABLENAME);
  $result = mysql_query($sql, $conn);
   if ($result)
	  $part3 = mysql_fetch_array($result);
   else
	 die("query failed");


    $sql = sprintf("select ci_content from %s where ci_type ='describe_part4'",  $DB_TABLENAME);
  $result = mysql_query($sql, $conn);
   if ($result)
	  $part4 = mysql_fetch_array($result);
   else
	 die("query failed");


  $arrayList = array(
  	 'part1' => $part1['ci_content'],
     'part2' => $part2['ci_content'],
     'part3' => $part3['ci_content'],
     'part4' => $part4['ci_content'] 
  	);

   echo json_encode($arrayList);


?>