<?php
//招聘信息
   require_once "DBConfig.php";
   $DB_TABLENAME='ab_recruitinfo';

   $countPerPage= $_POST['countPerPage']; //每页个数
   $totalCount = 0;
   $currentPage = $_POST['currentPage']; //当前页面 从0开始

  //数据库表的列名
   $dbcolarray = array('r_id', 'r_content');

  //mysql_connect
   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
   mysql_select_db($DB_DATABASENAME, $conn);
   
    //总共有的记录条数
   $sql = sprintf("select count(*) from %s", $DB_TABLENAME);
   $result = mysql_query($sql, $conn);
   if ($result)
   {
     $totalCount = mysql_fetch_row($result);
   }
   else
   {
     die("query failed");
   }
 
   $startIndex = $countPerPage * $currentPage;
   $endIndex = $countPerPage + $startIndex;

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
                 $arrayList[] = $row['r_content'];

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
                        'recruitInfoList' => $arrayList,
                      );

  echo json_encode($resultList);

?>