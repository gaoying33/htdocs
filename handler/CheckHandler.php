 <?php
session_start();
 if(isset($_SESSION['views']))
   echo ture;
 else
    echo false;

?>