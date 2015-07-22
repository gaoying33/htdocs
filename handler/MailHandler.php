<?php
//提交需求和问题
   error_reporting(0);
    require_once "email.class.php";
    
    $smtpserver = "smtp.163.com";
	$smtpserverport =25;
	$smtpusermail = "gongxiangshijie15@163.com";
	$smtpuser = "amygao92";
	$smtppass = "gxsj15";

    //相关发送信息
    $smtpemailto = $_POST['toemail'];//要发到的公司邮箱地址
    $type = $_POST["mailType"]; // 判断法需求还是问题

    if ($type == 1)//需求 
    {
    	
    	$requestDescribe = $_POST['requestDescribe'];
    	$timeRequest = $_POST['timeRequest'];
    	$requestPerson = $_POST['requestPerson'];
    	$contactPhone = $_POST['contactPhone'];
        $requestContent =  $_POST['content'];
        
        $mailtype = "HTML";
	    $mailtitle = '来自公司网站的需求提交';
		$mailcontent = "<h1>需求：".$requestDescribe."</h1>". "\n";
	    $mailcontent .= "<p>完成时间要求： ".$timeRequest."</p>". "\n";
        $mailcontent .= "<p>称呼： ".$requestPerson."</p>". "\n";
        $mailcontent .= "<p>联系电话： ".$contactPhone."</p>". "\n";	
        $mailcontent .= "<p>详细需求： ".$requestContent."</p>". "\n";
    }
    
    if ($type ==2)//问题
    {

        $requestPerson = $_POST['requestPerson'];
    	$contactPhone = $_POST['contactPhone'];
    	$contactMail = $_POST['contactMail'];
        $questionContent =  $_POST['content'];
    	 
        $mailtype = "HTML";
	    $mailtitle = '来自公司网站的问题反馈';
	    $mailcontent = "<h1>问题反馈</h1>". "\n";
        $mailcontent .= "<p>称呼： ".$requestPerson."</p>". "\n";
        $mailcontent .= "<p>联系电话： ".$contactPhone."</p>". "\n";
        $mailcontent .= "<p>联系邮箱： ".$contactMail."</p>". "\n";
        $mailcontent .= "<p>详细描述： ".$questionContent."</p>". "\n";

    }

    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->debug = false;
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state=="")
	{
		echo "fail";
	}
	else
	{
       echo "success";
	}

?>