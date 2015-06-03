<?php
	//开启调试模式
	define('APP_DEBUG', true);
	
	if ($_SERVER['REQUEST_METHOD']=='GET')
	{
		define('APP_NAME', 'AboutUs');
		define('APP_PATH', './AboutUs/');
	}
	elseif ($_SERVER['REQUEST_METHOD']=='POST')
	{
		define('APP_NAME', 'AboutUsOperate');
		define('APP_PATH', './AboutUsOperate/');
	}
	require './ThinkPHP/ThinkPHP.php';