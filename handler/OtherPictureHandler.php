<?php
//产品简介
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_otherpicture';

   $countPerPage= $_POST['countPerPage']; //每页个数
   $totalCount = 0;
   $currentPage = $_POST['currentPage']; //当前页面 从0开始
  

  //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
   
  //总共有的记录条数
  $sql = sprintf("select count(*) from %s", $DB_TABLENAME);
  $result = mysql_query($sql, $conn);
  if ($result)
  {
    $total = mysql_fetch_array($result);
    $totalCount = $total[0];
  }
  else
  {
    die("query failed");
  }
 
  $startIndex = $countPerPage * $currentPage;
  $endIndex = $countPerPage + $startIndex;
   

    if ($startIndex>=$totalCount) {
      $startIndex = $totalCount - $countPerPage;
      $endIndex = $totalCount;

  }
 

   $arrayList = array();
   
   //读取表中纪录条数
   $sql = sprintf("select * from %s", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
  
   if ($result)
   {

          $nowIndex =0;
		  while($row = mysql_fetch_array($result))
			{
		         if ($nowIndex >=$startIndex && $nowIndex<$endIndex) 
		         {
		             $arrayList[]= array( 'id' => $row['p_id'],
                                          'url' => $row['p_url'],		                              	                                       
		                                );

		         }
		         elseif ($nowIndex == $endIndex) 
		         {
		            break;
		         }
			    $nowIndex++;
			}
		   
   }  
   else
   {
           die("query failed");

   }
	   

   $resultList = array(
                     	'totalCount' => $totalCount,
                        'pictureList' => $arrayList,
                      );

  echo json_encode($resultList);
	
 
	
?>