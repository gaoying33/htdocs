<?php
	define('APP_DEBUG', true);
	
	if ($_SERVER['REQUEST_METHOD']=='GET')
	{
		define('APP_NAME', 'ManageCompany');
		define('APP_PATH', './ManageCompany/');
	}
	elseif ($_SERVER['REQUEST_METHOD']=='POST')
	{
		define('APP_NAME', 'ManageCompanyOperate');
		define('APP_PATH', './ManageCompanyOperate/');
	}
	require '../ThinkPHP/ThinkPHP.php';
	?>