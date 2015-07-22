<?php

require_once "DBConfig.php";
$DB_TABLENAME='ab_otherpicture';


if ((($_FILES["upload_file"]["type"] == "image/gif")

|| ($_FILES["upload_file"]["type"] == "image/jpeg")

|| ($_FILES["upload_file"]["type"] == "image/pjpeg")

|| ($_FILES["upload_file"]["type"] == "image/png"))
)

  {

  if ($_FILES["upload_file"]["error"] > 0)

    {

    echo " <textarea>Return Code: " . $_FILES["upload_file"]["error"] . "<br /></textarea>";

    }

  else

    {

    if (file_exists("../upload/" . $_FILES["upload_file"]["name"]))

      {

      echo " <textarea>".$_FILES["upload_file"]["name"] . " already exists.</textarea> ";

      }

    else

      {

      move_uploaded_file($_FILES["upload_file"]["tmp_name"],

      "../upload/" . $_FILES["upload_file"]["name"]);



       //存到数据库
      $path =  $_FILES["upload_file"]["name"];

        # code...   //mysql_connect
     $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("connect failed" . mysql_error());
     mysql_select_db($DB_DATABASENAME, $conn);

     
     //读取表中纪录条数
     $sql = sprintf("insert into %s (p_url) values ('%s')", $DB_TABLENAME, 
      $path);
     
     $result = mysql_query($sql, $conn);
     mysql_close($conn);

      
     echo "<textarea>success</textarea>";

      }

    }

  }

/*else

  {

  echo "<textarea>Invalid file</textarea>";

  } */

?>