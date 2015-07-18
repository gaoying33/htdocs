<?php
session_start();
if (isset($_SESSION['views'])) {
	  unset($_SESSION['views']);
	  echo "logout success";
}
else
	echo "no session";
?>