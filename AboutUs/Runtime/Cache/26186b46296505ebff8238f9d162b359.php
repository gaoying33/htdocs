<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户注册 | AboutUs网</title>
	<script type="text/javascript" src="/Plugin/jquery/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
		function doRegister()
		{
			var username=$("#username").val();
			var password=$("#password").val();
			$('#status').text('注册中').css('color','gray');
			$.post('/User/register',
				{username:username,password:password},
				function(response){
					if (response=='done') $('#status').text('注册成功').css('color','green');
					if (response=='exist') $('#status').text('用户已存在').css('color','orange');
					if (response=='fail') $('#status').text('注册失败').css('color','red');
				});
		}
	</script>
</head>
<body>
	<p>
		用户注册
	</p>
	<p>
		用户名 <input id="username">
	</p>
	<p>
		密码 <input id="password" type="password">
	</p>
	<p>
		<button onclick="doRegister()">确定注册</button>
	</p>
	<div id="status"></div>
</body>
</html>